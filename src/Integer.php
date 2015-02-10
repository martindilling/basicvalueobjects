<?php namespace BasicValueObjects;

use InvalidArgumentException;

/**
 * @author Martin Dilling-Hansen <martindilling@gmail.com>
 * @date   2015-02-10
 */
class Integer implements ValueObject
{
    /**
     * @var int
     */
    private $value;

    /**
     * @param int $value
     *
     * @throws \InvalidArgumentException
     */
    public function __construct($value)
    {
        if (!is_integer($value)) {
            throw new InvalidArgumentException('Provided argument [' . $value . '] is not valid!');
        }

        $this->value = (int) $value;
    }

    /**
     * @return int
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
