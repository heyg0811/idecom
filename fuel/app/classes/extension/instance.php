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
		$model = explode('[', str_replace(']', '', $field));
		if (count($model) == 2
		&& $temp = Session::get_flash($model[1])) {
			$value = $temp;
			return ;
		}
		
		if (count($model) == 3
		&& $temp = Session::get_flash($model[1].'.'.$model[2])){
			$value = $temp;
			return ;
		}
	}
}
