<?php

namespace Goldenfish\UserBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;

class RegistrationFormType extends BaseType

{
    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder->add('username','text', array('label' => 'form.username', 'translation_domain' => 'FOSUserBundle'));
        $builder->add('email','email', array('label' => 'form.email', 'translation_domain' => 'FOSUserBundle'));
        $builder->add('password','password', array('label' => 'form.password', 'translation_domain' => 'FOSUserBundle'));
    }

    public function getName()
    {
        return 'app_user_registration';
    }
    
}
