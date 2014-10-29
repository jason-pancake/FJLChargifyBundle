<?php

namespace FJL\ChargifyBundle\Model;

use Zend\Stdlib\Hydrator\ArraySerializable;

class CouponManager extends ResourceManager
{
    public function createCoupon()
    {
        return new Coupon();
    }

    public function findCouponByCode($code, $productFamilyId = null)
    {
        if(!$productFamilyId) {
            //Build the resource URI
            $resource = sprintf("/coupons/find.json?code=%s", $code);
        }
        else {
            //Build the resource URI
            $resource = sprintf("/coupons/find.json?code=%s&product_family_id=%s", $code, $productFamilyId);
        }

        //Build the request
        $request = $this->client->get( $resource, array(
            'Content-Type' => 'application/json',
        ));

        //Get the response
        $response = $this->getResponse($request);

        //Check for valid response
        if($response) {
            //Get JSON
            $json = $response->json();

            //Instantiate a new coupon
            $coupon = $this->createCoupon();

            //Instanitate the hydrator object
            $hydrator = new ArraySerializable();

            //Hydrate the subscription object with the response
            $hydrator->hydrate($json['coupon'], $coupon);

            return $coupon;
        }

        return false;
    }
}