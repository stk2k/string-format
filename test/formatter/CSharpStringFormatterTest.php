<?php
declare(strict_types=1);

namespace stk2k\string\format\test\formatter;

use PHPUnit\Framework\TestCase;
use stk2k\string\format\test\classes\MyStringClass;

final class CSharpStringFormatterTest extends TestCase
{
    public function testFormatDefault()
    {
        // simple
        $this->assertEquals('Hello, David!', MyStringClass::format('Hello, {0}!', 'David'));
        $this->assertEquals('Hello, David, Nancy!', MyStringClass::format('Hello, {0}, {1}!', 'David', 'Nancy'));

        // integer
        $this->assertEquals('David, give me 123 dollars!', MyStringClass::format('{0}, give me {1:d} dollars!', 'David', 123));
        $this->assertEquals('David, give me 00123 dollars!', MyStringClass::format('{0}, give me {1:d5} dollars!', 'David', 123));
        $this->assertEquals('2021-06-10', MyStringClass::format('{0:d4}-{1:d2}-{2:d2}', 2021, 6, 10));

        // float
        $this->assertEquals('Points: 9.80', MyStringClass::format('Points: {0:F}', 9.8));
        $this->assertEquals('Points: 9.800', MyStringClass::format('Points: {0:F3}', 9.8));
        $this->assertEquals('Points: 9.8000', MyStringClass::format('Points: {0:F4}', 9.8));

        // exponent
        $this->assertEquals('3.625252e+8', MyStringClass::format('{0:e}', 362525200));
        $this->assertEquals('3.625e+8', MyStringClass::format('{0:e3}', 362525200));
        $this->assertEquals('3.625252E+8', MyStringClass::format('{0:E}', 362525200));
        $this->assertEquals('3.625E+8', MyStringClass::format('{0:E3}', 362525200));

        // number
        $this->assertEquals('123,456.79', MyStringClass::format('{0:n}', 123456.789));
        $this->assertEquals('123,456.789', MyStringClass::format('{0:n3}', 123456.789));
        $this->assertEquals('123,456.7890', MyStringClass::format('{0:n4}', 123456.789));

        // percentage
        $this->assertEquals('Ratio: 18.00%', MyStringClass::format('Ratio: {0:P}', 0.18));
        $this->assertEquals('Ratio: 18.000%', MyStringClass::format('Ratio: {0:P3}', 0.18));
        $this->assertEquals('Ratio: 18.0000%', MyStringClass::format('Ratio: {0:P4}', 0.18));

        // hexadecimal number
        $this->assertEquals('A', MyStringClass::format('{0:X}', 10));
        $this->assertEquals('00A', MyStringClass::format('{0:X3}', 10));
        $this->assertEquals('00ff', MyStringClass::format('{0:x4}', 255));

        if (PHP_INT_SIZE === 4){
            $this->assertEquals('FFFFFFF6', MyStringClass::format('{0:X}', -10));
            $this->assertEquals('fffffff6', MyStringClass::format('{0:x}', -10));
            $this->assertEquals('ffffffff', MyStringClass::format('{0:x4}', (int)-1));
        }
        else if (PHP_INT_SIZE === 8){
            $this->assertEquals('FFFFFFFFFFFFFFF6', MyStringClass::format('{0:X}', -10));
            $this->assertEquals('fffffffffffffff6', MyStringClass::format('{0:x}', -10));
            $this->assertEquals('ffffffffffffffff', MyStringClass::format('{0:x4}', (int)-1));
        }

        // many
        $this->assertEquals(
            'a:b:c:d:e:f:g:h:i:j:k',
            MyStringClass::format('{0}:{1}:{2}:{3}:{4}:{5}:{6}:{7}:{8}:{9}:{10}',
                'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k')
        );
    }
}