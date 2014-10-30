<?php

namespace FJL\ChargifyBundle\Tests\Model;

use FJL\ChargifyBundle\Model\CustomerManager;
use Guzzle\Plugin\Mock\MockPlugin;
use Guzzle\Http\Message\Response;
use Guzzle\Http\Client;
use Guzzle\Http\EntityBody;
use FJL\ChargifyBundle\Model\CustomerAttributes;
use FJL\ChargifyBundle\Model\CreditCardAttributes;

class CustomerManagerTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateCustomer()
    {
        $customerManager = new CustomerManager(new Client());
        $customer = $customerManager->createCustomer();
        $this->assertInstanceOf('FJL\ChargifyBundle\Model\Customer', $customer);
    }

    public function testUpdateCustomerCreate()
    {
        $mockPlugin = new MockPlugin();

        $mockResponse = new Response(201);
        $mockResponse->setHeaders(array(
                'Cache-Control'             => 'max-age=0, private, must-revalidate',
                'Connection'                => 'keep-alive',
                'Content-Type'              => 'application/json; charset=utf-8',
                'Content-Length'            => '2384',
                'Date'                      => 'Tue, 28 Oct 2014 23:24:55 GMT',
                'Etag'                      => '95774fd71f33cc30787531d3d9fa3ace',
                'Location'                  => 'https://xxxxxxxxxxx.chargify.com/subscriptions/xxxxxxxxxxxx',
                'P3p'                       => 'CP="NOI ADM DEV PSAi COM NAV OUR OTRo STP IND DEM"',
                'Server'                    => 'nginx + Phusion Passenger',
                'Status'                    => '201 Created',
                'Strict-Transport-Security' => 'max-age=31536000',
                'X-Content-Type-Options'    => 'nosniff',
                'X-Frame-Options'           => 'SAMEORIGIN',
                'X-Powered-By'              => 'Phusion Passenger',
                'X-Rack-Cache'              => 'invalidate, pass',
                'X-Ratelimit-Limit'         => '1000000',
                'X-Ratelimit-Remaining'     => '999997',
                'X-Ratelimit-Reset'         => '1414540800',
                'X-Request-Id'              => '6e721948-7152-4bea-b211-6349028f1197',
                'X-Ua-Compatible'           => 'IE=Edge,chrome=1',
                'X-Runtime'                 => '0.315852',
                'X-Xss-Protection'          => '1; mode=block'
            )
        );

        $mockResponseBody = EntityBody::factory(fopen(__DIR__.'/Fixtures/body8.txt', 'r+'));
        $mockResponse->setBody($mockResponseBody);

        $mockPlugin->addResponse($mockResponse);

        $client = new Client();
        $client->addSubscriber($mockPlugin);

        $customerManager = new CustomerManager($client);
        $customer = $customerManager->createCustomer();

        $customer->setFirstName('Joe');
        $customer->setLastName('Blow');
        $customer->setEmail('joe@example.com');

        $customerManager->updateCustomer($customer);

        $this->assertEquals('1234567', $customer->getId());
    }

    public function testUpdateCustomerUpdate()
    {
        $mockPlugin = new MockPlugin();

        $mockResponse = new Response(200);
        $mockResponse->setHeaders(array(
                'Cache-Control'             => 'max-age=0, private, must-revalidate',
                'Connection'                => 'keep-alive',
                'Content-Type'              => 'application/json; charset=utf-8',
                'Content-Length'            => '2384',
                'Date'                      => 'Tue, 28 Oct 2014 23:24:55 GMT',
                'Etag'                      => '95774fd71f33cc30787531d3d9fa3ace',
                'Location'                  => 'https://xxxxxxxxxxx.chargify.com/subscriptions/xxxxxxxxxxxx',
                'P3p'                       => 'CP="NOI ADM DEV PSAi COM NAV OUR OTRo STP IND DEM"',
                'Server'                    => 'nginx + Phusion Passenger',
                'Status'                    => '201 Created',
                'Strict-Transport-Security' => 'max-age=31536000',
                'X-Content-Type-Options'    => 'nosniff',
                'X-Frame-Options'           => 'SAMEORIGIN',
                'X-Powered-By'              => 'Phusion Passenger',
                'X-Rack-Cache'              => 'invalidate, pass',
                'X-Ratelimit-Limit'         => '1000000',
                'X-Ratelimit-Remaining'     => '999997',
                'X-Ratelimit-Reset'         => '1414540800',
                'X-Request-Id'              => '6e721948-7152-4bea-b211-6349028f1197',
                'X-Ua-Compatible'           => 'IE=Edge,chrome=1',
                'X-Runtime'                 => '0.315852',
                'X-Xss-Protection'          => '1; mode=block'
            )
        );

        $mockResponseBody = EntityBody::factory(fopen(__DIR__.'/Fixtures/body8.txt', 'r+'));
        $mockResponse->setBody($mockResponseBody);

        $mockPlugin->addResponse($mockResponse);

        $client = new Client();
        $client->addSubscriber($mockPlugin);

        $customerManager = new CustomerManager($client);
        $customer = $customerManager->createCustomer();

        $customer->setId('1234567');
        $customer->setFirstName('Joe');
        $customer->setLastName('Blow');
        $customer->setEmail('joe@example.com');

        $customerManager->updateCustomer($customer);

        $this->assertEquals('777', $customer->getReference());
    }
}