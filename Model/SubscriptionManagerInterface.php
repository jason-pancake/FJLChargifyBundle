<?php

namespace FJL\ChargifyBundle\Model;

use Guzzle\Http\ClientInterface;
use FJL\ChargifyBundle\Model\Subscription;

interface SubscriptionManagerInterface
{
    public function __construct(ClientInterface $client);
    public function createSubscription();
    public function updateSubscription(Subscription $subscription);
}