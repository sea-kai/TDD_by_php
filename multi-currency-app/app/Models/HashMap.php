<?php

declare(strict_types=1);

namespace App\Models;

// PHPではjavaのHashMapが存在しないので、代わりのクラスを実装
class HashMap
{
    /**
     * @var array
     */
    private $values = [];

    public function put(Pair $pair, int $rate): void
    {
        // memo: PHPではキーにオブジェクトを指定することができないので、諦めてhashCodeをキー代わりにしている
        $this->values[$pair->hashCode()] = $rate;
    }

    public function get(Pair $pair): int
    {
        return $this->values[$pair->hashCode()];
    }
}
