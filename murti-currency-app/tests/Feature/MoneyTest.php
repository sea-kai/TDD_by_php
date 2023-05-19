<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Money\Money;
use App\Models\Money\Bank;
use App\Models\Money\Sum;

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

        assertFalse((Money::franc(5))->equals(Money::dollar(5)));
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
    public function testSimpleAddition()
    {
        $five = Money::dollar(5);
        $sum = $five->plus($five);
        $reduced = (new Bank())->reduce($sum, 'USD');

        assertEquals(Money::dollar(10), $reduced);
    }

    /**
     * @test
     * @return null
     */
    public function testPlusReturnsSum()
    {
        $five = Money::dollar(5);
        $result = $five->plus($five);
        $sum = $result;

        assertEquals($five, $sum->augend);

        assertEquals($five, $sum->addend);
    }


    /**
     * @test
     * @return null
     */
    public function testReduceSum()
    {
        $sum = new Sum(Money::dollar(3), Money::dollar(4));
        $bank = new Bank();
        $result = $bank->reduce($sum, 'USD');

        assertEquals(Money::dollar(7), $result);
    }

    /**
     * @test
     * @return null
     */
    public function testReduceMoney()
    {
        $bank = new Bank();
        $result = $bank->reduce(Money::dollar(1), 'USD');

        assertEquals(Money::dollar(1), $result);
    }
}
