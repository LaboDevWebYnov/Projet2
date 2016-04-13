<?php

namespace Goldenfish\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;

class SecurityController extends Controller
{

    public function loginAction(Request $request)
    {
        if ($this->get('security.context')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return $this->redirectToRoute('UserBundle:Profile:profile.html.twig');
        }

        $authenticationUtils = $this->get('security.authentication_utils');

        $csrfToken = $this->container->has('form.csrf_provider')
            ? $this->container->get('form.csrf_provider')->generateCsrfToken('authenticate')
            : null;

        $data =  array(
            'last_username' => $authenticationUtils->getLastUsername(),
            'csrf_token' => $csrfToken,
            'error' =>$authenticationUtils-> getLastAuthenticationError()
        );

        return $this->render('UserBundle:Security:login.html.twig', $data
        );

    }

    public function logoutAction(Request $request)
    {
        return $this->redirectToRoute('GoldenfishBundle:Index:index.html.twig');
    }
}