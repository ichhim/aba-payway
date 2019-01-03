<?php

namespace IchHim\AbaPayway;

/**
 * @author Ich Him [chhoeachim@gmail.com]
 */
class CreateTransaction extends Payway
{
    /**
     * Generate hash for `Create_Transaction` API
     *
     * @param string $reference_id
     * @param float  $amount
     * @param array  $items
     *
     * @return string
     */
    public function getHash(string $reference_id, float $amount, array $items = [])
    {
        $data = $this->getMerchantID() . $reference_id . $amount;

        if (count($items)) {
            $items = json_encode($items);

            $data .= $items;
        }

        return $this->makeHash($data);
    }
}
