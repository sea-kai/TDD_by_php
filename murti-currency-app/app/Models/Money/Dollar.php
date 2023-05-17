<?php

namespace App\Models\Money;

class Dollar extends Money
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
        return new Dollar($this->amount * $multiplier);
    }

    /**
     * @return string
     */
    public function currency()
    {
        return 'USD';
    }
}
