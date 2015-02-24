<?php
/**
 * Created by PhpStorm.
 * User: cesar
 * Date: 24/02/15
 * Time: 7:58
 */

namespace Hospity\AppBundle\Controller;

use Hospity\AppBundle\Entity\Noticia;
use Hospity\AppBundle\Form\NoticiaType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

///TODO: Configure the FOSUserBundle correctly, already installed, only configure.
class NoticiasController extends Controller{

    public function indexAction() {
        $em = $this->getDoctrine()->getManager();
        $noticias = $em->getRepository("AppBundle:Noticia");
        return $this->render("@App/Noticias/index.html.twig", array("noticias" => $noticias->findAll()));
    }

    public function createAction(Request $request) {
        $entity = new Noticia();
        $entity->setFechaCreacion(new \DateTime('now'));

        $form = $this->createCreationForm($entity);
        $form->handleRequest($request);

        if (!$form->isValid()) {
            return $this->render('@App/Noticias/create.html.twig', array('noticiaform' => $form->createView()));
        } else {
            $em = $this-> getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('news_homepage'));
        }
        return $this->render('@App/Noticias/create.html.twig', array('formulary' => $form));
    }

    private function createCreationForm(Noticia $entity) {
        $form = $this->createForm(
            new NoticiaType($this),
            $entity,
            array(
                'action' => $this->generateUrl('news_create'),
                'method' => 'POST'
            ));
        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }
} 