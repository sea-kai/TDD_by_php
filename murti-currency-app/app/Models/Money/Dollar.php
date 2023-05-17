<?php

namespace App\Models\Money;

class Dollar extends Money
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
        return Money::dollar($this->amount * $multiplier);
    }
}
