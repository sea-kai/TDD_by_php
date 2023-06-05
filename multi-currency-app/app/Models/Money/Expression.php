<?php

namespace App\Models\Money;

interface Expression
{
    /**
     * @param int $multiplier
     * @return Expression
     */
    public function times(int $multiplier);

    /**
     * @param Bank $bank
     * @param string $to
     * @return Money
     */
    public function reduce(Bank $bank, String $to);

    /**
     * @param Expression $addend
     * @return Expression
     */
    public function plus(Expression $addend): Expression;
}
