<?php

namespace App\Models\Money;

class Franc extends Money
{
    public function __construct(int $amount)
    {
        $this->amount = $amount;
    }

    /**
     * @param int $multipiler
     * @return Money
     */
    public function times(int $multipiler)
    {
        return new Franc($this->amount * $multipiler);
    }
}
