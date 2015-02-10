<?php namespace BasicValueObjects;

use InvalidArgumentException;

/**
 * @author Martin Dilling-Hansen <martindilling@gmail.com>
 * @date   2015-02-10
 */
class Boolean implements ValueObject
{
    const TRUE  = true;
    const FALSE = false;

    /**
     * @var bool
     */
    private $value;

    /**
     * @param bool $value
     *
     * @throws \InvalidArgumentException
     */
    public function __construct($value)
    {
        if (!is_bool($value)) {
            throw new InvalidArgumentException('Provided argument [' . $value . '] is not valid!');
        }

        $this->value = (bool) $value;
    }

    /**
     * @return static
     */
    public static function TRUE()
    {
        return new static(true);
    }

    /**
     * @return static
     */
    public static function FALSE()
    {
        return new static(false);
    }

    /**
     * @return bool
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
        return $this->value ? 'true' : 'false';
    }
}
