<?php

namespace IchHim\AbaPayway;

use GuzzleHttp\Client;

/**
 * @author Ich Him [chhoeachim@gmail.com]
 */
class CheckTransaction extends Payway
{
    /**
     * Limit re-try on failed API Call
     *
     * @var int
     */
    private $max_attempts = 3;

    /**
     * Make an API Call to ABA-Payway's CHeck_Transaction API to verify if
     * a transaction is valid and really success.
     *
     * @param string $tran_id
     * @param string $api_url
     * @param bool   $http_errors `false`
     * @param bool   $verify      `false`
     *
     * @return array [$status, $status_code, $contents]
     */
    public function checkTransaction(string $tran_id, string $api_url, bool $http_errors = false, bool $verify = false)
    {
        $hash = $this->getHash($tran_id);

        $attempt = 0;
        do {
            try {
                $client   = new Client(compact('http_errors', 'verify'));
                $response = $client->request('POST', $api_url, [
                    'form_params' => compact('tran_id', 'hash'),
                ]);

                return [
                    true, // $status
                    $response->getStatusCode(), // $status_code
                    $response->getBody()->getContents(), // $contents as `string`
                ];
            } catch (\Exception $e) {
                $attempt++;

                // if the failed attempts reached it maximum, just abort
                // and return its errors.
                if ($attempt == $this->getMaxAttempts()) {
                    return [
                        false, // $status
                        $e->getCode(), // $status_code
                        $e->getMessage(), // $contents as `string`
                    ];
                }

                sleep(3); // delay 3s before make an API Call again

                continue; // try again
            }
        } while ($attempt < $this->getMaxAttempts());
    }

    /**
     * Generate hash for `Check_Transaction` API
     *
     * @param string $tran_id
     *
     * @return string
     */
    private function getHash(string $tran_id)
    {
        $data = $this->getMerchantID() . $tran_id;

        return $this->makeHash($data);
    }

    /**
     * @return int
     */
    private function getMaxAttempts()
    {
        return $this->max_attempts;
    }
}
