<?php

namespace FJL\ChargifyBundle\Model;

class SubscriptionQuantityComponent extends ChargifyResource implements SubscriptionComponentInterface
{
    protected $componentId;
    protected $allocatedQuantity;

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