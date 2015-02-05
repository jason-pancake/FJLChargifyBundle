<?php

namespace FJL\ChargifyBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SubscriptionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('productHandle', 'text', array(
                'label' => 'Product Handle',
            ))
            ->add('productId', 'text', array(
                'label' => 'Product Id',
            ))
            ->add('customerId', 'text', array(
                'label' => 'Customer Id',
            ))
            ->add('customerReference', 'text', array(
                'label' => 'Customer Reference',
            ))
            ->add('paymentProfileId', 'text', array(
                'label' => 'Payment Profile Id',
            ))
            ->add('cancellationMessage', 'text', array(
                'label' => 'Cancellation message',
            ))
            ->add('nextBillingAt', 'text', array(
                'label' => 'Next Billing At',
            ))
            ->add('vatNumber', 'text', array(
                'label' => 'VAT Number',
            ))
            ->add('couponCode', 'text', array(
                'label' => 'Coupon Code',
            ))
            ->add('paymentCollectionMethod', 'text', array(
                'label' => 'Payment Collection Method',
            ))
            ->add('agreementTerms', 'text', array(
                'label' => 'Agreement Terms',
            ))
            ->add('productChangeDelayed', 'text', array(
                'label' => 'Product Change Delayed',
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FJL\ChargifyBundle\Model\Subscription',
        ));
    }

    public function getName()
    {
        return 'subscription';
    }
}