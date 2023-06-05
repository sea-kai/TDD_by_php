<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Money\Money;
use App\Models\Money\Bank;
use App\Models\Money\Sum;

use function PHPUnit\Framework\assertSame;
use function PHPUnit\Framework\assertFalse;
use function PHPUnit\Framework\assertObjectEquals;
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

        assertObjectEquals(Money::dollar(10), $five->times(2));

        assertObjectEquals(Money::dollar(15), $five->times(3));
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
        assertSame('USD', Money::dollar(1)->currency());

        assertSame('CHF', Money::franc(1)->currency());
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

        assertObjectEquals(Money::dollar(10), $reduced);
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

        assertObjectEquals($five, $sum->augend);

        assertObjectEquals($five, $sum->addend);
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

        assertObjectEquals(Money::dollar(7), $result);
    }

    /**
     * @test
     * @return null
     */
    public function testReduceMoney()
    {
        $bank = new Bank();
        $result = $bank->reduce(Money::dollar(1), 'USD');

        assertObjectEquals(Money::dollar(1), $result);
    }

    /**
     * @test
     * @return null
     */
    public function testReduceMoneyDefferentCurrency()
    {
        $bank = new Bank();
        $bank->addRate('CHF', 'USD', 2);

        $result = $bank->reduce(Money::franc(2), 'USD');

        assertObjectEquals(Money::dollar(1), $result);
    }

    /**
     * @test
     */
    public function testIdentityRate()
    {
        assertSame(1, (new Bank())->rate('USD', 'USD'));
    }

    /**
     * @test
     */
    public function testMixedAddition()
    {
        $fiveBucks = Money::dollar(5);
        $tenFrancs = Money::franc(10);

        $bank = new Bank();
        $bank->addRate('CHF', 'USD', 2);
        $result = $bank->reduce($fiveBucks->plus($tenFrancs), 'USD');

        assertObjectEquals(Money::dollar(10), $result);
    }

    /**
     * @test
     */
    public function testSumPlusMoney()
    {
        $fiveBucks = Money::dollar(5);
        $tenFrancs = Money::franc(10);

        $bank = new Bank();
        $bank->addRate('CHF', 'USD', 2);

        $sum = (new Sum($fiveBucks, $tenFrancs))->plus($fiveBucks);
        $result = $bank->reduce($sum, 'USD');

        assertObjectEquals(Money::dollar(15), $result);
    }

    /**
     * @test
     */
    public function testSumTimes()
    {
        $fiveBucks = Money::dollar(5);
        $tenFrancs = Money::franc(10);

        $bank = new Bank();
        $bank->addRate('CHF', 'USD', 2);

        $sum = (new Sum($fiveBucks, $tenFrancs))->times(2);
        $result = $bank->reduce($sum, 'USD');
        assertObjectEquals(Money::dollar(20), $result);
    }
}
