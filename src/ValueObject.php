<?php namespace BasicValueObjects;

/**
 * @author Martin Dilling-Hansen <martindilling@gmail.com>
 * @date   2015-02-10
 */
interface ValueObject
{
    /**
     * @return mixed
     */
    public function native();

    /**
     * @param \BasicValueObjects\ValueObject $other
     *
     * @return bool
     */
    public function equals(ValueObject $other);

    /**
     * @return string
     */
    public function __toString();
}
