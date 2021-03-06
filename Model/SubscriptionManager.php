<?php

namespace FJL\ChargifyBundle\Model;

use Zend\Stdlib\Hydrator\ArraySerializable;

class SubscriptionManager extends ResourceManager
{
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
        $response = $this->getResponse($request);

        //Check for valid response
        if($response) {
            //Get JSON
            $json = $response->json();

            //Instantiate a new subscription
            $subscription = $this->createSubscription();

            //Instanitate the hydrator object
            $hydrator = new ArraySerializable();

            //Hydrate the subscription object with the response
            $hydrator->hydrate($json['subscription'], $subscription);

            return $subscription;
        }

        return false;
    }

    public function updateSubscription(Subscription $subscription)
    {
        //Instantiate the hydrator object
        $hydrator = new ArraySerializable();

        //Prepare the request
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

        //Get the response
        $response = $this->getResponse($request);

        //Check for valid response
        if($response) {
            //Get JSON
            $json = $response->json();

            //Hydrate the subscription object with the response
            $hydrator->hydrate($json['subscription'], $subscription);

            return $subscription;
        }

        return false;
    }
}