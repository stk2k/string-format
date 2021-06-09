<?php
declare(strict_types=1);

namespace stk2k\string\format\formatter;

use stk2k\string\format\StringFormatterInterface;

final class PhpSprintfStringFormatter implements StringFormatterInterface
{
    /**
     * Format string
     *
     * @param string $format
     * @param array $values
     *
     * @return string
     */
    public function formatString(string $format, array $values) : string
    {
        return vsprintf($format, $values);
    }

}