<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Money\Money;
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
    public function testMultiplication()
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
    public function testFrancMultiplication()
    {
        $five = Money::franc(5);

        assertEquals(Money::franc(10), $five->times(2));

        assertEquals(Money::franc(15), $five->times(3));
    }

    /**
     * @test
     * @return null
     */
    public function testCurrency()
    {
        assertEquals('USD', Money::dollar(1)->currency());

        assertEquals('CHF', Money::franc(1)->currency());
    }

    /**
     * @test
     * @return null
     */
    public function testDifferentClassEquality()
    {
        assertTrue((new Money(10, 'CHF'))->equals(new Franc(10, 'CHF')));
    }
}
