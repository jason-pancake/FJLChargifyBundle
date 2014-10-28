<?php

namespace FJL\ChargifyBundle\Model;

use Guzzle\Http\ClientInterface;
use Guzzle\Http\Exception\ClientException;

class SubscriptionManager implements SubscriptionManagerInterface
{
    protected $client;
    protected $logger;

    public function __construct(ClientInterface $client, $logger = null)
    {
        $this->client = $client;
        $this->logger = $logger;
    }

    public function createSubscription()
    {
        return new Subscription();
    }

    public function findSubscriptionById($id)
    {
        $request = $this->client->get( '/subscriptions/'.$id.'.json', array(
            'Content-Type' => 'application/json',
        ));

        try {
            $response = $request->send()->json();

            $subscription = new Subscription();
            $subscription->setId($response['subscription']['id']);

            return $subscription;
        }
        catch(ClientException $e) {
            if($this->logger) {
                $this->logger->error(sprintf('Find subscription failed. Subscription id: %s', $id));
                $this->logger->error('Request: ' . $e->getRequest());
                $this->logger->error('Response: ' . $e->getResponse());
            }
        }
    }

    public function updateSubscription(Subscription $subscription)
    {
        if(!$subscription->getId())
        {

        }
    }
}