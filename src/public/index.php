<?php

require "../Transaction.php";

$transaction = (new Transaction(100))
    ->addTax(8)
    ->applyDiscount(10);

var_dump($transaction->getAmount(), $transaction->getDescription());
