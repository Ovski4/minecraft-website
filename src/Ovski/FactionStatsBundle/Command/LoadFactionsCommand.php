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

        $handle = opendir($this->getFactionDirectory());
        if ($handle) {
            while (false !== ($file = readdir($handle))) {
                if ($this->isAllowed($file)) {
                    $faction = $manager->getRepository('OvskiFactionStatsBundle:Faction')
                                       ->find($this->getFactionId($file))
                    ;
                    if (!$faction) {
                        $faction = $this->createFaction($file, $manager);
                        $output->writeln(sprintf("%s hase been created", $faction->getName()));
                    } else {
                        $this->updateFaction($faction, $file, $manager, $output);
                        $output->writeln(sprintf("%s has been updated", $faction->getName()));
                    }
                    $manager->persist($faction);
                }
            }
            closedir($handle);
            $manager->flush();
        }
      
     /*{
  "name": "warlorders",
  "description": "one lord to rule them all",
  "createdAtMillis": 1373108603683,
  "relationWishes": {
    "de900964-5097-414c-b48c-826615f73538": "ENEMY"
  }*/
        
        
        /*
        //updating existing factions
        
        //removing factions no longer existing

        //adding new factions
        */
        $output->writeln("gogole action : okkkkkaaaaaaaaaayyyyyyy");
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
            foreach ($factionJsonArray['relationWishes'] as $factionId => $relation) {
                $factionWithRelationship = $manager->getRepository('OvskiFactionStatsBundle:Faction')
                                   ->find($factionId);
                ;
                $output->writeln(sprintf("  %s and %s are %s",
                               $faction,
                               $factionWithRelationship,
                               $relation)
                              )
                ;
                $this->addRelationship($faction, $factionWithRelationship, $relation);
            }
        }
        
        
    }

    /**
     * Create a faction object from a faction json file
     * 
     * @param string $file
     * @return \Ovski\FactionStatsBundle\Entity\Faction
     */
    public function createFaction($file) {

        //retrieve data from json
        $fileAbsolutePath = sprintf("%s%s", $this->getFactionDirectory(), $file);
        $json = file_get_contents($fileAbsolutePath);
        $factionArray = json_decode($json, true);
 
        //create a new faction object
        $faction = new Faction();
        $faction->setId($this->getFactionId($file));
        $faction->setName($factionArray['name']);

        if(isset($factionArray['description'])) {
            $faction->setDescription($factionArray['description']);
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
    
    public function addRelationship(Faction $faction, Faction $faction_with_relationship, $relation) {
        switch ($relation) {
            case "TRUCE":
                $faction->addTruceFactionsWithMe($faction_with_relationship);
                break;
            case "ALLY":
                $faction->addAllyFactionsWithMe($faction_with_relationship);
                break;
            case "ENEMY":
                $faction->addEnemyFactionsWithMe($faction_with_relationship);
                break;
            default:
                throw new \Exception(sprintf("Error : unknown relation '%s'", $relation));
                break;
        }
    }
}