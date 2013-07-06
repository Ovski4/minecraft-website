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
        //retrieving factions from json files
      
        // MineServer/mstore/factions_faction@default/*
        if ($handle = opendir($this->getFactionDirectory())) {
            while (false !== ($entry = readdir($handle))) {
                if ($entry != "." && $entry != "..") {
                    echo "$entry\n";
                }
            }
            closedir($handle);
      }
      
        $m = $this->getContainer()->get('doctrine')->getManager();
        $factions = $m->getRepository('OvskiFactionStatsBundle:Faction')->findAll();
        
        //updating existing factions
        
        //removing factions no longer existing

        //adding new factions
        
        $output->writeln("gogole action : okkkkkaaaaaaaaaayyyyyyy");
    }
    
    public function getFactionDirectory() {
        return "/home/baptiste/MineProject/MineServer/mstore/factions_faction@default/";
    }
}