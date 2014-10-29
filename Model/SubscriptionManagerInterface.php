<?php

namespace FJL\ChargifyBundle\Model;

use Guzzle\Http\ClientInterface;

interface SubscriptionManagerInterface
{
    public function __construct(ClientInterface $client);
    public function createSubscription();
    public function updateSubscription(Subscription $subscription);
}