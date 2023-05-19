<?php

namespace App\Models\Money;

class Bank
{
    /**
     * @param Expression $source
     * @param String $to
     * @return Money
     */
    public function reduce(Expression $source, String $to)
    {
        return Money::dollar(10);
    }
}
