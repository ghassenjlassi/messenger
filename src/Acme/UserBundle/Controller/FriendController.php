<?php

namespace Acme\UserBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\UserBundle\Form\RechercheType;
class FriendController  extends Controller{
    
    public function addAction() {
        $user = $this->container->get('security.context')->getToken()->getUser();
        
        $ghassen= $this->get('doctrine_mongodb')
                    ->getRepository('AcmeUserBundle:User')
                    ->findOneBy(array('username' => "miad"));
        
        $user->addFriend($ghassen);
        //$ghassen->addFriend($user);
        
        $dm = $this->get('doctrine_mongodb')->getManager();
        $dm->flush();
        
        return $this->render('AcmeUserBundle:Friend:add.html.twig');
    }
    
    
  public function indexAction() {
      if($this->container->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY')){
          return $this->redirect($this->generateUrl("message"));
      }
      else{
          return $this->redirect($this->generateUrl("fos_user_security_login"));
      }
        
  }
}
