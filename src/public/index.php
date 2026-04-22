<?php

use App\Enums\TransactionStatus;
use App\PaymentGateway\Paddle\Transaction;

require __DIR__ . "/../vendor/autoload.php";

$transaction = (new Transaction(100, "Transaction"))
    ->addTax(8)
    ->applyDiscount(10)
    ->setStatus(TransactionStatus::PAID);

var_dump($transaction->getAmount(), $transaction->getDescription());
