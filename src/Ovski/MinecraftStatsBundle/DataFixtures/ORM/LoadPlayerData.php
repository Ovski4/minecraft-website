<?php

namespace Ovski\MinecraftStatsBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ovski\MinecraftStatsBundle\Entity\Player;

class LoadPlayerData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        /* CREATE PLAYERS */

        $ovski4 = new Player();
        $ovski4->setPseudo("ovski4");
        $ovski4->setBrokenBlocks(1523);
        $ovski4->setKills(156);
        $ovski4->setPlacedBlocks(258);
        $ovski4->setPlayedTime(1200025);
        $ovski4->setPrestige(8);
        $ovski4->setPvpDeaths(59);
        $ovski4->setStupidDeaths(23);
        $ovski4->setVerbosity(152);
        $ovski4->setFaction($this->getReference("sandpeople-faction"));
        $ovski4->setRole("OFFICER");
        $ovski4->setPower(2.25);
        $ovski4->setUser($this->getReference('ovski4-user'));
        $manager->persist($ovski4);

        $napyDaWise = new Player();
        $napyDaWise->setPseudo("napydawise");
        $napyDaWise->setBrokenBlocks(8526);
        $napyDaWise->setKills(126);
        $napyDaWise->setPlacedBlocks(4569);
        $napyDaWise->setPlayedTime(1822563);
        $napyDaWise->setPrestige(18);
        $napyDaWise->setPvpDeaths(78);
        $napyDaWise->setStupidDeaths(12);
        $napyDaWise->setVerbosity(256);
        $napyDaWise->setFaction($this->getReference("sandpeople-faction"));
        $napyDaWise->setRole("LEADER");
        $napyDaWise->setPower(5.2);
        $napyDaWise->setUser($this->getReference('napydawise-user'));
        $manager->persist($napyDaWise);

        $glapine = new Player();
        $glapine->setPseudo("glapine");
        $glapine->setBrokenBlocks(15236);
        $glapine->setKills(157);
        $glapine->setPlacedBlocks(3562);
        $glapine->setPlayedTime(1652003);
        $glapine->setPrestige(5);
        $glapine->setPvpDeaths(89);
        $glapine->setStupidDeaths(25);
        $glapine->setVerbosity(125);
        $glapine->setFaction($this->getReference("sandpeople-faction"));
        $glapine->setRole("OFFICER");
        $glapine->setPower(0.5);
        $glapine->setUser($this->getReference('glapine-user'));
        $manager->persist($glapine);

        $grosziznzin = new Player();
        $grosziznzin->setPseudo("grosziznzin");
        $grosziznzin->setBrokenBlocks(15236);
        $grosziznzin->setKills(62);
        $grosziznzin->setPlacedBlocks(10250);
        $grosziznzin->setPlayedTime(102563);
        $grosziznzin->setPrestige(-15);
        $grosziznzin->setPvpDeaths(152);
        $grosziznzin->setStupidDeaths(10);
        $grosziznzin->setVerbosity(1250);
        $grosziznzin->setFaction($this->getReference("sandpeople-faction"));
        $grosziznzin->setRole("OFFICER");
        $grosziznzin->setPower(1.3);
        $grosziznzin->setUser($this->getReference('grosziznzin-user'));
        $manager->persist($grosziznzin);

        $summumlui = new Player();
        $summumlui->setPseudo("summumlui");
        $summumlui->setBrokenBlocks(15);
        $summumlui->setKills(2);
        $summumlui->setPlacedBlocks(10);
        $summumlui->setPlayedTime(1536);
        $summumlui->setPrestige(0);
        $summumlui->setPvpDeaths(5);
        $summumlui->setStupidDeaths(6);
        $summumlui->setVerbosity(4);
        $summumlui->setFaction($this->getReference("warlords-faction"));
        $summumlui->setRole("LEADER");
        $summumlui->setUser($this->getReference('summumlui-user'));
        $manager->persist($summumlui);

        $jaylbralon = new Player();
        $jaylbralon->setPseudo("jaylbralon");
        $jaylbralon->setBrokenBlocks(35236);
        $jaylbralon->setKills(28);
        $jaylbralon->setPlacedBlocks(13256);
        $jaylbralon->setPlayedTime(200000);
        $jaylbralon->setPrestige(63);
        $jaylbralon->setPvpDeaths(39);
        $jaylbralon->setStupidDeaths(4);
        $jaylbralon->setVerbosity(156);
        $jaylbralon->setFaction($this->getReference("herbivores-faction"));
        $jaylbralon->setRole("LEADER");
        $jaylbralon->setUser($this->getReference('jaylbralon-user'));
        $manager->persist($jaylbralon);

        $pedoPony = new Player();
        $pedoPony->setPseudo("pedopony");
        $pedoPony->setBrokenBlocks(58);
        $pedoPony->setKills(152);
        $pedoPony->setPlacedBlocks(1526);
        $pedoPony->setPlayedTime(15236);
        $pedoPony->setPrestige(-4);
        $pedoPony->setPvpDeaths(152);
        $pedoPony->setStupidDeaths(51);
        $pedoPony->setVerbosity(123);
        $pedoPony->setFaction($this->getReference("mwahahahahaha-faction"));
        $pedoPony->setRole("LEADER");
        $pedoPony->setUser($this->getReference('pedopony-user'));
        $manager->persist($pedoPony);

        $fearhardcore = new Player();
        $fearhardcore->setPseudo("fearhardcore");
        $fearhardcore->setBrokenBlocks(450);
        $fearhardcore->setKills(123);
        $fearhardcore->setPlacedBlocks(152);
        $fearhardcore->setPlayedTime(115268);
        $fearhardcore->setPrestige(-19);
        $fearhardcore->setPvpDeaths(165);
        $fearhardcore->setStupidDeaths(25);
        $fearhardcore->setVerbosity(25);
        $fearhardcore->setFaction($this->getReference("motherofgod-faction"));
        $fearhardcore->setRole("LEADER");
        $fearhardcore->setUser($this->getReference('fearhardcore-user'));
        $manager->persist($fearhardcore);

        $laisore = new Player();
        $laisore->setPseudo("laisore");
        $laisore->setBrokenBlocks(256);
        $laisore->setKills(15);
        $laisore->setPlacedBlocks(156);
        $laisore->setPlayedTime(78569);
        $laisore->setPrestige(26);
        $laisore->setPvpDeaths(369);
        $laisore->setStupidDeaths(251);
        $laisore->setVerbosity(1523);
        $laisore->setFaction($this->getReference("borntofactionner-faction"));
        $laisore->setRole("LEADER");
        $laisore->setUser($this->getReference('laisore-user'));
        $manager->persist($laisore);
        
        $pocrala = new Player();
        $pocrala->setPseudo("pocrala");
        $pocrala->setBrokenBlocks(78562);
        $pocrala->setKills(896);
        $pocrala->setPlacedBlocks(14523);
        $pocrala->setPlayedTime(1789633);
        $pocrala->setPrestige(36);
        $pocrala->setPvpDeaths(586);
        $pocrala->setStupidDeaths(123);
        $pocrala->setVerbosity(783);
        $pocrala->setFaction($this->getReference("hotrs-faction"));
        $pocrala->setRole("LEADER");
        $pocrala->setUser($this->getReference('pocrala-user'));
        $manager->persist($pocrala);
        
        $neoxer = new Player();
        $neoxer->setPseudo("neoxer");
        $neoxer->setBrokenBlocks(1256);
        $neoxer->setKills(253);
        $neoxer->setPlacedBlocks(632);
        $neoxer->setPlayedTime(145269);
        $neoxer->setPrestige(-3);
        $neoxer->setPvpDeaths(256);
        $neoxer->setStupidDeaths(12);
        $neoxer->setVerbosity(1100);
        $neoxer->setFaction($this->getReference("warlords-faction"));
        $neoxer->setRole("OFFICER");
        $neoxer->setUser($this->getReference('neoxer-user'));
        $manager->persist($neoxer);
        
        $rinya = new Player();
        $rinya->setPseudo("rinya");
        $rinya->setBrokenBlocks(2586);
        $rinya->setKills(114);
        $rinya->setPlacedBlocks(569);
        $rinya->setPlayedTime(152151);
        $rinya->setPrestige(23);
        $rinya->setPvpDeaths(100);
        $rinya->setStupidDeaths(586);
        $rinya->setVerbosity(236);
        $rinya->setFaction($this->getReference("herbivores-faction"));
        $rinya->setRole("OFFICER");
        $rinya->setUser($this->getReference('rinya-user'));
        $manager->persist($rinya);
        
        $mixcal = new Player();
        $mixcal->setPseudo("mixcal");
        $mixcal->setBrokenBlocks(15402);
        $mixcal->setKills(142);
        $mixcal->setPlacedBlocks(14523);
        $mixcal->setPlayedTime(458696);
        $mixcal->setPrestige(156);
        $mixcal->setPvpDeaths(185);
        $mixcal->setStupidDeaths(196);
        $mixcal->setVerbosity(1256);
        $mixcal->setFaction($this->getReference("herbivores-faction"));
        $mixcal->setRole("OFFICER");
        $mixcal->setUser($this->getReference('mixcal-user'));
        $manager->persist($mixcal);
        
        $tiria = new Player();
        $tiria->setPseudo("tiria");
        $tiria->setBrokenBlocks(2563);
        $tiria->setKills(365);
        $tiria->setPlacedBlocks(1502);
        $tiria->setPlayedTime(263563);
        $tiria->setPrestige(2);
        $tiria->setPvpDeaths(402);
        $tiria->setStupidDeaths(15);
        $tiria->setVerbosity(59);
        $tiria->setFaction($this->getReference("motherofgod-faction"));
        $tiria->setRole("OFFICER");
        $tiria->setUser($this->getReference('tiria-user'));
        $manager->persist($tiria);

        $opak = new Player();
        $opak->setPseudo("opak");
        $opak->setBrokenBlocks(150);
        $opak->setKills(0);
        $opak->setPlacedBlocks(102);
        $opak->setPlayedTime(522020);
        $opak->setPrestige(0);
        $opak->setPvpDeaths(0);
        $opak->setStupidDeaths(0);
        $opak->setVerbosity(0);
        $opak->setFaction($this->getReference("motherofgod-faction"));
        $opak->setRole("OFFICER");
        $opak->setUser($this->getReference('opak-user'));
        $manager->persist($opak);

        $rinerk = new Player();
        $rinerk->setPseudo("rinerk");
        $rinerk->setBrokenBlocks(12563);
        $rinerk->setKills(253);
        $rinerk->setPlacedBlocks(1458);
        $rinerk->setPlayedTime(1254890);
        $rinerk->setPrestige(45);
        $rinerk->setPvpDeaths(269);
        $rinerk->setStupidDeaths(296);
        $rinerk->setVerbosity(15560);
        $rinerk->setFaction($this->getReference("borntofactionner-faction"));
        $rinerk->setRole("OFFICER");
        $rinerk->setUser($this->getReference('rinerk-user'));
        $manager->persist($rinerk);

        $batys = new Player();
        $batys->setPseudo("batys");
        $batys->setBrokenBlocks(158922);
        $batys->setKills(1489);
        $batys->setPlacedBlocks(110233);
        $batys->setPlayedTime(99999925);
        $batys->setPrestige(189);
        $batys->setPvpDeaths(1823);
        $batys->setStupidDeaths(569);
        $batys->setVerbosity(12564);
        $batys->setFaction($this->getReference("borntofactionner-faction"));
        $batys->setRole("OFFICER");
        $batys->setUser($this->getReference('batys-user'));
        $manager->persist($batys);

        $pounet = new Player();
        $pounet->setPseudo("pounet");
        $pounet->setBrokenBlocks(152);
        $pounet->setKills(13);
        $pounet->setPlacedBlocks(25);
        $pounet->setPlayedTime(1254736);
        $pounet->setPrestige(-6);
        $pounet->setPvpDeaths(8);
        $pounet->setStupidDeaths(8);
        $pounet->setVerbosity(5);
        $pounet->setFaction($this->getReference("hotrs-faction"));
        $pounet->setRole("OFFICER");
        $pounet->setUser($this->getReference('pounet-user'));
        $manager->persist($pounet);

        $bisvilin = new Player();
        $bisvilin->setPseudo("bisvilin");
        $bisvilin->setBrokenBlocks(2555);
        $bisvilin->setKills(145);
        $bisvilin->setPlacedBlocks(1200);
        $bisvilin->setPlayedTime(65875);
        $bisvilin->setPrestige(-8);
        $bisvilin->setPvpDeaths(156);
        $bisvilin->setStupidDeaths(2566);
        $bisvilin->setVerbosity(12);
        $bisvilin->setFaction($this->getReference("hotrs-faction"));
        $bisvilin->setRole("OFFICER");
        $bisvilin->setUser($this->getReference('bisvilin-user'));
        $manager->persist($bisvilin);

        $rekilon = new Player();
        $rekilon->setPseudo("rekilon");
        $rekilon->setBrokenBlocks(2500);
        $rekilon->setKills(1520);
        $rekilon->setPlacedBlocks(1500);
        $rekilon->setPlayedTime(487959);
        $rekilon->setPrestige(26);
        $rekilon->setPvpDeaths(2562);
        $rekilon->setStupidDeaths(1947);
        $rekilon->setVerbosity(1548);
        $rekilon->setFaction($this->getReference("hotrs-faction"));
        $rekilon->setRole("OFFICER");
        $rekilon->setUser($this->getReference('rekilon-user'));
        $manager->persist($rekilon);

        $CallOfBurger = new Player();
        $CallOfBurger->setPseudo("CallOfBurger");
        $CallOfBurger->setBrokenBlocks(25630);
        $CallOfBurger->setKills(2569);
        $CallOfBurger->setPlacedBlocks(12550);
        $CallOfBurger->setPlayedTime(9056632);
        $CallOfBurger->setPrestige(2);
        $CallOfBurger->setPvpDeaths(1952);
        $CallOfBurger->setStupidDeaths(250);
        $CallOfBurger->setVerbosity(6636);
        $CallOfBurger->setFaction($this->getReference("hotrs-faction"));
        $CallOfBurger->setUser($this->getReference('callofburger-user'));
        $manager->persist($CallOfBurger);

        $NoixDePecan = new Player();
        $NoixDePecan->setPseudo("NoixDePecan");
        $NoixDePecan->setBrokenBlocks(0);
        $NoixDePecan->setKills(0);
        $NoixDePecan->setPlacedBlocks(0);
        $NoixDePecan->setPlayedTime(0);
        $NoixDePecan->setPrestige(0);
        $NoixDePecan->setPvpDeaths(0);
        $NoixDePecan->setStupidDeaths(0);
        $NoixDePecan->setVerbosity(0);
        $NoixDePecan->setFaction($this->getReference("hotrs-faction"));
        $NoixDePecan->setRole("OFFICER");
        $NoixDePecan->setUser($this->getReference('noixdepecan-user'));
        $manager->persist($NoixDePecan);

        $Aleks = new Player();
        $Aleks->setPseudo("Aleks");
        $Aleks->setBrokenBlocks(0);
        $Aleks->setKills(0);
        $Aleks->setPlacedBlocks(0);
        $Aleks->setPlayedTime(0);
        $Aleks->setPrestige(0);
        $Aleks->setPvpDeaths(0);
        $Aleks->setStupidDeaths(0);
        $Aleks->setVerbosity(0);
        $Aleks->setFaction($this->getReference("hotrs-faction"));
        $Aleks->setRole("OFFICER");
        $Aleks->setPower(7.8);
        $Aleks->setUser($this->getReference('aleks-user'));
        $manager->persist($Aleks);

        $subelle = new Player();
        $subelle->setPseudo("subelle");
        $subelle->setBrokenBlocks(0);
        $subelle->setKills(0);
        $subelle->setPlacedBlocks(0);
        $subelle->setPlayedTime(0);
        $subelle->setPrestige(0);
        $subelle->setPvpDeaths(0);
        $subelle->setStupidDeaths(0);
        $subelle->setVerbosity(0);
        $subelle->setUser($this->getReference('subelle-user'));
        $manager->persist($subelle);
        
        $zulnet = new Player();
        $zulnet->setPseudo("zulnet");
        $zulnet->setBrokenBlocks(0);
        $zulnet->setKills(0);
        $zulnet->setPlacedBlocks(0);
        $zulnet->setPlayedTime(0);
        $zulnet->setPrestige(0);
        $zulnet->setPvpDeaths(0);
        $zulnet->setStupidDeaths(0);
        $zulnet->setVerbosity(0);
        $zulnet->setUser($this->getReference('zulnet-user'));
        $manager->persist($zulnet);
        
        $transtax = new Player();
        $transtax->setPseudo("transtax");
        $transtax->setBrokenBlocks(0);
        $transtax->setKills(0);
        $transtax->setPlacedBlocks(0);
        $transtax->setPlayedTime(0);
        $transtax->setPrestige(0);
        $transtax->setPvpDeaths(0);
        $transtax->setStupidDeaths(0);
        $transtax->setVerbosity(0);
        $transtax->setUser($this->getReference('transtax-user'));
        $manager->persist($transtax);
        
        $nobarxo = new Player();
        $nobarxo->setPseudo("nobarxo");
        $nobarxo->setBrokenBlocks(0);
        $nobarxo->setKills(0);
        $nobarxo->setPlacedBlocks(0);
        $nobarxo->setPlayedTime(0);
        $nobarxo->setPrestige(0);
        $nobarxo->setPvpDeaths(0);
        $nobarxo->setStupidDeaths(0);
        $nobarxo->setVerbosity(0);
        $nobarxo->setUser($this->getReference('nobarxo-user'));
        $manager->persist($nobarxo);
        
        $factemius = new Player();
        $factemius->setPseudo("factemius");
        $factemius->setBrokenBlocks(0);
        $factemius->setKills(0);
        $factemius->setPlacedBlocks(0);
        $factemius->setPlayedTime(0);
        $factemius->setPrestige(0);
        $factemius->setPvpDeaths(0);
        $factemius->setStupidDeaths(0);
        $factemius->setVerbosity(0);
        $factemius->setUser($this->getReference('factemius-user'));
        $manager->persist($factemius);
        
        $arnauy = new Player();
        $arnauy->setPseudo("arnauy");
        $arnauy->setBrokenBlocks(0);
        $arnauy->setKills(0);
        $arnauy->setPlacedBlocks(0);
        $arnauy->setPlayedTime(0);
        $arnauy->setPrestige(0);
        $arnauy->setPvpDeaths(0);
        $arnauy->setStupidDeaths(0);
        $arnauy->setVerbosity(0);
        $arnauy->setUser($this->getReference('arnauy-user'));
        $manager->persist($arnauy);

        $furaigon = new Player();
        $furaigon->setPseudo("furaigon");
        $furaigon->setBrokenBlocks(0);
        $furaigon->setKills(0);
        $furaigon->setPlacedBlocks(0);
        $furaigon->setPlayedTime(0);
        $furaigon->setPrestige(0);
        $furaigon->setPvpDeaths(0);
        $furaigon->setStupidDeaths(0);
        $furaigon->setVerbosity(0);
        $furaigon->setUser($this->getReference('furaigon-user'));
        $manager->persist($furaigon);

        $xX3l3m3nt = new Player();
        $xX3l3m3nt->setPseudo("xX3l3m3nt");
        $xX3l3m3nt->setBrokenBlocks(0);
        $xX3l3m3nt->setKills(0);
        $xX3l3m3nt->setPlacedBlocks(0);
        $xX3l3m3nt->setPlayedTime(0);
        $xX3l3m3nt->setPrestige(0);
        $xX3l3m3nt->setPvpDeaths(0);
        $xX3l3m3nt->setStupidDeaths(0);
        $xX3l3m3nt->setVerbosity(0);
        $xX3l3m3nt->setUser($this->getReference('xx3l3m3nt-user'));
        $manager->persist($xX3l3m3nt);

        $TheLordack = new Player();
        $TheLordack->setPseudo("TheLordack");
        $TheLordack->setBrokenBlocks(0);
        $TheLordack->setKills(0);
        $TheLordack->setPlacedBlocks(0);
        $TheLordack->setPlayedTime(0);
        $TheLordack->setPrestige(0);
        $TheLordack->setPvpDeaths(0);
        $TheLordack->setStupidDeaths(0);
        $TheLordack->setVerbosity(0);
        $TheLordack->setUser($this->getReference('thelordack-user'));
        $manager->persist($TheLordack);

        $emile_1000 = new Player();
        $emile_1000->setPseudo("emile_1000");
        $emile_1000->setBrokenBlocks(0);
        $emile_1000->setKills(0);
        $emile_1000->setPlacedBlocks(0);
        $emile_1000->setPlayedTime(0);
        $emile_1000->setPrestige(0);
        $emile_1000->setPvpDeaths(0);
        $emile_1000->setStupidDeaths(0);
        $emile_1000->setVerbosity(0);
        $emile_1000->setUser($this->getReference('emile_1000-user'));
        $manager->persist($emile_1000);

        $C4Mag = new Player();
        $C4Mag->setPseudo("C4Mag");
        $C4Mag->setBrokenBlocks(0);
        $C4Mag->setKills(0);
        $C4Mag->setPlacedBlocks(0);
        $C4Mag->setPlayedTime(0);
        $C4Mag->setPrestige(0);
        $C4Mag->setPvpDeaths(0);
        $C4Mag->setStupidDeaths(0);
        $C4Mag->setVerbosity(0);
        $C4Mag->setUser($this->getReference('c4mag-user'));
        $manager->persist($C4Mag);
 
        $Razmaboute = new Player();
        $Razmaboute->setPseudo("Razmaboute");
        $Razmaboute->setBrokenBlocks(0);
        $Razmaboute->setKills(0);
        $Razmaboute->setPlacedBlocks(0);
        $Razmaboute->setPlayedTime(0);
        $Razmaboute->setPrestige(0);
        $Razmaboute->setPvpDeaths(0);
        $Razmaboute->setStupidDeaths(0);
        $Razmaboute->setVerbosity(0);
        $Razmaboute->setUser($this->getReference('razmaboute-user'));
        $manager->persist($Razmaboute);
 
        $this->addReference('razmaboute-player', $Razmaboute);
        $this->addReference('c4mag-player', $C4Mag);
        $this->addReference('emile_1000-player', $emile_1000);
        $this->addReference('xx3l3m3nt-player', $xX3l3m3nt);
        $this->addReference('thelordack-player', $TheLordack);
        $this->addReference('furaigon-player', $furaigon);
        $this->addReference('arnauy-player', $arnauy);
        $this->addReference('ovski4-player', $ovski4);
        $this->addReference('napydawise-player', $napyDaWise);
        $this->addReference('grosziznzin-player', $glapine);
        $this->addReference('glapine-player', $grosziznzin);
        $this->addReference('factemius-player', $factemius);
        $this->addReference('nobarxo-player', $nobarxo);
        $this->addReference('transtax-player', $transtax);
        $this->addReference('zulnet-player', $zulnet);
        $this->addReference('subelle-player', $subelle);
        $this->addReference('rekilon-player', $rekilon);
        $this->addReference('bisvilin-player', $bisvilin);
        $this->addReference('pounet-player', $pounet);
        $this->addReference('batys-player', $batys);
        $this->addReference('rinerk-player', $rinerk);
        $this->addReference('opak-player', $opak);
        $this->addReference('tiria-player', $tiria);
        $this->addReference('mixcal-player', $mixcal);
        $this->addReference('rinya-player', $rinya);
        $this->addReference('neoxer-player', $neoxer);
        $this->addReference('pocrala-player', $pocrala);
        $this->addReference('laisore-player', $laisore);
        $this->addReference('fearhardcore-player', $fearhardcore);
        $this->addReference('pedopony-player', $pedoPony);
        $this->addReference('jaylbralon-player', $jaylbralon);
        $this->addReference('summumlui-player', $summumlui);
        $this->addReference('callofburger-player', $CallOfBurger);
        $this->addReference('noixdepecan-player', $NoixDePecan);
        $this->addReference('aleks-player', $Aleks);
        
        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 3;
    }
}
