<?php

namespace App\Models\Money;

class Franc
{
    /**
     * @var int
     * 合計
     */
    private $amount;

    public function __construct(int $amount)
    {
        $this->amount = $amount;
    }

    /**
     * @param int $multipiler
     * @return Franc
     */
    public function times(int $multipiler)
    {
        return new Franc($this->amount * $multipiler);
    }

    /**
     * @param Franc $object
     * @return boolean
     */
    public function equals(Franc $object)
    {
        $franc = $object;
        return $this->amount == $franc->amount;
    }
}
