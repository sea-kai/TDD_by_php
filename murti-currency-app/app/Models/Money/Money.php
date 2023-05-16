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

    abstract function times(int $multiplier);

    /**
     * @param object $object
     * @return boolean
     */
    public function equals(object $object)
    {
        $money = $this->cast($object);

        return $this->amount == $money->amount && $this instanceof $object;
    }

    public static function cast($obj): self
    {
        if (!($obj instanceof self)) {
            throw new InvalidArgumentException("{$obj} is not instance of CastObject");
        }
        return $obj;
    }

    /**
     * @param int $amount
     * @return Dollar
     */
    static function dollar(int $amount)
    {
        return new Dollar($amount);
    }
}
