<?php

spl_autoload_register(function ($className) {
    include ROOT_DIR . '/' . $className . '.php';
});


