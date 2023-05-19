<?php

namespace App\Models\Money;

interface Expression
{
    /**
     * @param string $to
     * @return Money
     */
    public function reduce(String $to);
}
