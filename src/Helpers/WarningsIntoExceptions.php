<?php

namespace WebPConvert\Helpers;

use WebPConvert\Exceptions\WarningException;

abstract class WarningsIntoExceptions
{

    public static function warningHandler($errno, $errstr, $errfile, $errline)
    {
        //echo 'aeothsutsanoheutsnhaoeu: ' . E_USER_WARNING . ':' . E_WARNING;
        throw new WarningException(
            'A warning was issued',
            'A warning was issued: ' . ': ' . $errstr . ' in ' . $errfile . ', line ' . $errline .
                ', PHP ' . PHP_VERSION .
                ' (' . PHP_OS . ')'
        );

        /* Don't execute PHP internal error handler */
        return true;
    }

    public static function activate()
    {
        set_error_handler(
            array('\\WebPConvert\\Helpers\\WarningsIntoExceptions', "warningHandler"),
            E_WARNING | E_USER_WARNING | E_ALL
        );   // E_USER_WARNING
    }

    public static function deactivate()
    {
        restore_error_handler();
    }
}
