<?php

namespace FJL\ChargifyBundle\Model;

class Product
{
    protected $id;
    protected $priceInCents;
    protected $name;
    protected $handle;
    protected $description;
    protected $productFamily;
    protected $productFamilyId;
    protected $accountingCode;
    protected $intervalUnit;
    protected $interval;
    protected $initialChargeInCents;
    protected $trialPriceInCents;
    protected $trialInterval;
    protected $trialIntervalUnit;
    protected $expirationInterval;
    protected $expirationIntervalUnit;
    protected $returnUrl;
    protected $returnParams;
    protected $requireCreditCard;
    protected $requireBillingAddress;
    protected $requestBillingAddress;
    protected $taxable;
    protected $trialType;
    protected $requestCreditCard;
    protected $createdAt;
    protected $updatedAt;
    protected $archivedAt;

    public function __construct()
    {
        $this->productFamily = new ProductFamily();
    }

    public function populate($data)
    {
        foreach ($data as $property => $value) {
            if(!in_array($property, array('product_family'))) {
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
            'id'                       => $this->id,
            'price_in_cents'           => $this->priceInCents,
            'name'                     => $this->name,
            'handle'                   => $this->handle,
            'description'              => $this->description,
            'product_family'           => $this->productFamily->getArrayCopy(),
            'product_family_id'        => $this->productFamilyId,
            'accounting_code'          => $this->accountingCode,
            'interval_unit'            => $this->intervalUnit,
            'interval'                 => $this->interval,
            'initial_charge_in_cents'  => $this->initialChargeInCents,
            'trial_price_in_cents'     => $this->trialPriceInCents,
            'trial_interval'           => $this->trialInterval,
            'trial_interval_unit'      => $this->trialIntervalUnit,
            'expiration_interval'      => $this->expirationInterval,
            'expiration_interval_unit' => $this->expirationIntervalUnit,
            'return_url'               => $this->returnUrl,
            'return_params'            => $this->returnParams,
            'require_credit_card'      => $this->requireCreditCard,
            'require_billing_address'  => $this->requireBillingAddress,
            'request_billing_address'  => $this->requestBillingAddress,
            'taxable'                  => $this->taxable,
            'request_credit_card'      => $this->requestCreditCard,
            'created_at'               => $this->createdAt,
            'updated_at'               => $this->updatedAt,
            'archived_at'              => $this->archivedAt,
        );
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
     * @param mixed $accountingCode
     */
    public function setAccountingCode($accountingCode)
    {
        $this->accountingCode = $accountingCode;
    }

    /**
     * @return mixed
     */
    public function getAccountingCode()
    {
        return $this->accountingCode;
    }

    /**
     * @param mixed $archivedAt
     */
    public function setArchivedAt($archivedAt)
    {
        $this->archivedAt = $archivedAt;
    }

    /**
     * @return mixed
     */
    public function getArchivedAt()
    {
        return $this->archivedAt;
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
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $expirationInterval
     */
    public function setExpirationInterval($expirationInterval)
    {
        $this->expirationInterval = $expirationInterval;
    }

    /**
     * @return mixed
     */
    public function getExpirationInterval()
    {
        return $this->expirationInterval;
    }

    /**
     * @param mixed $expirationIntervalUnit
     */
    public function setExpirationIntervalUnit($expirationIntervalUnit)
    {
        $this->expirationIntervalUnit = $expirationIntervalUnit;
    }

    /**
     * @return mixed
     */
    public function getExpirationIntervalUnit()
    {
        return $this->expirationIntervalUnit;
    }

    /**
     * @param mixed $handle
     */
    public function setHandle($handle)
    {
        $this->handle = $handle;
    }

    /**
     * @return mixed
     */
    public function getHandle()
    {
        return $this->handle;
    }

    /**
     * @param mixed $initialChargeInCents
     */
    public function setInitialChargeInCents($initialChargeInCents)
    {
        $this->initialChargeInCents = $initialChargeInCents;
    }

    /**
     * @return mixed
     */
    public function getInitialChargeInCents()
    {
        return $this->initialChargeInCents;
    }

    /**
     * @param mixed $interval
     */
    public function setInterval($interval)
    {
        $this->interval = $interval;
    }

    /**
     * @return mixed
     */
    public function getInterval()
    {
        return $this->interval;
    }

    /**
     * @param mixed $intervalUnit
     */
    public function setIntervalUnit($intervalUnit)
    {
        $this->intervalUnit = $intervalUnit;
    }

    /**
     * @return mixed
     */
    public function getIntervalUnit()
    {
        return $this->intervalUnit;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $priceInCents
     */
    public function setPriceInCents($priceInCents)
    {
        $this->priceInCents = $priceInCents;
    }

    /**
     * @return mixed
     */
    public function getPriceInCents()
    {
        return $this->priceInCents;
    }

    /**
     * @param mixed $productFamily
     */
    public function setProductFamily($productFamily)
    {
        $this->productFamily = $productFamily;
    }

    /**
     * @return mixed
     */
    public function getProductFamily()
    {
        return $this->productFamily;
    }

    /**
     * @param mixed $productFamilyId
     */
    public function setProductFamilyId($productFamilyId)
    {
        $this->productFamilyId = $productFamilyId;
    }

    /**
     * @return mixed
     */
    public function getProductFamilyId()
    {
        return $this->productFamilyId;
    }

    /**
     * @param mixed $requestBillingAddress
     */
    public function setRequestBillingAddress($requestBillingAddress)
    {
        $this->requestBillingAddress = $requestBillingAddress;
    }

    /**
     * @return mixed
     */
    public function getRequestBillingAddress()
    {
        return $this->requestBillingAddress;
    }

    /**
     * @param mixed $requestCreditCard
     */
    public function setRequestCreditCard($requestCreditCard)
    {
        $this->requestCreditCard = $requestCreditCard;
    }

    /**
     * @return mixed
     */
    public function getRequestCreditCard()
    {
        return $this->requestCreditCard;
    }

    /**
     * @param mixed $requireBillingAddress
     */
    public function setRequireBillingAddress($requireBillingAddress)
    {
        $this->requireBillingAddress = $requireBillingAddress;
    }

    /**
     * @return mixed
     */
    public function getRequireBillingAddress()
    {
        return $this->requireBillingAddress;
    }

    /**
     * @param mixed $requireCreditCard
     */
    public function setRequireCreditCard($requireCreditCard)
    {
        $this->requireCreditCard = $requireCreditCard;
    }

    /**
     * @return mixed
     */
    public function getRequireCreditCard()
    {
        return $this->requireCreditCard;
    }

    /**
     * @param mixed $returnParams
     */
    public function setReturnParams($returnParams)
    {
        $this->returnParams = $returnParams;
    }

    /**
     * @return mixed
     */
    public function getReturnParams()
    {
        return $this->returnParams;
    }

    /**
     * @param mixed $returnUrl
     */
    public function setReturnUrl($returnUrl)
    {
        $this->returnUrl = $returnUrl;
    }

    /**
     * @return mixed
     */
    public function getReturnUrl()
    {
        return $this->returnUrl;
    }

    /**
     * @param mixed $taxable
     */
    public function setTaxable($taxable)
    {
        $this->taxable = $taxable;
    }

    /**
     * @return mixed
     */
    public function getTaxable()
    {
        return $this->taxable;
    }

    /**
     * @param mixed $trialInterval
     */
    public function setTrialInterval($trialInterval)
    {
        $this->trialInterval = $trialInterval;
    }

    /**
     * @return mixed
     */
    public function getTrialInterval()
    {
        return $this->trialInterval;
    }

    /**
     * @param mixed $trialIntervalUnit
     */
    public function setTrialIntervalUnit($trialIntervalUnit)
    {
        $this->trialIntervalUnit = $trialIntervalUnit;
    }

    /**
     * @return mixed
     */
    public function getTrialIntervalUnit()
    {
        return $this->trialIntervalUnit;
    }

    /**
     * @param mixed $trialPriceInCents
     */
    public function setTrialPriceInCents($trialPriceInCents)
    {
        $this->trialPriceInCents = $trialPriceInCents;
    }

    /**
     * @return mixed
     */
    public function getTrialPriceInCents()
    {
        return $this->trialPriceInCents;
    }

    /**
     * @param mixed $trialType
     */
    public function setTrialType($trialType)
    {
        $this->trialType = $trialType;
    }

    /**
     * @return mixed
     */
    public function getTrialType()
    {
        return $this->trialType;
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