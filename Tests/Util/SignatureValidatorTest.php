<?php

namespace FJL\ChargifyBundle\Tests\Util;

use FJL\ChargifyBundle\Util\SignatureValidator;

class SignatureValidatorTest extends \PHPUnit_Framework_TestCase
{
    public function testGenerateSignature()
    {
        $secret = '1234567890';
        $body   = 'This is a test body.';

        $validator = new SignatureValidator($secret);

        $this->assertEquals(hash_hmac('sha256', $body, $secret), $validator->generateSignature($body, $secret));
    }

    public function testIsValidSignature()
    {
        $secret = '1234567890';
        $body   = 'This is a test body.';

        $validator = new SignatureValidator($secret);
        $signature = hash_hmac('sha256', $body, $secret);

        $this->assertTrue($validator->isValidSignature($body, $signature));
    }
}