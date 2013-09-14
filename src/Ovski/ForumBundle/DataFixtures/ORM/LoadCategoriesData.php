<?php

namespace Ovski\MinecraftStatsBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ovski\ForumBundle\Entity\Category;
use Ovski\ToolsBundle\Tools\Utils;

class LoadCategoriesData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        /* CREATE FACTIONS */

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
        
        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 5;
    }
}