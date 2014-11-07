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
    'PASSWORD'  => 'root',
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
    'ENV' => Fuel::DEVELOPMENT,
  ),

  /**
  * Google ClientID ClientSercret
  *
  * idecom.heyg.pw
  * -> 386559768393-8rh7arqj0kqv6gs9tkf8sj3h92d8te4c.apps.googleusercontent.com
  * -> ucPH2SylnJB7r-b_4ftR0xw5
  *
  * localhost
  * -> 386559768393-2bse7a980tfr48qb67b5js219hho1bt9.apps.googleusercontent.com
  * -> rxA_L23kIUnWQqCIZC5U0f6p
  *
  */
  'GOOGLE' => array(
    'CLIENTID' => '386559768393-2bse7a980tfr48qb67b5js219hho1bt9.apps.googleusercontent.com',
    'CLIENTSECRET' => 'rxA_L23kIUnWQqCIZC5U0f6p',
  ),
);
