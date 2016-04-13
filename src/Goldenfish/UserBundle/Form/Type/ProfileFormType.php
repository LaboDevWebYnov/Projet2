<?php

namespace Fos\UserBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;

class ProfileFormType
{

    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder->add('username','text', array('label' => 'form.username', 'translation_domain' => 'FOSUserBundle'));
        $builder->add('email', 'email', array('label' => 'form.email', 'translation_domain' => 'FOSUserBundle'));
    }

}

