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

        /* French categories */
        
        $presentationCategorie = new Category();
        $presentationCategorie->setName("Presentation");
        $presentationCategorie->setDescription("Venez ici vous présenter auprès de la communauté");
        $presentationCategorie->setLanguage("fr");
        $manager->persist($presentationCategorie);

        $blabla = new Category();
        $blabla->setName("Blabla");
        $blabla->setDescription("Parlez de tout et de rien!");
        $blabla->setLanguage("fr");
        $manager->persist($blabla);

        $diplomatie = new Category();
        $diplomatie->setName("Diplomatie");
        $diplomatie->setDescription("Faites vos alliance, déclarer vos guerres et lynchez les traîtres");
        $diplomatie->setLanguage("fr");
        $manager->persist($diplomatie);

        $this->addReference('presentation-fr', $presentationCategorie);

        /* English categories */

        $presentationCategory = new Category();
        $presentationCategory->setName("Presentation");
        $presentationCategory->setDescription("Come here present yourself");
        $presentationCategory->setLanguage("en");
        $manager->persist($presentationCategory);

        $blablabla = new Category();
        $blablabla->setName("Blabla");
        $blablabla->setDescription("Talk about whatever you want");
        $blablabla->setLanguage("en");
        $manager->persist($blablabla);

        $diplomatia = new Category();
        $diplomatia->setName("Diplomatia");
        $diplomatia->setDescription("Make alliances or enemies : it depends on your strategy");
        $diplomatia->setLanguage("en");
        $manager->persist($diplomatia);
        
        $this->addReference('presentation-en', $presentationCategory);

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 7;
    }
}