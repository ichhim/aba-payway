PHP - ABA Payway
================

Some descriptions.

Features
--------

* Generate a hash for **Create Transaction** API
* Call **Check Transaction** API to check transaction

Examples
--------

### Create Transaction

```php
use IchHim\AbaPayway\CreateTransaction;

$merchant_id = '112233'; // the `merchant_id` that provided by ABA
$api_key = 'some-unique-key'; // the `api_key` that provided by ABA

$create_transaction = new CreateTransaction($merchant_id, $api_key);

// the required params
$tran_id = uniqid();
$amount = 1.00;

return $create_transaction->getHash($tran_id, $amount);
```

### Check Transaction

```php
use IchHim\AbaPayway\CheckTransaction;

$merchant_id = '112233'; // the `merchant_id` that provided by ABA
$api_key = 'some-unique-key'; // the `api_key` that provided by ABA

$check_transaction = new CheckTransaction($merchant_id, $api_key);

// the required params
$tran_id = uniqid();
$api_url = 'https://www.google.com'; // the `api_url` that provided by ABA

list($status, $status_code, $contents) = $check_transaction->checkTransaction($tran_id, $api_url);

// on TRUE
return [
    $status, // true
    $status_code, // 200
    $contents, // {"status":0,"description":"approved","amount":"1.00","totalAmount":"1.00"}
];

// or FALSE
return [
    $status, // false
    $status_code, // 500
    $contents, // Internal Server Error
];
```
