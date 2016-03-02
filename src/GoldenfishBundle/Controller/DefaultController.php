<?php

namespace GoldenfishBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('GoldenfishBundle:Index:index.html.twig');
    }
}
