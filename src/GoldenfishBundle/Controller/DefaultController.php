<?php

namespace GoldenfishBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('GoldenfishBundle:Index:index.html.twig');
    }

    public function appAction()
    {
    	return $this->render('GoldenfishBundle:Index:app.html.twig');
    }
}
