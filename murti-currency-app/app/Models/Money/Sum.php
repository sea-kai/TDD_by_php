<?php

namespace App\Models\Money;

class Sum implements Expression
{
    /**
     * @var Money
     */
    public $augend;

    /**
     * @var Money
     */
    public $addend;

    public function __construct(Money $augend, Money $addend)
    {
        $this->augend = $augend;
        $this->addend = $addend;
    }

    /**
     * @param string $to
     * @return Money
     */
    public function reduce(string $to)
    {
        $amount = $this->augend->amount + $this->addend->amount;
        return new Money($amount, $to);
    }
}
