<?php

namespace FJL\ChargifyBundle\Util;

class SignatureValidator
{
    protected $secret;

    public function __construct($secret)
    {
        $this->secret = $secret;
    }

    public function isValidSignature($body, $signature)
    {
        return $this->generateSignature($body, $this->secret) == $signature;
    }

    public function generateSignature($body)
    {
        return hash_hmac('sha256', $body, $this->secret);
    }
}