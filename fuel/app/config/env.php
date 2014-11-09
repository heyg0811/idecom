<?php
/**↲
 *
 * @brif      環境定数用ファイル↲
 * @author    Sakamoto↲
 * @date      2014/10/07↲
 *
 */

return array(
// データベース関連
  'DB' => array(
    'TYPE'      => 'mysqli',
    'HOST'      => 'localhost',
    'NAME'      => 'idecom_db',
    'USERNAME'  => 'root',
    'PASSWORD'  => 'nono0811',
  ),

  /**
  * プロジェクト環境タイプ
  *
  * Fuel::DEVELOPMENT   // 開発環境
  * Fuel::TEST          // テスト環境
  * Fuel::STAGING       // ステージング環境
  * Fuel::PRODUCTION    // 製品環境
  */
  'FUEL' => array(
    'ENV' => Fuel::PRODUCTION,
  ),

  /**
  * Google ClientID ClientSercret
  *
  * idecom.heyg.pw
  * -> 386559768393-0ti6je0jakp2fq2bfcqbuul9bk72sdia.apps.googleusercontent.com
  * -> HUeacADWZ48oFyv0ZiekL8fz
  *
  * localhost
  * -> 386559768393-2bse7a980tfr48qb67b5js219hho1bt9.apps.googleusercontent.com
  * -> rxA_L23kIUnWQqCIZC5U0f6p
  *
  */
  'GOOGLE' => array(
    'CLIENTID' => '386559768393-0ti6je0jakp2fq2bfcqbuul9bk72sdia.apps.googleusercontent.com',
    'CLIENTSECRET' => 'HUeacADWZ48oFyv0ZiekL8fz',
  ),
);
