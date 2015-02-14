<?php namespace BasicValueObjects\Tests;

use BasicValueObjects\ValueObject;
use BasicValueObjects\Float;

/**
 * @author Martin Dilling-Hansen <martindilling@gmail.com>
 * @date   2015-02-14
 */
class FloatTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function should_require_argument()
    {
        $this->setExpectedException(\InvalidArgumentException::class);

        new Float(null);
    }

    /** @test */
    public function should_not_accept_string()
    {
        $this->setExpectedException(\InvalidArgumentException::class);

        new Float('123');
    }

    /** @test */
    public function should_not_accept_bool()
    {
        $this->setExpectedException(\InvalidArgumentException::class);

        new Float(true);
    }

    /** @test */
    public function should_hold_value()
    {
        $float = new Float(123.4);

        $this->assertEquals(123.4, $float->native());
        $this->assertTrue(is_float($float->native()));
        $this->assertEquals('123.4', (string) $float);
    }

    /** @test */
    public function should_return_value_as_float()
    {
        $float = new Float(123.4);

        $this->assertTrue(is_float($float->native()));
    }

    /** @test */
    public function should_accept_whole_numbers()
    {
        $float = new Float(123);

        $this->assertEquals(123, $float->native());
        $this->assertEquals('123', (string) $float);
    }

    /** @test */
    public function should_convert_whole_numbers_to_float()
    {
        $float = new Float(123);

        $this->assertTrue(is_float($float->native()));
    }

    /** @test */
    public function should_compare_equality()
    {
        $float1 = new Float(111.11);
        $float2 = new Float(111.11);
        $float3 = new Float(222.22);
        $mock = $this->getMock(ValueObject::class);

        $this->assertTrue($float1->equals($float2));
        $this->assertFalse($float1->equals($float3));
        $this->assertFalse($float2->equals($float3));
        $this->assertFalse($float1->equals($mock));
    }
}
