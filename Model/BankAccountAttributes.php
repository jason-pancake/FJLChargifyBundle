<?php

namespace FJL\ChargifyBundle\Model;

class BankAccountAttributes
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
    protected $customerVaultToken;
    protected $firstName;
    protected $lastName;
    protected $paymentType;
    protected $vaultToken;
    protected $bankRoutingNumber;
    protected $bankAccountNumber;
    protected $bankAccountHolderType;

    public function populate($data)
    {
        foreach ($data as $property => $value) {
            $method = 'set' . str_replace(' ','',ucwords(str_replace('_',' ',$property)));
            if (is_callable(array($this, $method))) {
                $this->$method($value);
            }
        }
    }

    public function getArrayCopy()
    {
        return array(
            'bank_account'               => $this->bankAccount,
            'bank_account_type'          => $this->bankAccountType,
            'bank_name'                  => $this->bankName,
            'billing_address'            => $this->billingAddress,
            'billing_address_2'          => $this->billingAddress2,
            'billing_city'               => $this->billingCity,
            'billing_state'              => $this->billingState,
            'billing_zip'                => $this->billingZip,
            'billing_country'            => $this->billingCountry,
            'current_vault'              => $this->currentVault,
            'customer_vault_token'       => $this->customerVaultToken,
            'first_name'                 => $this->firstName,
            'last_name'                  => $this->lastName,
            'payment_type'               => $this->paymentType,
            'vault_token'                => $this->vaultToken,
            'bank_routing_number'        => $this->bankRoutingNumber,
            'bank_account_number'        => $this->bankAccountNumber,
            'bank_account_holder_type'   => $this->bankAccountHolderType,
        );
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
     * @param mixed $bankAccountHolderType
     */
    public function setBankAccountHolderType($bankAccountHolderType)
    {
        $this->bankAccountHolderType = $bankAccountHolderType;
    }

    /**
     * @return mixed
     */
    public function getBankAccountHolderType()
    {
        return $this->bankAccountHolderType;
    }

    /**
     * @param mixed $bankAccountNumber
     */
    public function setBankAccountNumber($bankAccountNumber)
    {
        $this->bankAccountNumber = $bankAccountNumber;
    }

    /**
     * @return mixed
     */
    public function getBankAccountNumber()
    {
        return $this->bankAccountNumber;
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
     * @param mixed $bankRoutingNumber
     */
    public function setBankRoutingNumber($bankRoutingNumber)
    {
        $this->bankRoutingNumber = $bankRoutingNumber;
    }

    /**
     * @return mixed
     */
    public function getBankRoutingNumber()
    {
        return $this->bankRoutingNumber;
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