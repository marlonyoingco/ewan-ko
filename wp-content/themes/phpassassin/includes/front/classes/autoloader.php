<?php

/**
 * Include Global Functions that we can use in the Front Display
 */
$actionPath = __DIR__.'/ThemeActions/';

// Include the Core Classes
foreach(glob("{$actionPath}core/*.php") as $file) {
    require_once $file;
}

// Include the Theme Actions
foreach(glob("$actionPath*.php") as $file) {
    require_once $file;

    // Get the filename -> {$Filename}.php
    $fileExplode = explode('/', $file);
    $className = explode('.', $fileExplode[count($fileExplode)-1])[0];

    // Initialize it automatically.
    $action = new $className();
    $action->initialize($className);
}