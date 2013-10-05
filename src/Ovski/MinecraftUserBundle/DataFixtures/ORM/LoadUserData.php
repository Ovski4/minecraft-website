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

        /* USERS WITHOUT PLAYER ASSOCIATION */

        $admin = $userManager->createUser();
        $admin->setUsername('admin');
        $admin->setEmail('admin@admin.fr');
        $admin->setPlainPassword('admin');
        $admin->setEnabled(true);
        $admin->setCountry("France");
        $admin->setCreatedAt(new \DateTime('now'));
        $this->addAdminRoles($admin);
        $userManager->updateUser($admin, false); //false to do not flush

        $modo = $userManager->createUser();
        $modo->setUsername('modo');
        $modo->setEmail('modo@modo.fr');
        $modo->setPlainPassword('modo');
        $modo->setEnabled(true);
        $modo->setCountry("France");
        $modo->setCreatedAt(new \DateTime('now'));
        $modo->addRole("ROLE_MODERATOR");
        $userManager->updateUser($modo, false);

        $user = $userManager->createUser();
        $user->setUsername('user');
        $user->setEmail('user@user.fr');
        $user->setPlainPassword('user');
        $user->setEnabled(true);
        $user->setCountry("France");
        $user->setCreatedAt(new \DateTime('now'));
        $userManager->updateUser($user, false);

        /* USERS WITH PLAYER ASSOCIATION */

        $razmaboute = $userManager->createUser();
        $razmaboute->setUsername('razmaboute');
        $razmaboute->setEmail('razmaboute@razmaboute.fr');
        $razmaboute->setPlainPassword('razmaboute');
        $razmaboute->setEnabled(true);
        $razmaboute->setCountry("France");
        $razmaboute->setCreatedAt(new \DateTime('now'));
        $this->addReference('razmaboute-user', $razmaboute);
        $userManager->updateUser($razmaboute, false);

        $c4mag = $userManager->createUser();
        $c4mag->setUsername('c4mag');
        $c4mag->setEmail('c4mag@c4mag.fr');
        $c4mag->setPlainPassword('c4mag');
        $c4mag->setEnabled(true);
        $c4mag->setCountry("France");
        $c4mag->setCreatedAt(new \DateTime('now'));
        $this->addReference('c4mag-user', $c4mag);
        $userManager->updateUser($c4mag, false);

        $emile_1000 = $userManager->createUser();
        $emile_1000->setUsername('emile_1000');
        $emile_1000->setEmail('emile_1000@emile_1000.fr');
        $emile_1000->setPlainPassword('emile_1000');
        $emile_1000->setEnabled(true);
        $emile_1000->setCountry("France");
        $emile_1000->setCreatedAt(new \DateTime('now'));
        $this->addReference('emile_1000-user', $emile_1000);
        $userManager->updateUser($emile_1000, false);

        $xx3l3m3nt = $userManager->createUser();
        $xx3l3m3nt->setUsername('xx3l3m3nt');
        $xx3l3m3nt->setEmail('xx3l3m3nt@xx3l3m3nt.fr');
        $xx3l3m3nt->setPlainPassword('xx3l3m3nt');
        $xx3l3m3nt->setEnabled(true);
        $xx3l3m3nt->setCountry("France");
        $xx3l3m3nt->setCreatedAt(new \DateTime('now'));
        $this->addReference('xx3l3m3nt-user', $xx3l3m3nt);
        $userManager->updateUser($xx3l3m3nt, false);

        $thelordack = $userManager->createUser();
        $thelordack->setUsername('thelordack');
        $thelordack->setEmail('thelordack@thelordack.fr');
        $thelordack->setPlainPassword('thelordack');
        $thelordack->setEnabled(true);
        $thelordack->setCountry("France");
        $thelordack->setCreatedAt(new \DateTime('now'));
        $this->addReference('thelordack-user', $thelordack);
        $userManager->updateUser($thelordack, false);

        $furaigon = $userManager->createUser();
        $furaigon->setUsername('furaigon');
        $furaigon->setEmail('furaigon@furaigon.fr');
        $furaigon->setPlainPassword('furaigon');
        $furaigon->setEnabled(true);
        $furaigon->setCountry("France");
        $furaigon->setCreatedAt(new \DateTime('now'));
        $this->addReference('furaigon-user', $furaigon);
        $userManager->updateUser($furaigon, false);
 
        $arnauy = $userManager->createUser();
        $arnauy->setUsername('arnauy');
        $arnauy->setEmail('arnauy@arnauy.fr');
        $arnauy->setPlainPassword('arnauy');
        $arnauy->setEnabled(true);
        $arnauy->setCountry("France");
        $arnauy->setCreatedAt(new \DateTime('now'));
        $this->addReference('arnauy-user', $arnauy);
        $userManager->updateUser($arnauy, false);

        $ovski4 = $userManager->createUser();
        $ovski4->setUsername('ovski4');
        $ovski4->setEmail('ovski4@ovski4.fr');
        $ovski4->setPlainPassword('ovski4');
        $ovski4->setEnabled(true);
        $ovski4->setCountry("France");
        $ovski4->setCreatedAt(new \DateTime('now'));
        $this->addReference('ovski4-user', $ovski4);
        $userManager->updateUser($ovski4, false);

        $napydawise = $userManager->createUser();
        $napydawise->setUsername('napydawise');
        $napydawise->setEmail('napydawise@napydawise.fr');
        $napydawise->setPlainPassword('napydawise');
        $napydawise->setEnabled(true);
        $napydawise->setCountry("France");
        $napydawise->setCreatedAt(new \DateTime('now'));
        $this->addReference('napydawise-user', $napydawise);
        $userManager->updateUser($napydawise, false);

        $grosziznzin = $userManager->createUser();
        $grosziznzin->setUsername('grosziznzin');
        $grosziznzin->setEmail('grosziznzin@grosziznzin.fr');
        $grosziznzin->setPlainPassword('grosziznzin');
        $grosziznzin->setEnabled(true);
        $grosziznzin->setCountry("France");
        $grosziznzin->setCreatedAt(new \DateTime('now'));
        $this->addReference('grosziznzin-user', $grosziznzin);
        $userManager->updateUser($grosziznzin, false);

        $glapine = $userManager->createUser();
        $glapine->setUsername('glapine');
        $glapine->setEmail('glapine@glapine.fr');
        $glapine->setPlainPassword('glapine');
        $glapine->setEnabled(true);
        $glapine->setCountry("France");
        $glapine->setCreatedAt(new \DateTime('now'));
        $this->addReference('glapine-user', $glapine);
        $userManager->updateUser($glapine, false);

        $factemius = $userManager->createUser();
        $factemius->setUsername('factemius');
        $factemius->setEmail('factemius@factemius.fr');
        $factemius->setPlainPassword('factemius');
        $factemius->setEnabled(true);
        $factemius->setCountry("France");
        $factemius->setCreatedAt(new \DateTime('now'));
        $this->addReference('factemius-user', $factemius);
        $userManager->updateUser($factemius, false);
 
        $nobarxo = $userManager->createUser();
        $nobarxo->setUsername('nobarxo');
        $nobarxo->setEmail('nobarxo@nobarxo.fr');
        $nobarxo->setPlainPassword('nobarxo');
        $nobarxo->setEnabled(true);
        $nobarxo->setCountry("France");
        $nobarxo->setCreatedAt(new \DateTime('now'));
        $this->addReference('nobarxo-user', $nobarxo);
        $userManager->updateUser($nobarxo, false);
 
        $transtax = $userManager->createUser();
        $transtax->setUsername('transtax');
        $transtax->setEmail('transtax@transtax.fr');
        $transtax->setPlainPassword('transtax');
        $transtax->setEnabled(true);
        $transtax->setCountry("France");
        $transtax->setCreatedAt(new \DateTime('now'));
        $this->addReference('transtax-user', $transtax);
        $userManager->updateUser($transtax, false);

        $zulnet = $userManager->createUser();
        $zulnet->setUsername('zulnet');
        $zulnet->setEmail('zulnet@zulnet.fr');
        $zulnet->setPlainPassword('zulnet');
        $zulnet->setEnabled(true);
        $zulnet->setCountry("France");
        $zulnet->setCreatedAt(new \DateTime('now'));
        $this->addReference('zulnet-user', $zulnet);
        $userManager->updateUser($zulnet, false);

        $subelle = $userManager->createUser();
        $subelle->setUsername('subelle');
        $subelle->setEmail('subelle@subelle.fr');
        $subelle->setPlainPassword('subelle');
        $subelle->setEnabled(true);
        $subelle->setCountry("France");
        $subelle->setCreatedAt(new \DateTime('now'));
        $this->addReference('subelle-user', $subelle);
        $userManager->updateUser($subelle, false);

        $rekilon = $userManager->createUser();
        $rekilon->setUsername('rekilon');
        $rekilon->setEmail('rekilon@rekilon.fr');
        $rekilon->setPlainPassword('rekilon');
        $rekilon->setEnabled(true);
        $rekilon->setCountry("France");
        $rekilon->setCreatedAt(new \DateTime('now'));
        $this->addReference('rekilon-user', $rekilon);
        $userManager->updateUser($rekilon, false);

        $bisvilin = $userManager->createUser();
        $bisvilin->setUsername('bisvilin');
        $bisvilin->setEmail('bisvilin@bisvilin.fr');
        $bisvilin->setPlainPassword('bisvilin');
        $bisvilin->setEnabled(true);
        $bisvilin->setCountry("France");
        $bisvilin->setCreatedAt(new \DateTime('now'));
        $this->addReference('bisvilin-user', $bisvilin);
        $userManager->updateUser($bisvilin, false);

        $pounet = $userManager->createUser();
        $pounet->setUsername('pounet');
        $pounet->setEmail('pounet@pounet.fr');
        $pounet->setPlainPassword('pounet');
        $pounet->setEnabled(true);
        $pounet->setCountry("France");
        $pounet->setCreatedAt(new \DateTime('now'));
        $this->addReference('pounet-user', $pounet);
        $userManager->updateUser($pounet, false);

        $batys = $userManager->createUser();
        $batys->setUsername('batys');
        $batys->setEmail('batys@batys.fr');
        $batys->setPlainPassword('batys');
        $batys->setEnabled(true);
        $batys->setCountry("France");
        $batys->setCreatedAt(new \DateTime('now'));
        $this->addReference('batys-user', $batys);
        $userManager->updateUser($batys, false);

        $rinerk = $userManager->createUser();
        $rinerk->setUsername('rinerk');
        $rinerk->setEmail('rinerk@rinerk.fr');
        $rinerk->setPlainPassword('rinerk');
        $rinerk->setEnabled(true);
        $rinerk->setCountry("France");
        $rinerk->setCreatedAt(new \DateTime('now'));
        $this->addReference('rinerk-user', $rinerk);
        $userManager->updateUser($rinerk, false);

        $opak = $userManager->createUser();
        $opak->setUsername('opak');
        $opak->setEmail('opak@opak.fr');
        $opak->setPlainPassword('opak');
        $opak->setEnabled(true);
        $opak->setCountry("France");
        $opak->setCreatedAt(new \DateTime('now'));
        $this->addReference('opak-user', $opak);
        $userManager->updateUser($opak, false);

        $tiria = $userManager->createUser();
        $tiria->setUsername('tiria');
        $tiria->setEmail('tiria@tiria.fr');
        $tiria->setPlainPassword('tiria');
        $tiria->setEnabled(true);
        $tiria->setCountry("France");
        $tiria->setCreatedAt(new \DateTime('now'));
        $this->addReference('tiria-user', $tiria);
        $userManager->updateUser($tiria, false);

        $mixcal = $userManager->createUser();
        $mixcal->setUsername('mixcal');
        $mixcal->setEmail('mixcal@mixcal.fr');
        $mixcal->setPlainPassword('mixcal');
        $mixcal->setEnabled(true);
        $mixcal->setCountry("France");
        $mixcal->setCreatedAt(new \DateTime('now'));
        $this->addReference('mixcal-user', $mixcal);
        $userManager->updateUser($mixcal, false);

        $rinya = $userManager->createUser();
        $rinya->setUsername('rinya');
        $rinya->setEmail('rinya@rinya.fr');
        $rinya->setPlainPassword('rinya');
        $rinya->setEnabled(true);
        $rinya->setCountry("France");
        $rinya->setCreatedAt(new \DateTime('now'));
        $this->addReference('rinya-user', $rinya);
        $userManager->updateUser($rinya, false);

        $neoxer = $userManager->createUser();
        $neoxer->setUsername('neoxer');
        $neoxer->setEmail('neoxer@neoxer.fr');
        $neoxer->setPlainPassword('neoxer');
        $neoxer->setEnabled(true);
        $neoxer->setCountry("France");
        $neoxer->setCreatedAt(new \DateTime('now'));
        $this->addReference('neoxer-user', $neoxer);
        $userManager->updateUser($neoxer, false);

        $pocrala = $userManager->createUser();
        $pocrala->setUsername('pocrala');
        $pocrala->setEmail('pocrala@pocrala.fr');
        $pocrala->setPlainPassword('pocrala');
        $pocrala->setEnabled(true);
        $pocrala->setCountry("France");
        $pocrala->setCreatedAt(new \DateTime('now'));
        $this->addReference('pocrala-user', $pocrala);
        $userManager->updateUser($pocrala, false);

        $laisore = $userManager->createUser();
        $laisore->setUsername('laisore');
        $laisore->setEmail('laisore@laisore.fr');
        $laisore->setPlainPassword('laisore');
        $laisore->setEnabled(true);
        $laisore->setCountry("France");
        $laisore->setCreatedAt(new \DateTime('now'));
        $this->addReference('laisore-user', $laisore);
        $userManager->updateUser($laisore, false);
 
        $fearhardcore = $userManager->createUser();
        $fearhardcore->setUsername('fearhardcore');
        $fearhardcore->setEmail('fearhardcore@fearhardcore.fr');
        $fearhardcore->setPlainPassword('fearhardcore');
        $fearhardcore->setEnabled(true);
        $fearhardcore->setCountry("France");
        $fearhardcore->setCreatedAt(new \DateTime('now'));
        $this->addReference('fearhardcore-user', $fearhardcore);
        $userManager->updateUser($fearhardcore, false);

        $pedopony = $userManager->createUser();
        $pedopony->setUsername('pedopony');
        $pedopony->setEmail('pedopony@pedopony.fr');
        $pedopony->setPlainPassword('pedopony');
        $pedopony->setEnabled(true);
        $pedopony->setCountry("France");
        $pedopony->setCreatedAt(new \DateTime('now'));
        $this->addReference('pedopony-user', $pedopony);
        $userManager->updateUser($pedopony, false);

        $jaylbralon = $userManager->createUser();
        $jaylbralon->setUsername('jaylbralon');
        $jaylbralon->setEmail('jaylbralon@jaylbralon.fr');
        $jaylbralon->setPlainPassword('jaylbralon');
        $jaylbralon->setEnabled(true);
        $jaylbralon->setCountry("France");
        $jaylbralon->setCreatedAt(new \DateTime('now'));
        $this->addReference('jaylbralon-user', $jaylbralon);
        $userManager->updateUser($jaylbralon, false);

        $summumlui = $userManager->createUser();
        $summumlui->setUsername('summumlui');
        $summumlui->setEmail('summumlui@summumlui.fr');
        $summumlui->setPlainPassword('summumlui');
        $summumlui->setEnabled(true);
        $summumlui->setCountry("France");
        $summumlui->setCreatedAt(new \DateTime('now'));
        $this->addReference('summumlui-user', $summumlui);
        $userManager->updateUser($summumlui, false);

        $callofburger = $userManager->createUser();
        $callofburger->setUsername('callofburger');
        $callofburger->setEmail('callofburger@callofburger.fr');
        $callofburger->setPlainPassword('callofburger');
        $callofburger->setEnabled(true);
        $callofburger->setCountry("France");
        $callofburger->setCreatedAt(new \DateTime('now'));
        $this->addReference('callofburger-user', $callofburger);
        $userManager->updateUser($callofburger, false);

        $noixdepecan = $userManager->createUser();
        $noixdepecan->setUsername('noixdepecan');
        $noixdepecan->setEmail('noixdepecan@noixdepecan.fr');
        $noixdepecan->setPlainPassword('noixdepecan');
        $noixdepecan->setEnabled(true);
        $noixdepecan->setCountry("France");
        $noixdepecan->setCreatedAt(new \DateTime('now'));
        $this->addReference('noixdepecan-user', $noixdepecan);
        $userManager->updateUser($noixdepecan, false);

        $aleks = $userManager->createUser();
        $aleks->setUsername('aleks');
        $aleks->setEmail('aleks@aleks.fr');
        $aleks->setPlainPassword('aleks');
        $aleks->setEnabled(true);
        $aleks->setCountry("France");
        $aleks->setCreatedAt(new \DateTime('now'));
        $this->addReference('aleks-user', $aleks);
        $userManager->updateUser($aleks, false);

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1;
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