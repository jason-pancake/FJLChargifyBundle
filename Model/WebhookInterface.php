<?php

namespace FJL\ChargifyBundle\Model;

interface WebhookInterface {
    public function __construct($id, $event, array $payload);
}