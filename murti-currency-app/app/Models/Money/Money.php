<?php

namespace App\Models\Money;

class Money
{
    /**
     * @var int
     * 合計
     */
    protected $amount;

    /**
     * @param Money $object
     * @return boolean
     */
    public function equals(Money $object)
    {
        $money = $object;
        return $this->amount == $money->amount;
    }
}
