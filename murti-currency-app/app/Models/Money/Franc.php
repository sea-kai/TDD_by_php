<?php

namespace App\Models\Money;

class Franc extends Money
{
    public function __construct(int $amount, string $currency)
    {
        parent::__construct($amount, $currency);
    }

    /**
     * @param int $multiplier
     * @return Money
     */
    public function times(int $multiplier)
    {
        return Money::franc($this->amount * $multiplier);
    }
}
