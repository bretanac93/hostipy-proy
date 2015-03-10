<?php
/**
 * Created by PhpStorm.
 * User: cesar
 * Date: 9/03/15
 * Time: 21:20
 */

namespace Hospity\AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class VentaController extends Controller {
    public function indexAction() {
        return $this->render('@App/Store/index.html.twig');
    }



    //HTTP_POST
    public function sellAction($id) {
        $producto = $this->getDoctrine()->getManager()->getRepository('AppBundle:Producto')->find($id);
        //Record to the database the sell
    }
} 