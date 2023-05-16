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

        assertTrue((Money::franc(5))->equals(Money::franc(5)));

        assertFalse((Money::franc(5))->equals(Money::franc(6)));

        assertFalse((Money::franc(5))->equals(Money::dollar(5)));
    }

    /**
     * @test
     * @return null
     */
    public function test_franc_multiplication()
    {
        $five = Money::franc(5);

        assertEquals(Money::franc(10), $five->times(2));

        assertEquals(Money::franc(15), $five->times(3));
    }
}
