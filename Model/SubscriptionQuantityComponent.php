<?php

namespace FJL\ChargifyBundle\Model;

class SubscriptionQuantityComponent extends ChargifyResource implements SubscriptionComponentInterface
{
    protected $componentId;
    protected $allocatedQuantity;
    protected $subscriptionId;
    protected $pricingScheme;
    protected $name;
    protected $kind;
    protected $unitName;

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
    public function getPricingScheme()
    {
        return $this->pricingScheme;
    }

    /**
     * @param mixed $pricingScheme
     */
    public function setPricingScheme($pricingScheme)
    {
        $this->pricingScheme = $pricingScheme;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getKind()
    {
        return $this->kind;
    }

    /**
     * @param mixed $kind
     */
    public function setKind($kind)
    {
        $this->kind = $kind;
    }

    /**
     * @return mixed
     */
    public function getUnitName()
    {
        return $this->unitName;
    }

    /**
     * @param mixed $unitName
     */
    public function setUnitName($unitName)
    {
        $this->unitName = $unitName;
    }

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
    public function getAllocatedQuantity()
    {
        return $this->allocatedQuantity;
    }

    /**
     * @param mixed $allocatedQuantity
     */
    public function setAllocatedQuantity($allocatedQuantity)
    {
        $this->allocatedQuantity = $allocatedQuantity;
    }
}