<?php

namespace FJL\ChargifyBundle\Model;

class CreditCardAttributes extends PaymentProfileAttributes
{
    protected $fullNumber;
    protected $expirationMonth;
    protected $expirationYear;
    protected $cvv;
    protected $lastFour;
    protected $cardType;

    public function getArrayCopy()
    {
        return array(
            'full_number'          => $this->fullNumber,
            'expiration_month'     => $this->expirationMonth,
            'expiration_year'      => $this->expirationYear,
            'cvv'                  => $this->cvv,
            'last_four'            => $this->lastFour,
            'card_type'            => $this->cardType,
        );
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


}