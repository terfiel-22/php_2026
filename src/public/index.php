<?php

use App\PaymentGateway\Paddle\Transaction;

spl_autoload_register(function ($class) {
    $path = __DIR__ . "/../" . lcfirst(str_replace("\\", "/", $class)) . ".php";
    require $path;
});

$transaction = (new Transaction(100, "Transaction"))
    ->addTax(8)
    ->applyDiscount(10);

var_dump($transaction->getAmount(), $transaction->getDescription());
