<?php

namespace Tests\Feature;

use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;

class MoneyTest extends TestCase
{
    public function test_multiplication()
    {
        $five = new Doller(5);

        $five->times(2);
        assertEquals(10, $five->amount);
    }
}
