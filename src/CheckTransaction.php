<?php

namespace IchHim\AbaPayway;

/**
 * @author Ich Him [chhoeachim@gmail.com]
 */
class CheckTransaction extends Payway
{
    /**
     * Generate hash for `Check_Transaction` API
     *
     * @param string $tran_id
     *
     * @return string
     */
    public function getHash(string $tran_id)
    {
        $data = $this->getMerchantID() . $tran_id;

        return $this->makeHash($data);
    }
}
