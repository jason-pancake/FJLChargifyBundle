<?php

namespace FJL\ChargifyBundle\Model;

class RenewalPreview extends ChargifyResource {
    protected $nextAssessmentAt;
    protected $existingBalanceInCents;
    protected $subtotalInCents;
    protected $totalDiscountInCents;
    protected $totalTaxInCents;
    protected $totalInCents;
    protected $totalAmountDueInCents;
    protected $uncalculatedTaxes;
    protected $lineItems;

    /**
     * @return mixed
     */
    public function getNextAssessmentAt()
    {
        return $this->nextAssessmentAt;
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
    public function getExistingBalanceInCents()
    {
        return $this->existingBalanceInCents;
    }

    /**
     * @param mixed $existingBalanceInCents
     */
    public function setExistingBalanceInCents($existingBalanceInCents)
    {
        $this->existingBalanceInCents = $existingBalanceInCents;
    }

    /**
     * @return mixed
     */
    public function getSubtotalInCents()
    {
        return $this->subtotalInCents;
    }

    /**
     * @param mixed $subtotalInCents
     */
    public function setSubtotalInCents($subtotalInCents)
    {
        $this->subtotalInCents = $subtotalInCents;
    }

    /**
     * @return mixed
     */
    public function getTotalDiscountInCents()
    {
        return $this->totalDiscountInCents;
    }

    /**
     * @param mixed $totalDiscountInCents
     */
    public function setTotalDiscountInCents($totalDiscountInCents)
    {
        $this->totalDiscountInCents = $totalDiscountInCents;
    }

    /**
     * @return mixed
     */
    public function getTotalTaxInCents()
    {
        return $this->totalTaxInCents;
    }

    /**
     * @param mixed $totalTaxInCents
     */
    public function setTotalTaxInCents($totalTaxInCents)
    {
        $this->totalTaxInCents = $totalTaxInCents;
    }

    /**
     * @return mixed
     */
    public function getTotalInCents()
    {
        return $this->totalInCents;
    }

    /**
     * @param mixed $totalInCents
     */
    public function setTotalInCents($totalInCents)
    {
        $this->totalInCents = $totalInCents;
    }

    /**
     * @return mixed
     */
    public function getTotalAmountDueInCents()
    {
        return $this->totalAmountDueInCents;
    }

    /**
     * @param mixed $totalAmountDueInCents
     */
    public function setTotalAmountDueInCents($totalAmountDueInCents)
    {
        $this->totalAmountDueInCents = $totalAmountDueInCents;
    }

    /**
     * @return mixed
     */
    public function getUncalculatedTaxes()
    {
        return $this->uncalculatedTaxes;
    }

    /**
     * @param mixed $uncalculatedTaxes
     */
    public function setUncalculatedTaxes($uncalculatedTaxes)
    {
        $this->uncalculatedTaxes = $uncalculatedTaxes;
    }

    /**
     * @return mixed
     */
    public function getLineItems()
    {
        return $this->lineItems;
    }

    /**
     * @param mixed $lineItems
     */
    public function setLineItems($lineItems)
    {
        $this->lineItems = $lineItems;
    }


}