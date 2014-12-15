<?php

namespace MG\RICMS\RICMSBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TituloType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titulo')
            ->add('conteudo')
//            ->add('createdBy')
//            ->add('createdAt')
//            ->add('updatedBy')
//            ->add('updatedAt')
//            ->add('idCapitulo')
//            ->add(  'capitulos', 'entity', array(
//                    'class' => 'RICMSBundle:Capitulo',
//                    'property' => 'id',
//            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MG\RICMS\RICMSBundle\Entity\Titulo'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'mg_ricms_ricmsbundle_titulo';
    }
}
