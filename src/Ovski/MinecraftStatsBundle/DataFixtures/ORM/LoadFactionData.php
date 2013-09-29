<?php

namespace Ovski\MinecraftStatsBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ovski\MinecraftStatsBundle\Entity\Faction;
use Ovski\ToolsBundle\Tools\Utils;

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
        $sandpeopleFaction->setSlug(Utils::slugify($sandpeopleFaction->getName()));
        $manager->persist($sandpeopleFaction);

        $warlordsFaction = new Faction();
        $warlordsFaction->setCreatedAt(1373558255603);
        $warlordsFaction->setId("6fc45420-cc3b-4a62-810e-436277c84b15");
        $warlordsFaction->setDescription("We will rules them all. You more than others");
        $warlordsFaction->setName("War Lords");
        $warlordsFaction->setSlug(Utils::slugify($warlordsFaction->getName()));
        $manager->persist($warlordsFaction);

        $herbivoresFaction = new Faction();
        $herbivoresFaction->setCreatedAt(1373552635603);
        $herbivoresFaction->setId("5fc45420-cc3b-4f62-810e-336277c84b15");
        $herbivoresFaction->setDescription("I like pot so much ahaaaaaa");
        $herbivoresFaction->setName("Herbivores");
        $herbivoresFaction->setSlug(Utils::slugify($herbivoresFaction->getName()));
        $manager->persist($herbivoresFaction);

        $motherofgodFaction = new Faction();
        $motherofgodFaction->setCreatedAt(1373555635603);
        $motherofgodFaction->setId("4fc45420-cc3b-4a42-810e-336277c84b15");
        $motherofgodFaction->setDescription("God fathers are nothing compared to us");
        $motherofgodFaction->setName("MotherOfGod");
        $motherofgodFaction->setSlug(Utils::slugify($motherofgodFaction->getName()));
        $manager->persist($motherofgodFaction);

        $mwahahahahaFaction = new Faction();
        $mwahahahahaFaction->setCreatedAt(1373238835603);
        $mwahahahahaFaction->setId("3fc45420-cc3b-4a62-852e-336277c84b15");
        $mwahahahahaFaction->setDescription("hihiih huhuh hahahaa ha HAHHAHAHAHAHA");
        $mwahahahahaFaction->setName("Mwahahahaha");
        $mwahahahahaFaction->setSlug(Utils::slugify($mwahahahahaFaction->getName()));
        $manager->persist($mwahahahahaFaction);

        $borntofactionnerFaction = new Faction();
        $borntofactionnerFaction->setCreatedAt(1373552535603);
        $borntofactionnerFaction->setId("2fc45420-cc3b-4a62-250e-336277c84b15");
        $borntofactionnerFaction->setDescription("Je factionner, tu fractionnes, nou factionnons, vous compartimentez");
        $borntofactionnerFaction->setName("Born 2 Factionner");
        $borntofactionnerFaction->setSlug(Utils::slugify($borntofactionnerFaction->getName()));
        $manager->persist($borntofactionnerFaction);

        $hotrsFaction = new Faction();
        $hotrsFaction->setCreatedAt(1373559835263);
        $hotrsFaction->setId("1fc45420-cc3b-4a62-810e-334577c84b15");
        $hotrsFaction->setDescription("La lalalalalala, lalalalala awesome");
        $hotrsFaction->setName("House of the rising sun");
        $hotrsFaction->setSlug(Utils::slugify($hotrsFaction->getName()));
        $manager->persist($hotrsFaction);

        /* RELATIONSHIPS */
        
        $sandpeopleFaction->addAllyFaction($borntofactionnerFaction);
        $borntofactionnerFaction->addAllyFaction($sandpeopleFaction);
        $warlordsFaction->addTruceFaction($herbivoresFaction);
        $herbivoresFaction->addTruceFaction($warlordsFaction);
        $sandpeopleFaction->addEnemyFaction($warlordsFaction);
        $borntofactionnerFaction->addTruceFaction($herbivoresFaction);
        $herbivoresFaction->addTruceFaction($borntofactionnerFaction);
        $hotrsFaction->addEnemyFaction($borntofactionnerFaction);
        
        $this->addReference('sandpeople-faction', $sandpeopleFaction);
        $this->addReference('warlords-faction', $warlordsFaction);
        $this->addReference('herbivores-faction', $herbivoresFaction);
        $this->addReference('motherofgod-faction', $motherofgodFaction);
        $this->addReference('mwahahahahaha-faction', $mwahahahahaFaction);
        $this->addReference('borntofactionner-faction', $borntofactionnerFaction);
        $this->addReference('hotrs-faction', $hotrsFaction);

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