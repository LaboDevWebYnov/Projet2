<?php

namespace Goldenfish\UserBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class RegistrationFormType extends BaseType

{
    public function buildForm(FormBuilderInterface $builder, array $options){
    	/*$builder->add('name', 'text', array('label' => 'Nom', 'required'=> false,  'translation_domain' => 'FOSUserBundle'));
        $builder->add('surname', 'text', array('label' => 'Prénom', 'required'=> false, 'translation_domain' => 'FOSUserBundle'));*/
        $builder->add('username','text', array('label' => "Nom d'utilisateur", 'translation_domain' => 'FOSUserBundle'));
        $builder->add('email','email', array('label' => 'Email', 'translation_domain' => 'FOSUserBundle'));
        $builder->add('plainPassword','repeated', array(
        	'type' => 'password',
        	'label' => 'Mot de passe',
        	'options' => array('translation_domain' => 'FOSUserBundle'),
            'first_options' => array('label' => 'form.password'),
            'second_options' => array('label' => 'form.password_confirmation'),
        	'translation_domain' => 'FOSUserBundle'));

    }

    public function getName()
    {
        return 'app_user_registration';
    }
    
}
