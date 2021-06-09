<?php
declare(strict_types=1);

namespace stk2k\string\format;

use stk2k\string\format\formatter\CSharpStringFormatter;

trait StringFormatTrait
{
    /** @var StringFormatterInterface */
    private static $string_formatter;

    /**
     * Set format parser
     *
     * @param StringFormatterInterface $string_formatter
     */
    public static function setStringFormatter(StringFormatterInterface $string_formatter) : void
    {
        self::$string_formatter = $string_formatter;
    }

    /**
     * Format a string with values
     *
     * @param string $format
     * @param ...$values
     *
     * @return string
     */
    public static function format(string $format, ... $values) : string
    {
        // by default, it uses c sharp formatter
        $formatter = self::$string_formatter ?? new CSharpStringFormatter();

        return $formatter->formatString($format, $values);
    }
}