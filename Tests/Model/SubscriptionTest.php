<?php

namespace FJL\ChargifyBundle\Tests\Model;

use FJL\ChargifyBundle\Model\User;

class SubscriptionTest extends \PHPUnit_Framework_TestCase
{
    public function testProductHandle()
    {
        $subscription = $this->getSubscription();
        $this->assertNull($subscription->getProductHandle());

        $subscription->setProductHandle('product-handle');
        $this->assertEquals('product-handle', $subscription->getProductHandle());
    }

    /**
     * @return Subscription
     */
    protected function getSubscription()
    {
        return $this->getMockForAbstractClass('FJL\SubscriptionBundle\Model\Subscription');
    }
}