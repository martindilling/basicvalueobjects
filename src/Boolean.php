<?php namespace BasicValueObjects;

use InvalidArgumentException;

/**
 * @author Martin Dilling-Hansen <martindilling@gmail.com>
 * @date   2015-02-10
 */
class Boolean implements ValueObject,Stringable
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
            throw new InvalidArgumentException('Provided argument [' . $value . '] is not a valid boolean!');
        }

        $this->value = (bool) $value;
    }

    /**
     * @return static
     */
    public static function true()
    {
        return new static(true);
    }

    /**
     * @return static
     */
    public static function false()
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
        return (string) ($this->value ? 'true' : 'false');
    }

    /**
     * @return string
     */
    public function toString()
    {
        return $this->__toString();
    }

    /**
     * @param string $value
     * @return static
     */
    public static function fromString($value)
    {
        return new static((bool) $value);
    }
}
