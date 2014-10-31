<?php

namespace FJL\ChargifyBundle\Model;

class BankAccountAttributes extends PaymentProfileAttributes
{
    protected $bankAccount;
    protected $bankAccountType;
    protected $bankName;
    protected $paymentType;
    protected $bankRoutingNumber;
    protected $bankAccountNumber;
    protected $bankAccountHolderType;

    public function getArrayCopy()
    {
        $data = array();

        foreach($this as $key => $value) {
            $keyUscore = strtolower(preg_replace('/([a-z])([A-Z])/', '$1_$2', $key));
            if($value && $value != '') {
                $data[$keyUscore] = $value;
            }
        }

        return $data;
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


}