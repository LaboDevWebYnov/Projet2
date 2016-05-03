<?php

namespace Goldenfish\GoldenfishBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
//Entity
use Goldenfish\GoldenfishBundle\Entity\Note;
use Goldenfish\UserBundle\Entity\User;
use Goldenfish\GoldenfishBundle\Entity\UserNote;
//type
use Goldenfish\GoldenfishBundle\Form\partageType;

class AppController extends Controller
{
    public function indexAppAction()
    {
        $user = $this->container->get('security.context')->getToken()->getUser();

        return $this->render('GoldenfishBundle:App:index.html.twig', array(
            'user' => $user));
    }
    public function addNoteAction(){
        return $this->render('GoldenfishBundle:App:newnote.html.twig', array(
            'title' => "",
            'content' => "",
            'status' => "insert"
        ));
    }
    public function saveNoteAction(Request $request){
        //if ($request->getMethod() == 'POST') {
            $data = $this->get('request')->request;
        //}
        $em = $this->getDoctrine()->getManager();
        $em->getRepository('GoldenfishBundle:Note');

        $user = $this->container->get('security.context')->getToken()->getUser();

        //INSERT NOTE
        if( $data->get('status') == "insert" ){

            $note = new Note();
            $note->setTitle($data->get('note_name'));
            $note->setContent($data->get('note_content'));
            $note->setDateCreation(new \DateTime());
            $note->setDateUpdate(new \DateTime());

            $usernote = new UserNote();
            $usernote->setNote($note);
            $usernote->setUser($user);
            $usernote->setDroit('Propriétaire');

            $em->persist($usernote);
            $em->persist($note);
            $em->flush();
        }
        elseif (substr($data->get('status'), 0, 6) == "update"){
            $noteID = explode("|", $data->get('status'))[1];

            $note = $em->getRepository('GoldenfishBundle:Note')->find($noteID);
            if($note){
                $note->setTitle($data->get('note_name'));
                $note->setContent($data->get('note_content'));
                $note->setDateUpdate(new \DateTime());

                $em->persist($note);
                $em->flush();
            }
        }

        return $this->redirectToRoute('application_interface');

    }

    public function modifNoteAction($id, Request $request){

        $em = $this->getDoctrine()->getManager();

        $note = $em->getRepository('GoldenfishBundle:Note')->find($id);
        return $this->render('GoldenfishBundle:App:newnote.html.twig', array(
            'title' => $note->getTitle(),
            'content' => $note->getContent(),
            'status' => "update|" . $note->getId()
        ));
    }

    public function viewListNoteAction()
    {
        $em = $this->getDoctrine()->getManager();

        $usercourant = $this->container->get('security.context')->getToken()->getUser()->getId();

        $listNote = $em->getRepository('GoldenfishBundle:Note')->getNoteWithUser($usercourant);

        $listNotePartage = $em->getRepository('GoldenfishBundle:Note')->getNotePartageWithUser($usercourant);

        return $this->render('GoldenfishBundle:App:list.html.twig', array(
            'usercourant' => $usercourant,
            'listNote' => $listNote,
            'listNotePartage' => $listNotePartage));
    }

    public function partageNoteAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $note = $em->getRepository('GoldenfishBundle:Note')->find($id);

        $form = $this->createForm(new partageType());

        $form->handleRequest($request);

        if ($form->isValid())
        {
            $username = $form->get('username')->getData();

            $listUser = $em->getRepository('UserBundle:User')->findAll();

            foreach ($listUser as $user) 
            {
                $usernamebdd = $user->getUsername();
            }

            if($username === $usernamebdd)
                {
                    $usernote = new UserNote();
                    $usernote->setNote($note);
                    $usernote->setUser($user);
                    $usernote->setDroit('Modification');
                }

            $em->persist($usernote);

            $em->flush();

            return $this->redirect($this->generateUrl('application_interface'));
        }

        return $this->render('GoldenfishBundle:App:partage.html.twig', array(
            'form' => $form->createView()));
    }
}
