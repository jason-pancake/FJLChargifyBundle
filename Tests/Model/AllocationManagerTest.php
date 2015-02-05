<?php

namespace FJL\ChargifyBundle\Tests\Model;

use FJL\ChargifyBundle\Model\AllocationManager;
use Guzzle\Http\Client;
use Guzzle\Plugin\Mock\MockPlugin;
use Guzzle\Http\Message\Response;
use Guzzle\Http\EntityBody;

class AllocationManagerTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateAllocation()
    {
        $allocationManager = new AllocationManager(new Client());
        $allocation = $allocationManager->createAllocation();
        $this->assertInstanceOf('FJL\ChargifyBundle\Model\Allocation', $allocation);
    }

    public function testUpdateAllocation()
    {
        $mockPlugin = new MockPlugin();

        $mockResponse = new Response(201);


        $mockResponseBody = EntityBody::factory(fopen(__DIR__.'/Fixtures/body13.txt', 'r+'));
        $mockResponse->setBody($mockResponseBody);

        $mockPlugin->addResponse($mockResponse);

        $client = new Client();
        $client->addSubscriber($mockPlugin);


        $allocationManager = new AllocationManager($client);

        $allocation = $allocationManager->createAllocation();
        $allocation->setQuantity(2);

        $allocation = $allocationManager->updateAllocation($allocation, '2585595', '11960');

        $this->assertEquals('2', $allocation->getQuantity());
        $this->assertEquals('18', $allocation->getPreviousQuantity());
        $this->assertEquals('11960', $allocation->getComponentId());
        $this->assertEquals('2585595', $allocation->getSubscriptionId());
    }
}