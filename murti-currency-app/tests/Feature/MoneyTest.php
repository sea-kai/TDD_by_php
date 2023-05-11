<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Money\Dollar;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertFalse;
use function PHPUnit\Framework\assertTrue;

class MoneyTest extends TestCase
{
    /**
     * @test
     * @return null
     */
    public function test_multiplication()
    {
        $five = new Dollar(5);

        assertEquals(new Dollar(10), $five->times(2));

        assertEquals(new Dollar(15), $five->times(3));
    }

    /**
     * @test
     * @return null
     */
    public function testEquality()
    {
        $dollar = new Dollar(5);
        assertTrue($dollar->equals(new Dollar(5)));

        assertFalse($dollar->equals(new Dollar(6)));
    }
}
