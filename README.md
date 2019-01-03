PHP - ABA Payway
================

Some descriptions.

Features
--------

* Generate a hash for **Create Transaction** API

Examples
--------

### Create Transaction

```php
use IchHim\AbaPayway\CreateTransaction;

$merchant_id = '112233'; // the `merchant_id` that provided by ABA
$api_key = 'some-unique-key'; // the `api_key` that provided by ABA
$transaction_id = uniqid();

$create_transaction = new CreateTransaction($merchant_id, $api_key);

return $create_transaction->getHash($transaction_id, 1.00);
```
