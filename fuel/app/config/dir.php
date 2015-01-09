<?php
/**↲
 *
 * @brif      ディレクトリパス定数用ファイル↲
 * @author    Sakamoto↲
 * @date      2014/10/07↲
 *
 */

$docroot  = substr(DOCROOT, 0, -1);
$img_path = '/assets/img/';

return array(
  'IMG_URL' => $img_path,
  'IMG_DIR' => $docroot. $img_path,
  
  'THUMBNAIL_URL' => $img_path . 'user/',
  'THUMBNAIL_DIR' => $docroot . $img_path . 'user/',

  'USER_IMG_URL'  => $img_path . 'user/',
  'USER_IMG_DIR'  => $docroot . $img_path . 'user/',

  'CATEGORY_IMG_URL'  => $img_path . 'category/',
  'CATEGORY_IMG_DIR'  => $docroot . $img_path . 'category/',
  
  'UPLOAD_URL' => '/assets/upload/',
  'UPLOAD_DIR' => $docroot . '/assets/upload/',
);
