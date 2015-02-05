<?php

namespace FJL\ChargifyBundle\Model;

use Zend\Stdlib\Hydrator\ArraySerializable;

class ProductManager extends ResourceManager
{
    public function createProduct()
    {
        return new Product();
    }

    public function findProductById($id)
    {
        //Build the request
        $request = $this->client->get( sprintf("/products/%s.json", $id), array(
            'Content-Type' => 'application/json',
        ));

        //Get the response
        $response = $this->getResponse($request);

        //Check for valid response
        if($response) {
            //Get JSON
            $json = $response->json();

            //Instantiate a new product
            $product = $this->createProduct();

            //Instanitate the hydrator object
            $hydrator = new ArraySerializable();

            //Hydrate the object with the response
            $hydrator->hydrate($json['product'], $product);

            return $product;
        }

        return false;
    }

    public function findProductByHandle($handle)
    {
        //Build the request
        $request = $this->client->get( sprintf("/products/handle/%s.json", $handle), array(
            'Content-Type' => 'application/json',
        ));

        //Get the response
        $response = $this->getResponse($request);

        //Check for valid response
        if($response) {
            //Get JSON
            $json = $response->json();

            //Instantiate a new product
            $product = $this->createProduct();

            //Instanitate the hydrator object
            $hydrator = new ArraySerializable();

            //Hydrate the object with the response
            $hydrator->hydrate($json['product'], $product);

            return $product;
        }

        return false;
    }
}