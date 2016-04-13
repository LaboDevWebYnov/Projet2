<?php
/**
 * Created by PhpStorm.
 * User: Esra
 * Date: 12/04/2016
 * Time: 20:05
 */

namespace Goldenfish\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;

class SecurityController
{

    public function loginAction(Request $request)
    {
        if ($this->get('security.context')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return $this->redirectToRoute('Goldenfish:GoldenfishBundle:App:index.html.twig');
        }

        $authenticationUtils = $this->get('security.authentication_utils');

        return $this->render('UserBundle:Security:login.html.twig', array(
            'last_username' => $authenticationUtils->getLastUsername(),
            'error'         => $authenticationUtils->getLastAuthenticationError(),
        ));
    }

    public function logoutAction(Request $request)
    {
        return $this->redirectToRoute('GoldenfishBundle:Index:index.html.twig');
    }
}