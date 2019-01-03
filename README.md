PHP - ABA Payway
================

Some descriptions.

Features
--------

* Generate a hash for **Create Transaction** API
* Generate a hash for **Check Transaction** API

Examples
--------

### Create Transaction

```php
use IchHim\AbaPayway\CreateTransaction;

$merchant_id = '112233'; // the `merchant_id` that provided by ABA
$api_key = 'some-unique-key'; // the `api_key` that provided by ABA

// the required params
$transaction_id = uniqid();
$amount = 1.00;

$create_transaction = new CreateTransaction($merchant_id, $api_key);

return $create_transaction->getHash($transaction_id, $amount);
```

### Check Transaction

```php
use IchHim\AbaPayway\CheckTransaction;

$merchant_id = '112233'; // the `merchant_id` that provided by ABA
$api_key = 'some-unique-key'; // the `api_key` that provided by ABA

// the required params
$transaction_id = uniqid();

$check_transaction = new CheckTransaction($merchant_id, $api_key);

return $check_transaction->getHash($transaction_id);
```
