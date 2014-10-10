<?php
/**
 * The development database settings. These get merged with the global settings.
 */

return array(
  'default' => array(
    'type'  => Config::get('DB.TYPE'),
    'connection' => array(
      'host'     => Config::get('DB.HOST'),
      'database' => Config::get('DB.NAME'),
      'username' => Config::get('DB.USERNAME'),
      'password' => Config::get('DB.PASSWORD'),
    ),
  ),
);
