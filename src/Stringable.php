<?php namespace BasicValueObjects;

/**
 * @author Martin Dilling-Hansen <martindilling@gmail.com>
 * @date   2015-02-14
 */
interface Stringable
{
    /**
     * @param string $value
     * @return static
     */
    public static function fromString($value);

    /**
     * @return string
     */
    public function toString();
}
