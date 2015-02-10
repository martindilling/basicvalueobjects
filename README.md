# Basic Value Objects

[![Latest Version](https://img.shields.io/github/release/martindilling/basicvalueobjects.svg?style=flat-square)](https://github.com/martindilling/basicvalueobjects/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/martindilling/basicvalueobjects/master.svg?style=flat-square)](https://travis-ci.org/martindilling/basicvalueobjects)
[![Coverage Status](https://img.shields.io/scrutinizer/coverage/g/martindilling/basicvalueobjects.svg?style=flat-square)](https://scrutinizer-ci.com/g/martindilling/basicvalueobjects/code-structure)
[![Quality Score](https://img.shields.io/scrutinizer/g/martindilling/basicvalueobjects.svg?style=flat-square)](https://scrutinizer-ci.com/g/martindilling/basicvalueobjects)
[![Total Downloads](https://img.shields.io/packagist/dt/martindilling/basicvalueobjects.svg?style=flat-square)](https://packagist.org/packages/martindilling/basicvalueobjects)

The most basic value objects

## Install

Via Composer

``` bash
$ composer require martindilling/basicvalueobjects
```

## Usage

``` php
$string = new BasicValueObjects\String('Hello World!');
echo $string->native();
```

More examples are coming

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
