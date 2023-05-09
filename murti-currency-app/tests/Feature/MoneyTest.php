<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Money\Dollar;

use function PHPUnit\Framework\assertEquals;

/**
 * @test
 */
class MoneyTest extends TestCase
{
    public function test_multiplication()
    {
        $five = new Dollar(5);

        $five->times(2);
        assertEquals(10, $five->amount);
    }
}
