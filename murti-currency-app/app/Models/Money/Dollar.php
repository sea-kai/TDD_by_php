<?php

namespace App\Models\Money;

class Dollar
{
    /**
     * @var int
     * 合計
     */
    public $amount;

    public function __consuruct(int $amount)
    {
        $this->amount = $amount;
    }

    /**
     * @param int $multipiler
     * @return null
     */
    public function times(int $multipiler)
    {
    }
}
