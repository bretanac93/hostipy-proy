<?php

namespace Hospity\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

///FIXME: REMEMBER to change the auth type to DNI and add the field to the registration and login form...

class DefaultController extends Controller
{
    public function indexAction()
    {
        $user = $this->getUser();
        if(isset($user)) {
            return $this->render('AppBundle:Default:index.html.twig', array('user' => $user));
        }
        else {
            return $this->redirect($this->generateUrl('fos_user_security_login'));
        }
    }
}
