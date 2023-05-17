<?php

namespace App\Models\Money;

class Dollar extends Money
{
    /**
     * @var string
     */
    private $currency;

    public function __construct(int $amount)
    {
        $this->amount = $amount;
        $this->currency = 'USD';
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
        return $this->currency;
    }
}
