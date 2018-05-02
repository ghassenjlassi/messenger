<?php

namespace Acme\UserBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\UserBundle\Form\RechercheType;
class UserController  extends Controller{
    
  public function indexAction() {
          $user = $this->container->get('security.context')->getToken()->getUser();
     
            if (!$user) {
            throw $this->createNotFoundException('Unable to find User entity.');
        }    
        $paginator = $this->get('knp_paginator');
        $entity = $paginator->paginate($user->getFriends()->toArray(), $this->get('request')->query->get('page', 1), 10);
       return $this->render('AcmeUserBundle:User:index.html.twig',array(
                     'friends' =>$entity ,
           ));
    }
      public function getGroupsAction() {
          $user = $this->container->get('security.context')->getToken()->getUser();
      $groups = $this->get('doctrine_mongodb')
                   ->getRepository('AnsiGhassenBundle:GroupDis')
                   ->findBy( array('creatby.id' => $user->getId()));
            if (!$user) {
            throw $this->createNotFoundException('Unable to find User entity.');
        }        
       return $this->render('AcmeUserBundle:User:show_groups.html.twig',array(
                     'groups' => $groups,
           ));
    }
 public function rechercheAction() {
        $form = $this->createForm(new RechercheType());
        return $this->render('AcmeUserBundle:RechercheFriends:recherchefriends.html.twig', array('form' => $form->createView()));
    }

    public function rechercheFriendsAction() {
        $form = $this->createForm(new RechercheType());
        if ($this->get('request')->getMethod() == 'POST') {
            $form->bind($this->get('request'));
            $user= $this->get('doctrine_mongodb')
                    ->getRepository('AcmeUserBundle:User')
                    ->findBy(array('username' => $form['recherche']->getData()));
                    
           $paginator = $this->get('knp_paginator');
            $entity = $paginator->paginate($user, $this->get('request')->query->get('page', 1), 10);
        } else {
            throw $this->createNotFoundException('La page n\'existe pas.');
        }

        return $this->render('AcmeUserBundle:User:index.html.twig', array('friends' => $entity));
    }
}
