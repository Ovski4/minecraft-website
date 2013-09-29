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

        $baptiste = $userManager->createUser();
        $baptiste->setUsername('baptiste');
        $baptiste->setEmail('baptiste@baptiste.fr');
        $baptiste->setPlainPassword('baptiste');
        $baptiste->setEnabled(true);
        $baptiste->setCountry("France");
        $baptiste->setCreatedAt(new \DateTime('now'));
        $this->addAdminRoles($baptiste);
        $userManager->updateUser($baptiste, false); //false to do not flush

        $glapine = $userManager->createUser();
        $glapine->setUsername('glapine');
        $glapine->setEmail('glapine@glapine.fr');
        $glapine->setPlainPassword('glapine');
        $glapine->setEnabled(true);
        $glapine->addRole("ROLE_MODERATOR");
        $glapine->setCountry("France");
        $glapine->setCreatedAt(new \DateTime('now'));
        $userManager->updateUser($glapine, false);

        $jaylbralon = $userManager->createUser();
        $jaylbralon->setUsername('jaylbralon');
        $jaylbralon->setEmail('jaylbralon@jaylbralon.fr');
        $jaylbralon->setPlainPassword('jaylbralon');
        $jaylbralon->setEnabled(true);
        $jaylbralon->setCountry("France");
        $jaylbralon->setCreatedAt(new \DateTime('now'));
        $userManager->updateUser($jaylbralon, false);

        $grosziznzin = $userManager->createUser();
        $grosziznzin->setUsername('grosziznzin');
        $grosziznzin->setEmail('grosziznzin@grosziznzin.fr');
        $grosziznzin->setPlainPassword('grosziznzin');
        $grosziznzin->setEnabled(true);
        $grosziznzin->setCountry("France");
        $grosziznzin->setCreatedAt(new \DateTime('now'));
        $userManager->updateUser($grosziznzin, false);

        $napy = $userManager->createUser();
        $napy->setUsername('napy');
        $napy->setEmail('napy@napy.fr');
        $napy->setPlainPassword('napy');
        $napy->setEnabled(true);
        $napy->setCountry("France");
        $napy->setCreatedAt(new \DateTime('now'));
        $userManager->updateUser($napy, false);

        $ovski4 = $userManager->createUser();
        $ovski4->setUsername('ovski4');
        $ovski4->setEmail('ovski4@ovski4.fr');
        $ovski4->setPlainPassword('ovski4');
        $ovski4->setEnabled(true);
        $ovski4->setCountry("France");
        $ovski4->setCreatedAt(new \DateTime('now'));
        $this->addAdminRoles($ovski4);
        $userManager->updateUser($ovski4, false);

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

    /**
     * Get the roles to set for an admin
     */
    private function addAdminRoles($user)
    {
        $user->addRole("ROLE_ADMIN");
        $user->addRole("ROLE_MODERATOR");
    }
}