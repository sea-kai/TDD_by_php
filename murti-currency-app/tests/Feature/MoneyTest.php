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

        $product = $five->times(2);
        assertEquals(10, $product->amount);

        $product = $five->times(3);
        assertEquals(15, $product->amount);
    }
}
