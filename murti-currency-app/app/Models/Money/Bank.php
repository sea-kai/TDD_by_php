<?php

namespace App\Models\Money;

class Bank
{
    /**
     * @param Expression $source
     * @param string $to
     * @return Money
     */
    public function reduce(Expression $source, string $to)
    {
        return $source->reduce($to);
    }
}
