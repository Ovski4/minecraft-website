<?php

namespace Ovski\MinecraftStatsBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ovski\ForumBundle\Entity\Category;
use Ovski\ForumBundle\Entity\Topic;

class LoadTopicsData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        /* CREATE TOPICS */

        $salut = new Topic();
        $salut->setAuthor($this->getReference('glapine'));
        $salut->setCategory($this->getReference('presentation-fr'));
        $salut->setTitle("Je me présente je m'appelle...");
        $salut->setUpdatedAt(new \DateTime());
        $manager->persist($salut);

        $salutEncore = new Topic();
        $salutEncore->setAuthor($this->getReference('glapine'));
        $salutEncore->setCategory($this->getReference('presentation-fr'));
        $salutEncore->setTitle("je suis toujours glapine");
        $salutEncore->setUpdatedAt(new \DateTime());
        $manager->persist($salutEncore);

        $hello = new Topic();
        $hello->setAuthor($this->getReference('baptiste'));
        $hello->setCategory($this->getReference('presentation-en'));
        $hello->setTitle("I'm baptiste the artist");
        $hello->setUpdatedAt(new \DateTime());
        $manager->persist($hello);

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 8;
    }
}