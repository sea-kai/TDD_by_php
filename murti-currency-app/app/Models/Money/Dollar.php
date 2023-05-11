<?php

namespace App\Models\Money;

use PhpParser\Node\Expr\Cast\Object_;
use Ramsey\Uuid\Type\Integer;

class Dollar
{
    /**
     * @var int
     * 合計
     */
    public $amount;

    public function __construct(int $amount)
    {
        $this->amount = $amount;
    }

    /**
     * @param int $multipiler
     * @return Dollar
     */
    public function times(int $multipiler)
    {
        return new Dollar($this->amount * $multipiler);
    }

    /**
     * @param Dollar $object
     * @return boolean
     */
    public function equals(Dollar $object)
    {
        $dollar = $object;
        return $this->amount == $dollar->amount;
    }
}
