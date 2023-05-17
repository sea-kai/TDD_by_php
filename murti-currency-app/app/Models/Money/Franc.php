<?php

namespace App\Models\Money;

class Franc extends Money
{
    /**
     * @var string
     */
    private $currency;

    public function __construct(int $amount)
    {
        $this->amount = $amount;
        $this->currency = 'CHF';
    }

    /**
     * @param int $multiplier
     * @return Money
     */
    public function times(int $multiplier)
    {
        return new Franc($this->amount * $multiplier);
    }

    /**
     * @return string
     */
    public function currency()
    {
        return $this->currency;
    }
}
