<?php

namespace App\Models\Money;

use App\Models\Pair;

class Bank
{
    /**
     * @var array<Pair, int>
     */
    private $rates = [];

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
    function addRate(string $from, string $to, int $rate)
    {
        array_merge($this->rates, [new Pair($from, $to) => $rate]);
    }

    /**
     * @param string $from
     * @param string $to
     */
    function rate(string $from, string $to)
    {
        if ($from == $to) {
            return 1;
        }
        return $this->rates[new Pair($from, $to)];
    }
}
