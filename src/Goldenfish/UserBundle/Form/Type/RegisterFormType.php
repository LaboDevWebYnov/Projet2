<?php

namespace Fos\UserBundle\Form\Type;

class RegisterFormType
{
    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder->add('username','text', array('label' => 'form.username', 'translation_domain' => 'FOSUserBundle'));
        $builder->add('email','email', array('label' => 'form.email', 'translation_domain' => 'FOSUserBundle'));
        $builder->add('password','password', array('label' => 'form.password', 'translation_domain' => 'FOSUserBundle'));
    }

    public function getParent()
    {
        return 'fos_user_registration';
    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }
}
