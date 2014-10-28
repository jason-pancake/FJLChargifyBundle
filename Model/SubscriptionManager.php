<?php

namespace FJL\ChargifyBundle\Model;

use Guzzle\Http\ClientInterface;
use Guzzle\Http\Exception\RequestException;
use Guzzle\Http\Exception\ClientErrorResponseException;
use Zend\Stdlib\Hydrator\ArraySerializable;
use Zend\Stdlib\Hydrator\ClassMethods;

class SubscriptionManager implements SubscriptionManagerInterface
{
    protected $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    public function createSubscription()
    {
        return new Subscription();
    }

    public function findSubscriptionById($id)
    {
        //Generate the request
        $request = $this->client->get( '/subscriptions/'.$id.'.json', array(
            'Content-Type' => 'application/json',
        ));

        //Get the response
        $response = $request->send()->json();

        //Instantiate a new subscription
        $subscription = $this->createSubscription();

        //Instanitate the hydrator object
        $hydrator = new ArraySerializable();

        //Hydrate the subscription object with the response
        $hydrator->hydrate($response['subscription'], $subscription);

        return $subscription;
    }

    public function updateSubscription(Subscription $subscription)
    {
        $hydrator = new ArraySerializable();

        if($subscription->getId() == '') {
            $request = $this->client->post( '/subscriptions.json', array(
                'Content-Type' => 'application/json',
            ),
            json_encode( $hydrator->extract($subscription) ) );
        }
        else {
            $request = $this->client->put( '/subscriptions/'.$subscription->getId().'.json', array(
                'Content-Type' => 'application/json',
            ),
            json_encode( $hydrator->extract($subscription) ) );
        }

        $response = $request->send()->json();

        $hydrator->hydrate($response['subscription'], $subscription);

        return $subscription;
    }
}