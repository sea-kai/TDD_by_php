<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Dollar;

use function PHPUnit\Framework\assertEquals;

class MoneyTest extends TestCase
{
    public function test_multiplication()
    {
        $five = new Dollar(5);

        $five->times(2);
        assertEquals(10, $five->amount);
    }
}
