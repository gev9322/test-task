<?php

define('COMMAND_START', microtime(true));
define('ROOT_DIR', __DIR__. '/src');

include 'autoload/autoload.php';

if ($argv) {
    $filePath = ROOT_DIR . '/Commands/' . $argv[1] . '.php';
    $commandExists = @include $filePath;
    if (!$commandExists) {
        echo "$filePath not exists in commands directory";
        die;
    }
    if(class_exists($argv[1])){
        $class = new $argv[1]();
        if(method_exists($class, 'run')){
            $class->run(...array_slice($argv, 2));
        }else{
            echo $class::class . " havn't method run";
            die;
        }
    }
}

