<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EventType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('vehicle', 'entity', array(
                'class'         => 'AppBundle:Vehicle',
                'property'      => 'name',
                'expanded'      => false,
                'multiple'      => false,
                'choices_as_values' => true,
                'empty_value'   => 'Wybierz pojazd',
            ))
            ->add('date', DateType::class, array(
                'widget' => 'single_text',
                ))
            ->add('eventElement', CollectionType::class, array(
                'entry_type'    => EventElementType::class,
                'entry_options' => array('label' => false),
                'allow_add'     => true,
                'by_reference'  => false,
                'allow_delete'  => true,
                ))
            ->add('save', SubmitType::class)
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Event'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_event';
    }


}
