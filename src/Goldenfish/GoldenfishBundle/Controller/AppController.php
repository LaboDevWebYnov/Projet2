<?php

namespace Goldenfish\GoldenfishBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

//Entity
use Goldenfish\GoldenfishBundle\Entity\Note;
use Goldenfish\UserBundle\Entity\User;


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

    	//if ($request->getMethod() == 'POST') {
		    $data = $this->get('request')->request;
		//}

        $em = $this->getDoctrine()->getManager();
        $em->getRepository('GoldenfishBundle:Note');

        $user = $this->container->get('security.context')->getToken()->getUser();

        $note = new Note();
        $note->setTitle($data->get('note_name'));
        $note->setContent($data->get('note_content'));
        $note->setDateCreation(new \DateTime());
        $note->setUser($user);

        $em->persist($note);

        $em->flush();

    	return $this->render('GoldenfishBundle:App:save.html.twig',  array(
    		'name' => $data->get('note_name'),
    		'body' => $data->get('note_content')
    	));
    }

    public function viewListNoteAction()
    {
        $em = $this->getDoctrine()->getManager();

        $usercourant = $this->container->get('security.context')->getToken()->getUser()->getId();

        $listNote = $em->getRepository('GoldenfishBundle:Note')->getNoteWithUser($usercourant);

        return $this->render('GoldenfishBundle:App:list.html.twig', array(
            'usercourant' => $usercourant,
            'listNote' => $listNote));
    }

}
