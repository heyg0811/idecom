<?php
/**
 * Part of the Fuel framework.
 *
 * @package    Fuel
 * @version    1.7
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2014 Fuel Development Team
 * @link       http://fuelphp.com
 */

/**
 * NOTICE:
 *
 * If you need to make modifications to the default configuration, copy
 * this file to your app/config folder, and make them in there.
 *
 * This will allow you to upgrade fuel without losing your custom config.
 */


return array(
	// regular form definitions
	'prep_value'                 => true,
	'auto_id'                    => true,
	'auto_id_prefix'             => '',
	'form_method'                => 'post',
	'form_template'              => "\n\t\t{open}\n\t\t<div class=\"box-body\">\n{fields}\n\t\t</div>\n\t\t{close}\n",
	'fieldset_template'          => "\n\t\t<div>{open}<div>\n{fields}</div></div>\n\t\t{close}\n",
	'field_template'             => "\t\t<div class=\"form-group\">\n\t\t\t{label}{required}\n\t\t\t{field} <span>{error_msg}</span> \n\t\t</div>\n",
	'multi_field_template'       => "\t\t<div class=\"form-group\">\n\t\t\t{group_label}{required}</div>\n\t\t\t{fields}\n\t\t\t\t{field} {label}<br />\n{fields}<span>{description}</span>\t\t\t{error_msg}\n\t\t\t\n\t\t</div>\n",
	'error_template'             => '<span>{error_msg}</span>',
	'group_label'	               => '<span>{label}</span>',
	'required_mark'              => '*',
	'inline_errors'              => true,
	'error_class'                => null,
	'label_class'                => null,

	// tabular form definitions
	'tabular_form_template'      => "<div class=\"box-body\">{fields}</div>\n",
	'tabular_field_template'     => "{field}",
	'tabular_row_template'       => "<div class=\"form-group\">{fields}</div>\n",
	'tabular_row_field_template' => "\t\t\t<label>{label}{required}&nbsp;{field} {error_msg}</label>\n",
	'tabular_delete_label'       => "Delete?",
);
