<?php
// Bootstrap the framework DO NOT edit this
require COREPATH.'bootstrap.php';

Autoloader::add_classes(array(
// Add classes you want to override here
// Example: 'View' => APPPATH.'classes/view.php',
  'Config'              => APPPATH . 'classes/extension/config.php',
  'Validation'          => APPPATH . 'classes/extension/validation.php',
  'Auth_Opauth'         => APPPATH . 'classes/extension/opauth.php',
  'Controller_Template' => APPPATH . 'classes/extension/template.php',
  'Form'                => APPPATH . 'classes/extension/form.php',
  'Form_Instance'       => APPPATH . 'classes/extension/instance.php',
));

// Register the autoloader
Autoloader::register();

Config::load('dir');
Config::load('app');
Config::load('env');

/**
 * Your environment.  Can be set to any of the following:
 *
 * Fuel::DEVELOPMENT
 * Fuel::TEST
 * Fuel::STAGING
 * Fuel::PRODUCTION
 */
Fuel::$env = (isset($_SERVER['FUEL_ENV']) ? $_SERVER['FUEL_ENV'] : Config::get('FUEL.ENV'));

// Initialize the framework with the config file.
Fuel::init('config.php');
