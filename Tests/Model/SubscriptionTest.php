<?php

namespace FJL\ChargifyBundle\Tests\Model;

use FJL\ChargifyBundle\Model\Subscription;

class SubscriptionTest extends \PHPUnit_Framework_TestCase
{
    public function testActivatedAt()
    {
        $subscription = $this->getSubscription();
        $this->assertNull($subscription->getActivatedAt());

        $subscription->setActivatedAt('01/01/2014');
        $this->assertEquals('01/01/2014', $subscription->getActivatedAt()->format('m/d/Y'));
    }

    /**
     * @return Subscription
     */
    protected function getSubscription()
    {
        return new Subscription();
    }
}