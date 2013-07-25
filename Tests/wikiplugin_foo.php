<?php

/* Tiki-Wiki plugin example 
 */
function wikiplugin_foo_info()
{
	return array(
		'name' => tra('Foo'),
		'description' => tra('Sample plugin.'),
		'prefs' => array('wikiplugin_example'),
		'body' => tra('text'),
		'params' => array(
			'face' => array(
				'required' => true,
				'name' => tra('Face'),
				'description' => tra('Font family to use.'),
			),
			'size' => array(
				'required' => true,
				'name' => tra('Size'),
				'description' => tra('As defined by CSS.'),
			),
		),
	);
}

function wikiplugin_foo($data, $params)
{
	extract($params, EXTR_SKIP);

	$ret = "foo face=$face size=$size :: $data";
	return $ret;
}
