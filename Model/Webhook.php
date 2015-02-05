<?php

namespace FJL\ChargifyBundle\Model;

class Webhook implements WebhookInterface
{
    protected $id;
    protected $event;
    protected $payload;

    public function __construct($id, $event, array $payload)
    {
        $this->id      = $id;
        $this->event   = $event;
        $this->payload = $payload;
    }

    /**
     * @return mixed
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * @param mixed $event
     */
    public function setEvent($event)
    {
        $this->event = $event;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getPayload()
    {
        return $this->payload;
    }

    /**
     * @param array $payload
     */
    public function setPayload($payload)
    {
        $this->payload = $payload;
    }
}