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

    public function testFindAllCustomers()
    {
        $mockPlugin = new MockPlugin();

        $mockResponse = new Response(200);

        $mockResponseBody = EntityBody::factory(fopen(__DIR__.'/Fixtures/body10.txt', 'r+'));
        $mockResponse->setBody($mockResponseBody);

        $mockPlugin->addResponse($mockResponse);

        $client = new Client();
        $client->addSubscriber($mockPlugin);

        $customerManager = new CustomerManager($client);
        $customers = $customerManager->findAllCustomers();

        $this->assertEquals('6739072', $customers[0]->getId());
        $this->assertEquals('6740379', $customers[1]->getId());
        $this->assertEquals('6740416', $customers[2]->getId());
    }

    public function testFindCustomerById()
    {
        $mockPlugin = new MockPlugin();

        $mockResponse = new Response(200);

        $mockResponseBody = EntityBody::factory(fopen(__DIR__.'/Fixtures/body11.txt', 'r+'));
        $mockResponse->setBody($mockResponseBody);

        $mockPlugin->addResponse($mockResponse);

        $client = new Client();
        $client->addSubscriber($mockPlugin);

        $customerManager = new CustomerManager($client);
        $customer = $customerManager->findCustomerById('6740379');

        $this->assertEquals('6740379', $customer->getId());
    }

    public function testFindCustomerByIdNotFound()
    {
        $mockPlugin = new MockPlugin();

        $mockResponse = new Response(404);

        $mockResponseBody = EntityBody::factory(fopen(__DIR__.'/Fixtures/body12.txt', 'r+'));
        $mockResponse->setBody($mockResponseBody);

        $mockPlugin->addResponse($mockResponse);

        $client = new Client();
        $client->addSubscriber($mockPlugin);

        $customerManager = new CustomerManager($client);
        $customer = $customerManager->findCustomerById('6740379');

        $this->assertFalse($customer);
    }
}