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
        return $source->reduce($this, $to);
    }

    /**
     * @param string $from
     * @param string $to
     * @param int $rate
     * @return null
     */
    function addRate()
    {
    }

    /**
     * @param string $from
     * @param string $to
     */
    function rate(string $from, string $to)
    {
        return ($from == 'CHF' && $to == 'USD') ? 2 : 1;
    }
}