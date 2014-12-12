<?php

/** This file is part of KCFinder project
  *
  *      @desc Base configuration file
  *   @package KCFinder
  *   @version 3.12
  *    @author Pavel Tzonkov <sunhater@sunhater.com>
  * @copyright 2010-2014 KCFinder Project
  *   @license http://opensource.org/licenses/GPL-3.0 GPLv3
  *   @license http://opensource.org/licenses/LGPL-3.0 LGPLv3
  *      @link http://kcfinder.sunhater.com
  */

/* IMPORTANT!!! Do not comment or remove uncommented settings in this file
   even if you are using session configuration.
   See http://kcfinder.sunhater.com/install for setting descriptions */

error_reporting(-1);
ini_set('display_errors', 1);

/**
 * Website document root
 */
define('DOCROOT', $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR);

/**
 * Path to the application directory.
 */
define('APPPATH', realpath($_SERVER['DOCUMENT_ROOT'].'/../fuel/app/').DIRECTORY_SEPARATOR);

/**
 * Path to the default packages directory.
 */
define('PKGPATH', realpath($_SERVER['DOCUMENT_ROOT'].'/../fuel/packages/').DIRECTORY_SEPARATOR);

/**
 * The path to the framework core.
 */
define('COREPATH', realpath($_SERVER['DOCUMENT_ROOT'].'/../fuel/core/').DIRECTORY_SEPARATOR);

// Get the start time and memory for use later
defined('FUEL_START_TIME') or define('FUEL_START_TIME', microtime(true));
defined('FUEL_START_MEM') or define('FUEL_START_MEM', memory_get_usage());

// Load in the Fuel autoloader
require COREPATH.'classes'.DIRECTORY_SEPARATOR.'autoloader.php';
class_alias('Fuel\\Core\\Autoloader', 'Autoloader');

// Boot the app
require APPPATH.'bootstrap.php';

$_CONFIG = array(


// GENERAL SETTINGS

    'disabled' => false,
    'uploadURL' => Config::get('UPLOAD_URL'),
    'uploadDir' => Config::get('UPLOAD_DIR'),
    'theme' => "default",

    'types' => array(
        '' => "",
    ),


// IMAGE SETTINGS

    'imageDriversPriority' => "imagick gmagick gd",
    'jpegQuality' => 90,
    'thumbsDir' => ".thumbs",

    'maxImageWidth' => 0,
    'maxImageHeight' => 0,

    'thumbWidth' => 100,
    'thumbHeight' => 100,

    'watermark' => "",


// DISABLE / ENABLE SETTINGS

    'denyZipDownload' => false,
    'denyUpdateCheck' => false,
    'denyExtensionRename' => false,


// PERMISSION SETTINGS

    'dirPerms' => 0755,
    'filePerms' => 0644,

    'access' => array(

        'files' => array(
            'upload' => true,
            'delete' => true,
            'copy'   => true,
            'move'   => true,
            'rename' => true
        ),

        'dirs' => array(
            'create' => true,
            'delete' => true,
            'rename' => true
        )
    ),

    'deniedExts' => "exe com msi bat cgi pl php phps phtml php3 php4 php5 php6 py pyc pyo pcgi pcgi3 pcgi4 pcgi5 pchi6",


// MISC SETTINGS

    'filenameChangeChars' => array(/*
        ' ' => "_",
        ':' => "."
    */),

    'dirnameChangeChars' => array(/*
        ' ' => "_",
        ':' => "."
    */),

    'mime_magic' => "",

    'cookieDomain' => "idecom-heyg0811.c9.io",
    'cookiePath' => "",
    'cookiePrefix' => 'KCFINDER_',


// THE FOLLOWING SETTINGS CANNOT BE OVERRIDED WITH SESSION SETTINGS

    '_normalizeFilenames' => false,
    '_check4htaccess' => false,
    //'_tinyMCEPath' => "/tiny_mce",

    '_sessionVar' => "KCFINDER",
    '_sessionLifetime' => 30,
    // '_sessionDir' => "session_save_path",
    '_sessionDomain' => "idecom-heyg0811.c9.io",
    '_sessionPath' => session_save_path(),

    //'_cssMinCmd' => "java -jar /path/to/yuicompressor.jar --type css {file}",
    //'_jsMinCmd' => "java -jar /path/to/yuicompressor.jar --type js {file}",

);

    // 
    if (Auth::check()){
        // 閲覧制限を解除
        $_CONFIG['disabled'] = false;
        
        // データ取得
        $user_id      = Auth::get('id');
        $project_type = Session::get('project.type');
        $project_id   = Session::get('project.' . $project_type . '.id');
        
        // パス設定
        $project_path = "/" . $project_type . "/" . $project_id ."/";
        $file_path    = $_CONFIG['uploadDir'] . $user_id . $project_path;
        
        // ディレクトリ作成
        if (!file_exists($file_path)) {
            mkdir($file_path, 0755, true);
        }
        
        // Finderのパスを更新
        $_CONFIG['uploadURL']  = $_CONFIG['uploadURL'] . $user_id . $project_path;
        $_CONFIG['uploadDir']  = $file_path;
    }

?>