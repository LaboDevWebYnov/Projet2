<?php

namespace Fos\UserBundle\Form\Type;



class ProfileFormType
{
    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder->add('','fos_user_username');
    }

}

