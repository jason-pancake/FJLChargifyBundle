<?php

namespace FJL\ChargifyBundle\Model;

class PaymentProfileAttributes
{
    protected $firstName;
    protected $lastName;
    protected $billingAddress;
    protected $billingAddress2;
    protected $billingCity;
    protected $billingState;
    protected $billingZip;
    protected $billingCountry;
    protected $vaultToken;
    protected $customerVaultToken;
    protected $currentVault;

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
            'vault_token'                => $this->vaultToken,
        );
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