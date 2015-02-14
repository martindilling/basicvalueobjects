<?php namespace BasicValueObjects;

use InvalidArgumentException;

/**
 * @author Martin Dilling-Hansen <martindilling@gmail.com>
 * @date   2015-02-14
 */
class Float implements ValueObject
{
    /**
     * @var float
     */
    private $value;

    /**
     * @param float $value
     *
     * @throws \InvalidArgumentException
     */
    public function __construct($value)
    {
        if (!is_float($value) && !is_integer($value)) {
            throw new InvalidArgumentException('Provided argument [' . $value . '] is not valid!');
        }

        $this->value = (float) $value;
    }

    /**
     * @return float
     */
    public function native()
    {
        return $this->value;
    }

    /**
     * @param \BasicValueObjects\ValueObject $other
     *
     * @return bool
     */
    public function equals(ValueObject $other)
    {
        if (\get_class($this) !== \get_class($other)) {
            return false;
        }

        return $this->native() === $other->native();
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->value;
    }
}
