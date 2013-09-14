<?php

namespace Ovski\MinecraftStatsBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ovski\ForumBundle\Entity\Category;

class LoadCategoriesData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        /* CREATE CATEGORIES */

        $presentationCategorie = new Category();
        $presentationCategorie->setName("Presentation");
        $presentationCategorie->setDescription("Venez ici vous présenter auprès de la communauté");
        $presentationCategorie->setLanguage("fr");
        $manager->persist($presentationCategorie);

        $presentationCategory = new Category();
        $presentationCategory->setName("Presentation");
        $presentationCategory->setDescription("Come here present yourself");
        $presentationCategory->setLanguage("en");
        $manager->persist($presentationCategory);

        $this->addReference('presentation-fr', $presentationCategorie);
        $this->addReference('presentation-en', $presentationCategory);

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 6;
    }
}