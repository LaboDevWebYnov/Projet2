<?php

namespace Goldenfish\GoldenfishBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AppController extends Controller
{
    public function indexAppAction()
    {
        return $this->render('GoldenfishBundle:App:index.html.twig');
    }

    public function addNoteAction(){
    	return $this->render('GoldenfishBundle:App:newnote.html.twig');
    }

    public function saveNoteAction(Request $request){

    	if ($request->getMethod() == 'POST') {
		    $data = $this->get('request')->request;
		}

    	return $this->render('GoldenfishBundle:App:save.html.twig',  array(
    		'name' => $data->get('note_name'),
    		'body' => $data->get('note_content')
    	));
    }

}
