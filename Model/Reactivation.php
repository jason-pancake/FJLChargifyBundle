<?php

namespace FJL\ChargifyBundle\Model;

class Reactivation extends ChargifyResource {
    protected $includeTrial;
    protected $preserveBalance;
    protected $couponCode;

    /**
     * @return mixed
     */
    public function getIncludeTrial()
    {
        return $this->includeTrial;
    }

    /**
     * @param mixed $includeTrial
     */
    public function setIncludeTrial($includeTrial)
    {
        $this->includeTrial = $includeTrial;
    }

    /**
     * @return mixed
     */
    public function getPreserveBalance()
    {
        return $this->preserveBalance;
    }

    /**
     * @param mixed $preserveBalance
     */
    public function setPreserveBalance($preserveBalance)
    {
        $this->preserveBalance = $preserveBalance;
    }

    /**
     * @return mixed
     */
    public function getCouponCode()
    {
        return $this->couponCode;
    }

    /**
     * @param mixed $couponCode
     */
    public function setCouponCode($couponCode)
    {
        $this->couponCode = $couponCode;
    }


}