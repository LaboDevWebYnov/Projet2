<?php

namespace Goldenfish\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProfileController extends Controller
{
    public function showAction()
    {
        $user = $this->getUser();
        return $this->render('UserBundle:Profile:show_content.html.twig', array(
        'user' => $user
        ));
    }

}