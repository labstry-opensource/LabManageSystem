<?php

spl_autoload_register(function ($class_name) {
    include BASE_PATH . '/src/' . $class_name . '.php';
});