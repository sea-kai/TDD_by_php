<?php

namespace App\Models\Money;

use InvalidArgumentException;

class Money implements Expression
{
    /**
     * @var int
     * @var readonly
     * 合計
     */
    public $amount;

    /**
     * @var string
     * @var readonly
     * 貨幣単位
     */
    public $currency;

    /**
     * @param int $multiplier
     * @return Money
     */
    function times(int $multiplier)
    {
        return new Money($this->amount * $multiplier, $this->currency);
    }

    /**
     * @param Money $addend
     * @return Expression
     */
    function plus(Money $addend)
    {
        return new Sum($this, $addend);
    }

    /**
     * @param Bank $bank
     * @param string $to
     * @return Money
     */
    public function reduce(Bank $bank, String $to)
    {
        $rate = $bank->rate($this->currency, $to);
        return new Money($this->amount / $rate, $to);
    }

    /**
     * @return string
     */
    function currency()
    {
        return $this->currency;
    }

    public function __construct(int $amount, string $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    /**
     * @param self $money
     * @return bool
     */
    function equals(self $money): bool
    {
        return $this->amount === $money->amount && $this->currency() === $money->currency();
    }

    /**
     * @param int $amount
     * @return Money
     */
    static function dollar(int $amount): self
    {
        return new Money($amount, 'USD');
    }

    /**
     * @param int $amount
     * @return Money
     */
    static function franc(int $amount): self
    {
        return new Money($amount, 'CHF');
    }

    public static function cast($obj): self
    {
        if (!($obj instanceof self)) {
            throw new InvalidArgumentException("{$obj} is not instance of CastObject");
        }
        return $obj;
    }

    public function __get($amount)
    {
        return $this->$amount;
    }
}
