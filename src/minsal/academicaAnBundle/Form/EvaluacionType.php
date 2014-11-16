<?php

namespace minsal\academicaAnBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EvaluacionType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
         $builder
            ->add('porcentaje','number',
                    array(  'invalid_message'=>'Debe ser un número',
                            'label'=>'Digite el porcentaje'))
            ->add('nota','number',
                    array(  'invalid_message'=>'Debe ser un número',
                            'label'=>'Digite la nota'))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'minsal\academicaAnBundle\Entity\Evaluacion'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'minsal_academicaanbundle_evaluacion';
    }
}
