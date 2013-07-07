<?php

/**
 *
 * @author:  Baptiste BOUCHEREAU <baptiste.bouchereau@gmail.com>
 * @license: GPL
 *
 */

namespace Ovski\FactionStatsBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Ovski\FactionStatsBundle\Entity\Faction;
use Ovski\PlayerStatsBundle\Entity\Player;

/**
 * Load factions in database
 */
class LoadFactionsCommand extends ContainerAwareCommand {

    protected function configure()
    {
        $this
            ->setName('ovski:load:factions')
            ->setDescription('Load factions in database, from the json conf file of the faction minecraft plugin')
            ->setHelp(<<<EOT
                The <info>%command.name%</info> command loads factions in database, from the minecraft faction plugin configuraton file.
EOT
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $manager = $this->getContainer()->get('doctrine')->getManager();
 
        //Remove disbanded factions
        $factions = $manager->getRepository('OvskiFactionStatsBundle:Faction')
                            ->findAll();
        if($factions) {
            foreach($factions as $faction) {
                if (!file_exists(sprintf("%s%s.json", $this->getFactionDirectory(), $faction->getId()))) {
                    $output->writeln(sprintf("%s has been removed", $faction->getName()));
                    $manager->remove($faction);
                }
            }
            $manager->flush();
        }

        //Add new factions and update current ones
        $handleFactions = opendir($this->getFactionDirectory());
        if ($handleFactions) {
            while (false !== ($file = readdir($handleFactions))) {
                if ($this->isAllowed($file)) {
                    $output->writeln(sprintf("<info>Handling %s</info>", $file));
                    $faction = $manager->getRepository('OvskiFactionStatsBundle:Faction')
                                       ->find($this->getFactionId($file))
                    ;
                    if (!$faction) {
                        $faction = $this->createFaction($file, $manager, $output);
                        $output->writeln(sprintf("\tFaction <comment>%s</comment> has been created", $faction->getName()));
                    } else {
                        $this->updateFaction($faction, $file, $manager, $output);
                    }
                    $manager->persist($faction);
                }
            }
            closedir($handleFactions);
            $manager->flush();
        }

        //Bind players to factions
        $handlePlayers = opendir($this->getPlayerDirectory());
        if ($handlePlayers) {
            while (false !== ($file = readdir($handlePlayers)) && !strpos($file, "~")) {
                $output->writeln(sprintf("<info>Handling %s</info>", $file));
                $player = $manager->getRepository('OvskiPlayerStatsBundle:Player')
                                   ->findOneByPseudo($this->getPlayerPseudo($file));
                ;
                if($player) {
                    $this->updatePlayerFaction($player, $file, $manager, $output);
                }
            }

            closedir($handlePlayers);
            $manager->flush();
        }

        ///Well done captain
        $output->writeln("<info>Thats so smooth I'll brush my teeth for ever</info>");
    }

    /**
     * Get the directory where faction files are stored
     * 
     * @return string
     */
    public function getFactionDirectory() {
        return "/home/baptiste/MineProject/MineServer/mstore/factions_faction@default/";
    }

    /**
     * Get the directory where player files are stored
     * 
     * @return string
     */
    public function getPlayerDirectory() {
        return "/home/baptiste/MineProject/MineServer/mstore/factions_uplayer@default/";
    }

    /**
     * Get the faction id from the name of the json file
     * 
     * @param string $file
     * @return string
     */
    public function getFactionId($file) {
        $fileInfos = pathinfo($file);
        return $fileInfos['filename'];
    }

    /**
     * Get the player pseudo from the name of the json file
     * 
     * @param string $file
     * @return string
     */
    public function getPlayerPseudo($file) {
        $fileInfos = pathinfo($file);
        return $fileInfos['filename'];
    }

    /**
     * Get json faction file as an array
     * 
     * @param string $file
     * @return array
     */
    public function getFactionArray($file) {
        $fileAbsolutePath = sprintf("%s%s", $this->getFactionDirectory(), $file);
        $json = file_get_contents($fileAbsolutePath);
        return json_decode($json, true);
    }

    /**
     * Get json player file as an array
     * 
     * @param string $file
     * @return array
     */
    public function getPlayerArray($file) {
        $fileAbsolutePath = sprintf("%s%s", $this->getPlayerDirectory(), $file);
        $json = file_get_contents($fileAbsolutePath);
        return json_decode($json, true);
    }
    
    public function updatePlayerFaction(Player $player, $file, $manager, $output)
    {
        $playerJsonArray = $this->getPlayerArray($file);
        $playerFile = sprintf(
            "%s%s.json",
            $this->getFactionDirectory(),
            $playerJsonArray['factionId']
        );
        //the file doesn't exist -> set to NULL
        if(!file_exists($playerFile)) {
            if($player->getFaction()) {
                $player->setFaction(NULL);
                $output->writeln(sprintf("\tPlayer %s has been updated (faction set to null)", $player->getPseudo()));
            }
        //file exists and there's already a faction
        //-> we check if the new and current faction arent the same
        } elseif ($player->getFaction() != NULL &&
                  $player->getFaction()->getId() != $playerJsonArray['factionId']
                 ) {
            $faction = $manager->getRepository('OvskiFactionStatsBundle:Faction')
                                       ->find($playerJsonArray['factionId']);
            $player->setFaction($faction);
            $output->writeln(sprintf("\tPlayer <comment>%s</comment> has been updated (changing faction)", $player->getPseudo()));
        //file exists and there is no faction set yet
        } elseif ($player->getFaction() == NULL) {
            $faction = $manager->getRepository('OvskiFactionStatsBundle:Faction')
                                       ->find($playerJsonArray['factionId']);
            $player->setFaction($faction);
            $output->writeln(sprintf("\tPlayer <comment>%s</comment> has been updated (now in a faction)", $player->getPseudo()));
        }
        $manager->persist($player);
    }

    /**
     * Update a faction object from a faction json file
     * 
     * @param Faction $faction
     * @param string $file
     * @return \Ovski\FactionStatsBundle\Entity\Faction
     */
    public function updateFaction(Faction $faction, $file, $manager, $output) {
        $factionJsonArray = $this->getFactionArray($file);
        $faction->setName($factionJsonArray['name']);
        if(isset($factionJsonArray['description'])) {
            $faction->setDescription($factionJsonArray['description']);
        }
        if(isset($factionJsonArray['relationWishes'])) {
            $this->updateRelationships($faction, $factionJsonArray['relationWishes'], $manager, $output);    
        }
    }

    /**
     * Update relationships for a faction
     * 
     * @param \Ovski\FactionStatsBundle\Entity\Faction $faction
     * @param array $relationships
     * @param $manager
     * @param $output
     */
    public function updateRelationships(Faction $faction, $relationships, $manager, $output)
    {
        if(isset($relationships)) {
            foreach($relationships as $factionId => $relationship) {
                $factionWithRelationship = $manager->getRepository('OvskiFactionStatsBundle:Faction')
                                   ->find($factionId);
                ;
                //is the faction with relationship still exist
                if($factionWithRelationship) {
                    $currentRelationship = $faction->getRelationShip($factionWithRelationship);
                    if($currentRelationship == 'NEUTRAL') {
                        $faction->addRelationShip($factionWithRelationship, $relationship);
                        $output->writeln("\tNew relationship");
                        $output->writeln(sprintf("\tFaction <comment>%s</comment> is <comment>%s</comment> with <comment>%s</comment>",
                                $faction,
                                $relationship,
                                $factionWithRelationship
                                )
                            )
                    ;
                    } elseif($currentRelationship != $relationship) {
                        $faction->removeRelationShip($factionWithRelationship);
                        $faction->addRelationShip($factionWithRelationship, $relationship);
                        $output->writeln("\tRelationship changed");
                        $output->writeln(sprintf("\tFaction <comment>%s</comment> is <comment>%s</comment> with <comment>%s</comment>",
                                $faction,
                                $relationship,
                                $factionWithRelationship
                                )
                            )
                    ;
                    }
                }
            }
        }
    }

    /**
     * Create a faction object from a faction json file
     * 
     * @param string $file
     * @return \Ovski\FactionStatsBundle\Entity\Faction
     */
    public function createFaction($file, $manager, $output) {

        //retrieve data from json
        $fileAbsolutePath = sprintf("%s%s", $this->getFactionDirectory(), $file);
        $json = file_get_contents($fileAbsolutePath);
        $factionJsonArray = json_decode($json, true);
 
        //create a new faction object
        $faction = new Faction();
        $faction->setId($this->getFactionId($file));
        $faction->setName($factionJsonArray['name']);

        if(isset($factionJsonArray['description'])) {
            $faction->setDescription($factionJsonArray['description']);
        }

        if(isset($factionJsonArray['description'])) {
            $this->updateRelationships($faction, $factionJsonArray['relationWishes'], $manager, $output);
        }

        return $faction;
    }

    /**
     * Check if a file is allowed in order to parse it
     * Reject blacklisted and temp files
     * 
     * @param string $file
     * @return boolean
     */
    public function isAllowed($file) {
        $blackList = array(
            ".",
            "..",
            "f2eae440-908d-4ccd-a605-c2fc31e18261.json", //wilderness
            "af2fce2b-9a77-405c-94e9-2c3cf199eabc.json", //safezone
            "d95393a9-b860-4be2-86be-90b76b68d7d7.json"  //warzone
        );

        if (in_array($file, $blackList) || strpos($file, "~")) {
            return false;
        }
        return true;
    }
}