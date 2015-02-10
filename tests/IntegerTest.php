<?php namespace BasicValueObjects\Tests;

use BasicValueObjects\Integer;

/**
 * @author Martin Dilling-Hansen <martindilling@gmail.com>
 * @date   2015-02-10
 */
class IntegerTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function should_require_argument()
    {
        $this->setExpectedException(\InvalidArgumentException::class);

        new Integer(null);
    }

    /** @test */
    public function should_not_accept_string()
    {
        $this->setExpectedException(\InvalidArgumentException::class);

        new Integer('123');
    }

    /** @test */
    public function should_not_accept_float()
    {
        $this->setExpectedException(\InvalidArgumentException::class);

        new Integer(12.3);
    }

    /** @test */
    public function should_not_accept_bool()
    {
        $this->setExpectedException(\InvalidArgumentException::class);

        new Integer(true);
    }

    /** @test */
    public function should_hold_value()
    {
        $integer = new Integer(123);

        $this->assertEquals(123, $integer->native());
        $this->assertEquals('123', (string) $integer);
    }

    /** @test */
    public function should_compare_equality()
    {
        $integer1 = new Integer(111);
        $integer2 = new Integer(111);
        $integer3 = new Integer(222);

        $this->assertTrue($integer1->equals($integer2));
        $this->assertFalse($integer1->equals($integer3));
        $this->assertFalse($integer2->equals($integer3));
    }
}