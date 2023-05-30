<?php

namespace App\Models\Money;

interface Expression
{
    /**
     * @param Bank $bank
     * @param string $to
     * @return Money
     */
    public function reduce(Bank $bank, String $to);

    /**
     * @param Exoression $addend
     * @return Expression
     */
    public function plus(Expression $addend): Expression;
}
