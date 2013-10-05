<?php

namespace Ovski\MinecraftUserBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\ProfileFormType as BaseType;

class ProfileFormType extends BaseType
{
    /*public function __construct($class) {
        parent::__construct($class);
    }*/

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // add your custom field
        $builder
            ->add('avatar', null, array('label' => 'Your avatar :'))
            ->add('birthDate', 'datetime', array(
                'label' => 'Age :',
                'widget' => 'choice',
                'years' => range(1920, 2008),
                'with_seconds' => false
            ))
            ->add('description', null, array('label' => 'Description :'))
            ->add('updated_at', 'datetime', array(
                'data' => new \DateTime('now'),
                'attr' => array('style'=>'display:none;'),
                'label' => false
            ))
        ;

        parent::buildForm($builder, $options);
    }

    public function getName()
    {
        return 'ovski_minecraftuser_profile';
    }

    /**
     * Builds the embedded form representing the user.
     *
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    protected function buildUserForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', 'email', array('label' => 'form.email', 'translation_domain' => 'FOSUserBundle'))
            ->add('description', null, array('label' => 'Description :'))
        ;
    }
}