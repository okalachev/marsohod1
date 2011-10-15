<?

/*
 * Development settings
 */

error_reporting(E_ALL);

global $settings;

$settings['cache_templates'] = false;
$settings['debug'] = true;
$settings['url_base'] = 'http://marso';
$settings['social'] = false;
unset($settings['metrica']);