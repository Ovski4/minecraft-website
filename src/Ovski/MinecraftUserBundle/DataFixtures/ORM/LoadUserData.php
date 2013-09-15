<?php

namespace Ovski\MinecraftStatsBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use FOS\UserBundle\Doctrine\UserManager;
use Ovski\MinecraftUserBundle\Entity\User;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * Get the container
     * 
     * @return ContainerInterface $container
     */
    public function getContainer()
    {
        return $this->container;
    }

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $userManager = $this->getContainer()->get('fos_user.user_manager');

        /* CREATE USERS */

        $glapine = $userManager->createUser();
        $glapine->setUsername('glapine');
        $glapine->setEmail('glapine@glapine.fr');
        $glapine->setPlainPassword('glapine');
        $glapine->setEnabled(true);
        $userManager->updateUser($glapine);

        $baptiste = $userManager->createUser();
        $baptiste->setUsername('baptiste');
        $baptiste->setEmail('baptiste@baptiste.fr');
        $baptiste->setPlainPassword('baptiste');
        $baptiste->setSuperAdmin(true);
        $baptiste->setEnabled(true);
        $userManager->updateUser($baptiste);

        $this->addReference('baptiste', $baptiste);
        $this->addReference('glapine', $glapine);

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