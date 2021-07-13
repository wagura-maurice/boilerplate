<?php

use App\Models\Setting;

if (! function_exists('phone_number_prefix')) {
    /**
     * get value of individual app settings.
     *
     * @param  string  $code
     * @param  string  $number
     * @param  string  $length
     * 
     * @return string
     */
    function phone_number_prefix(string $code, string $number, string $length) : string
    {
        return $code . substr($number, -$length);
    }
}

if (! function_exists('get_settings')) {
    /**
     * get value of individual app settings.
     *
     * @param  string  $item
     *
     * @return string
     */
    function get_settings(string $item) : string
    {
        return optional(Setting::whereItem($item)->first())->value;
    }
}