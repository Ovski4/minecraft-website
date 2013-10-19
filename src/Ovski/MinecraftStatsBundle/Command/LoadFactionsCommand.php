<?php

/**
 *
 * @author:  Baptiste BOUCHEREAU <baptiste.bouchereau@gmail.com>
 * @license: GPL
 *
 */

namespace Ovski\MinecraftStatsBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Ovski\MinecraftStatsBundle\Entity\Faction;
use Ovski\MinecraftStatsBundle\Entity\Player;
use Ovski\ToolsBundle\Tools\Utils;

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
 
        //Remove disbanded factions (the json file doesn't exist)
        $factions = $manager->getRepository('OvskiMinecraftStatsBundle:Faction')
                            ->findAll();
        if($factions) {
            foreach($factions as $faction) {
                if (!file_exists(sprintf("%s%s.json", $this->getFactionDirectory(), $faction->getId()))) {
                    $output->writeln(sprintf("Faction <comment>%s</comment> has been removed", $faction->getName()));
                    
                    foreach ($faction->getPlayers() as $player) {
                        $player->setRole(NULL);
                        $player->setFaction(NULL);
                        $player->setPower(NULL);
                        $manager->persist($player);
                    }
                    $manager->remove($faction); 
               }
            }
            $manager->flush();
        }
        
        //Add new factions and update current ones
        $handleFactions = opendir($this->getFactionDirectory());
        if ($handleFactions) {
            while (false !== ($file = readdir($handleFactions))) {
                if ($this->isFactionAllowed($file)) {
                    $output->writeln(sprintf("<info>Handling %s</info>", $file));
                    $faction = $manager->getRepository('OvskiMinecraftStatsBundle:Faction')
                                       ->find($this->getFactionIdFromJson($file))
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
            while (false !== ($file = readdir($handlePlayers))) {
                if ($this->isPlayerAllowed($file)) {
                    $output->writeln(sprintf("<info>Handling %s</info>", $file));
                    $player = $manager->getRepository('OvskiMinecraftStatsBundle:Player')
                                       ->findOneByPseudo($this->getPlayerPseudoFromJson($file));
                    ;
                    if($player) {
                        $this->updatePlayerFaction($player, $file, $manager, $output);
                    }
                }
            }

            closedir($handlePlayers);
            $manager->flush();
        }

        ///Well done captain
        $output->writeln("<info>Thats so smooth I'll brush my teeth for ever</info>");
    }
    
    /**
     * Update player data according to faction changes
     * 
     * @param \Ovski\MineStatsBundle\Entity\Player $player
     * @param File $file
     * @param type $manager
     * @param type $output
     */
    public function updatePlayerFaction(Player $player, $file, ObjectManager $manager, OutputInterface $output)
    {
        $playerJsonArray = $this->getPlayerArray($file);
        //the player was kicked or left his faction
        if (!isset($playerJsonArray['factionId'])) {
            if ($player->getFaction()) {
                $output->writeln(sprintf("\tPlayer <comment>%s</comment> left or was kicked of <comment>%s</comment> faction",
                                                 $player->getPseudo(),
                                                 $player->getFaction()
                        )
                );
                $player->setFaction(NULL);
                $player->setRole(NULL);
                $player->setPower(NULL);
            }
        } else {
            $playerFile = sprintf(
                "%s%s.json",
                $this->getFactionDirectory(),
                $playerJsonArray['factionId']
            );
            //the file doesn't exist -> already taken care of at the beginning of the execute function
            if(file_exists($playerFile)) {
                //there's already a faction
                if ($player->getFaction() != NULL) {
                    //check if the new and current faction arent the same
                    if($player->getFaction()->getId() != $playerJsonArray['factionId']) {
                        $faction = $manager->getRepository('OvskiMinecraftStatsBundle:Faction')
                                           ->find($playerJsonArray['factionId']);
                        $output->writeln(sprintf("\tPlayer <comment>%s</comment> changed faction from <comment>%s</comment> to <comment>%s</comment>)",
                                                 $player->getPseudo(),
                                                 $player->getFaction()->getName(),
                                                 $faction->getName()
                                        )
                        );
                        $player->setFaction($faction);
                    }
                    //check if the new and current role arent the same
                    if($player->getRole() != NULL && $player->getRole() != $playerJsonArray['role']) {
                        $output->writeln(sprintf("\tPlayer <comment>%s</comment> changed role from <comment>%s</comment> to <comment>%s</comment>)",
                                                 $player->getPseudo(),
                                                 $player->getRole(),
                                                 $playerJsonArray['role']
                                        )
                        );
                        if (isset($playerJsonArray['role'])) {
                            $player->setRole($playerJsonArray['role']);
                        }
                    }
                    //check if the new and current power arent the same
                    if($player->getPower() != $playerJsonArray['power']) {
                        $output->writeln(sprintf("\tPlayer <comment>%s</comment> changed power from <comment>%s</comment> to <comment>%s</comment>)",
                                                 $player->getPseudo(),
                                                 $player->getPower(),
                                                 $playerJsonArray['power']
                                        )
                        );
                        if (isset($playerJsonArray['power'])) {
                            $player->setPower($playerJsonArray['power']);
                        }
                    }
                //there is no faction set yet
                } elseif ($player->getFaction() == NULL) {
                    $faction = $manager->getRepository('OvskiMinecraftStatsBundle:Faction')
                                               ->find($playerJsonArray['factionId']);
                    $player->setFaction($faction);
                    if (isset($playerJsonArray['role'])) {
                        $player->setRole($playerJsonArray['role']);
                    }
                    if (isset($playerJsonArray['power'])) {
                        $player->setPower($playerJsonArray['power']);
                    } else {
                        $player->setPower(0);
                    }
                    $output->writeln(sprintf("\tPlayer <comment>%s</comment> joined %s",
                                             $player->getPseudo(),
                                             $faction->getName()
                                    )
                    );
                }
            }
        }
        $manager->persist($player);
    }

    /**
     * Update a faction object from a faction json file
     * 
     * @param Faction $faction
     * @param string $file
     * @return \Ovski\MineStatsBundle\Entity\Faction
     */
    public function updateFaction(Faction $faction, $file, ObjectManager $manager, OutputInterface $output) {
        $factionJsonArray = $this->getFactionArray($file);
        $faction->setName($factionJsonArray['name']);
        if(isset($factionJsonArray['description'])) {
            $faction->setDescription($factionJsonArray['description']);
        }
        if(isset($factionJsonArray['relationWishes'])) {
            $this->manageRelationships($faction, $factionJsonArray['relationWishes'], $manager, $output);    
        }
    }

    /**
     * Manage (create/update) relationships for a faction
     * 
     * @param \Ovski\MineStatsBundle\Entity\Faction $faction
     * @param array $relationships
     * @param $manager
     * @param $output
     */
    public function manageRelationships(Faction $faction, $relationships, ObjectManager $manager, OutputInterface $output)
    {
        if(isset($relationships)) {
            foreach($relationships as $factionId => $relationship) {
                $factionWithRelationship = $manager->getRepository('OvskiMinecraftStatsBundle:Faction')
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
     * @return \Ovski\MineStatsBundle\Entity\Faction
     */
    public function createFaction($file, ObjectManager $manager, OutputInterface $output) {

        //retrieve data from json
        $fileAbsolutePath = sprintf("%s%s", $this->getFactionDirectory(), $file);
        $json = file_get_contents($fileAbsolutePath);
        $factionJsonArray = json_decode($json, true);
 
        //create a new faction object
        $faction = new Faction();
        $faction->setId($this->getFactionIdFromJson($file));
        $faction->setName($factionJsonArray['name']);
        $faction->setSlug(Utils::slugify($factionJsonArray['name']));
        $faction->setCreatedAt($factionJsonArray['createdAtMillis']);

        if(isset($factionJsonArray['description'])) {
            $faction->setDescription($factionJsonArray['description']);
        }

        if(isset($factionJsonArray['relationWishes'])) {
            $this->manageRelationships($faction, $factionJsonArray['relationWishes'], $manager, $output);
        }

        return $faction;
    }

    /**
     * Check if a faction file is allowed in order to parse it
     * Reject blacklisted and temp files
     * 
     * @param string $file
     * @return boolean
     */
    public function isFactionAllowed($file) {
        // asus blacklist
        $blackList = array(
            ".",
            "..",
            "f2eae440-908d-4ccd-a605-c2fc31e18261.json", //wilderness
            "af2fce2b-9a77-405c-94e9-2c3cf199eabc.json", //safezone
            "d95393a9-b860-4be2-86be-90b76b68d7d7.json"  //warzone
        );

        /*
        //Bluebob blacklist
        $blackList = array(
            ".",
            "..",
            "d289003a-ecc5-4545-b445-91853ef9b627.json", //wilderness
            "387d1cb1-90fa-4369-a763-59531c1c4dc4.json", //safezone
            "450441cf-4ea6-471f-bff6-b32e894633a5.json"  //warzone
        );*/
        
        if (in_array($file, $blackList) || strpos($file, "~")) {
            return false;
        }
        return true;
    }

    /**
     * Check if a player file is allowed in order to parse it
     * Reject blacklisted and temp files
     * 
     * @param string $file
     * @return boolean
     */
    public function isPlayerAllowed($file) {
        $blackList = array(
            ".",
            ".."
        );

        if (in_array($file, $blackList) || strpos($file, "~")) {
            return false;
        }
        return true;
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
    public function getFactionIdFromJson($file) {
        $fileInfos = pathinfo($file);
        return $fileInfos['filename'];
    }

    /**
     * Get the player pseudo from the name of the json file
     * 
     * @param string $file
     * @return string
     */
    public function getPlayerPseudoFromJson($file) {
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
}