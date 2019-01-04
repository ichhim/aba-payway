<?php

namespace IchHim\AbaPayway\Tests;

use IchHim\AbaPayway\Payway;
use PHPUnit\Framework\TestCase;

class PaywayTest extends TestCase
{
    public function testMakeHash()
    {
        $merchant_id = '112233';
        $api_key     = '112233';
        $data        = '112233';

        $prev_hash = hash_hmac('sha512', $data, $api_key, true);
        $prev_hash = base64_encode($prev_hash);

        $payway   = new Payway($merchant_id, $api_key);
        $next_has = $payway->makeHash($data);

        $this->assertSame($prev_hash, $next_has);
    }
}
