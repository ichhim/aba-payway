<?php

use IchHim\HelloWorld;
use PHPUnit\Framework\TestCase;

class HelloWorldTest extends TestCase
{
    public function testGreet()
    {
        $this->assertInternalType('string', HelloWorld::greet());
    }
}
