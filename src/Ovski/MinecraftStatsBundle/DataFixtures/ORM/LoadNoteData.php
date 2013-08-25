<?php

namespace Ovski\MinecraftStatsBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ovski\MinecraftStatsBundle\Entity\Note;

class LoadNoteData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        /* CREATE NOTES */

        $note1 = new Note();
        $note1->setDonorPlayer($this->getReference('fearhardcore-player'));
        $note1->setReceiverPlayer($this->getReference('pedopony-player'));
        $note1->setValue(-5);
        $manager->persist($note1);
        
        $note2 = new Note();
        $note2->setDonorPlayer($this->getReference('pedopony-player'));
        $note2->setReceiverPlayer($this->getReference('fearhardcore-player'));
        $note2->setValue(-4);
        $manager->persist($note2);

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