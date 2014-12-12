<?php
/**
 * @brif      Core\Form_Instance拡張ファイル
 * @author    Sakamoto
 * @date      2014/11/29
 */

/**
 * @brif      Core\Form_Instance拡張
 * @package   app
 * @extends   Fuel\Core\Form_Instance
 */
class Form_Instance extends Fuel\Core\Form_Instance
{
	public function restration($field, &$value) 
	{
		$model = explode('[', $field);
		if (isset($model[1])
		&& $temp = Session::get_flash(str_replace(']', '', $model[1]))){
			$value = $temp;
		}
	}
}
