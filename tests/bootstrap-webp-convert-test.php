<?php
require __DIR__ . '/../build/webp-convert.inc';

spl_autoload_register('webpconvert_disable_autoload', true, true);
function webpconvert_disable_autoload($class) {
    //echo $class . "\n";
    if (strpos($class, 'WebPConvert\\') === 0) {
        if (strpos($class, 'WebPConvert\\Tests\\') !== 0) {
            throw new \Exception(
                'Autoloader was about to autoload a WebPConvert class. ' .
                'But that means it was not included in the build! "' . $class . '"');
            //require_once WEBPEXPRESS_PLUGIN_DIR . '/lib/classes/' . substr($class, 12) . '.php';
        }
    }
}
