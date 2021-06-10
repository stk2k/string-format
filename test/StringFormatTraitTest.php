<?php
declare(strict_types=1);

namespace stk2k\string\format\test;

use PHPUnit\Framework\TestCase;
use stk2k\string\format\test\classes\MyStringClass;

final class StringFormatTraitTest extends TestCase
{
    public function testFormatArray()
    {
        $this->assertEquals('David, give me 123 dollars!', MyStringClass::formatArray('{0}, give me {1:d} dollars!', ['David', 123]));
    }
}