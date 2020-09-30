<?php

spl_autoload_register(function ($class_name) {
    include ROOT_DIR . '/src/' . str_replace('\\', '/', $class_name) . '.php';
});