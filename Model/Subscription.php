<?php

namespace FJL\ChargifyBundle\Model;

class Subscription
{
    protected $productHandle;
    protected $productId;
    protected $customerId;
    protected $customerReference;
    protected $paymentProfileId;
    protected $nextBillingAt;
    protected $vatNumber;
    protected $agreementTerms;
    protected $productChangeDelayed;
    protected $customerAttributes;
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
    protected $paymentCollectionMethod;
    protected $cancellationMessage;
    protected $couponCode;
    protected $paymentProfile;
    protected $customer;
    protected $product;
    protected $creditCard;
    protected $bankAccount;
    protected $creditCardAttributes;
    protected $bankAccountAttributes;

    public function __construct()
    {
        $this->customer              = new Customer();
        $this->customerAttributes    = new CustomerAttributes();
        $this->creditCard            = new CreditCard();
        $this->bankAccount           = new BankAccount();
        $this->product               = new Product();
        $this->creditCardAttributes  = new CreditCardAttributes();
        $this->bankAccountAttributes = new BankAccountAttributes();
    }

    public function populate($data)
    {
        foreach ($data as $property => $value) {
            if(!in_array($property, array('customer', 'product', 'credit_card', 'bank_account'))) {
                $method = 'set' . str_replace(' ','',ucwords(str_replace('_',' ',$property)));
                if (is_callable(array($this, $method))) {
                    $this->$method($value);
                }
            }
            else {
                $class = 'FJL\ChargifyBundle\Model\\'.str_replace(' ','',ucwords(str_replace('_',' ',$property)));
                $object = new $class();
                $object->populate($value);

                $method = 'set' . str_replace(' ','',ucwords(str_replace('_',' ',$property)));
                if (is_callable(array($this, $method))) {
                    $this->$method($object);
                }
            }
        }
    }

    public function getArrayCopy()
    {
        return array(
            'subscription' => array(
                'product_handle'         => $this->productHandle,
                'product_id'             => $this->productId,
                'customer_id'            => $this->customerId,
                'customer_reference'     => $this->customerReference,
                'payment_profile_id'     => $this->paymentProfileId,
                'next_billing_at'        => $this->nextBillingAt,
                'vat_number'             => $this->vatNumber,
                'agreement_terms'        => $this->agreementTerms,
                'product_change_delayed' => $this->productChangeDelayed,
                'customer_attributes'    => $this->customerAttributes->getArrayCopy(),
                'activated_at'           => $this->activatedAt,
                'balance_in_cents'       => $this->balanceInCents,
                'cancel_at_end_of_period' => $this->cancelAtEndOfPeriod,
                'canceled_at'             => $this->canceledAt,
                'created_at'              => $this->createdAt,
                'current_period_started_at' => $this->currentPeriodStartedAt,
                'current_period_ends_at'    => $this->currentPeriodEndsAt,
                'delayed_cancel_at'         => $this->delayedCancelAt,
                'expires_at'                => $this->expiresAt,
                'id'                        => $this->id,
                'next_assessment_at'        => $this->nextAssessmentAt,
                'previous_state'            => $this->previousState,
                'product_price_in_cents'    => $this->productPriceInCents,
                'product_version_number'    => $this->productVersionNumber,
                'signup_payment_id'         => $this->signupPaymentId,
                'signup_revenue'            => $this->signupRevenue,
                'state'                     => $this->state,
                'total_revenue_in_cents'    => $this->totalRevenueInCents,
                'trial_started_at'          => $this->trialStartedAt,
                'trial_ended_at'            => $this->trialEndedAt,
                'updated_at'                => $this->updatedAt,
                'payment_collection_method' => $this->paymentCollectionMethod,
                'cancellation_message'      => $this->cancellationMessage,
                'coupon_code'               => $this->couponCode,
                'payment_profile'           => $this->paymentProfile,
                'customer'                  => $this->customer->getArrayCopy(),
                'credit_card_attributes'    => $this->creditCardAttributes->getArrayCopy(),
                'credit_card'               => $this->creditCard->getArrayCopy(),
                'product'                   => $this->product->getArrayCopy(),
                'bank_account'              => $this->bankAccount->getArrayCopy(),
                'bank_account_attributes'   => $this->bankAccountAttributes->getArrayCopy(),
            ),
        );
    }

    /**
     * @param mixed $bankAccountAttributes
     */
    public function setBankAccountAttributes($bankAccountAttributes)
    {
        $this->bankAccountAttributes = $bankAccountAttributes;
    }

    /**
     * @return mixed
     */
    public function getBankAccountAttributes()
    {
        return $this->bankAccountAttributes;
    }

    /**
     * @param mixed $creditCardAttributes
     */
    public function setCreditCardAttributes($creditCardAttributes)
    {
        $this->creditCardAttributes = $creditCardAttributes;
    }

    /**
     * @return mixed
     */
    public function getCreditCardAttributes()
    {
        return $this->creditCardAttributes;
    }

    /**
     * @param mixed $customerAttributes
     */
    public function setCustomerAttributes($customerAttributes)
    {
        $this->customerAttributes = $customerAttributes;
    }

    /**
     * @return mixed
     */
    public function getCustomerAttributes()
    {
        return $this->customerAttributes;
    }

    /**
     * @param mixed $bankAccount
     */
    public function setBankAccount($bankAccount)
    {
        $this->bankAccount = $bankAccount;
    }

    /**
     * @return mixed
     */
    public function getBankAccount()
    {
        return $this->bankAccount;
    }

    /**
     * @param mixed $creditCard
     */
    public function setCreditCard($creditCard)
    {
        $this->creditCard = $creditCard;
    }

    /**
     * @return mixed
     */
    public function getCreditCard()
    {
        return $this->creditCard;
    }

    /**
     * @param mixed $productHandle
     */
    public function setProductHandle($productHandle)
    {
        $this->productHandle = $productHandle;
    }

    /**
     * @return mixed
     */
    public function getProductHandle()
    {
        return $this->productHandle;
    }

    /**
     * @param mixed $agreementTerms
     */
    public function setAgreementTerms($agreementTerms)
    {
        $this->agreementTerms = $agreementTerms;
    }

    /**
     * @return mixed
     */
    public function getAgreementTerms()
    {
        return $this->agreementTerms;
    }

    /**
     * @param mixed $customerId
     */
    public function setCustomerId($customerId)
    {
        $this->customerId = $customerId;
    }

    /**
     * @return mixed
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * @param mixed $customerReference
     */
    public function setCustomerReference($customerReference)
    {
        $this->customerReference = $customerReference;
    }

    /**
     * @return mixed
     */
    public function getCustomerReference()
    {
        return $this->customerReference;
    }

    /**
     * @param mixed $nextBillingAt
     */
    public function setNextBillingAt($nextBillingAt)
    {
        $this->nextBillingAt = $nextBillingAt;
    }

    /**
     * @return mixed
     */
    public function getNextBillingAt()
    {
        return $this->nextBillingAt;
    }

    /**
     * @param mixed $paymentProfileId
     */
    public function setPaymentProfileId($paymentProfileId)
    {
        $this->paymentProfileId = $paymentProfileId;
    }

    /**
     * @return mixed
     */
    public function getPaymentProfileId()
    {
        return $this->paymentProfileId;
    }

    /**
     * @param mixed $productChangeDelayed
     */
    public function setProductChangeDelayed($productChangeDelayed)
    {
        $this->productChangeDelayed = $productChangeDelayed;
    }

    /**
     * @return mixed
     */
    public function getProductChangeDelayed()
    {
        return $this->productChangeDelayed;
    }

    /**
     * @param mixed $productId
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;
    }

    /**
     * @return mixed
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @param mixed $vatNumber
     */
    public function setVatNumber($vatNumber)
    {
        $this->vatNumber = $vatNumber;
    }

    /**
     * @return mixed
     */
    public function getVatNumber()
    {
        return $this->vatNumber;
    }

    /**
     * @param mixed $activatedAt
     */
    public function setActivatedAt($activatedAt)
    {
        $this->activatedAt = new \DateTime($activatedAt);
    }

    /**
     * @return DateTime
     */
    public function getActivatedAt()
    {
        return $this->activatedAt;
    }

    /**
     * @param mixed $balanceInCents
     */
    public function setBalanceInCents($balanceInCents)
    {
        $this->balanceInCents = $balanceInCents;
    }

    /**
     * @return mixed
     */
    public function getBalanceInCents()
    {
        return $this->balanceInCents;
    }

    /**
     * @param mixed $cancelAtEndOfPeriod
     */
    public function setCancelAtEndOfPeriod($cancelAtEndOfPeriod)
    {
        $this->cancelAtEndOfPeriod = $cancelAtEndOfPeriod;
    }

    /**
     * @return mixed
     */
    public function getCancelAtEndOfPeriod()
    {
        return $this->cancelAtEndOfPeriod;
    }

    /**
     * @param mixed $canceledAt
     */
    public function setCanceledAt($canceledAt)
    {
        $this->canceledAt = $canceledAt;
    }

    /**
     * @return mixed
     */
    public function getCanceledAt()
    {
        return $this->canceledAt;
    }

    /**
     * @param mixed $cancellationMessage
     */
    public function setCancellationMessage($cancellationMessage)
    {
        $this->cancellationMessage = $cancellationMessage;
    }

    /**
     * @return mixed
     */
    public function getCancellationMessage()
    {
        return $this->cancellationMessage;
    }

    /**
     * @param mixed $couponCode
     */
    public function setCouponCode($couponCode)
    {
        $this->couponCode = $couponCode;
    }

    /**
     * @return mixed
     */
    public function getCouponCode()
    {
        return $this->couponCode;
    }

    /**
     * @param mixed $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $currentPeriodEndsAt
     */
    public function setCurrentPeriodEndsAt($currentPeriodEndsAt)
    {
        $this->currentPeriodEndsAt = $currentPeriodEndsAt;
    }

    /**
     * @return mixed
     */
    public function getCurrentPeriodEndsAt()
    {
        return $this->currentPeriodEndsAt;
    }

    /**
     * @param mixed $currentPeriodStartedAt
     */
    public function setCurrentPeriodStartedAt($currentPeriodStartedAt)
    {
        $this->currentPeriodStartedAt = $currentPeriodStartedAt;
    }

    /**
     * @return mixed
     */
    public function getCurrentPeriodStartedAt()
    {
        return $this->currentPeriodStartedAt;
    }

    /**
     * @param mixed $customer
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;
    }

    /**
     * @return Customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @param mixed $delayedCancelAt
     */
    public function setDelayedCancelAt($delayedCancelAt)
    {
        $this->delayedCancelAt = $delayedCancelAt;
    }

    /**
     * @return mixed
     */
    public function getDelayedCancelAt()
    {
        return $this->delayedCancelAt;
    }

    /**
     * @param mixed $expiresAt
     */
    public function setExpiresAt($expiresAt)
    {
        $this->expiresAt = $expiresAt;
    }

    /**
     * @return mixed
     */
    public function getExpiresAt()
    {
        return $this->expiresAt;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $nextAssessmentAt
     */
    public function setNextAssessmentAt($nextAssessmentAt)
    {
        $this->nextAssessmentAt = $nextAssessmentAt;
    }

    /**
     * @return mixed
     */
    public function getNextAssessmentAt()
    {
        return $this->nextAssessmentAt;
    }

    /**
     * @param mixed $paymentCollectionMethod
     */
    public function setPaymentCollectionMethod($paymentCollectionMethod)
    {
        $this->paymentCollectionMethod = $paymentCollectionMethod;
    }

    /**
     * @return mixed
     */
    public function getPaymentCollectionMethod()
    {
        return $this->paymentCollectionMethod;
    }

    /**
     * @param mixed $paymentProfile
     */
    public function setPaymentProfile($paymentProfile)
    {
        $this->paymentProfile = $paymentProfile;
    }

    /**
     * @return mixed
     */
    public function getPaymentProfile()
    {
        return $this->paymentProfile;
    }

    /**
     * @param mixed $previousState
     */
    public function setPreviousState($previousState)
    {
        $this->previousState = $previousState;
    }

    /**
     * @return mixed
     */
    public function getPreviousState()
    {
        return $this->previousState;
    }

    /**
     * @param mixed $product
     */
    public function setProduct($product)
    {
        $this->product = $product;
    }

    /**
     * @return mixed
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @param mixed $productPriceInCents
     */
    public function setProductPriceInCents($productPriceInCents)
    {
        $this->productPriceInCents = $productPriceInCents;
    }

    /**
     * @return mixed
     */
    public function getProductPriceInCents()
    {
        return $this->productPriceInCents;
    }

    /**
     * @param mixed $productVersionNumber
     */
    public function setProductVersionNumber($productVersionNumber)
    {
        $this->productVersionNumber = $productVersionNumber;
    }

    /**
     * @return mixed
     */
    public function getProductVersionNumber()
    {
        return $this->productVersionNumber;
    }

    /**
     * @param mixed $signupPaymentId
     */
    public function setSignupPaymentId($signupPaymentId)
    {
        $this->signupPaymentId = $signupPaymentId;
    }

    /**
     * @return mixed
     */
    public function getSignupPaymentId()
    {
        return $this->signupPaymentId;
    }

    /**
     * @param mixed $signupRevenue
     */
    public function setSignupRevenue($signupRevenue)
    {
        $this->signupRevenue = $signupRevenue;
    }

    /**
     * @return mixed
     */
    public function getSignupRevenue()
    {
        return $this->signupRevenue;
    }

    /**
     * @param mixed $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param mixed $totalRevenueInCents
     */
    public function setTotalRevenueInCents($totalRevenueInCents)
    {
        $this->totalRevenueInCents = $totalRevenueInCents;
    }

    /**
     * @return mixed
     */
    public function getTotalRevenueInCents()
    {
        return $this->totalRevenueInCents;
    }

    /**
     * @param mixed $trialEndedAt
     */
    public function setTrialEndedAt($trialEndedAt)
    {
        $this->trialEndedAt = $trialEndedAt;
    }

    /**
     * @return mixed
     */
    public function getTrialEndedAt()
    {
        return $this->trialEndedAt;
    }

    /**
     * @param mixed $trialStartedAt
     */
    public function setTrialStartedAt($trialStartedAt)
    {
        $this->trialStartedAt = $trialStartedAt;
    }

    /**
     * @return mixed
     */
    public function getTrialStartedAt()
    {
        return $this->trialStartedAt;
    }

    /**
     * @param mixed $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
}