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
        parent::buildForm($builder, $options);

        // add your custom field
        $builder
            ->add('avatar', null, array('label' => 'Your avatar (30px*30px)'))
            ->add('age', null, array('label' => 'Age :'))
            ->add('description', null, array('label' => 'Description :'))
            ->add('updated_at', 'datetime', array(
                'data' => new \DateTime('now'),
                'attr' => array('style'=>'display:none;'),
                'label' => false
            ))
        ;
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
            ->add('age', null, array('label' => 'Age :'))
            ->add('description', null, array('label' => 'Description :'))
        ;
    }
}