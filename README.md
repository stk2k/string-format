String formatter(C# String.Format/sprintf)
=======================

[![Latest Version on Packagist](https://img.shields.io/packagist/v/stk2k/string-format.svg?style=flat-square)](https://packagist.org/packages/stk2k/string-format)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://api.travis-ci.com/stk2k/string-format.svg?branch=main)](https://api.travis-ci.com/stk2k/string-format.svg?branch=main)
[![Coverage Status](https://coveralls.io/repos/github/stk2k/string-format/badge.svg?branch=main)](https://coveralls.io/repos/github/stk2k/string-format/badge.svg?branch=main)
[![Code Climate](https://codeclimate.com/github/stk2k/string-format/badges/gpa.svg)](https://codeclimate.com/github/stk2k/string-format)
[![Total Downloads](https://img.shields.io/packagist/dt/stk2k/string-format.svg?style=flat-square)](https://packagist.org/packages/stk2k/string-format)

## Description

String formatter(C# String.Format/sprintf)


## Feature

  - Supports PHP sprintf formatter and C# String.Format formatter
  - You can implement your own formatter(StringFormatterInterface)
  - Implemented as a static method in trait

## Usage

### PHP sprintf formatter

```php
use stk2k\string\format\test\classes\MyStringClass;
use stk2k\string\format\formatter\PhpSprintfStringFormatter;

MyStringClass::setStringFormatter(new PhpSprintfStringFormatter());
         
// string
echo MyStringClass::format('Hello, %s!', 'David');       // Hello, David!

// integer
echo MyStringClass::format('Come here after %d days', 3);       // Come here after 3 days
echo MyStringClass::format('%04d-%02d-%02d', 2021, 6, 10);      // 2021-06-10

// float
echo MyStringClass::format('%.03f', 3.1414926535);      // 3.141

// exponent
echo MyStringClass::format('%.3e', 362525200);      // 3.625e+8
echo MyStringClass::format('%.3E', 362525200);      // 3.625E+8

```

### C# String.Format formatter

```php
use stk2k\string\format\test\classes\MyStringClass;
use stk2k\string\format\formatter\PhpSprintfStringFormatter;
  
// string
echo MyStringClass::format('Hello, {0}!', 'David');       // Hello, David!

// integer
echo MyStringClass::format('Come here after {0:d} days', 3);       // Come here after 3 days
echo MyStringClass::format('{0:d4}-{1:d2}-{2:d2}', 2021, 6, 10);      // 2021-06-10

// float
echo MyStringClass::format('{0:F3}', 3.1414926535);      // 3.141

// exponent
echo MyStringClass::format('{0:e3}', 362525200);      // 3.625e+8
echo MyStringClass::format('{0:E3}', 362525200);      // 3.625E+8

// number
echo MyStringClass::format('{0:n}', 123456.789);      // 123,456.79
echo MyStringClass::format('{0:n3}', 123456.789);     // 123,456.789
echo MyStringClass::format('{0:n4}', 123456.789);     // 123,456.7890

// percentage
echo MyStringClass::format('Ratio: {0:P}', 0.18);      // Ratio: 18.00%
echo MyStringClass::format('Ratio: {0:P3}', 0.18);     // Ratio: 18.000%
echo MyStringClass::format('Ratio: {0:P4}', 0.18);     // Ratio: 18.0000%

// hexadecimal number
echo MyStringClass::format('{0:X}', 10);        // A
echo MyStringClass::format('{0:X3}', 10);       // 00A

```

## Requirement

PHP 7.2 or later

## Installing stk2k/string-format

The recommended way to install stk2k/string-format is through
[Composer](http://getcomposer.org).

```bash
composer require stk2k/string-format
```

After installing, you need to require Composer's autoloader:

```php
require 'vendor/autoload.php';
```

## License
This library is licensed under the MIT license.

## Author

[stk2k](https://github.com/stk2k)

## Disclaimer

This software is no warranty.

We are not responsible for any results caused by the use of this software.

Please use the responsibility of the your self.


