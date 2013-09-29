<?php

namespace Ovski\MinecraftStatsBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ovski\MinecraftStatsBundle\Entity\Kill;

class LoadKillData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        /* CREATE KILLS */

        /*$kill1 = new Kill();
        $kill1->setDate(new \DateTime());
        $kill1->setKilledPlayer($this->getReference('fearhardcore-player'));
        $kill1->setKillerPlayer($this->getReference('pedopony-player'));
        $kill1->setWeapon(125);
        $manager->persist($kill1);

        $kill2 = new Kill();
        $kill2->setDate(new \DateTime());
        $kill2->setKilledPlayer($this->getReference('fearhardcore-player'));
        $kill2->setKillerPlayer($this->getReference('pedopony-player'));
        $kill2->setWeapon(125);
        $manager->persist($kill2);

        $kill3 = new Kill();
        $kill3->setDate(new \DateTime());
        $kill3->setKilledPlayer($this->getReference('fearhardcore-player'));
        $kill3->setKillerPlayer($this->getReference('pedopony-player'));
        $kill3->setWeapon(126);
        $manager->persist($kill3);

        $kill4 = new Kill();
        $kill4->setDate(new \DateTime());
        $kill4->setKilledPlayer($this->getReference('fearhardcore-player'));
        $kill4->setKillerPlayer($this->getReference('pedopony-player'));
        $kill4->setWeapon(127);
        $manager->persist($kill4);

        $kill5 = new Kill();
        $kill5->setDate(new \DateTime());
        $kill5->setKilledPlayer($this->getReference('fearhardcore-player'));
        $kill5->setKillerPlayer($this->getReference('pedopony-player'));
        $kill5->setWeapon(125);
        $manager->persist($kill5);

        $kill6 = new Kill();
        $kill6->setDate(new \DateTime());
        $kill6->setKilledPlayer($this->getReference('fearhardcore-player'));
        $kill6->setKillerPlayer($this->getReference('summumlui-player'));
        $kill6->setWeapon(125);
        $manager->persist($kill6);

        $kill7 = new Kill();
        $kill7->setDate(new \DateTime());
        $kill7->setKilledPlayer($this->getReference('fearhardcore-player'));
        $kill7->setKillerPlayer($this->getReference('summumlui-player'));
        $kill7->setWeapon(125);
        $manager->persist($kill7);

        $kill8 = new Kill();
        $kill8->setDate(new \DateTime());
        $kill8->setKilledPlayer($this->getReference('pedopony-player'));
        $kill8->setKillerPlayer($this->getReference('fearhardcore-player'));
        $kill8->setWeapon(125);
        $manager->persist($kill8);

        $manager->flush();*/
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 5;
    }
}