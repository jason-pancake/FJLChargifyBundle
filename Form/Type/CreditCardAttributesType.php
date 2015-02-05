<?php

namespace FJL\ChargifyBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CreditCardAttributesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $years = array();
        for($i=date('Y');$i<date('Y')+10;$i++) {
            $years[$i] = $i;
        }

        $builder
            ->add('firstName', 'text', array(
                'label' => 'First Name',
            ))
            ->add('lastName', 'text', array(
                'label' => 'Last Name',
            ))
            ->add('billingAddress', 'text', array(
                'label' => 'Billing Address'
            ))
            ->add('billingAddress2', 'text', array(
                'label' => 'Billing Address 2'
            ))
            ->add('billingCity', 'text', array(
                'label' => 'Billing City'
            ))
            ->add('billingState', 'text', array(
                'label' => 'Billing State'
            ))
            ->add('billingZip', 'text', array(
                'label' => 'Billing Zip Code',
            ))
            ->add('billingCountry', 'text', array(
                'label' => 'Billing Country',
            ))
            ->add('fullNumber', 'text', array(
                'label' => 'Credit Card Number',
            ))
            ->add('cvv', 'text', array(
                'label' => 'CVV2',
            ))
            ->add('expirationMonth', 'choice', array(
                'label' => 'Expiration Month',
                'choices' => array(
                    '01' => '01 - January',
                    '02' => '02 - February',
                    '03' => '03 - March',
                    '04' => '04 - April',
                    '05' => '05 - May',
                    '06' => '06 - June',
                    '07' => '07 - July',
                    '08' => '08 - August',
                    '09' => '09 - September',
                    '10' => '10 - October',
                    '11' => '11 - November',
                    '12' => '12 - December',
                ),
            ))
            ->add('expirationYear', 'choice', array(
                'label' => 'Expiration Year',
                'choices' => $years
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FJL\ChargifyBundle\Model\CreditCardAttributes',
        ));
    }

    public function getName()
    {
        return 'credit_card_attributes';
    }
}