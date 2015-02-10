<?php namespace BasicValueObjects;

use InvalidArgumentException;

/**
 * @author Martin Dilling-Hansen <martindilling@gmail.com>
 * @date   2015-02-10
 */
class String implements ValueObject, canBeEmpty
{
    /**
     * @var string
     */
    private $value;

    /**
     * @param string $value
     * @throws \InvalidArgumentException
     */
    public function __construct($value)
    {
        if (!is_string($value)) {
            throw new InvalidArgumentException('Provided argument [' . $value . '] is not valid!');
        }

        $this->value = (string) $value;
    }

    /**
     * @return string
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
     * @return bool
     */
    public function isEmpty()
    {
        return \strlen($this->native()) === 0;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->value;
    }
}
