<?php

declare(strict_types=1);

namespace App\Models\Money;

class Sum implements Expression
{
    /**
     * @var Expression
     */
    public $augend;

    /**
     * @var Expression
     */
    public $addend;

    public function __construct(Expression $augend, Expression $addend)
    {
        $this->augend = $augend;
        $this->addend = $addend;
    }

    /**
     * @param Bank $bank
     * @param string $to
     * @return Money
     */
    public function reduce(Bank $bank, string $to)
    {
        $amount = $this->augend->reduce($bank, $to)->amount + $this->addend->reduce($bank, $to)->amount;
        return new Money($amount, $to);
    }

    /**
     * @param Exoression $addend
     * @return Expression
     */
    public function plus(Expression $addend): Expression
    {
        return null;
    }
}
