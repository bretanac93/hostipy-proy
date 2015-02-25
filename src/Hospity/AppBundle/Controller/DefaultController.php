<?php

namespace Hospity\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $user = $this->getUser();
        if(isset($user)) {
            return $this->render('AppBundle:Default:index.html.twig', array(
                'logged' => $user.get_current_user(),
            ));
        }
        else {
            return $this->redirect($this->generateUrl('fos_user_security_login'));
        }
    }
}
