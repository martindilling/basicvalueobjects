<?php namespace BasicValueObjects\Tests;
use BasicValueObjects\Boolean;

/**
 * @author Martin Dilling-Hansen <martindilling@gmail.com>
 * @date   2015-02-10
 */
class BooleanTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function should_require_argument()
    {
        $this->setExpectedException(\InvalidArgumentException::class);

        new Boolean(null);
    }

    /** @test */
    public function should_not_accept_integer()
    {
        $this->setExpectedException(\InvalidArgumentException::class);

        new Boolean(123);
    }

    /** @test */
    public function should_not_accept_float()
    {
        $this->setExpectedException(\InvalidArgumentException::class);

        new Boolean(12.3);
    }

    /** @test */
    public function should_not_accept_string()
    {
        $this->setExpectedException(\InvalidArgumentException::class);

        new Boolean('invalid');
    }

    /** @test */
    public function should_hold_value()
    {
        $booleanTrue  = new Boolean(true);
        $booleanFalse = new Boolean(false);

        $this->assertEquals(true, $booleanTrue->native());
        $this->assertEquals('true', (string) $booleanTrue);

        $this->assertEquals(false, $booleanFalse->native());
        $this->assertEquals('false', (string) $booleanFalse);
    }

    /** @test */
    public function can_construct_with_static_calls()
    {
        $booleanTrue  = Boolean::TRUE();
        $booleanFalse = Boolean::FALSE();

        $this->assertEquals(true, $booleanTrue->native());
        $this->assertEquals('true', (string) $booleanTrue);

        $this->assertEquals(false, $booleanFalse->native());
        $this->assertEquals('false', (string) $booleanFalse);
    }

    /** @test */
    public function can_use_constants()
    {
        $this->assertEquals(true, Boolean::TRUE);
        $this->assertEquals(false, Boolean::FALSE);
    }

    /** @test */
    public function should_compare_equality()
    {
        $boolean1 = new Boolean(true);
        $boolean2 = new Boolean(true);
        $boolean3 = new Boolean(false);

        $this->assertTrue($boolean1->equals($boolean2));
        $this->assertFalse($boolean1->equals($boolean3));
        $this->assertFalse($boolean2->equals($boolean3));
    }
}
