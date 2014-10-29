<?php

namespace FJL\ChargifyBundle\Model;

class BankAccount extends BankAccountAttributes
{
    protected $customerId;
    protected $id;
    protected $maskedBankAccountNumber;
    protected $maskedBankRoutingNumber;

    public function getArrayCopy()
    {
        return array_merge(parent::getArrayCopy(), array(
            'customer_id'                => $this->customerId,
            'id'                         => $this->id,
            'masked_bank_account_number' => $this->maskedBankAccountNumber,
            'masked_bank_routing_number' => $this->maskedBankRoutingNumber,
        ));
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
}