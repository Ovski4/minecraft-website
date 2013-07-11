<?php

namespace Ovski\MineStatsBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ovski\MineStatsBundle\Entity\Player;

class LoadPlayerData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        /* CREATE PLAYERS */

        $ovski4Player = new Player();
        $ovski4Player->setPseudo("ovski4");
        $ovski4Player->setBrokenBlocks(0);
        $ovski4Player->setKills(0);
        $ovski4Player->setPlacedBlocks(0);
        $ovski4Player->setPlayedTime(0);
        $ovski4Player->setPrestige(0);
        $ovski4Player->setPvpDeaths(0);
        $ovski4Player->setStupidDeaths(0);
        $ovski4Player->setVerbosity(0);
        $ovski4Player->setFaction($this->getReference("sandpeople-faction"));
        $ovski4Player->setRole("OFFICER");
        $manager->persist($ovski4Player);

        $napyDaWisePlayer = new Player();
        $napyDaWisePlayer->setPseudo("Napy Da Wise");
        $napyDaWisePlayer->setBrokenBlocks(0);
        $napyDaWisePlayer->setKills(0);
        $napyDaWisePlayer->setPlacedBlocks(0);
        $napyDaWisePlayer->setPlayedTime(0);
        $napyDaWisePlayer->setPrestige(0);
        $napyDaWisePlayer->setPvpDeaths(0);
        $napyDaWisePlayer->setStupidDeaths(0);
        $napyDaWisePlayer->setVerbosity(0);
        $napyDaWisePlayer->setFaction($this->getReference("sandpeople-faction"));
        $napyDaWisePlayer->setRole("LEADER");
        $manager->persist($napyDaWisePlayer);

        $glapinePlayer = new Player();
        $glapinePlayer->setPseudo("glapine");
        $glapinePlayer->setBrokenBlocks(0);
        $glapinePlayer->setKills(0);
        $glapinePlayer->setPlacedBlocks(0);
        $glapinePlayer->setPlayedTime(0);
        $glapinePlayer->setPrestige(0);
        $glapinePlayer->setPvpDeaths(0);
        $glapinePlayer->setStupidDeaths(0);
        $glapinePlayer->setVerbosity(0);
        $glapinePlayer->setFaction($this->getReference("sandpeople-faction"));
        $glapinePlayer->setRole("OFFICER");
        $manager->persist($glapinePlayer);

        $grosziznzinPlayer = new Player();
        $grosziznzinPlayer->setPseudo("grosziznzin");
        $grosziznzinPlayer->setBrokenBlocks(0);
        $grosziznzinPlayer->setKills(0);
        $grosziznzinPlayer->setPlacedBlocks(0);
        $grosziznzinPlayer->setPlayedTime(0);
        $grosziznzinPlayer->setPrestige(0);
        $grosziznzinPlayer->setPvpDeaths(0);
        $grosziznzinPlayer->setStupidDeaths(0);
        $grosziznzinPlayer->setVerbosity(0);
        $grosziznzinPlayer->setFaction($this->getReference("sandpeople-faction"));
        $grosziznzinPlayer->setRole("OFFICER");
        $manager->persist($grosziznzinPlayer);

        $summumluiPlayer = new Player();
        $summumluiPlayer->setPseudo("summumlui");
        $summumluiPlayer->setBrokenBlocks(0);
        $summumluiPlayer->setKills(0);
        $summumluiPlayer->setPlacedBlocks(0);
        $summumluiPlayer->setPlayedTime(0);
        $summumluiPlayer->setPrestige(0);
        $summumluiPlayer->setPvpDeaths(0);
        $summumluiPlayer->setStupidDeaths(0);
        $summumluiPlayer->setVerbosity(0);
        $summumluiPlayer->setFaction($this->getReference("warlords-faction"));
        $summumluiPlayer->setRole("LEADER");
        $manager->persist($summumluiPlayer);

        $jaylbralonPlayer = new Player();
        $jaylbralonPlayer->setPseudo("jaylbralon");
        $jaylbralonPlayer->setBrokenBlocks(0);
        $jaylbralonPlayer->setKills(0);
        $jaylbralonPlayer->setPlacedBlocks(0);
        $jaylbralonPlayer->setPlayedTime(0);
        $jaylbralonPlayer->setPrestige(0);
        $jaylbralonPlayer->setPvpDeaths(0);
        $jaylbralonPlayer->setStupidDeaths(0);
        $jaylbralonPlayer->setVerbosity(0);
        $jaylbralonPlayer->setFaction($this->getReference("herbivores-faction"));
        $jaylbralonPlayer->setRole("LEADER");
        $manager->persist($jaylbralonPlayer);

        $pedoPonyPlayer = new Player();
        $pedoPonyPlayer->setPseudo("pedopony");
        $pedoPonyPlayer->setBrokenBlocks(0);
        $pedoPonyPlayer->setKills(0);
        $pedoPonyPlayer->setPlacedBlocks(0);
        $pedoPonyPlayer->setPlayedTime(0);
        $pedoPonyPlayer->setPrestige(0);
        $pedoPonyPlayer->setPvpDeaths(0);
        $pedoPonyPlayer->setStupidDeaths(0);
        $pedoPonyPlayer->setVerbosity(0);
        $pedoPonyPlayer->setFaction($this->getReference("mwahahahahaha-faction"));
        $pedoPonyPlayer->setRole("LEADER");
        $manager->persist($pedoPonyPlayer);

        $fearhardcorePlayer = new Player();
        $fearhardcorePlayer->setPseudo("fearhardcore");
        $fearhardcorePlayer->setBrokenBlocks(0);
        $fearhardcorePlayer->setKills(0);
        $fearhardcorePlayer->setPlacedBlocks(0);
        $fearhardcorePlayer->setPlayedTime(0);
        $fearhardcorePlayer->setPrestige(0);
        $fearhardcorePlayer->setPvpDeaths(0);
        $fearhardcorePlayer->setStupidDeaths(0);
        $fearhardcorePlayer->setVerbosity(0);
        $fearhardcorePlayer->setFaction($this->getReference("motherofgod-faction"));
        $fearhardcorePlayer->setRole("LEADER");
        $manager->persist($fearhardcorePlayer);

        $laisorePlayer = new Player();
        $laisorePlayer->setPseudo("laisore");
        $laisorePlayer->setBrokenBlocks(0);
        $laisorePlayer->setKills(0);
        $laisorePlayer->setPlacedBlocks(0);
        $laisorePlayer->setPlayedTime(0);
        $laisorePlayer->setPrestige(0);
        $laisorePlayer->setPvpDeaths(0);
        $laisorePlayer->setStupidDeaths(0);
        $laisorePlayer->setVerbosity(0);
        $laisorePlayer->setFaction($this->getReference("borntofactionner-faction"));
        $laisorePlayer->setRole("LEADER");
        $manager->persist($laisorePlayer);
        
        $pocralaPlayer = new Player();
        $pocralaPlayer->setPseudo("pocrala");
        $pocralaPlayer->setBrokenBlocks(0);
        $pocralaPlayer->setKills(0);
        $pocralaPlayer->setPlacedBlocks(0);
        $pocralaPlayer->setPlayedTime(0);
        $pocralaPlayer->setPrestige(0);
        $pocralaPlayer->setPvpDeaths(0);
        $pocralaPlayer->setStupidDeaths(0);
        $pocralaPlayer->setVerbosity(0);
        $pocralaPlayer->setFaction($this->getReference("hotrs-faction"));
        $pocralaPlayer->setRole("LEADER");
        $manager->persist($pocralaPlayer);
        
        $neoxerPlayer = new Player();
        $neoxerPlayer->setPseudo("neoxer");
        $neoxerPlayer->setBrokenBlocks(0);
        $neoxerPlayer->setKills(0);
        $neoxerPlayer->setPlacedBlocks(0);
        $neoxerPlayer->setPlayedTime(0);
        $neoxerPlayer->setPrestige(0);
        $neoxerPlayer->setPvpDeaths(0);
        $neoxerPlayer->setStupidDeaths(0);
        $neoxerPlayer->setVerbosity(0);
        $neoxerPlayer->setFaction($this->getReference("warlords-faction"));
        $neoxerPlayer->setRole("OFFICER");
        $manager->persist($neoxerPlayer);
        
        $rinyaPlayer = new Player();
        $rinyaPlayer->setPseudo("rinya");
        $rinyaPlayer->setBrokenBlocks(0);
        $rinyaPlayer->setKills(0);
        $rinyaPlayer->setPlacedBlocks(0);
        $rinyaPlayer->setPlayedTime(0);
        $rinyaPlayer->setPrestige(0);
        $rinyaPlayer->setPvpDeaths(0);
        $rinyaPlayer->setStupidDeaths(0);
        $rinyaPlayer->setVerbosity(0);
        $rinyaPlayer->setFaction($this->getReference("herbivores-faction"));
        $rinyaPlayer->setRole("OFFICER");
        $manager->persist($rinyaPlayer);
        
        $mixcalPlayer = new Player();
        $mixcalPlayer->setPseudo("mixcal");
        $mixcalPlayer->setBrokenBlocks(0);
        $mixcalPlayer->setKills(0);
        $mixcalPlayer->setPlacedBlocks(0);
        $mixcalPlayer->setPlayedTime(0);
        $mixcalPlayer->setPrestige(0);
        $mixcalPlayer->setPvpDeaths(0);
        $mixcalPlayer->setStupidDeaths(0);
        $mixcalPlayer->setVerbosity(0);
        $mixcalPlayer->setFaction($this->getReference("herbivores-faction"));
        $mixcalPlayer->setRole("OFFICER");
        $manager->persist($mixcalPlayer);
        
        $tiriaPlayer = new Player();
        $tiriaPlayer->setPseudo("tiria");
        $tiriaPlayer->setBrokenBlocks(0);
        $tiriaPlayer->setKills(0);
        $tiriaPlayer->setPlacedBlocks(0);
        $tiriaPlayer->setPlayedTime(0);
        $tiriaPlayer->setPrestige(0);
        $tiriaPlayer->setPvpDeaths(0);
        $tiriaPlayer->setStupidDeaths(0);
        $tiriaPlayer->setVerbosity(0);
        $tiriaPlayer->setFaction($this->getReference("motherofgod-faction"));
        $tiriaPlayer->setRole("OFFICER");
        $manager->persist($tiriaPlayer);

        $opakPlayer = new Player();
        $opakPlayer->setPseudo("opak");
        $opakPlayer->setBrokenBlocks(0);
        $opakPlayer->setKills(0);
        $opakPlayer->setPlacedBlocks(0);
        $opakPlayer->setPlayedTime(0);
        $opakPlayer->setPrestige(0);
        $opakPlayer->setPvpDeaths(0);
        $opakPlayer->setStupidDeaths(0);
        $opakPlayer->setVerbosity(0);
        $opakPlayer->setFaction($this->getReference("motherofgod-faction"));
        $opakPlayer->setRole("OFFICER");
        $manager->persist($opakPlayer);

        $rinerkPlayer = new Player();
        $rinerkPlayer->setPseudo("rinerk");
        $rinerkPlayer->setBrokenBlocks(0);
        $rinerkPlayer->setKills(0);
        $rinerkPlayer->setPlacedBlocks(0);
        $rinerkPlayer->setPlayedTime(0);
        $rinerkPlayer->setPrestige(0);
        $rinerkPlayer->setPvpDeaths(0);
        $rinerkPlayer->setStupidDeaths(0);
        $rinerkPlayer->setVerbosity(0);
        $rinerkPlayer->setFaction($this->getReference("borntofactionner-faction"));
        $rinerkPlayer->setRole("OFFICER");
        $manager->persist($rinerkPlayer);

        $batysPlayer = new Player();
        $batysPlayer->setPseudo("batys");
        $batysPlayer->setBrokenBlocks(0);
        $batysPlayer->setKills(0);
        $batysPlayer->setPlacedBlocks(0);
        $batysPlayer->setPlayedTime(0);
        $batysPlayer->setPrestige(0);
        $batysPlayer->setPvpDeaths(0);
        $batysPlayer->setStupidDeaths(0);
        $batysPlayer->setVerbosity(0);
        $batysPlayer->setFaction($this->getReference("borntofactionner-faction"));
        $batysPlayer->setRole("OFFICER");
        $manager->persist($batysPlayer);

        $pounetPlayer = new Player();
        $pounetPlayer->setPseudo("pounet");
        $pounetPlayer->setBrokenBlocks(0);
        $pounetPlayer->setKills(0);
        $pounetPlayer->setPlacedBlocks(0);
        $pounetPlayer->setPlayedTime(0);
        $pounetPlayer->setPrestige(0);
        $pounetPlayer->setPvpDeaths(0);
        $pounetPlayer->setStupidDeaths(0);
        $pounetPlayer->setVerbosity(0);
        $pounetPlayer->setFaction($this->getReference("hotrs-faction"));
        $pounetPlayer->setRole("OFFICER");
        $manager->persist($pounetPlayer);

        $bisvilinPlayer = new Player();
        $bisvilinPlayer->setPseudo("bisvilin");
        $bisvilinPlayer->setBrokenBlocks(0);
        $bisvilinPlayer->setKills(0);
        $bisvilinPlayer->setPlacedBlocks(0);
        $bisvilinPlayer->setPlayedTime(0);
        $bisvilinPlayer->setPrestige(0);
        $bisvilinPlayer->setPvpDeaths(0);
        $bisvilinPlayer->setStupidDeaths(0);
        $bisvilinPlayer->setVerbosity(0);
        $bisvilinPlayer->setFaction($this->getReference("hotrs-faction"));
        $bisvilinPlayer->setRole("OFFICER");
        $manager->persist($bisvilinPlayer);
        
        $rekilonPlayer = new Player();
        $rekilonPlayer->setPseudo("rekilon");
        $rekilonPlayer->setBrokenBlocks(0);
        $rekilonPlayer->setKills(0);
        $rekilonPlayer->setPlacedBlocks(0);
        $rekilonPlayer->setPlayedTime(0);
        $rekilonPlayer->setPrestige(0);
        $rekilonPlayer->setPvpDeaths(0);
        $rekilonPlayer->setStupidDeaths(0);
        $rekilonPlayer->setVerbosity(0);
        $rekilonPlayer->setFaction($this->getReference("hotrs-faction"));
        $rekilonPlayer->setRole("OFFICER");
        $manager->persist($rekilonPlayer);
        
        $subellePlayer = new Player();
        $subellePlayer->setPseudo("subelle");
        $subellePlayer->setBrokenBlocks(0);
        $subellePlayer->setKills(0);
        $subellePlayer->setPlacedBlocks(0);
        $subellePlayer->setPlayedTime(0);
        $subellePlayer->setPrestige(0);
        $subellePlayer->setPvpDeaths(0);
        $subellePlayer->setStupidDeaths(0);
        $subellePlayer->setVerbosity(0);
        $manager->persist($subellePlayer);
        
        $zulnetPlayer = new Player();
        $zulnetPlayer->setPseudo("zulnet");
        $zulnetPlayer->setBrokenBlocks(0);
        $zulnetPlayer->setKills(0);
        $zulnetPlayer->setPlacedBlocks(0);
        $zulnetPlayer->setPlayedTime(0);
        $zulnetPlayer->setPrestige(0);
        $zulnetPlayer->setPvpDeaths(0);
        $zulnetPlayer->setStupidDeaths(0);
        $zulnetPlayer->setVerbosity(0);
        $manager->persist($zulnetPlayer);
        
        $transtaxPlayer = new Player();
        $transtaxPlayer->setPseudo("transtax");
        $transtaxPlayer->setBrokenBlocks(0);
        $transtaxPlayer->setKills(0);
        $transtaxPlayer->setPlacedBlocks(0);
        $transtaxPlayer->setPlayedTime(0);
        $transtaxPlayer->setPrestige(0);
        $transtaxPlayer->setPvpDeaths(0);
        $transtaxPlayer->setStupidDeaths(0);
        $transtaxPlayer->setVerbosity(0);
        $manager->persist($transtaxPlayer);
        
        $nobarxoPlayer = new Player();
        $nobarxoPlayer->setPseudo("nobarxo");
        $nobarxoPlayer->setBrokenBlocks(0);
        $nobarxoPlayer->setKills(0);
        $nobarxoPlayer->setPlacedBlocks(0);
        $nobarxoPlayer->setPlayedTime(0);
        $nobarxoPlayer->setPrestige(0);
        $nobarxoPlayer->setPvpDeaths(0);
        $nobarxoPlayer->setStupidDeaths(0);
        $nobarxoPlayer->setVerbosity(0);
        $manager->persist($nobarxoPlayer);
        
        $symeonPlayer = new Player();
        $symeonPlayer->setPseudo("symeon");
        $symeonPlayer->setBrokenBlocks(0);
        $symeonPlayer->setKills(0);
        $symeonPlayer->setPlacedBlocks(0);
        $symeonPlayer->setPlayedTime(0);
        $symeonPlayer->setPrestige(0);
        $symeonPlayer->setPvpDeaths(0);
        $symeonPlayer->setStupidDeaths(0);
        $symeonPlayer->setVerbosity(0);
        $manager->persist($symeonPlayer);
        
        $arnauyPlayer = new Player();
        $arnauyPlayer->setPseudo("arnauy");
        $arnauyPlayer->setBrokenBlocks(0);
        $arnauyPlayer->setKills(0);
        $arnauyPlayer->setPlacedBlocks(0);
        $arnauyPlayer->setPlayedTime(0);
        $arnauyPlayer->setPrestige(0);
        $arnauyPlayer->setPvpDeaths(0);
        $arnauyPlayer->setStupidDeaths(0);
        $arnauyPlayer->setVerbosity(0);
        $manager->persist($arnauyPlayer);
        
        $this->addReference('arnauy-player', $arnauyPlayer);
        $this->addReference('ovski4-player', $ovski4Player);
        $this->addReference('napydawise-player', $napyDaWisePlayer);
        $this->addReference('grosziznzin-player', $glapinePlayer);
        $this->addReference('glapine-player', $grosziznzinPlayer);
        $this->addReference('symeon-player', $symeonPlayer);
        $this->addReference('nobarxo-player', $nobarxoPlayer);
        $this->addReference('transtax-player', $transtaxPlayer);
        $this->addReference('zulnet-player', $zulnetPlayer);
        $this->addReference('subelle-player', $subellePlayer);
        $this->addReference('rekilon-player', $rekilonPlayer);
        $this->addReference('bisvilin-player', $bisvilinPlayer);
        $this->addReference('pounet-player', $pounetPlayer);
        $this->addReference('batys-player', $batysPlayer);
        $this->addReference('rinerk-player', $rinerkPlayer);
        $this->addReference('opak-player', $opakPlayer);
        $this->addReference('tiria-player', $tiriaPlayer);
        $this->addReference('mixcal-player', $mixcalPlayer);
        $this->addReference('rinya-player', $rinyaPlayer);
        $this->addReference('neoxer-player', $neoxerPlayer);
        $this->addReference('pocrala-player', $pocralaPlayer);
        $this->addReference('laisore-player', $laisorePlayer);
        $this->addReference('fearhardcore-player', $fearhardcorePlayer);
        $this->addReference('pedopony-player', $pedoPonyPlayer);
        $this->addReference('jaylbralon-player', $jaylbralonPlayer);
        $this->addReference('summumlui-player', $summumluiPlayer);
        
        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 2;
    }
}