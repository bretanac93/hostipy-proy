<?php
/**
 * Created by PhpStorm.
 * User: cesar
 * Date: 24/02/15
 * Time: 8:21
 */

namespace Hospity\AppBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NoticiaType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            -> add('titulo')
            -> add('contenido', 'textarea');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver -> setDefaults(array(
            'data_class' => 'Hospity\AppBundle\Entity\Noticia'
        ));
    }

    public function getName() {
        return 'hospity_appbundle_noticia';
    }
}