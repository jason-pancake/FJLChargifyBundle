<?php

namespace FJL\ChargifyBundle\Model;

class CreditCard
{
    //Input Attributes
    protected $id;
    protected $customerId;
    protected $firstName;
    protected $lastName;
    protected $fullNumber;
    protected $expirationMonth;
    protected $expirationYear;
    protected $cvv;
    protected $billingAddress;
    protected $billingAddress2;
    protected $billingCity;
    protected $billingState;
    protected $billingZip;
    protected $billingCountry;
    protected $vaultToken;
    protected $customerVaultToken;
    protected $currentVault;
    protected $lastFour;
    protected $cardType;
    protected $maskedCardNumber;

    /**
     * @param mixed $billingAddress
     */
    public function setBillingAddress($billingAddress)
    {
        $this->billingAddress = $billingAddress;
    }

    /**
     * @return mixed
     */
    public function getBillingAddress()
    {
        return $this->billingAddress;
    }

    /**
     * @param mixed $billingAddress2
     */
    public function setBillingAddress2($billingAddress2)
    {
        $this->billingAddress2 = $billingAddress2;
    }

    /**
     * @return mixed
     */
    public function getBillingAddress2()
    {
        return $this->billingAddress2;
    }

    /**
     * @param mixed $billingCity
     */
    public function setBillingCity($billingCity)
    {
        $this->billingCity = $billingCity;
    }

    /**
     * @return mixed
     */
    public function getBillingCity()
    {
        return $this->billingCity;
    }

    /**
     * @param mixed $billingCountry
     */
    public function setBillingCountry($billingCountry)
    {
        $this->billingCountry = $billingCountry;
    }

    /**
     * @return mixed
     */
    public function getBillingCountry()
    {
        return $this->billingCountry;
    }

    /**
     * @param mixed $billingState
     */
    public function setBillingState($billingState)
    {
        $this->billingState = $billingState;
    }

    /**
     * @return mixed
     */
    public function getBillingState()
    {
        return $this->billingState;
    }

    /**
     * @param mixed $billingZip
     */
    public function setBillingZip($billingZip)
    {
        $this->billingZip = $billingZip;
    }

    /**
     * @return mixed
     */
    public function getBillingZip()
    {
        return $this->billingZip;
    }

    /**
     * @param mixed $cardType
     */
    public function setCardType($cardType)
    {
        $this->cardType = $cardType;
    }

    /**
     * @return mixed
     */
    public function getCardType()
    {
        return $this->cardType;
    }

    /**
     * @param mixed $currentVault
     */
    public function setCurrentVault($currentVault)
    {
        $this->currentVault = $currentVault;
    }

    /**
     * @return mixed
     */
    public function getCurrentVault()
    {
        return $this->currentVault;
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
     * @param mixed $customerVaultToken
     */
    public function setCustomerVaultToken($customerVaultToken)
    {
        $this->customerVaultToken = $customerVaultToken;
    }

    /**
     * @return mixed
     */
    public function getCustomerVaultToken()
    {
        return $this->customerVaultToken;
    }

    /**
     * @param mixed $cvv
     */
    public function setCvv($cvv)
    {
        $this->cvv = $cvv;
    }

    /**
     * @return mixed
     */
    public function getCvv()
    {
        return $this->cvv;
    }

    /**
     * @param mixed $expirationMonth
     */
    public function setExpirationMonth($expirationMonth)
    {
        $this->expirationMonth = $expirationMonth;
    }

    /**
     * @return mixed
     */
    public function getExpirationMonth()
    {
        return $this->expirationMonth;
    }

    /**
     * @param mixed $expirationYear
     */
    public function setExpirationYear($expirationYear)
    {
        $this->expirationYear = $expirationYear;
    }

    /**
     * @return mixed
     */
    public function getExpirationYear()
    {
        return $this->expirationYear;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $fullNumber
     */
    public function setFullNumber($fullNumber)
    {
        $this->fullNumber = $fullNumber;
    }

    /**
     * @return mixed
     */
    public function getFullNumber()
    {
        return $this->fullNumber;
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
     * @param mixed $lastFour
     */
    public function setLastFour($lastFour)
    {
        $this->lastFour = $lastFour;
    }

    /**
     * @return mixed
     */
    public function getLastFour()
    {
        return $this->lastFour;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $maskedCardNumber
     */
    public function setMaskedCardNumber($maskedCardNumber)
    {
        $this->maskedCardNumber = $maskedCardNumber;
    }

    /**
     * @return mixed
     */
    public function getMaskedCardNumber()
    {
        return $this->maskedCardNumber;
    }

    /**
     * @param mixed $vaultToken
     */
    public function setVaultToken($vaultToken)
    {
        $this->vaultToken = $vaultToken;
    }

    /**
     * @return mixed
     */
    public function getVaultToken()
    {
        return $this->vaultToken;
    }


}