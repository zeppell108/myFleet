<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EventElementType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('event', 'entity', array(
                'class'         => 'AppBundle:Event',
                'property'      => 'id',
            ))
            ->add('serviceType', 'entity', array(
                'class'         => 'AppBundle:ServiceType',
                'property'      => 'name',
                'expanded'      => false,
                'multiple'      => false,
                'choices_as_values' => true,
                'empty_value'   => 'Rodzaj zdarzenia',
            ))
            ->add('name')
            ->add('cost', IntegerType::class)
            ->add('kmPeriod')
            ->add('monthPeriod');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\EventElement'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_eventelement';
    }


}
