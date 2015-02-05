<?php

namespace FJL\ChargifyBundle\Event;

use Symfony\Component\EventDispatcher\Event;
use FJL\ChargifyBundle\Model\WebhookInterface;

class WebhookEvent extends Event
{
    protected $webhook;

    public function __construct(WebhookInterface $webhook)
    {
        $this->order = $webhook;
    }

    public function getWebhook()
    {
        return $this->webhook;
    }
}