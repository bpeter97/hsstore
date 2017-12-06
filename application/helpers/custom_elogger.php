<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('db_elogger'))
{
    function db_elogger($enum, $emsg)
    {
        log_message('error', $enum . ': ' . $emsg);
    }   
}