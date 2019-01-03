<?php

namespace IchHim\AbaPayway;

/**
 * @author Ich Him [chhoeachim@gmail.com]
 */
class Payway
{
    /**
     * The `merchant_id` credential that got from ABA.
     *
     * @var string
     */
    protected $merchant_id;

    /**
     * The `api_key` credential that got from ABA.
     *
     * @var string
     */
    protected $api_key;

    /**
     * @param string $merchant_id
     * @param string $api_key
     */
    public function __construct($merchant_id, $api_key)
    {
        $this->merchant_id = $merchant_id;
        $this->api_key     = $api_key;
    }

    /**
     * @return string
     */
    public function getMerchantID()
    {
        if (isset($this->merchant_id)) {
            return $this->merchant_id;
        }

        throw new \Exception("`merchant_id` key must exists and not null.");
    }

    /**
     * @return string
     */
    public function getApiKey()
    {
        if (isset($this->api_key)) {
            return $this->api_key;
        }

        throw new \Exception("`api_key` key must exists and not null.");
    }

    /**
     * @param string $data
     *
     * @return string
     */
    protected function makeHash($data)
    {
        $hash = hash_hmac('sha512', $data, $this->getApiKey(), true);

        return base64_encode($hash);
    }
}
