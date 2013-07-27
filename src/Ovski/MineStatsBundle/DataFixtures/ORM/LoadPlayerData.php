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
        $ovski4Player->setBrokenBlocks(1523);
        $ovski4Player->setKills(156);
        $ovski4Player->setPlacedBlocks(258);
        $ovski4Player->setPlayedTime(1200025);
        $ovski4Player->setPrestige(8);
        $ovski4Player->setPvpDeaths(59);
        $ovski4Player->setStupidDeaths(23);
        $ovski4Player->setVerbosity(152);
        $ovski4Player->setFaction($this->getReference("sandpeople-faction"));
        $ovski4Player->setRole("OFFICER");
        $ovski4Player->setPower(2.25);
        $manager->persist($ovski4Player);

        $napyDaWisePlayer = new Player();
        $napyDaWisePlayer->setPseudo("napydawise");
        $napyDaWisePlayer->setBrokenBlocks(8526);
        $napyDaWisePlayer->setKills(126);
        $napyDaWisePlayer->setPlacedBlocks(4569);
        $napyDaWisePlayer->setPlayedTime(1822563);
        $napyDaWisePlayer->setPrestige(18);
        $napyDaWisePlayer->setPvpDeaths(78);
        $napyDaWisePlayer->setStupidDeaths(12);
        $napyDaWisePlayer->setVerbosity(256);
        $napyDaWisePlayer->setFaction($this->getReference("sandpeople-faction"));
        $napyDaWisePlayer->setRole("LEADER");
        $manager->persist($napyDaWisePlayer);

        $glapinePlayer = new Player();
        $glapinePlayer->setPseudo("glapine");
        $glapinePlayer->setBrokenBlocks(15236);
        $glapinePlayer->setKills(157);
        $glapinePlayer->setPlacedBlocks(3562);
        $glapinePlayer->setPlayedTime(1652003);
        $glapinePlayer->setPrestige(5);
        $glapinePlayer->setPvpDeaths(89);
        $glapinePlayer->setStupidDeaths(25);
        $glapinePlayer->setVerbosity(125);
        $glapinePlayer->setFaction($this->getReference("sandpeople-faction"));
        $glapinePlayer->setRole("OFFICER");
        $manager->persist($glapinePlayer);

        $grosziznzinPlayer = new Player();
        $grosziznzinPlayer->setPseudo("grosziznzin");
        $grosziznzinPlayer->setBrokenBlocks(15236);
        $grosziznzinPlayer->setKills(62);
        $grosziznzinPlayer->setPlacedBlocks(10250);
        $grosziznzinPlayer->setPlayedTime(102563);
        $grosziznzinPlayer->setPrestige(-15);
        $grosziznzinPlayer->setPvpDeaths(152);
        $grosziznzinPlayer->setStupidDeaths(10);
        $grosziznzinPlayer->setVerbosity(1250);
        $grosziznzinPlayer->setFaction($this->getReference("sandpeople-faction"));
        $grosziznzinPlayer->setRole("OFFICER");
        $manager->persist($grosziznzinPlayer);

        $summumluiPlayer = new Player();
        $summumluiPlayer->setPseudo("summumlui");
        $summumluiPlayer->setBrokenBlocks(15);
        $summumluiPlayer->setKills(2);
        $summumluiPlayer->setPlacedBlocks(10);
        $summumluiPlayer->setPlayedTime(1536);
        $summumluiPlayer->setPrestige(0);
        $summumluiPlayer->setPvpDeaths(5);
        $summumluiPlayer->setStupidDeaths(6);
        $summumluiPlayer->setVerbosity(4);
        $summumluiPlayer->setFaction($this->getReference("warlords-faction"));
        $summumluiPlayer->setRole("LEADER");
        $manager->persist($summumluiPlayer);

        $jaylbralonPlayer = new Player();
        $jaylbralonPlayer->setPseudo("jaylbralon");
        $jaylbralonPlayer->setBrokenBlocks(35236);
        $jaylbralonPlayer->setKills(28);
        $jaylbralonPlayer->setPlacedBlocks(13256);
        $jaylbralonPlayer->setPlayedTime(200000);
        $jaylbralonPlayer->setPrestige(63);
        $jaylbralonPlayer->setPvpDeaths(39);
        $jaylbralonPlayer->setStupidDeaths(4);
        $jaylbralonPlayer->setVerbosity(156);
        $jaylbralonPlayer->setFaction($this->getReference("herbivores-faction"));
        $jaylbralonPlayer->setRole("LEADER");
        $manager->persist($jaylbralonPlayer);

        $pedoPonyPlayer = new Player();
        $pedoPonyPlayer->setPseudo("pedopony");
        $pedoPonyPlayer->setBrokenBlocks(58);
        $pedoPonyPlayer->setKills(152);
        $pedoPonyPlayer->setPlacedBlocks(1526);
        $pedoPonyPlayer->setPlayedTime(15236);
        $pedoPonyPlayer->setPrestige(-4);
        $pedoPonyPlayer->setPvpDeaths(152);
        $pedoPonyPlayer->setStupidDeaths(51);
        $pedoPonyPlayer->setVerbosity(123);
        $pedoPonyPlayer->setFaction($this->getReference("mwahahahahaha-faction"));
        $pedoPonyPlayer->setRole("LEADER");
        $manager->persist($pedoPonyPlayer);

        $fearhardcorePlayer = new Player();
        $fearhardcorePlayer->setPseudo("fearhardcore");
        $fearhardcorePlayer->setBrokenBlocks(450);
        $fearhardcorePlayer->setKills(123);
        $fearhardcorePlayer->setPlacedBlocks(152);
        $fearhardcorePlayer->setPlayedTime(115268);
        $fearhardcorePlayer->setPrestige(-19);
        $fearhardcorePlayer->setPvpDeaths(165);
        $fearhardcorePlayer->setStupidDeaths(25);
        $fearhardcorePlayer->setVerbosity(25);
        $fearhardcorePlayer->setFaction($this->getReference("motherofgod-faction"));
        $fearhardcorePlayer->setRole("LEADER");
        $manager->persist($fearhardcorePlayer);

        $laisorePlayer = new Player();
        $laisorePlayer->setPseudo("laisore");
        $laisorePlayer->setBrokenBlocks(256);
        $laisorePlayer->setKills(15);
        $laisorePlayer->setPlacedBlocks(156);
        $laisorePlayer->setPlayedTime(78569);
        $laisorePlayer->setPrestige(26);
        $laisorePlayer->setPvpDeaths(369);
        $laisorePlayer->setStupidDeaths(251);
        $laisorePlayer->setVerbosity(1523);
        $laisorePlayer->setFaction($this->getReference("borntofactionner-faction"));
        $laisorePlayer->setRole("LEADER");
        $manager->persist($laisorePlayer);
        
        $pocralaPlayer = new Player();
        $pocralaPlayer->setPseudo("pocrala");
        $pocralaPlayer->setBrokenBlocks(78562);
        $pocralaPlayer->setKills(896);
        $pocralaPlayer->setPlacedBlocks(14523);
        $pocralaPlayer->setPlayedTime(1789633);
        $pocralaPlayer->setPrestige(36);
        $pocralaPlayer->setPvpDeaths(586);
        $pocralaPlayer->setStupidDeaths(123);
        $pocralaPlayer->setVerbosity(783);
        $pocralaPlayer->setFaction($this->getReference("hotrs-faction"));
        $pocralaPlayer->setRole("LEADER");
        $manager->persist($pocralaPlayer);
        
        $neoxerPlayer = new Player();
        $neoxerPlayer->setPseudo("neoxer");
        $neoxerPlayer->setBrokenBlocks(1256);
        $neoxerPlayer->setKills(253);
        $neoxerPlayer->setPlacedBlocks(632);
        $neoxerPlayer->setPlayedTime(145269);
        $neoxerPlayer->setPrestige(-3);
        $neoxerPlayer->setPvpDeaths(256);
        $neoxerPlayer->setStupidDeaths(12);
        $neoxerPlayer->setVerbosity(1100);
        $neoxerPlayer->setFaction($this->getReference("warlords-faction"));
        $neoxerPlayer->setRole("OFFICER");
        $manager->persist($neoxerPlayer);
        
        $rinyaPlayer = new Player();
        $rinyaPlayer->setPseudo("rinya");
        $rinyaPlayer->setBrokenBlocks(2586);
        $rinyaPlayer->setKills(114);
        $rinyaPlayer->setPlacedBlocks(569);
        $rinyaPlayer->setPlayedTime(152151);
        $rinyaPlayer->setPrestige(23);
        $rinyaPlayer->setPvpDeaths(100);
        $rinyaPlayer->setStupidDeaths(586);
        $rinyaPlayer->setVerbosity(236);
        $rinyaPlayer->setFaction($this->getReference("herbivores-faction"));
        $rinyaPlayer->setRole("OFFICER");
        $manager->persist($rinyaPlayer);
        
        $mixcalPlayer = new Player();
        $mixcalPlayer->setPseudo("mixcal");
        $mixcalPlayer->setBrokenBlocks(15402);
        $mixcalPlayer->setKills(142);
        $mixcalPlayer->setPlacedBlocks(14523);
        $mixcalPlayer->setPlayedTime(458696);
        $mixcalPlayer->setPrestige(156);
        $mixcalPlayer->setPvpDeaths(185);
        $mixcalPlayer->setStupidDeaths(196);
        $mixcalPlayer->setVerbosity(1256);
        $mixcalPlayer->setFaction($this->getReference("herbivores-faction"));
        $mixcalPlayer->setRole("OFFICER");
        $manager->persist($mixcalPlayer);
        
        $tiriaPlayer = new Player();
        $tiriaPlayer->setPseudo("tiria");
        $tiriaPlayer->setBrokenBlocks(2563);
        $tiriaPlayer->setKills(365);
        $tiriaPlayer->setPlacedBlocks(1502);
        $tiriaPlayer->setPlayedTime(263563);
        $tiriaPlayer->setPrestige(2);
        $tiriaPlayer->setPvpDeaths(402);
        $tiriaPlayer->setStupidDeaths(15);
        $tiriaPlayer->setVerbosity(59);
        $tiriaPlayer->setFaction($this->getReference("motherofgod-faction"));
        $tiriaPlayer->setRole("OFFICER");
        $manager->persist($tiriaPlayer);

        $opakPlayer = new Player();
        $opakPlayer->setPseudo("opak");
        $opakPlayer->setBrokenBlocks(150);
        $opakPlayer->setKills(0);
        $opakPlayer->setPlacedBlocks(102);
        $opakPlayer->setPlayedTime(522020);
        $opakPlayer->setPrestige(0);
        $opakPlayer->setPvpDeaths(0);
        $opakPlayer->setStupidDeaths(0);
        $opakPlayer->setVerbosity(0);
        $opakPlayer->setFaction($this->getReference("motherofgod-faction"));
        $opakPlayer->setRole("OFFICER");
        $manager->persist($opakPlayer);

        $rinerkPlayer = new Player();
        $rinerkPlayer->setPseudo("rinerk");
        $rinerkPlayer->setBrokenBlocks(12563);
        $rinerkPlayer->setKills(253);
        $rinerkPlayer->setPlacedBlocks(1458);
        $rinerkPlayer->setPlayedTime(1254890);
        $rinerkPlayer->setPrestige(45);
        $rinerkPlayer->setPvpDeaths(269);
        $rinerkPlayer->setStupidDeaths(296);
        $rinerkPlayer->setVerbosity(15560);
        $rinerkPlayer->setFaction($this->getReference("borntofactionner-faction"));
        $rinerkPlayer->setRole("OFFICER");
        $manager->persist($rinerkPlayer);

        $batysPlayer = new Player();
        $batysPlayer->setPseudo("batys");
        $batysPlayer->setBrokenBlocks(158922);
        $batysPlayer->setKills(1489);
        $batysPlayer->setPlacedBlocks(110233);
        $batysPlayer->setPlayedTime(99999925);
        $batysPlayer->setPrestige(189);
        $batysPlayer->setPvpDeaths(1823);
        $batysPlayer->setStupidDeaths(569);
        $batysPlayer->setVerbosity(12564);
        $batysPlayer->setFaction($this->getReference("borntofactionner-faction"));
        $batysPlayer->setRole("OFFICER");
        $manager->persist($batysPlayer);

        $pounetPlayer = new Player();
        $pounetPlayer->setPseudo("pounet");
        $pounetPlayer->setBrokenBlocks(152);
        $pounetPlayer->setKills(13);
        $pounetPlayer->setPlacedBlocks(25);
        $pounetPlayer->setPlayedTime(1254736);
        $pounetPlayer->setPrestige(-6);
        $pounetPlayer->setPvpDeaths(8);
        $pounetPlayer->setStupidDeaths(8);
        $pounetPlayer->setVerbosity(5);
        $pounetPlayer->setFaction($this->getReference("hotrs-faction"));
        $pounetPlayer->setRole("OFFICER");
        $manager->persist($pounetPlayer);

        $bisvilinPlayer = new Player();
        $bisvilinPlayer->setPseudo("bisvilin");
        $bisvilinPlayer->setBrokenBlocks(2555);
        $bisvilinPlayer->setKills(145);
        $bisvilinPlayer->setPlacedBlocks(1200);
        $bisvilinPlayer->setPlayedTime(65875);
        $bisvilinPlayer->setPrestige(-8);
        $bisvilinPlayer->setPvpDeaths(156);
        $bisvilinPlayer->setStupidDeaths(2566);
        $bisvilinPlayer->setVerbosity(12);
        $bisvilinPlayer->setFaction($this->getReference("hotrs-faction"));
        $bisvilinPlayer->setRole("OFFICER");
        $manager->persist($bisvilinPlayer);

        $rekilonPlayer = new Player();
        $rekilonPlayer->setPseudo("rekilon");
        $rekilonPlayer->setBrokenBlocks(2500);
        $rekilonPlayer->setKills(1520);
        $rekilonPlayer->setPlacedBlocks(1500);
        $rekilonPlayer->setPlayedTime(487959);
        $rekilonPlayer->setPrestige(26);
        $rekilonPlayer->setPvpDeaths(2562);
        $rekilonPlayer->setStupidDeaths(1947);
        $rekilonPlayer->setVerbosity(1548);
        $rekilonPlayer->setFaction($this->getReference("hotrs-faction"));
        $rekilonPlayer->setRole("OFFICER");
        $manager->persist($rekilonPlayer);

        $CallOfBurgerPlayer = new Player();
        $CallOfBurgerPlayer->setPseudo("CallOfBurger");
        $CallOfBurgerPlayer->setBrokenBlocks(25630);
        $CallOfBurgerPlayer->setKills(2569);
        $CallOfBurgerPlayer->setPlacedBlocks(12550);
        $CallOfBurgerPlayer->setPlayedTime(9056632);
        $CallOfBurgerPlayer->setPrestige(2);
        $CallOfBurgerPlayer->setPvpDeaths(1952);
        $CallOfBurgerPlayer->setStupidDeaths(250);
        $CallOfBurgerPlayer->setVerbosity(6636);
        $CallOfBurgerPlayer->setFaction($this->getReference("hotrs-faction"));
        $manager->persist($CallOfBurgerPlayer);

        $NoixDePecanPlayer = new Player();
        $NoixDePecanPlayer->setPseudo("NoixDePecan");
        $NoixDePecanPlayer->setBrokenBlocks(0);
        $NoixDePecanPlayer->setKills(0);
        $NoixDePecanPlayer->setPlacedBlocks(0);
        $NoixDePecanPlayer->setPlayedTime(0);
        $NoixDePecanPlayer->setPrestige(0);
        $NoixDePecanPlayer->setPvpDeaths(0);
        $NoixDePecanPlayer->setStupidDeaths(0);
        $NoixDePecanPlayer->setVerbosity(0);
        $NoixDePecanPlayer->setFaction($this->getReference("hotrs-faction"));
        $NoixDePecanPlayer->setRole("OFFICER");
        $manager->persist($NoixDePecanPlayer);

        $AleksPlayer = new Player();
        $AleksPlayer->setPseudo("Aleks");
        $AleksPlayer->setBrokenBlocks(0);
        $AleksPlayer->setKills(0);
        $AleksPlayer->setPlacedBlocks(0);
        $AleksPlayer->setPlayedTime(0);
        $AleksPlayer->setPrestige(0);
        $AleksPlayer->setPvpDeaths(0);
        $AleksPlayer->setStupidDeaths(0);
        $AleksPlayer->setVerbosity(0);
        $AleksPlayer->setFaction($this->getReference("hotrs-faction"));
        $AleksPlayer->setRole("OFFICER");
        $manager->persist($AleksPlayer);

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
        
        $factemiusPlayer = new Player();
        $factemiusPlayer->setPseudo("factemius");
        $factemiusPlayer->setBrokenBlocks(0);
        $factemiusPlayer->setKills(0);
        $factemiusPlayer->setPlacedBlocks(0);
        $factemiusPlayer->setPlayedTime(0);
        $factemiusPlayer->setPrestige(0);
        $factemiusPlayer->setPvpDeaths(0);
        $factemiusPlayer->setStupidDeaths(0);
        $factemiusPlayer->setVerbosity(0);
        $manager->persist($factemiusPlayer);
        
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

        $furaigonPlayer = new Player();
        $furaigonPlayer->setPseudo("furaigon");
        $furaigonPlayer->setBrokenBlocks(0);
        $furaigonPlayer->setKills(0);
        $furaigonPlayer->setPlacedBlocks(0);
        $furaigonPlayer->setPlayedTime(0);
        $furaigonPlayer->setPrestige(0);
        $furaigonPlayer->setPvpDeaths(0);
        $furaigonPlayer->setStupidDeaths(0);
        $furaigonPlayer->setVerbosity(0);
        $manager->persist($furaigonPlayer);

        $xX3l3m3ntPlayer = new Player();
        $xX3l3m3ntPlayer->setPseudo("xX3l3m3nt");
        $xX3l3m3ntPlayer->setBrokenBlocks(0);
        $xX3l3m3ntPlayer->setKills(0);
        $xX3l3m3ntPlayer->setPlacedBlocks(0);
        $xX3l3m3ntPlayer->setPlayedTime(0);
        $xX3l3m3ntPlayer->setPrestige(0);
        $xX3l3m3ntPlayer->setPvpDeaths(0);
        $xX3l3m3ntPlayer->setStupidDeaths(0);
        $xX3l3m3ntPlayer->setVerbosity(0);
        $manager->persist($xX3l3m3ntPlayer);

        $TheLordackPlayer = new Player();
        $TheLordackPlayer->setPseudo("TheLordack");
        $TheLordackPlayer->setBrokenBlocks(0);
        $TheLordackPlayer->setKills(0);
        $TheLordackPlayer->setPlacedBlocks(0);
        $TheLordackPlayer->setPlayedTime(0);
        $TheLordackPlayer->setPrestige(0);
        $TheLordackPlayer->setPvpDeaths(0);
        $TheLordackPlayer->setStupidDeaths(0);
        $TheLordackPlayer->setVerbosity(0);
        $manager->persist($TheLordackPlayer);

        $emile_1000Player = new Player();
        $emile_1000Player->setPseudo("emile_1000");
        $emile_1000Player->setBrokenBlocks(0);
        $emile_1000Player->setKills(0);
        $emile_1000Player->setPlacedBlocks(0);
        $emile_1000Player->setPlayedTime(0);
        $emile_1000Player->setPrestige(0);
        $emile_1000Player->setPvpDeaths(0);
        $emile_1000Player->setStupidDeaths(0);
        $emile_1000Player->setVerbosity(0);
        $manager->persist($emile_1000Player);

        $C4MagPlayer = new Player();
        $C4MagPlayer->setPseudo("C4Mag");
        $C4MagPlayer->setBrokenBlocks(0);
        $C4MagPlayer->setKills(0);
        $C4MagPlayer->setPlacedBlocks(0);
        $C4MagPlayer->setPlayedTime(0);
        $C4MagPlayer->setPrestige(0);
        $C4MagPlayer->setPvpDeaths(0);
        $C4MagPlayer->setStupidDeaths(0);
        $C4MagPlayer->setVerbosity(0);
        $manager->persist($C4MagPlayer);
 
        $RazmaboutePlayer = new Player();
        $RazmaboutePlayer->setPseudo("Razmaboute");
        $RazmaboutePlayer->setBrokenBlocks(0);
        $RazmaboutePlayer->setKills(0);
        $RazmaboutePlayer->setPlacedBlocks(0);
        $RazmaboutePlayer->setPlayedTime(0);
        $RazmaboutePlayer->setPrestige(0);
        $RazmaboutePlayer->setPvpDeaths(0);
        $RazmaboutePlayer->setStupidDeaths(0);
        $RazmaboutePlayer->setVerbosity(0);
        $manager->persist($RazmaboutePlayer);
 
        $this->addReference('razmaboute-player', $RazmaboutePlayer);
        $this->addReference('c4mag-player', $C4MagPlayer);
        $this->addReference('emile_1000-player', $emile_1000Player);
        $this->addReference('xx3l3m3nt-player', $xX3l3m3ntPlayer);
        $this->addReference('thelordack-player', $TheLordackPlayer);
        $this->addReference('furaigon-player', $furaigonPlayer);
        $this->addReference('arnauy-player', $arnauyPlayer);
        $this->addReference('ovski4-player', $ovski4Player);
        $this->addReference('napydawise-player', $napyDaWisePlayer);
        $this->addReference('grosziznzin-player', $glapinePlayer);
        $this->addReference('glapine-player', $grosziznzinPlayer);
        $this->addReference('factemius-player', $factemiusPlayer);
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
        $this->addReference('callofburger-player', $CallOfBurgerPlayer);
        $this->addReference('noixdepecan-player', $NoixDePecanPlayer);
        $this->addReference('aleks-player', $AleksPlayer);
        
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