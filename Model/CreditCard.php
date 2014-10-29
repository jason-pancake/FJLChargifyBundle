<?php

namespace FJL\ChargifyBundle\Model;

class CreditCard extends CreditCardAttributes
{
    //Input Attributes
    protected $id;
    protected $customerId;
    protected $maskedCardNumber;

    public function getArrayCopy()
    {
        return array_merge(parent::getArrayCopy(), array(
            'id'                 => $this->id,
            'customer_id'        => $this->customerId,
            'masked_card_number' => $this->maskedCardNumber,
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
}