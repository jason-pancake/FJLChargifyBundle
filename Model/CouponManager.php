<?php

namespace FJL\ChargifyBundle\Model;

use Guzzle\Http\ClientInterface;
use Zend\Stdlib\Hydrator\ArraySerializable;

class CouponManager implements ResourceManagerInterface
{
    protected $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    public function createCoupon()
    {
        return new Coupon();
    }

    public function findCouponByCode($code, $productFamilyId = null)
    {
        if(!$productFamilyId) {
            $resource = sprintf("/coupons/find.json?code=%s", $code);
        }
        else {
            //Build the request
            $resource = sprintf("/coupons/find.json?code=%s&product_family_id=%s", $code, $productFamilyId);
        }

        //Build the request
        $request = $this->client->get( $resource, array(
            'Content-Type' => 'application/json',
        ));

        //Get the response
        $response = $request->send()->json();

        //Instantiate a new coupon
        $coupon = $this->createCoupon();

        //Instanitate the hydrator object
        $hydrator = new ArraySerializable();

        //Hydrate the subscription object with the response
        $hydrator->hydrate($response['coupon'], $coupon);

        return $coupon;
    }
}