<?php
/**
 * @brif      Core\Fieldset_Field拡張ファイル
 * @author    Sakamoto
 * @date      2014/11/21
 */

/**
 * @brif      Core\Fieldset_Field
 * @package   app
 * @extends   Fuel\Core\Fieldset_Field
 */
class Fieldset_Field extends Fuel\Core\Fieldset_Field
{
	/**
	 * Build the field
	 *
	 * @return  string
	 */
	public function build()
	{
		$form = $this->fieldset()->form();
		
		// Add IDs when auto-id is on
		if ($form->get_config('auto_id', false) === true and $this->get_attribute('id') == '')
		{
			$auto_id = $form->get_config('auto_id_prefix', '')
				.str_replace(array('[', ']'), array('-', ''), $this->name);
			$this->set_attribute('id', $auto_id);
		}

		switch( ! empty($this->attributes['tag']) ? $this->attributes['tag'] : $this->type)
		{
			case 'hidden':
				$build_field = $form->hidden($this->name, $this->value, $this->attributes);
			break;

			case 'radio':
			case 'checkbox':
				if ($this->options)
				{
					$build_field = array();
					$i = 0;
					foreach ($this->options as $value => $label)
					{
						$attributes = $this->attributes;
						$attributes['name'] = $this->name;
						$this->type == 'checkbox' and $attributes['name'] .= '['.$i.']';

						$attributes['value'] = $value;
						$attributes['label'] = $label;

						if (is_array($this->value) ? in_array($value, $this->value) : $value == $this->value)
						{
							$attributes['checked'] = 'checked';
						}

						if( ! empty($attributes['id']))
						{
							$attributes['id'] .= '_'.$i;
						}
						else
						{
							$attributes['id'] = null;
						}
						$build_field[$form->label($label, null, array('for' => $attributes['id']))] = $this->type == 'radio'
							? $form->radio($attributes)
							: $form->checkbox($attributes);

						$i++;
					}
				}
				else
				{
					$build_field = $this->type == 'radio'
						? $form->radio($this->name, $this->value, $this->attributes)
						: $form->checkbox($this->name, $this->value, $this->attributes);
				}
			break;

			case 'select':
				$attributes = $this->attributes;
				$name = $this->name;
				unset($attributes['type']);
				array_key_exists('multiple', $attributes) and $name .= '[]';
				$build_field = $form->select($name, $this->value, $this->options, $attributes);
			break;

			case 'textarea':
				$attributes = $this->attributes;
				unset($attributes['type']);
				$build_field = $form->textarea($this->name, $this->value, $attributes);
			break;

			case 'button':
				$build_field = $form->button($this->name, $this->value, $this->attributes);
			break;
			
			case 'submit':
			  $build_field = '</div><div class="box-footer">'. $form->input($this->name, $this->value, $this->attributes);
			break;

			case 'other':
				$build_field = $this->value;
			break;

			default:
				$build_field = $form->input($this->name, $this->value, $this->attributes);
			break;
		}

		if (empty($build_field) or $this->type == 'hidden' or $this->type == 'submit')
		{
			return $build_field;
		}

		return $this->template($build_field);
	}
}
