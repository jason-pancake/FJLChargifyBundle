<?php

namespace FJL\ChargifyBundle\Model;

use Guzzle\Http\ClientInterface;

interface ResourceManagerInterface
{
    public function __construct(ClientInterface $client);
}