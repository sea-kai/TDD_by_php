<?php

namespace App\Models\Money;

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
        $this->amount *= $multipiler;
        return null;
    }
}
