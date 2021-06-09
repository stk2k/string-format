String formatter(C# String.Format/sprintf)
=======================

[![Latest Version on Packagist](https://img.shields.io/packagist/v/stk2k/string-format.svg?style=flat-square)](https://packagist.org/packages/stk2k/string-format)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://travis-ci.org/stk2k/string-format.svg?branch=master)](https://travis-ci.org/stk2k/string-format)
[![Coverage Status](https://coveralls.io/repos/github/stk2k/string-format/badge.svg?branch=master)](https://coveralls.io/github/stk2k/string-format?branch=master)
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
         
echo MyStringClass::format('Hello, %s!', 'David');       // Hello, David!
echo MyStringClass::format('%04d-%02d-%02d', 2021, 6, 10);      // 2021-06-10

```

### C# String.Format formatter

```php
use stk2k\string\format\test\classes\MyStringClass;
use stk2k\string\format\formatter\PhpSprintfStringFormatter;
  
echo MyStringClass::format('Hello, {0}!', 'David');       // Hello, David!
echo MyStringClass::format('{0:d4}-{1:d2}-{2:d2}', 2021, 6, 10);      // 2021-06-10

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


