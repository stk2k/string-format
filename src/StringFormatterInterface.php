<?php
declare(strict_types=1);

namespace stk2k\string\format;

interface StringFormatterInterface
{
    /**
     * Format string
     *
     * @param string $format
     * @param array $values
     *
     * @return string
     */
    public function formatString(string $format, array $values) : string;
}