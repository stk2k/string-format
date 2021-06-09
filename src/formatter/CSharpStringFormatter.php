<?php /** @noinspection DuplicatedCode */
declare(strict_types=1);

namespace stk2k\string\format\formatter;

use stk2k\string\format\StringFormatterInterface;

final class CSharpStringFormatter implements StringFormatterInterface
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
        preg_match_all('/{([0-9:,].*?)}/', $format, $matches);

        $ret = $format;
        foreach($matches[1] as $key => $item){
            if (ctype_digit($item)){
                $search = $matches[0][$key] ?? '';
                $replace = $values[$item] ?? '';
                $ret = str_replace($search, (string)$replace, $ret);
            }
            else if (preg_match('/([0-9]+):D([0-9]*)/i',$item, $matches_item)){
                // integer
                $index = $matches_item[1];
                $digits = $matches_item[2] ?? 0;
                $search = $matches[0][$key] ?? '';
                $replace = $values[$index] ?? '';
                if ($digits > 0){
                    $replace = sprintf('%0' . $digits . 'd', $replace);
                }
                $ret = str_replace($search, $replace, $ret);
            }
            else if (preg_match('/([0-9]+):F([0-9]*)/i',$item, $matches_item)){
                // float
                $index = $matches_item[1];
                $scale = !empty($matches_item[2]) ? (int)($matches_item[2]) : 2;
                $search = $matches[0][$key] ?? '';
                $replace = $values[$index] ?? '';
                if ($scale > 0){
                    $replace = sprintf('%.0' . $scale . 'F', $replace);
                }
                $ret = str_replace($search, $replace, $ret);
            }
            else if (preg_match('/([0-9]+):([E|e])([0-9]*)/',$item, $matches_item)){
                // exponent
                $index = $matches_item[1];
                $e = $matches_item[2];
                $exponent = !empty($matches_item[3]) ? (int)($matches_item[3]) : 6;
                $search = $matches[0][$key] ?? '';
                $replace = $values[$index] ?? '';
                if ($exponent > 0){
                    $replace = sprintf('%.' . $exponent . $e, $replace);
                }
                $ret = str_replace($search, $replace, $ret);
            }
            else if (preg_match('/([0-9]+):N([0-9]*)/i',$item, $matches_item)){
                // number
                $index = $matches_item[1];
                $scale = !empty($matches_item[2]) ? (int)($matches_item[2]) : 2;
                $search = $matches[0][$key] ?? '';
                $replace = $values[$index] ?? 0;
                if ($scale > 0){
                    $replace = number_format($replace, $scale);
                }
                $ret = str_replace($search, $replace, $ret);
            }
            else if (preg_match('/([0-9]+):P([0-9]*)/i',$item, $matches_item)){
                // percentage
                $index = $matches_item[1];
                $scale = !empty($matches_item[2]) ? (int)($matches_item[2]) : 2;
                $search = $matches[0][$key] ?? '';
                $replace = !empty($values[$index]) ? (float)($values[$index]) * 100.0 : 0;
                if ($scale > 0){
                    $replace = sprintf('%.0' . $scale . 'F', $replace);
                }
                $replace = "$replace%";
                $ret = str_replace($search, $replace, $ret);
            }
            else if (preg_match('/([0-9]+):([X|x])([0-9]*)/',$item, $matches_item)){
                // hexadecimal number
                $index = $matches_item[1];
                $x = $matches_item[2];
                $digits = !empty($matches_item[3]) ? (int)($matches_item[3]) : 0;
                $search = $matches[0][$key] ?? '';
                $replace = $values[$index] ?? '';
                if ($digits > 0){
                    $replace = sprintf('%0' . $digits . $x, $replace);
                }
                else{
                    $replace = sprintf('%' . $x, $replace);
                }
                $ret = str_replace($search, $replace, $ret);
            }
        }

        return $ret;
    }

}