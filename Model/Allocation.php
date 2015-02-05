<?php

namespace FJL\ChargifyBundle\Model;

class Allocation extends ChargifyResource
{
    protected $componentId;
    protected $subscriptionId;
    protected $quantity;
    protected $previousQuantity;
    protected $memo;
    protected $timestamp;
    protected $prorationUpgradeScheme;
    protected $prorationDowngradeScheme;

    /**
     * @return mixed
     */
    public function getComponentId()
    {
        return $this->componentId;
    }

    /**
     * @param mixed $componentId
     */
    public function setComponentId($componentId)
    {
        $this->componentId = $componentId;
    }

    /**
     * @return mixed
     */
    public function getSubscriptionId()
    {
        return $this->subscriptionId;
    }

    /**
     * @param mixed $subscriptionId
     */
    public function setSubscriptionId($subscriptionId)
    {
        $this->subscriptionId = $subscriptionId;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @return mixed
     */
    public function getPreviousQuantity()
    {
        return $this->previousQuantity;
    }

    /**
     * @param mixed $previousQuantity
     */
    public function setPreviousQuantity($previousQuantity)
    {
        $this->previousQuantity = $previousQuantity;
    }

    /**
     * @return mixed
     */
    public function getMemo()
    {
        return $this->memo;
    }

    /**
     * @param mixed $memo
     */
    public function setMemo($memo)
    {
        $this->memo = $memo;
    }

    /**
     * @return mixed
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * @param mixed $timestamp
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
    }

    /**
     * @return mixed
     */
    public function getProrationUpgradeScheme()
    {
        return $this->prorationUpgradeScheme;
    }

    /**
     * @param mixed $prorationUpgradeScheme
     */
    public function setProrationUpgradeScheme($prorationUpgradeScheme)
    {
        $this->prorationUpgradeScheme = $prorationUpgradeScheme;
    }

    /**
     * @return mixed
     */
    public function getProrationDowngradeScheme()
    {
        return $this->prorationDowngradeScheme;
    }

    /**
     * @param mixed $prorationDowngradeScheme
     */
    public function setProrationDowngradeScheme($prorationDowngradeScheme)
    {
        $this->prorationDowngradeScheme = $prorationDowngradeScheme;
    }


}