<?php

/**
 *
 * @author:  Baptiste BOUCHEREAU <baptiste.bouchereau@gmail.com>
 * @license: GPL
 *
 */

namespace Ovski\MinecraftStatsBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Ovski\MinecraftStatsBundle\Entity\Faction;
use Ovski\MinecraftStatsBundle\Entity\Player;
use Ovski\ToolsBundle\Tools\Utils;

/**
 * Load factions scores in database
 */
class LoadFactionsScoresFixturesCommand extends ContainerAwareCommand {

    protected function configure()
    {
        $this
            ->setName('ovski:load:factions-scores')
            ->setDescription('Load factions scores in database')
            ->setHelp(<<<EOT
                The <info>%command.name%</info> command loads factions scores in database.
EOT
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $manager = $this->getContainer()->get('doctrine')->getManager();

        $factions = $manager->getRepository('OvskiMinecraftStatsBundle:Faction')
                            ->findAll();
        if($factions) {
            foreach($factions as $faction) {
                $output->writeln(sprintf("The score of faction <comment>%s</comment> has been set", $faction->getName()));
                $faction->setScore();
            }
            $manager->flush();
        }
    }
}