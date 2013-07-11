<?php

namespace Ovski\MineStatsBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ovski\MineStatsBundle\Entity\Faction;

class LoadFactionData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        /* CREATE FACTIONS */

        $sandpeopleFaction = new Faction();
        $sandpeopleFaction->setCreatedAt(1373558832583);
        $sandpeopleFaction->setId("7fc45420-bc3b-4a62-810e-336277c84b15");
        $sandpeopleFaction->setDescription("A faction the earth is going to remember... for ever");
        $sandpeopleFaction->setName("Sandpeople");
        $manager->persist($sandpeopleFaction);

        $warlordsFaction = new Faction();
        $warlordsFaction->setCreatedAt(1373558255603);
        $warlordsFaction->setId("6fc45420-cc3b-4a62-810e-436277c84b15");
        $warlordsFaction->setDescription("We will rules them all. You more than others");
        $warlordsFaction->setName("War Lords");
        $manager->persist($warlordsFaction);

        $herbivoresFaction = new Faction();
        $herbivoresFaction->setCreatedAt(1373552635603);
        $herbivoresFaction->setId("5fc45420-cc3b-4f62-810e-336277c84b15");
        $herbivoresFaction->setDescription("I like pot so much ahaaaaaa");
        $herbivoresFaction->setName("Herbivores");
        $manager->persist($herbivoresFaction);

        $motherofgodFaction = new Faction();
        $motherofgodFaction->setCreatedAt(1373555635603);
        $motherofgodFaction->setId("4fc45420-cc3b-4a42-810e-336277c84b15");
        $motherofgodFaction->setDescription("God fathers are nothing compared to us");
        $motherofgodFaction->setName("MotherOfGod");
        $manager->persist($motherofgodFaction);

        $mwahahahahaFaction = new Faction();
        $mwahahahahaFaction->setCreatedAt(1373238835603);
        $mwahahahahaFaction->setId("3fc45420-cc3b-4a62-852e-336277c84b15");
        $mwahahahahaFaction->setDescription("hihiih huhuh hahahaa ha HAHHAHAHAHAHA");
        $mwahahahahaFaction->setName("Mwahahahaha");
        $manager->persist($mwahahahahaFaction);

        $borntofactionnerFaction = new Faction();
        $borntofactionnerFaction->setCreatedAt(1373552535603);
        $borntofactionnerFaction->setId("2fc45420-cc3b-4a62-250e-336277c84b15");
        $borntofactionnerFaction->setDescription("Je factionner, tu fractionnes, nou factionnons, vous compartimentez");
        $borntofactionnerFaction->setName("Born 2 Factionner");
        $manager->persist($borntofactionnerFaction);

        $hotrsFaction = new Faction();
        $hotrsFaction->setCreatedAt(1373559835263);
        $hotrsFaction->setId("1fc45420-cc3b-4a62-810e-334577c84b15");
        $hotrsFaction->setDescription("La lalalalalala, lalalalala awesome");
        $hotrsFaction->setName("House of the rising sun");
        $manager->persist($hotrsFaction);

        $this->addReference('sandpeople-faction', $sandpeopleFaction);

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1;
    }
}

//$this->addReference('admin-group', $groupAdmin);