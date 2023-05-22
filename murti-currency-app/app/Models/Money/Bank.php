<?php

namespace App\Models\Money;

use App\Models\Pair;
use App\Models\HashMap;

class Bank
{
    /**
     * @var HashMap
     */
    private $rates;

    function __construct()
    {
        $this->rates = new HashMap();
    }

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
        $this->rates->put(new Pair($from, $to), $rate);
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
        return $this->rates->get(new Pair($from, $to));
    }
}
