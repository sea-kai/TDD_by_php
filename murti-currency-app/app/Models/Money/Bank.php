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

    /**
     * @param string $from
     * @param string $to
     * @param int $rate
     * @return null
     */
    function addRate()
    {
    }
}
