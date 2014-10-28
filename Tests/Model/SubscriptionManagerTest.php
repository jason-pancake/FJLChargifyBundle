<?php

namespace FJL\ChargifyBundle\Tests\Model;

use FJL\ChargifyBundle\Model\SubscriptionManager;
use Guzzle\Plugin\Mock\MockPlugin;
use Guzzle\Http\Message\Response;
use Guzzle\Http\Client;
use Guzzle\Http\EntityBody;
use FJL\ChargifyBundle\Model\Subscription;

class SubscriptionManagerTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateSubscription()
    {
        $subscriptionManager = new SubscriptionManager(new Client());
        $subscription = $subscriptionManager->createSubscription();
        $this->assertInstanceOf('FJL\ChargifyBundle\Model\Subscription', $subscription);
    }

    public function testFindSubscriptionById()
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
        $mockResponseBody = EntityBody::factory(fopen(__DIR__.'/../Mock/Bodies/body1.txt', 'r+'));
        $mockResponse->setBody($mockResponseBody);

        $mockPlugin->addResponse($mockResponse);

        $client = new Client();
        $client->addSubscriber($mockPlugin);

        $subscriptionManager = new SubscriptionManager($client);
        $subscription        = $subscriptionManager->findSubscriptionById('12');
        $this->assertEquals('6807549', $subscription->getId());
    }
}