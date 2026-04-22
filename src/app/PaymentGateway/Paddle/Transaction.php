<?php

declare(strict_types=1);

namespace App\PaymentGateway\Paddle;

class Transaction
{

    public function __construct(private float $amount, private ?string $description = null) {}

    public function addTax(float $rate): Transaction
    {
        $this->amount += $this->amount * $rate / 100;

        return $this;
    }

    public function applyDiscount(float $rate): Transaction
    {
        $this->amount -= $this->amount * $rate / 100;


        return $this;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }
}
