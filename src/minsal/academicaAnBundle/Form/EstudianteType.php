<?php

namespace minsal\academicaAnBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EstudianteType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('carnet')
            ->add('nombres')
            ->add('apellidos')
            ->add('idAsignaturaInscrita')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'minsal\academicaAnBundle\Entity\Estudiante'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'minsal_academicaanbundle_estudiante';
    }
}
