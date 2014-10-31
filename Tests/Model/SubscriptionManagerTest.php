<?php

namespace FJL\ChargifyBundle\Tests\Model;

use FJL\ChargifyBundle\Model\SubscriptionManager;
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
        $mockResponse->setHeaders(array(
            'Cache-Control'             => 'must-revalidate, private, max-age=0',
            'Connection'                => 'keep-alive',
            'Content-Type'              => 'application/json; charset=utf-8',
            'Date'                      => 'Tue, 28 Oct 2014 16:36:16 GMT',
            'Etag'                      => '"8ce596588c6fe41e44d186a3e55001ea"',
            'P3p'                       => 'CP="NOI ADM DEV PSAi COM NAV OUR OTRo STP IND DEM"',
            'Server'                    => 'nginx + Phusion Passenger',
            'Status'                    => '200 OK',
            'Strict-Transport-Security' => 'max-age=31536000',
            'X-Content-Type-Options'    => 'nosniff',
            'X-Frame-Options'           => 'SAMEORIGIN',
            'X-Powered-By'              => 'Phusion Passenger',
            'X-Rack-Cache'              => 'miss',
            'X-Ratelimit-Limit'         => '1000000',
            'X-Ratelimit-Remaining'     => '999998',
            'X-Ratelimit-Reset'         => '1414540800',
            'X-Request-Id'              => 'd34921f9-a3c2-4b74-ad06-9373ccb3c21b',
            'X-Runtime'                 => '0.315852',
            'X-Ua-Compatible'           => 'IE=Edge,chrome=1',
            'X-Xss-Protection'          => '1; mode=block',
            'transfer-encoding'         => 'chunked',
            )
        );
        $mockResponseBody = EntityBody::factory(fopen(__DIR__.'/Fixtures/body1.txt', 'r+'));
        $mockResponse->setBody($mockResponseBody);

        $mockPlugin->addResponse($mockResponse);

        $client = new Client();
        $client->addSubscriber($mockPlugin);

        $subscriptionManager = new SubscriptionManager($client);
        $subscription        = $subscriptionManager->findSubscriptionById('1234567');

        $this->assertEquals('1234567', $subscription->getId());
        $this->assertEquals('John', $subscription->getCustomer()->getFirstName());
        $this->assertEquals('Sample Plan', $subscription->getProduct()->getName());
        $this->assertEquals('sample-plans', $subscription->getProduct()->getProductFamily()->getHandle());
        $this->assertEquals('XXXX-XXXX-XXXX-1', $subscription->getCreditCard()->getMaskedCardNumber());
    }

    public function testFindSubscriptionByIdBankAccount()
    {
        $mockPlugin = new MockPlugin();

        $mockResponse = new Response(200);
        $mockResponse->setHeaders(array(
                'Cache-Control'             => 'must-revalidate, private, max-age=0',
                'Connection'                => 'keep-alive',
                'Content-Type'              => 'application/json; charset=utf-8',
                'Date'                      => 'Tue, 28 Oct 2014 16:36:16 GMT',
                'Etag'                      => '"8ce596588c6fe41e44d186a3e55001ea"',
                'P3p'                       => 'CP="NOI ADM DEV PSAi COM NAV OUR OTRo STP IND DEM"',
                'Server'                    => 'nginx + Phusion Passenger',
                'Status'                    => '200 OK',
                'Strict-Transport-Security' => 'max-age=31536000',
                'X-Content-Type-Options'    => 'nosniff',
                'X-Frame-Options'           => 'SAMEORIGIN',
                'X-Powered-By'              => 'Phusion Passenger',
                'X-Rack-Cache'              => 'miss',
                'X-Ratelimit-Limit'         => '1000000',
                'X-Ratelimit-Remaining'     => '999998',
                'X-Ratelimit-Reset'         => '1414540800',
                'X-Request-Id'              => 'd34921f9-a3c2-4b74-ad06-9373ccb3c21b',
                'X-Runtime'                 => '0.315852',
                'X-Ua-Compatible'           => 'IE=Edge,chrome=1',
                'X-Xss-Protection'          => '1; mode=block',
                'transfer-encoding'         => 'chunked',
            )
        );

        $mockResponseBody = EntityBody::factory(fopen(__DIR__.'/Fixtures/body2.txt', 'r+'));
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
        $mockResponse->setHeaders(array(
                'Cache-Control'             => 'must-revalidate, private, max-age=0',
                'Connection'                => 'keep-alive',
                'Content-Type'              => 'application/json; charset=utf-8',
                'Content-Length'            => '1',
                'Date'                      => 'Tue, 28 Oct 2014 16:36:16 GMT',
                'P3p'                       => 'CP="NOI ADM DEV PSAi COM NAV OUR OTRo STP IND DEM"',
                'Server'                    => 'nginx + Phusion Passenger',
                'Status'                    => '404 Not Found',
                'X-Frame-Options'           => 'SAMEORIGIN',
                'X-Powered-By'              => 'Phusion Passenger',
                'X-Rack-Cache'              => 'miss',
                'X-Ratelimit-Limit'         => '1000000',
                'X-Ratelimit-Remaining'     => '999998',
                'X-Ratelimit-Reset'         => '1414540800',
                'X-Request-Id'              => 'd34921f9-a3c2-4b74-ad06-9373ccb3c21b',
                'X-Runtime'                 => '0.315852',
                'X-Ua-Compatible'           => 'IE=Edge,chrome=1',
            )
        );

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
        $mockResponse->setHeaders(array(
                'Cache-Control'             => 'max-age=0, private, must-revalidate',
                'Connection'                => 'keep-alive',
                'Content-Type'              => 'application/json; charset=utf-8',
                'Content-Length'            => '2384',
                'Date'                      => 'Wed, 29 Oct 2014 12:46:26 GMT',
                'Etag'                      => '1dc3ed59cf34cd1b477c126cc6f2ac00',
                'Location'                  => 'https://xxxxxxx.chargify.com/subscriptions/xxxxxxx',
                'P3p'                       => 'CP="NOI ADM DEV PSAi COM NAV OUR OTRo STP IND DEM"',
                'Server'                    => 'nginx + Phusion Passenger',
                'Status'                    => '200 OK',
                'Strict-Transport-Security' => 'max-age=31536000',
                'X-Content-Type-Options'    => 'nosniff',
                'X-Frame-Options'           => 'SAMEORIGIN',
                'X-Powered-By'              => 'Phusion Passenger',
                'X-Rack-Cache'              => 'invalidate, pass',
                'X-Ratelimit-Limit'         => '1000000',
                'X-Ratelimit-Remaining'     => '999997',
                'X-Ratelimit-Reset'         => '1414540800',
                'X-Request-Id'              => 'b5759fc3-4f8f-46b4-8669-b2a3e6fbcf92',
                'X-Ua-Compatible'           => 'IE=Edge,chrome=1',
                'X-Runtime'                 => '0.164969',
                'X-Xss-Protection'          => '1; mode=block'
            )
        );

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
        $mockResponse->setHeaders(array(
                'Cache-Control'             => 'max-age=0, private, must-revalidate',
                'Connection'                => 'keep-alive',
                'Content-Type'              => 'application/json; charset=utf-8',
                'Content-Length'            => '2384',
                'Date'                      => 'Wed, 29 Oct 2014 12:46:26 GMT',
                'Etag'                      => '1dc3ed59cf34cd1b477c126cc6f2ac00',
                'Location'                  => 'https://xxxxxxx.chargify.com/subscriptions/xxxxxxx',
                'P3p'                       => 'CP="NOI ADM DEV PSAi COM NAV OUR OTRo STP IND DEM"',
                'Server'                    => 'nginx + Phusion Passenger',
                'Status'                    => '200 OK',
                'Strict-Transport-Security' => 'max-age=31536000',
                'X-Content-Type-Options'    => 'nosniff',
                'X-Frame-Options'           => 'SAMEORIGIN',
                'X-Powered-By'              => 'Phusion Passenger',
                'X-Rack-Cache'              => 'invalidate, pass',
                'X-Ratelimit-Limit'         => '1000000',
                'X-Ratelimit-Remaining'     => '999997',
                'X-Ratelimit-Reset'         => '1414540800',
                'X-Request-Id'              => 'b5759fc3-4f8f-46b4-8669-b2a3e6fbcf92',
                'X-Ua-Compatible'           => 'IE=Edge,chrome=1',
                'X-Runtime'                 => '0.164969',
                'X-Xss-Protection'          => '1; mode=block'
            )
        );

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