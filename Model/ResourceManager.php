<?php

namespace FJL\ChargifyBundle\Model;

use Guzzle\Http\ClientInterface;
use Guzzle\Http\Exception\RequestException;
use Psr\Log\LoggerInterface;

abstract class ResourceManager
{
    protected $client;
    protected $logger;

    public function __construct(ClientInterface $client, LoggerInterface $logger = null) {
        $this->client = $client;
        $this->logger = $logger;
    }

    public function getResponse($request)
    {
        //Get the response and log the exceptions if there are any
        try {
            return $request->send();
        }
        catch(RequestException $e) {
            if($this->logger) {
                $this->logger->error($e->getCode());
                $this->logger->error($e->getMessage());
                $this->logger->error($e->getRequest());

                if ($e->hasResponse()) {
                    $this->logger->error($e->getResponse());
                }
            }

            return false;
        }
    }
}