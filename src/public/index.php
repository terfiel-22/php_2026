<?php

require "../Transaction.php";

$amount = (new Transaction(100, "Transaction"))
    ->addTax(8)
    ->applyDiscount(10)
    ->getAmount();

var_dump($amount);
