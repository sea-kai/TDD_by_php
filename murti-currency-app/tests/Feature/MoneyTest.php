<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Money\Money;
use App\Models\Money\Dollar;
use App\Models\Money\Franc;

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
        $five = Money::dollar(5);

        assertEquals(Money::dollar(10), $five->times(2));

        assertEquals(Money::dollar(15), $five->times(3));
    }

    /**
     * @test
     * @return null
     */
    public function testEquality()
    {
        assertTrue((Money::dollar(5))->equals(Money::dollar(5)));

        assertFalse((Money::dollar(5))->equals(Money::dollar(6)));

        assertTrue((new Franc(5))->equals(new Franc(5)));

        assertFalse((new Franc(5))->equals(new Franc(6)));

        assertFalse((new Franc(5))->equals(new Dollar(5)));
    }

    /**
     * @test
     * @return null
     */
    public function test_franc_multiplication()
    {
        $five = new Franc(5);

        assertEquals(new Franc(10), $five->times(2));

        assertEquals(new Franc(15), $five->times(3));
    }
}
