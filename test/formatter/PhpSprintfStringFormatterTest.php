<?php
declare(strict_types=1);

namespace stk2k\string\format\test\formatter;

use PHPUnit\Framework\TestCase;
use stk2k\string\format\formatter\PhpSprintfStringFormatter;
use stk2k\string\format\test\classes\MyStringClass;

final class PhpSprintfStringFormatterTest extends TestCase
{
    public function testFormat()
    {
        MyStringClass::setStringFormatter(new PhpSprintfStringFormatter());

        // string
        $this->assertEquals('Hello, David!', MyStringClass::format('Hello, %s!', 'David'));
        $this->assertEquals('Hello, David, Nancy!', MyStringClass::format('Hello, %s, %s!', 'David', 'Nancy'));

        // string/integer
        $this->assertEquals('David, give me 123 dollars!', MyStringClass::format('%s, give me %d dollars!', 'David', 123));
        $this->assertEquals('2021-06-10', MyStringClass::format('%04d-%02d-%02d', 2021, 6, 10));

        // float
        $this->assertEquals('Points: 9.80', MyStringClass::format('Points: %.02f', 9.8));
        $this->assertEquals('Points: 9.8000', MyStringClass::format('Points: %.04f', 9.8));

        // exponent
        $this->assertEquals('3.625e+8', MyStringClass::format('%.3e', 362525200));
    }
}