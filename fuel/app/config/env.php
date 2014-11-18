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
    // 'ENV' => Fuel::DEVELOPMENT,       // 開発環境
    // 'ENV' => Fuel::TEST,              // テスト環境
    // 'ENV' => Fuel::STAGING,           // ステージング環境
    'ENV' => Fuel::PRODUCTION,        // 製品環境
  ),

  /**
  * Google ClientID ClientSecret
  */

  /*
   *  idecom.heyg.pw
   */
  'GOOGLE' => array(
    'CLIENTID' => '659226090229-v9gvnai3n3gm5qsefoh1e186jfj0em0n.apps.googleusercontent.com',
    'CLIENTSECRET' => 'e_3cxYRoIS5P0_yHFTKXB0U2',
  ),

  /*
   *  localhost
   */
  // 'GOOGLE' => array(
  //   'CLIENTID' => '659226090229-v67usoibjvhigp7i6uugb4vso0fmvunf.apps.googleusercontent.com',
  //   'CLIENTSECRET' => '218i4jzZstmafrKms_4GWD2F',
  // ),

  /*
   *  heyg0811 CloudIDE
   */
  // 'GOOGLE' => array(
  //   'CLIENTID' => '659226090229-vv1u3ink69c3ovuqd84sv3bo1bn2dlil.apps.googleusercontent.com',
  //   'CLIENTSECRET' => 'b5l4lGWK8QiZrNyBfd94RIvH',
  // ),

  /*
   *  b1225 CloudIDE
   */
  // 'GOOGLE' => array(
  //   'CLIENTID' => '659226090229-imtdu5irndlqtvm7tprm6defh7lc546b.apps.googleusercontent.com',
  //   'CLIENTSECRET' => 'TL-cWOrVFINIFLJMwAOBIrAt',
  // ),

  /*
   *  b1039 CloudIDE
   */
  // 'GOOGLE' => array(
  //   'CLIENTID' => '659226090229-iq9h2f2pfblcmbvl7rf3kjlp70mlkerf.apps.googleusercontent.com',
  //   'CLIENTSECRET' => 'ZfVT9u8kdOU8pqaL48yapY9t',
  // ),
);
