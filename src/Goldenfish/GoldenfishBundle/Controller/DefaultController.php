<?php

namespace Goldenfish\GoldenfishBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        /*if ($this->get('security.context')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return $this->redirectToRoute('UserBundle:Profile:profile.html.twig');
        }*/

        /* Formulaire de connexion */
        $authenticationUtils = $this->get('security.authentication_utils');

        $csrfToken = $this->has('form.csrf_provider')
            ? $this->get('form.csrf_provider')->generateCsrfToken('authenticate')
            : null;

        $data =  array(
            'last_username' => $authenticationUtils->getLastUsername(),
            'csrf_token' => $csrfToken,
            'error' =>$authenticationUtils-> getLastAuthenticationError()
        );

        return $this->render('GoldenfishBundle:Index:index.html.twig', $data);
    }


    /* Redirect URL with slash */
    public function removeTrailingSlashAction(Request $request)
    {
        $pathInfo = $request->getPathInfo();
        $requestUri = $request->getRequestUri();

        $url = str_replace($pathInfo, rtrim($pathInfo, ' /'), $requestUri);

        return $this->redirect($url, 301);
    }
}
