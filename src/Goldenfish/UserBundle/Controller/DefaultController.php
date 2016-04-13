<?php

namespace Goldenfish\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function profileAction(Request $resquest)
    {
        return $this->render('UserBundle:Security:check.html.twig');
    }
}
