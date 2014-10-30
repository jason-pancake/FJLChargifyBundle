<?php

namespace FJL\ChargifyBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CustomerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName', 'text', array(
                'label' => 'First Name',
            ))
            ->add('lastName', 'text', array(
                'label' => 'Last Name'
            ))
            ->add('email', 'text', array(
                'label' => 'Email'
            ))
            ->add('organization', 'text', array(
                'label' => 'Organization'
            ))
            ->add('reference', 'text', array(
                'label' => 'Reference'
            ))
            ->add('vatNumber', 'text', array(
                'label' => 'VAT Number'
            ))
            ->add('address', 'text', array(
                'label' => 'Address Line 1'
            ))
            ->add('address2', 'text', array(
                'label' => 'Address Line 2'
            ))
            ->add('city', 'text', array(
                'label' => 'City'
            ))
            ->add('state', 'text', array(
                'label' => 'State'
            ))
            ->add('zip', 'text', array(
                'label' => 'Postal Code'
            ))
            ->add('country', 'text', array(
                'label' => 'Country'
            ))
            ->add('phone', 'text', array(
                'label' => 'Phone'
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FJL\ChargifyBundle\Model\Customer',
        ));
    }

    public function getName()
    {
        return 'customer';
    }
}