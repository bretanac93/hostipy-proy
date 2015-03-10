<?php
/**
 * Created by PhpStorm.
 * User: cesar
 * Date: 5/03/15
 * Time: 15:54
 */

namespace Hospity\AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller {

    public function indexAction() {
        $user = $this->getUser();

        if(isset($user)) {
            return $this->render("@App/Admin/index.html.twig", array("user" => $user));
        }
        return $this->redirect($this->generateUrl("fos_user_security_login"));
    }
}