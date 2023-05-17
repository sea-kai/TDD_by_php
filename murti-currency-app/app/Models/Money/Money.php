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
     * @var string
     * 貨幣単位
     */
    protected $currency;

    /**
     * @return string
     */
    public function currency()
    {
        return $this->currency;
    }

    /**
     * @return Money
     */
    abstract function times(int $multiplier);

    public function __construct(int $amount, string $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }

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
        return new Dollar($amount, 'USD');
    }

    /**
     * @param int $amount
     * @return Money
     */
    static function franc(int $amount)
    {
        return new Franc($amount, 'CHF');
    }

    public static function cast($obj): self
    {
        if (!($obj instanceof self)) {
            throw new InvalidArgumentException("{$obj} is not instance of CastObject");
        }
        return $obj;
    }
}
