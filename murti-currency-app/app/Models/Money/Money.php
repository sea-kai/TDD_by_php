<?php

namespace App\Models\Money;

use InvalidArgumentException;

abstract class Money
{
    /**
     * @var int
     * 合計
     */
    protected $amount;

    /**
     * @return Money
     */
    abstract function times(int $multiplier);

    /**
     * @return string
     */
    abstract function currency();

    /**
     * @param object $object
     * @return boolean
     */
    public function equals(object $object)
    {
        $money = $this->cast($object);

        return $this->amount == $money->amount && $this instanceof $object;
    }


    /**
     * @param int $amount
     * @return Money
     */
    static function dollar(int $amount)
    {
        return new Dollar($amount);
    }

    /**
     * @param int $amount
     * @return Money
     */
    static function franc(int $amount)
    {
        return new Franc($amount);
    }

    public static function cast($obj): self
    {
        if (!($obj instanceof self)) {
            throw new InvalidArgumentException("{$obj} is not instance of CastObject");
        }
        return $obj;
    }
}
