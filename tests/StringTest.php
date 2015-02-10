<?php namespace BasicValueObjects\Tests;

use BasicValueObjects\String;

/**
 * @author Martin Dilling-Hansen <martindilling@gmail.com>
 * @date   2015-02-10
 */
class StringTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function should_require_argument()
    {
        $this->setExpectedException(\InvalidArgumentException::class);

        new String(null);
    }

    /** @test */
    public function should_not_accept_integer()
    {
        $this->setExpectedException(\InvalidArgumentException::class);

        new String(123);
    }

    /** @test */
    public function should_not_accept_float()
    {
        $this->setExpectedException(\InvalidArgumentException::class);

        new String(12.3);
    }

    /** @test */
    public function should_not_accept_bool()
    {
        $this->setExpectedException(\InvalidArgumentException::class);

        new String(true);
    }

    /** @test */
    public function should_hold_value()
    {
        $string = new String('Some text');

        $this->assertEquals('Some text', $string->native());
        $this->assertEquals('Some text', (string) $string);
    }

    /** @test */
    public function should_compare_equality()
    {
        $string1 = new String('Some text');
        $string2 = new String('Some text');
        $string3 = new String('Some other text');

        $this->assertTrue($string1->equals($string2));
        $this->assertFalse($string1->equals($string3));
        $this->assertFalse($string2->equals($string3));
    }

    /** @test */
    public function can_be_empty()
    {
        $string1 = new String('');
        $string2 = new String('Some text');

        $this->assertTrue($string1->isEmpty());
        $this->assertFalse($string2->isEmpty());
    }
}
