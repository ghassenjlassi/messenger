<?php

namespace Ansi\GhassenBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ansi\GhassenBundle\Form\RechercheType;


class MessageController extends Controller {

    public function indexAction() {
        $user = $this->container->get('security.context')->getToken()->getUser();
        $request = $this->container->get('request');
        $session = $request->getSession();
        $session->set('username', $user->getusername());
        $session->set('id', $user->getid());
        $message = $this->get('doctrine_mongodb')
                ->getRepository('AnsiGhassenBundle:Message')->byConversation($user)
                ->toArray();
        $paginator = $this->get('knp_paginator');

        $messages = $paginator->paginate($message, $this->get('request')->query->get('page', 1), 6);
        return $this->render('AnsiGhassenBundle:Message:index.html.twig', array(
                    'messages' => $messages,
        ));
    }

    public function rechercheAction() {
        $form = $this->createForm(new RechercheType());
        return $this->render('AnsiGhassenBundle:Recherche:recherche.html.twig', array('form' => $form->createView()));
    }

    public function rechercheTraitementAction() {
        $form = $this->createForm(new RechercheType());

        if ($this->get('request')->getMethod() == 'POST') {
            $form->bind($this->get('request'));
            $receiver = $this->get('doctrine_mongodb')
                    ->getRepository('AcmeUserBundle:User')
                    ->findOneBy(array('username' => $form['recherche']->getData()));
            if ($receiver) {
                $message = $this->get('doctrine_mongodb')
                                ->getRepository('AnsiGhassenBundle:Message')
                                ->recherche($receiver)->toArray();
                $paginator = $this->get('knp_paginator');
                $messages = $paginator->paginate($message, $this->get('request')->query->get('page', 1), 6);
            } else {
                $messages = $receiver;
            }
        } else {
            throw $this->createNotFoundException('La page n\'existe pas.');
        }

        return $this->render('AnsiGhassenBundle:Message:index.html.twig', array('messages' => $messages));
    }

    public function showAction($id) {
        $userc = $this->container->get('security.context')->getToken()->getUser();
        $user = $this->get('doctrine_mongodb')
                ->getRepository('AcmeUserBundle:User')
                ->findOneBy(array('id' => $id));

        $entity = $this->get('doctrine_mongodb')
                ->getRepository('AnsiGhassenBundle:Message')
                ->byuser($user, $userc);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find groupdis entity.');
        }
        return $this->render('AnsiGhassenBundle:Message:show.html.twig', array(
                    'entity' => $entity,
                    'iduser' => $id
        ));
    }
         public function callAction($id) {
              $user = $this->container->get('security.context')->getToken()->getUser();
              $ami = $this->get('doctrine_mongodb')
                ->getRepository('AcmeUserBundle:User')
                ->findOneBy(array('id' => $id));
        
       return $this->render('AnsiGhassenBundle:Message:phone.html.twig', array(
                    'user' => $user,
                    'ami' => $ami 
               ));
    }
      public function lastmsgAction() {
        $user = $this->container->get('security.context')->getToken()->getUser();
        $msg = $this->get('doctrine_mongodb')
                ->getRepository('AnsiGhassenBundle:Message')
                ->mesglast($user);
      
        return $this->render('AnsiGhassenBundle:Message:lastmessage.html.twig', array(
                    'mesg' => $msg,
                    
        ));
    }

    public function showmsgroupAction($id) {
        $groupe = $this->get('doctrine_mongodb')
                ->getRepository('AnsiGhassenBundle:GroupDis')
                ->findOneBy(array('id' => $id));
        $mesgrps = $this->get('doctrine_mongodb')
                        ->getRepository('AnsiGhassenBundle:Message')
                        ->mesgroup($groupe)->toArray();

        return $this->render('AnsiGhassenBundle:GroupDis:showmessage.html.twig', array(
                    'mesgrps' => $mesgrps,
                    'idgroup' => $id
        ));
    }

    public function conversationPDFAction($id) {
        $userc = $this->container->get('security.context')->getToken()->getUser();
        $user = $this->get('doctrine_mongodb')
                ->getRepository('AcmeUserBundle:User')
                ->findOneBy(array('id' => $id));

        $message = $this->get('doctrine_mongodb')
                ->getRepository('AnsiGhassenBundle:Message')
                ->byuser($user, $userc);

        if (!$message) {

            return $this->redirect($this->generateUrl('message'));
        }

        $html = $this->renderView('AnsiGhassenBundle:Message:messagePdf.html.twig', array('message' => $message));

        $html2pdf = new \Html2Pdf_Html2Pdf('P', 'A4', 'fr');
        $html2pdf->pdf->SetTitle('message');
        $html2pdf->pdf->SetSubject('conversations');
        $html2pdf->pdf->SetKeywords('user, conversation');
        $html2pdf->pdf->SetDisplayMode('real');
        $html2pdf->writeHTML($html);
        $html2pdf->Output('Conversation.pdf');
        $response = new Response();
        $response->headers->set('Content-type', 'application/pdf');

        return $response;
    }

    public function convgroupPDFAction($id) {
        $groupe = $this->get('doctrine_mongodb')
                ->getRepository('AnsiGhassenBundle:GroupDis')
                ->findOneBy(array('id' => $id));
        $mesgrps = $this->get('doctrine_mongodb')
                ->getRepository('AnsiGhassenBundle:Message')
                ->mesgroup($groupe);

        if (!$mesgrps) {

            return $this->redirect($this->generateUrl('message'));
        }

        $html = $this->renderView('AnsiGhassenBundle:GroupDis:messagegroupPdf.html.twig', array('mesgrps' => $mesgrps));

        $html2pdf = new \Html2Pdf_Html2Pdf('P', 'A4', 'fr');
        $html2pdf->pdf->SetTitle('message');
        $html2pdf->pdf->SetSubject('conversations Group');
        $html2pdf->pdf->SetKeywords('group, conversation');
        $html2pdf->pdf->SetDisplayMode('real');
        $html2pdf->writeHTML($html);
        $html2pdf->Output('ConversationGroup.pdf');
        $response = new Response();
        $response->headers->set('Content-type', 'application/pdf');

        return $response;
    }
 

    public function deleteAction($id) {
        $userc = $this->container->get('security.context')->getToken()->getUser();
        $user = $this->get('doctrine_mongodb')
                ->getRepository('AcmeUserBundle:User')
                ->findOneBy(array('id' => $id));

        $this->get('doctrine_mongodb')
                ->getRepository('AnsiGhassenBundle:Message')->supConversation($user, $userc);

        return $this->redirect($this->generateUrl('message'));
    }
  

}
