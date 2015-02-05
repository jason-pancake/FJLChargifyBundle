<?php

namespace FJL\ChargifyBundle\Model;

use Zend\Stdlib\Hydrator\ArraySerializable;

class CustomerManager extends ResourceManager
{
    public function createCustomer()
    {
        return new Customer();
    }

    public function updateCustomer(Customer $customer)
    {
        //Instantiate the hydrator object
        $hydrator = new ArraySerializable();

        //Prepare the request
        if($customer->getId() == '') {
            $request = $this->client->post( '/customers.json', array(
                    'Content-Type' => 'application/json',
                ),
                json_encode( $hydrator->extract($customer) ) );
        }
        else {
            $request = $this->client->put( sprintf("/customers/%s.json", $customer->getId()), array(
                    'Content-Type' => 'application/json',
                ),
                json_encode( $hydrator->extract($customer) ) );
        }

        //Get the response
        $response = $this->getResponse($request);

        //Check for valid response
        if($response) {
            //Get JSON
            $json = $response->json();

            //Hydrate the customer object with the response
            $hydrator->hydrate($json['customer'], $customer);

            return $customer;
        }

        return false;
    }

    public function findCustomerById($id)
    {
        //Instantiate the hydrator object
        $hydrator = new ArraySerializable();

        //Prepare the request
        $request = $this->client->get( sprintf("/customers/%s.json", $id), array(
                'Content-Type' => 'application/json',
            ));

        //Get the response
        $response = $this->getResponse($request);

        //Check for valid response
        if($response) {
            //Get JSON
            $json = $response->json();

            //Instantiate new customer object
            $customer = new Customer();

            //Hydrate the subscription object with the response
            $hydrator->hydrate($json['customer'], $customer);

            return $customer;
        }

        return false;
    }

    public function findAllCustomers()
    {
        //Instantiate the hydrator object
        $hydrator = new ArraySerializable();

        //Prepare the request
        $request = $this->client->get( '/customers.json', array(
            'Content-Type' => 'application/json',
        ));

        //Get the response
        $response = $this->getResponse($request);

        //Check for valid response
        if($response) {
            //Get JSON
            $json = $response->json();

            //Iterate through the customers
            $customers = array();
            foreach($json as $customerJson) {
                $customer = new Customer();
                $hydrator->hydrate($customerJson['customer'], $customer);
                $customers[] = $customer;
            }

            return $customers;
        }

        return false;
    }
}