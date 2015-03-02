<?php

namespace FJL\ChargifyBundle\Model;

class Migration extends ChargifyResource
{
    protected $product_id;
    protected $product_handle;
    protected $include_trial;
    protected $include_initial_charge;
    protected $include_coupons;
    protected $proratedAdjustmentInCents;
    protected $chargeInCents;
    protected $paymentDueInCents;
    protected $creditAppliedInCents;

    public function getArrayCopy() {
        $data['migration'] = array();

        foreach($this as $key => $value) {
            $keyUscore = strtolower(preg_replace('/([a-z])([A-Z])/', '$1_$2', $key));
            if(!is_null($value)) {
                $data['migration'][$keyUscore] = $value;
            }
        }

        return $data;
    }

    /**
     * @return mixed
     */
    public function getProductId()
    {
        return $this->product_id;
    }

    /**
     * @param mixed $product_id
     */
    public function setProductId($product_id)
    {
        $this->product_id = $product_id;
    }

    /**
     * @return mixed
     */
    public function getProductHandle()
    {
        return $this->product_handle;
    }

    /**
     * @param mixed $product_handle
     */
    public function setProductHandle($product_handle)
    {
        $this->product_handle = $product_handle;
    }

    /**
     * @return mixed
     */
    public function getIncludeTrial()
    {
        return $this->include_trial;
    }

    /**
     * @param mixed $include_trial
     */
    public function setIncludeTrial($include_trial)
    {
        $this->include_trial = $include_trial;
    }

    /**
     * @return mixed
     */
    public function getIncludeInitialCharge()
    {
        return $this->include_initial_charge;
    }

    /**
     * @param mixed $include_initial_charge
     */
    public function setIncludeInitialCharge($include_initial_charge)
    {
        $this->include_initial_charge = $include_initial_charge;
    }

    /**
     * @return mixed
     */
    public function getIncludeCoupons()
    {
        return $this->include_coupons;
    }

    /**
     * @param mixed $include_coupons
     */
    public function setIncludeCoupons($include_coupons)
    {
        $this->include_coupons = $include_coupons;
    }

    /**
     * @return mixed
     */
    public function getProratedAdjustmentInCents()
    {
        return $this->proratedAdjustmentInCents;
    }

    /**
     * @param mixed $proratedAdjustmentInCents
     */
    public function setProratedAdjustmentInCents($proratedAdjustmentInCents)
    {
        $this->proratedAdjustmentInCents = $proratedAdjustmentInCents;
    }

    /**
     * @return mixed
     */
    public function getChargeInCents()
    {
        return $this->chargeInCents;
    }

    /**
     * @param mixed $chargeInCents
     */
    public function setChargeInCents($chargeInCents)
    {
        $this->chargeInCents = $chargeInCents;
    }

    /**
     * @return mixed
     */
    public function getPaymentDueInCents()
    {
        return $this->paymentDueInCents;
    }

    /**
     * @param mixed $paymentDueInCents
     */
    public function setPaymentDueInCents($paymentDueInCents)
    {
        $this->paymentDueInCents = $paymentDueInCents;
    }

    /**
     * @return mixed
     */
    public function getCreditAppliedInCents()
    {
        return $this->creditAppliedInCents;
    }

    /**
     * @param mixed $creditAppliedInCents
     */
    public function setCreditAppliedInCents($creditAppliedInCents)
    {
        $this->creditAppliedInCents = $creditAppliedInCents;
    }
}