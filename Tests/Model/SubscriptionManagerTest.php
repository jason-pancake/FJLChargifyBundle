<?php

namespace FJL\ChargifyBundle\Tests\Model;

use FJL\ChargifyBundle\Model\SubscriptionComponent;
use FJL\ChargifyBundle\Model\SubscriptionManager;
use FJL\ChargifyBundle\Model\SubscriptionQuantityComponent;
use Guzzle\Plugin\Mock\MockPlugin;
use Guzzle\Http\Message\Response;
use Guzzle\Http\Client;
use Guzzle\Http\EntityBody;
use FJL\ChargifyBundle\Model\CustomerAttributes;
use FJL\ChargifyBundle\Model\CreditCardAttributes;

class SubscriptionManagerTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateSubscription()
    {
        $subscriptionManager = new SubscriptionManager(new Client());
        $subscription = $subscriptionManager->createSubscription();
        $this->assertInstanceOf('FJL\ChargifyBundle\Model\Subscription', $subscription);
    }

    public function testFindSubscriptionByIdCreditCard()
    {
        $mockPlugin = new MockPlugin();

        $mockResponse = new Response(200);
        $mockResponseBody = EntityBody::factory(fopen(__DIR__.'/Fixtures/body1.txt', 'r+'));
        $mockResponse->setBody($mockResponseBody);
        $mockPlugin->addResponse($mockResponse);

        $mockResponse = new Response(200);
        $mockResponseBody = EntityBody::factory(fopen(__DIR__.'/Fixtures/body14.txt', 'r+'));
        $mockResponse->setBody($mockResponseBody);
        $mockPlugin->addResponse($mockResponse);

        $client = new Client();
        $client->addSubscriber($mockPlugin);

        $subscriptionManager = new SubscriptionManager($client);
        $subscription        = $subscriptionManager->findSubscriptionById('1234567');
        $components          = $subscription->getComponents();

        $this->assertEquals('1234567', $subscription->getId());
        $this->assertEquals('John', $subscription->getCustomer()->getFirstName());
        $this->assertEquals('Sample Plan', $subscription->getProduct()->getName());
        $this->assertEquals('sample-plans', $subscription->getProduct()->getProductFamily()->getHandle());
        $this->assertEquals('XXXX-XXXX-XXXX-1', $subscription->getCreditCard()->getMaskedCardNumber());
        $this->assertEquals('78928', $components[0]->getComponentId());
    }

    public function testFindSubscriptionByIdBankAccount()
    {
        $mockPlugin = new MockPlugin();

        $mockResponse = new Response(200);
        $mockResponseBody = EntityBody::factory(fopen(__DIR__.'/Fixtures/body2.txt', 'r+'));
        $mockResponse->setBody($mockResponseBody);
        $mockPlugin->addResponse($mockResponse);

        $mockResponse = new Response(200);
        $mockResponseBody = EntityBody::factory(fopen(__DIR__.'/Fixtures/body14.txt', 'r+'));
        $mockResponse->setBody($mockResponseBody);
        $mockPlugin->addResponse($mockResponse);

        $client = new Client();
        $client->addSubscriber($mockPlugin);

        $subscriptionManager = new SubscriptionManager($client);
        $subscription        = $subscriptionManager->findSubscriptionById('1234567');

        $this->assertEquals('XXXXXXX1111', $subscription->getBankAccount()->getMaskedBankAccountNumber());
    }

    public function testFindSubscriptionByIdNotFound()
    {
        $mockPlugin = new MockPlugin();

        $mockResponse = new Response(404);
        $mockResponseBody = EntityBody::factory(fopen(__DIR__.'/Fixtures/body6.txt', 'r+'));
        $mockResponse->setBody($mockResponseBody);
        $mockPlugin->addResponse($mockResponse);

        $client = new Client();
        $client->addSubscriber($mockPlugin);

        $subscriptionManager = new SubscriptionManager($client);
        $subscription        = $subscriptionManager->findSubscriptionById('123456');

        $this->assertFalse($subscription);
    }

    public function testUpdateSubscriptionCreate()
    {
        $mockPlugin = new MockPlugin();

        $mockResponse = new Response(201);
        $mockResponseBody = EntityBody::factory(fopen(__DIR__.'/Fixtures/body3.txt', 'r+'));
        $mockResponse->setBody($mockResponseBody);

        $mockPlugin->addResponse($mockResponse);

        $client = new Client();
        $client->addSubscriber($mockPlugin);

        $subscriptionManager = new SubscriptionManager($client);

        $subscription = $subscriptionManager->createSubscription();
        $subscription->setProductHandle('sample-plan');

        $customerAttributes = new CustomerAttributes();
        $customerAttributes->setFirstName('John');
        $customerAttributes->setLastName('Doe');
        $customerAttributes->setEmail('john@example.com');

        $component = new SubscriptionQuantityComponent();
        $component->setComponentId('100');
        $component->setAllocatedQuantity('10');

        $subscription->addComponent($component);

        $creditCardAttributes = new CreditCardAttributes();
        $creditCardAttributes->setFullNumber('1');
        $creditCardAttributes->setCvv('123');
        $creditCardAttributes->setExpirationMonth('01');
        $creditCardAttributes->setExpirationYear('2020');

        $subscription->setCreditCardAttributes($creditCardAttributes);
        $subscription->setCustomerAttributes($customerAttributes);

        $subscriptionManager->updateSubscription($subscription);
        $this->assertEquals('1234567', $subscription->getId());
    }

    public function testUpdateSubscriptionUpdate()
    {
        $mockPlugin = new MockPlugin();

        $mockResponse = new Response(200);

        $mockResponseBody = EntityBody::factory(fopen(__DIR__.'/Fixtures/body4.txt', 'r+'));
        $mockResponse->setBody($mockResponseBody);

        $mockPlugin->addResponse($mockResponse);

        $client = new Client();
        $client->addSubscriber($mockPlugin);

        $subscriptionManager = new SubscriptionManager($client);

        $subscription = $subscriptionManager->createSubscription();
        $subscription->setId('1111111');

        $creditCardAttributes = new CreditCardAttributes();
        $creditCardAttributes->setFullNumber('1');
        $creditCardAttributes->setExpirationMonth('10');
        $creditCardAttributes->setExpirationYear('2019');

        $subscription->setCreditCardAttributes($creditCardAttributes);

        $subscription->getCreditCardAttributes()->setFullNumber('1');
        $subscription->getCreditCardAttributes()->setExpirationMonth('10');
        $subscription->getCreditCardAttributes()->setExpirationYear('2019');

        $subscriptionManager->updateSubscription($subscription);

        $this->assertEquals('1234567', $subscription->getId());
    }

    public function testDeleteSubscription()
    {
        $mockPlugin = new MockPlugin();

        $mockResponse = new Response(200);

        $mockResponseBody = EntityBody::factory(fopen(__DIR__.'/Fixtures/body9.txt', 'r+'));
        $mockResponse->setBody($mockResponseBody);

        $mockPlugin->addResponse($mockResponse);

        $client = new Client();
        $client->addSubscriber($mockPlugin);

        $subscriptionManager = new SubscriptionManager($client);

        $subscription = $subscriptionManager->createSubscription();
        $subscription->setId('1111111');

        $subscriptionManager->deleteSubscription($subscription);

        $this->assertEquals('Canceling the subscription via the API', $subscription->getCancellationMessage());
    }
}