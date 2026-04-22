<?php

declare(strict_types=1);

namespace App\PaymentGateway\Paddle;

use App\Enums\TransactionStatus;

class Transaction
{

    public function __construct(private float $amount, private ?string $description = null, private string $status = TransactionStatus::PENDING) {}

    public function setStatus(string $status): self
    {
        if (!array_key_exists($status, TransactionStatus::ALL_STATUSES)) {
            throw new \InvalidArgumentException("Invalid status");
        }

        $this->status = $status;

        return $this;
    }

    public function addTax(float $rate): self
    {
        $this->amount += $this->amount * $rate / 100;

        return $this;
    }

    public function applyDiscount(float $rate): self
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

    public function getStatus(): string
    {
        return $this->status;
    }
}
