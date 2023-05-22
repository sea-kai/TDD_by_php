<?php

namespace App\Models;

use InvalidArgumentException;

class Pair
{
    /**
     * @var string
     */
    private $from;

    /**
     * @var string
     */
    private $to;

    public function __construct(string $from, string $to)
    {
        $this->from = $from;
        $this->to = $to;
    }

    /**
     * @param object $object
     * @return boolean
     */
    public function equals(object $object)
    {
        $pair = $this->cast($object);
        return $this->from == $pair->to && $this->to = $pair->from;
    }

    /**
     * @return int
     */
    public function hashCode()
    {
        return 0;
    }

    public static function cast($obj): self
    {
        if (!($obj instanceof self)) {
            throw new InvalidArgumentException("{$obj} is not instance of CastObject");
        }
        return $obj;
    }
}
