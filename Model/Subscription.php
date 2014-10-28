<?php

namespace FJL\ChargifyBundle\Model;

class Subscription
{
    //Input Attributes
    protected $productHandle;
    protected $productId;
    protected $customerId;
    protected $customerReference;
    protected $paymentProfileId;
    protected $nextBillingAt;
    protected $vatNumber;
    protected $agreementTerms;
    protected $productChangeDelayed;

    //Output Attributes
    protected $activatedAt;
    protected $balanceInCents;
    protected $cancelAtEndOfPeriod;
    protected $canceledAt;
    protected $createdAt;
    protected $currentPeriodStartedAt;
    protected $currentPeriodEndsAt;
    protected $delayedCancelAt;
    protected $expiresAt;
    protected $id;
    protected $nextAssessmentAt;
    protected $previousState;
    protected $productPriceInCents;
    protected $productVersionNumber;
    protected $signupPaymentId;
    protected $signupRevenue;
    protected $state;
    protected $totalRevenueInCents;
    protected $trialStartedAt;
    protected $trialEndedAt;
    protected $updatedAt;

    //Input/Output Attributes
    protected $paymentCollectionMethod;
    protected $cancellationMessage;
    protected $couponCode;
    protected $paymentProfile;
    protected $customer;
    protected $product;
}