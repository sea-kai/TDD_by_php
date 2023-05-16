<?php

namespace App\Models\Money;

class Franc extends Money
{
    public function __construct(int $amount)
    {
        $this->amount = $amount;
    }

    /**
     * @param int $multiplier
     * @return Money
     */
    public function times(int $multiplier)
    {
        return new Franc($this->amount * $multiplier);
    }
}
