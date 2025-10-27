<?php

if (!function_exists('replaceMultiSpacesAndNewLine')) {
    /**
     * @param string $str
     * @return string
     */
    function replaceMultiSpacesAndNewLine($str, $to = " ")
    {
        return trim(preg_replace("/[\s]+/", $to, $str));
    }
}

if (!function_exists('minimize')) {
    /**
     * @param string $strd
     * @return string
     */
    function minimize($str)
    {
        return str_replace(
            array("> ", "\n", "\r\n", ": ", "; ", "} ", "{ ", " }", " {", " =", "= ", ", ", " ,"),
            array(">", "", "", ":", ";", "}", "{", "}", "{", "=", "=", ",", ","),
            replaceMultiSpacesAndNewLine($str)
        );
    }
}

if (!function_exists('size_format')) {
    /**
     * @param integer $bytes
     * @param integer $decimal_digits
     * @param string $force ('B', 'KB', 'MB', 'GB', 'TB', 'PB')
     * @param string $space_between
     * @param bool $no_power
     * @return string
     */
    function size_format($bytes, $decimal_digits = 2, $space_between = ' ', $force = null, $no_power = false)
    {
        $bytes = max(0, round($bytes));
        $units = array('B', 'KB', 'MB', 'GB', 'TB', 'PB');
        $power = array_search($force, $units);
        if ($power === false) {
            $power = ($bytes > 0) ? floor(log($bytes, 1024)) : 0;
        }
        if ($no_power) {
            return number_format(round($bytes / pow(1024, $power), $decimal_digits), $decimal_digits, '.', '');
        } else {
            return number_format(round($bytes / pow(1024, $power), $decimal_digits), $decimal_digits, '.', '') . $space_between . $units[$power];
        }
    }
}
