<?php namespace BasicValueObjects;

/**
 * @author Martin Dilling-Hansen <martindilling@gmail.com>
 * @date   2015-02-10
 */
interface canBeEmpty
{
    /**
     * @return bool
     */
    public function isEmpty();
}
