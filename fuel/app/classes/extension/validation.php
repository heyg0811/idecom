<?php
/**
 * @brif      Core\Validation拡張ファイル
 * @author    Sakamoto
 * @date      2014/10/07
 */

/**
 * @brif      Core\Validation拡張
 * @package   app
 * @extends   Fuel\Core\Validation
 */
class Validation extends Fuel\Core\Validation
{
  /**
   * Show errors
   *
   * Returns all errors in a list or with set markup from $options param
   *
   * @param   array  uses keys open_list, close_list, open_error, close_error & no_errors
   * @return  string
   */
  public function show_errors($options = array())
  {
    $default = array(
      'open_list'    => \Config::get('validation.open_list', ''),
      'close_list'   => \Config::get('validation.close_list', ''),
      'open_error'   => \Config::get('validation.open_error', ''),
      'close_error'  => \Config::get('validation.close_error', '<br>'),
      'no_errors'    => \Config::get('validation.no_errors', '')
    );
    $options = array_merge($default, $options);

    if (empty($this->errors))
    {
      return $options['no_errors'];
    }

    $output = $options['open_list'];
    foreach($this->errors as $e)
    {
      $output .= $options['open_error'].$e->get_message().$options['close_error'];
    }
    $output .= $options['close_list'];

    return $output;
  }
  
  /**
	 * Run validation
	 *
	 * Performs validation with current fieldset and on given input, will try POST
	 * when input wasn't given.
	 *
	 * @param   array  input that overwrites POST values
	 * @param   bool   will skip validation of values it can't find or are null
	 * @return  bool   whether validation succeeded
	 */
	public function run($input = null, $name = null, $allow_partial = false, $temp_callables = array())
	{
	  Session::set_flash($name,$_POST[$name]);
		if (is_null($input) and \Input::method() != 'POST')
		{
			return false;
		}

		// Backup current state of callables so they can be restored after adding temp callables
		$callable_backup = $this->callables;

		// Add temporary callables, reversed so first ends on top
		foreach (array_reverse($temp_callables) as $temp_callable)
		{
			$this->add_callable($temp_callable);
		}

		static::set_active($this);

		$this->validated = array();
		$this->errors = array();
		$this->input = $input ?: array();
		$fields = $this->field(null, true);
		foreach($fields as $field)
		{
			static::set_active_field($field);

			// convert form field array's to Fuel dotted notation
			$name = str_replace(array('[',']'), array('.', ''), $field->name);

			$value = $this->input($name);
			if (($allow_partial === true and $value === null)
				or (is_array($allow_partial) and ! in_array($field->name, $allow_partial)))
			{
				continue;
			}
			try
			{
				foreach ($field->rules as $rule)
				{
					$callback  = $rule[0];
					$params    = $rule[1];
					$this->_run_rule($callback, $value, $params, $field);
				}
				if (strpos($name, '.') !== false)
				{
					\Arr::set($this->validated, $name, $value);
				}
				else
				{
					$this->validated[$name] = $value;
				}
			}
			catch (Validation_Error $v)
			{
				$this->errors[$field->name] = $v;

				if($field->fieldset())
				{
					$field->fieldset()->Validation()->add_error($field->name, $v);
				}
			}
		}

		static::set_active();
		static::set_active_field();

		// Restore callables
		$this->callables = $callable_backup;

		return empty($this->errors);
	}
}
