<?php

namespace FJL\ChargifyBundle\Model;

class BankAccount
{
    protected $bankAccount;
    protected $bankAccountType;
    protected $bankName;
    protected $billingAddress;
    protected $billingAddress2;
    protected $billingCity;
    protected $billingState;
    protected $billingZip;
    protected $billingCountry;
    protected $currentVault;
    protected $customerId;
    protected $customerVaultToken;
    protected $firstName;
    protected $lastName;
    protected $id;
    protected $maskedBankAccountNumber;
    protected $maskedBankRoutingNumber;
    protected $paymentType;
    protected $vaultToken;

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
     * @param mixed $bankAccountType
     */
    public function setBankAccountType($bankAccountType)
    {
        $this->bankAccountType = $bankAccountType;
    }

    /**
     * @return mixed
     */
    public function getBankAccountType()
    {
        return $this->bankAccountType;
    }

    /**
     * @param mixed $bankName
     */
    public function setBankName($bankName)
    {
        $this->bankName = $bankName;
    }

    /**
     * @return mixed
     */
    public function getBankName()
    {
        return $this->bankName;
    }

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
     * @param mixed $maskedBankAccountNumber
     */
    public function setMaskedBankAccountNumber($maskedBankAccountNumber)
    {
        $this->maskedBankAccountNumber = $maskedBankAccountNumber;
    }

    /**
     * @return mixed
     */
    public function getMaskedBankAccountNumber()
    {
        return $this->maskedBankAccountNumber;
    }

    /**
     * @param mixed $maskedBankRoutingNumber
     */
    public function setMaskedBankRoutingNumber($maskedBankRoutingNumber)
    {
        $this->maskedBankRoutingNumber = $maskedBankRoutingNumber;
    }

    /**
     * @return mixed
     */
    public function getMaskedBankRoutingNumber()
    {
        return $this->maskedBankRoutingNumber;
    }

    /**
     * @param mixed $paymentType
     */
    public function setPaymentType($paymentType)
    {
        $this->paymentType = $paymentType;
    }

    /**
     * @return mixed
     */
    public function getPaymentType()
    {
        return $this->paymentType;
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