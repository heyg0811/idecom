<?php
 return array(
 //ドライバの指定（使用可能ドライバはgd, imagemagick or imagick）
 'driver' => 'gd',
//背景色のセット（nullの場合透明色がセット）
 'bgcolor' => '#FFF',
//透かし文字の透明度のセット（0～100）
 'watermark_alpha' => 75,
//画質のセット
 'quality' => 100,
//画像の拡張子の指定（nullの場合、元の拡張子を引き継ぐ）
 'filetype' => null,
//imagemagickの保管場所（先頭に/が必要）
 'imagemagick_dir' => Config::get('UPLOAD_DIR') . 'user_thumbnail',
//編集中の画像の一時保管場所の指定
 'temp_dir' => APPPATH.'tmp'.DS,
//競合を避けるためにイメージに付与する文字
 'temp_append' => 'fuelimage_',
//保存や出力後（save(), save_pa(), output()）にクリアするかどうかの指定
 'clear_queue' => true,
//保存や出力後に元イメージをリロードする場合はfalse、修正後の画像をキープする場合はtureを指定します。
 'persistence' => false,
//デバッグの使用するかどうかを指定します。
 'debug' => false,
//設定をプリセットにセットしておけば、制御された操作を呼び出すことができます。
 'presets' => array(
/*設定例
 *
 * 設定値はここでは、現在の設定を上書きすることに注意してください。
 *
 * ドライバはここで変更することはできません。
 */
 'example' => array(
 'quality' => 100,
 'bgcolor' => null,
 'actions' => array(
 array('crop_resize', 250, 250),
 array('border', 20, "#f00"),
 array('rounded', 10),
 array('output', 'png')
 )
 )
 )
 );