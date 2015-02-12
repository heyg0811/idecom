<?php
/**
 * @brif      Core\Form拡張ファイル
 * @author    Sakamoto
 * @date      2014/11/29
 */

/**
 * @brif      Core\Form拡張
 * @package   app
 * @extends   Fuel\Core\Form
 */
class Form extends Fuel\Core\Form
{
	/**
	 * Create a form input
	 *
	 * @param   string|array  either fieldname or full attributes array (when array other params are ignored)
	 * @param   string
	 * @param   array
	 * @return  string
	 */
	public static function input($field, $value = null, array $attributes = array())
	{
		static::$instance->restration($field, $value);
		return static::$instance->input($field, $value, $attributes);
	}

	/**
	 * Create a hidden field
	 *
	 * @param   string|array  either fieldname or full attributes array (when array other params are ignored)
	 * @param   string
	 * @param   array
	 * @return  string
	 */
	public static function hidden($field, $value = null, array $attributes = array())
	{
		static::$instance->restration($field, $value);
		return static::$instance->hidden($field, $value, $attributes);
	}
	
	/**
	 * Create a password input field
	 *
	 * @param   string|array  either fieldname or full attributes array (when array other params are ignored)
	 * @param   string
	 * @param   array
	 * @return  string
	 */
	public static function password($field, $value = null, array $attributes = array())
	{
		static::$instance->restration($field, $value);
		return static::$instance->password($field, $value, $attributes);
	}

	/**
	 * Create a radio button
	 *
	 * @param   string|array  either fieldname or full attributes array (when array other params are ignored)
	 * @param   string
	 * @param   mixed         either attributes (array) or bool/string to set checked status
	 * @param   array
	 * @return  string
	 */
	public static function radio($field, $value = null, $checked = null, array $attributes = array())
	{
		static::$instance->restration($field, $value);
		return static::$instance->radio($field, $value, $checked, $attributes);
	}

	/**
	 * Create a checkbox
	 *
	 * @param   string|array  either fieldname or full attributes array (when array other params are ignored)
	 * @param   string
	 * @param   mixed         either attributes (array) or bool/string to set checked status
	 * @param   array
	 * @return  string
	 */
	public static function checkbox($field, $value = null, $checked = null, array $attributes = array())
	{
		static::$instance->restration($field, $value);
		return static::$instance->checkbox($field, $value, $checked, $attributes);
	}

	/**
	 * Create a textarea field
	 *
	 * @param   string|array  either fieldname or full attributes array (when array other params are ignored)
	 * @param   string
	 * @param   array
	 * @return  string
	 */
	public static function textarea($field, $value = null, array $attributes = array())
	{
		static::$instance->restration($field, $value);
		return static::$instance->textarea($field, $value, $attributes);
	}

	/**
	 * Select
	 *
	 * Generates a html select element based on the given parameters
	 *
	 * @param   string|array  either fieldname or full attributes array (when array other params are ignored)
	 * @param   string  selected value(s)
	 * @param   array   array of options and option groups
	 * @param   array
	 * @return  string
	 */
	public static function select($field, $values = null, array $options = array(), array $attributes = array())
	{
		static::$instance->restration($field, $values);
		return static::$instance->select($field, $values, $options, $attributes);
	}

}
