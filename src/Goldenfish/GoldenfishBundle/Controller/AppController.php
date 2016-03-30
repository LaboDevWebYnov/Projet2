<?php

namespace Goldenfish\GoldenfishBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AppController extends Controller
{
    public function indexAppAction()
    {
        return $this->render('GoldenfishBundle:App:index.html.twig');
    }

    public function addNoteAction(){
    	return $this->render('GoldenfishBundle:App:newnote.html.twig');
    }

}
