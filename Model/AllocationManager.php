<?php

namespace FJL\ChargifyBundle\Model;

use Zend\Stdlib\Hydrator\ArraySerializable;

class AllocationManager extends ResourceManager
{
    public function createAllocation()
    {
        return new Allocation();
    }

    public function updateAllocation($allocation, $subscriptionId, $componentId)
    {
        //Instantiate the hydrator object
        $hydrator = new ArraySerializable();

        //Prepare the request
        $request = $this->client->post( sprintf("/subscriptions/%s/components/%s/allocations.json", $subscriptionId, $componentId), array(
            'Content-Type' => 'application/json',
        ),
            json_encode( $hydrator->extract($allocation) ) );

        //Get the response
        $response = $this->getResponse($request);

        //Check for valid response
        if($response) {
            //Get JSON
            $json = $response->json();

            //Hydrate the subscription object with the response
            $hydrator->hydrate($json['allocation'], $allocation);

            return $allocation;
        }

        return false;
    }
}