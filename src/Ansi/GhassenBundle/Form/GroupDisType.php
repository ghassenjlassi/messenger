<?php

namespace Ansi\GhassenBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class GroupDisType extends AbstractType {

    public function __construct($user) {
        $this->user = $user;
    }

    public function buildForm(FormBuilderInterface $builder, array $options) {


        $builder->add('users', 'document', array(
            'class' => 'Acme\UserBundle\Document\User',
            'choices' => $this->user->getFriends(),
            'multiple' => true,
            'expanded' => true
        ));
      
    }

    /**
     * Set default
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Ansi\GhassenBundle\Document\GroupDis',
        ));
    }

    public function getName() {
        return 'ansi_ghassenbundle_groupDis';
    }

}
