<?php

namespace Ansi\GhassenBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ansi\GhassenBundle\Form\GroupDisType;
use Ansi\GhassenBundle\Document\GroupDis;
use Ansi\GhassenBundle\Form\RechercheType;

class GroupDisController extends Controller {

    public function indexAction() {
        $user = $this->container->get('security.context')->getToken()->getUser();
        $entity = $this->get('doctrine_mongodb')
                        ->getRepository('AnsiGhassenBundle:GroupDis')
                        ->fingroups($user)->toArray();
        $paginator = $this->get('knp_paginator');

        $groupes = $paginator->paginate($entity, $this->get('request')->query->get('page', 1), 6);
        return $this->render('AnsiGhassenBundle:GroupDis:index.html.twig', array(
                    'groupes' => $groupes,
        ));
    }

    public function newAction() {
        $user = $this->container->get('security.context')->getToken()->getUser();
        $form = $this->createForm(new GroupDisType($user), new GroupDis());
        $paginator = $this->get('knp_paginator');
        $entity = $user->getFriends();
        $ami = $paginator->paginate($entity, $this->get('request')->query->get('page', 1), 6);
        return $this->render('AnsiGhassenBundle:GroupDis:newgroup.html.twig', array('form' => $form->createView()
                ,'friends' =>$ami ));
    }

    public function createAction() {
        $user = $this->container->get('security.context')->getToken()->getUser();
        $dm = $this->get('doctrine_mongodb')->getManager();
        $form = $this->createForm(new GroupDisType($user), new GroupDis());
        $form->bind($this->getRequest());

        if ($form->isValid()) {


            $GroupDis = $form->getData();
            $GroupDis->setCreatby($user);
            $GroupDis->addUser($user);
            $dm->persist($GroupDis);
            $dm->flush();

            return $this->redirect($this->generateUrl('groupDis', array('id' => $GroupDis->getId())));
        }

        return $this->render('AnsiGhassenBundle:GroupDis:new.html.twig', array('form' => $form->createView()));
    }

    public function editAction($id) {
        $dm = $this->get('doctrine_mongodb')->getManager();
        $group = $dm->getRepository('AnsiGhassenBundle:GroupDis')->find($id);
        if (!$group) {
            throw $this->createNotFoundException('No group found for id ' . $id);

			}
        $editForm = $this->createEditForm($group);
        return $this->render('AnsiGhassenBundle:GroupDis:edit.html.twig', array(
                    'group' => $group,
                    'edit_form' => $editForm->createView(),
        ));
    }

    private function createEditForm(GroupDis $entity) {
        $user = $this->container->get('security.context')->getToken()->getUser();
        $form = $this->createForm(new GroupDisType($user), $entity, array(
            'action' => $this->generateUrl('GroupDis_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    public function updateAction($id) {
        $dm = $this->get('doctrine_mongodb')->getManager();
        $entity = $dm->getRepository('AnsiGhassenBundle:GroupDis')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Group entity.');
        }

        $editForm = $this->createEditForm($entity);
        $editForm->bind($this->getRequest());

        if ($editForm->isValid()) {
            $dm->flush();

            return $this->redirect($this->generateUrl('groupDis', array('id' => $entity->getId())));
        }

        return $this->render('AnsiGhassenBundle:GroupDis:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
        ));
    }

    public function rechercheAction() {
        $form = $this->createForm(new RechercheType());
        return $this->render('AnsiGhassenBundle:Recherche:recherchegroups.html.twig', array('form' => $form->createView()));
    }

    public function rechercheGroupAction() {
        $form = $this->createForm(new RechercheType());
        $me = $this->container->get('security.context')->getToken()->getUser();
        if ($this->get('request')->getMethod() == 'POST') {
            $form->bind($this->get('request'));
            $user = $this->get('doctrine_mongodb')
                    ->getRepository('AcmeUserBundle:User')
                    ->findOneBy(array('username' => $form['recherche']->getData()));
            if ($user) {
                $group = $this->get('doctrine_mongodb')
                                ->getRepository('AnsiGhassenBundle:GroupDis')
                                ->recherchegroup($user, $me)->toArray();
                $paginator = $this->get('knp_paginator');
                $groups = $paginator->paginate($group, $this->get('request')->query->get('page', 1), 6);
            } else {
                $groups = $user;
            }
        } else {
            throw $this->createNotFoundException('La page n\'existe pas.');
        }

        return $this->render('AnsiGhassenBundle:GroupDis:index.html.twig', array('groupes' => $groups));
    }

    public function deleteAction($id) {
        $this->get('doctrine_mongodb')
                ->getRepository('AcmeUserBundle:GroupDis')
                ->removegrp($id);


        return $this->redirect($this->generateUrl('GroupDis'));
    }

    public function deletegroupAction($id) {
        $dm = $this->get('doctrine_mongodb')->getManager();
        $entity = $dm->getRepository('AnsiGhassenBundle:GroupDis')->find($id);

        if ($entity) {

            $dm->remove($entity);
            $dm->flush();
        }

        return $this->redirect($this->generateUrl('groupDis'));
    }

}
