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

            $message = \Swift_Message::newInstance()
                    -> setSubject("Noticia: " . $entity->getTitulo())
                    -> setFrom("no-reply@hostipy.com")
                    -> setTo("anywhere@localhost")
                    -> setBody($this->renderView("AppBundle::mail.txt.twig",
                        array(
                            "title" => $entity->getTitulo(),
                            "creation_date" => $entity->getFechaCreacion(),
                            "content" => $entity->getContenido(),
                    )));

            $this->get('mailer')->send($message);

            $em = $this-> getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('news_homepage'));
        }
        return $this->render('@App/Noticias/create.html.twig', array('formulary' => $form));
    }

    public function detailsAction($id) {
        $em = $this->getDoctrine()->getManager();
        $new = $em->getRepository('AppBundle:Noticia')->find($id);

        if($new == null) {
            return $this->errorHandling();
        }
        else {
            return $this->render('@App/Noticias/details.html.twig', array('new' => $new));
        }
    }

    public function editAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Noticia')->find($id);
        if(!$entity) {
            return $this->errorHandling();
        }

        $editForm = $this->createEditionForm($entity);
        $deleteForm = $this->createDeleteForm($id);
        return $this->render('@App/Noticias/edit.html.twig', array(
                'entity' => $entity,
                'edit_form' => $editForm->createView(),
                'delete_form' => $deleteForm->createView()
            )
        );

    }

    public function updateAction($id, Request $request) {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('AppBundle:Noticia')->find($id);

        if(!$entity) {
            return $this->errorHandling();
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditionForm($entity);
        $editForm->handleRequest($request);

        if($editForm->isValid()) {
            $em->flush();
            return $this->redirect($this->generateUrl('news_edit', array('id' => $id)));
        }

        return $this->render('@App/Noticias/edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    public function deleteAction(Request $request, $id) {
        $form = $this->createDeleteForm($id);
        $form -> handleRequest($request);

        if($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:Noticia')->find($id);


            if(!$entity) {
                $this->errorHandling();
            }
            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('news_homepage'));
    }


    ///Forms section
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

    private function createEditionForm(Noticia $entity) {
        $form = $this->createForm(
            new NoticiaType($this),
            $entity,
            array(
                'action' => $this->generateUrl('news_update', array('id' => $entity->getId())),
                'method' => 'PUT',
            )
        );
        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    private function createDeleteForm($id) {
        $form = $this -> createFormBuilder()
                      -> setAction($this->generateUrl('news_delete', array('id' => $id)))
                      -> setMethod('DELETE')
                      -> add('submit', 'submit', array('label' => 'Delete'));

        return $form->getForm();
    }

    private function errorHandling(){
        return $this->render('AppBundle:Default:404.html.twig');
    }

} 