<?php

namespace Ovski\MinecraftStatsBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

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
        $glapine->addRole("ROLE_MODERATOR");
        $userManager->updateUser($glapine, false); //false to do not flush

        $jaylbralon = $userManager->createUser();
        $jaylbralon->setUsername('jaylbralon');
        $jaylbralon->setEmail('jaylbralon@jaylbralon.fr');
        $jaylbralon->setPlainPassword('jaylbralon');
        $jaylbralon->setEnabled(true);
        $userManager->updateUser($jaylbralon, false);

        $baptiste = $userManager->createUser();
        $baptiste->setUsername('baptiste');
        $baptiste->setEmail('baptiste@baptiste.fr');
        $baptiste->setPlainPassword('baptiste');
        $baptiste->addRole("ROLE_ADMIN");
        $baptiste->setEnabled(true);
        $userManager->updateUser($baptiste, false);

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