# Basic Value Objects

[![Latest Version](https://img.shields.io/github/release/martindilling/basicvalueobjects.svg?style=flat-square)](https://github.com/martindilling/basicvalueobjects/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/martindilling/basicvalueobjects/master.svg?style=flat-square)](https://travis-ci.org/martindilling/basicvalueobjects)
[![Coverage Status](https://img.shields.io/scrutinizer/coverage/g/martindilling/basicvalueobjects.svg?style=flat-square)](https://scrutinizer-ci.com/g/martindilling/basicvalueobjects/code-structure)
[![Quality Score](https://img.shields.io/scrutinizer/g/martindilling/basicvalueobjects.svg?style=flat-square)](https://scrutinizer-ci.com/g/martindilling/basicvalueobjects)
[![Total Downloads](https://img.shields.io/packagist/dt/martindilling/basicvalueobjects.svg?style=flat-square)](https://packagist.org/packages/martindilling/basicvalueobjects)

A small collection of the most basic value objects. These can help make your code more expressive, and save some manual validation.

## Install

Via Composer

``` bash
$ composer require martindilling/basicvalueobjects
```

## Usage

Using these value objects you can type-hint method arguments to make it more sure
the arguments will be given in the right format.

In this example the fields will hold instances of the value objects.
``` php
use BasicValueObjects\String;
use BasicValueObjects\Integer;
use BasicValueObjects\Boolean;

class CrewMember
{
    /** @var \BasicValueObjects\String */
    private $firstname;

    /** @var \BasicValueObjects\String */
    private $lastname;

    /** @var \BasicValueObjects\Integer */
    private $age;

    /** @var \BasicValueObjects\Boolean */
    private $captain;

    function __construct(String $firstname, String $lastname, Integer $age, Boolean $captain)
    {
        $this->firstname = $firstname;
        $this->lastname  = $lastname;
        $this->age       = $age;
        $this->captain   = $captain;
    }
}

$person = new CrewMember(
    new String('Malcolm'),
    new String('Reynolds'),
    new Integer(49),
    Boolean::TRUE()
);
```

If you don't want the fields on the object to hold the instances but want the type-hinting,
you can just assign the native value of the value object to the fields:
``` php
use BasicValueObjects\String;
use BasicValueObjects\Integer;
use BasicValueObjects\Boolean;

class CrewMember
{
    /** @var string */
    private $firstname;

    /** @var string */
    private $lastname;

    /** @var int */
    private $age;

    /** @var bool */
    private $captain;

    function __construct(String $firstname, String $lastname, Integer $age, Boolean $captain)
    {
        $this->firstname = $firstname->native();
        $this->lastname  = $lastname->native();
        $this->age       = $age->native();
        $this->captain   = $captain->native();
    }
}

$person = new CrewMember(
    new String('River'),
    new String('Tam'),
    new Integer('28'),
    Boolean::FALSE()
);
```

Demonstration of how to work with the value objects:
``` php
// String
$shiny = new String("Everything's shiny, Cap'n. Not to fret.");
$fool  = new String("Oh, she'll fool ya.");

$shiny->native();       // (string) Everything's shiny, Cap'n. Not to fret.
$fool->__toString();    // (string) Oh, she'll fool ya.
$shiny->equals($fool);  // (bool) false

// Integer
$integer1 = new Integer(42);
$integer2 = new Integer(37);

$integer1->native();           // (integer) 42
$integer2->__toString();       // (string) 37
$integer1->equals($integer2);  // (bool) false

// Boolean
$boolean1 = new Boolean(true);
$boolean2 = new Boolean(Boolean::TRUE);
$boolean3 = Boolean::FALSE();

$boolean1->native();           // (bool) true
$boolean2->__toString();       // (string) true
$boolean1->equals($boolean2);  // (bool) true
$boolean1->equals($boolean3);  // (bool) false
```

## Testing

``` bash
$ phpunit
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email martindilling@gmail.com instead of using the issue tracker.

## Credits

- [Martin Dilling-Hansen](https://github.com/martindilling)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
