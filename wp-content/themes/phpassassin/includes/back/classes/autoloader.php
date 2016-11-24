<?php

/**
 * POSTS AND CUSTOM POSTS SETTINGS
 *
 * Load PostControl that is extended by all posts classes
 * Load all post settings
 */
$postPath = __DIR__.'/Posts/';

require_once $postPath.'core/PostControl.php';
foreach(glob("$postPath*.php") as $file) {
    require_once $file;

    // Get the filename -> {$Filename}.php
    $fileExplode = explode('/', $file);
    $className = explode('.', $fileExplode[count($fileExplode)-1])[0];

    // Initialize it automatically.
    $action = new $className();
}


/**
 * WIDGETS
 */
$widgetPath = __DIR__.'/Widgets/';

require_once $widgetPath.'core/WidgetFieldHelper.php';
require_once $widgetPath.'core/WidgetHelper.php';
foreach(glob("$widgetPath*.php") as $file) {
    require_once $file;
}

/**
 * THEME SETTINGS
 */
$themeSettingsPath = __DIR__.'/ThemeSettings/';
require_once $themeSettingsPath.'index.php';