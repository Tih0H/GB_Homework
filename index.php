<?php

use app\Test;

spl_autoload_register(function ($class) {
    $class = preg_replace("/(abc)\b/iu", '', $class);
    $value = array('\\', '_');
    $file = str_replace($value, DIRECTORY_SEPARATOR, $class) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});


$test = new Test(1, 10);
echo $test->sendMassage().PHP_EOL;
