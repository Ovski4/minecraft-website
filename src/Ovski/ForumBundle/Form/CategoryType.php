<?php

namespace Ovski\ForumBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CategoryType extends AbstractType
{
    private $locales;

    public function __construct($locales = null)
    {
        $this->locales = $locales;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('description')
        ;

        if (count($this->locales["locales"]) == 1) {
            $builder->add('language', 'hidden', array(
                'data' => $this->locales["locales"][0],
            ));
        } else {
            $languages = array();
            foreach ($this->locales["locales"] as $locale) {
                $languages[$locale] = $locale;
            }
            $builder->add('language', 'choice', array(
                'choices' => $languages
            ));
        }
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ovski\ForumBundle\Entity\Category'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ovski_adminbundle_forum_category';
    }
}
