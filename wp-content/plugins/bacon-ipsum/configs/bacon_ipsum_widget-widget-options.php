<?php
/**
*
* fieldconfig for bacon-ipsum/Widget Options
*
* @package Bacon_Ipsum
* @author Chris McCoy chris@lod.com
* @license GPL-2.0+
* @link http://github.com/chrismccoy
* @copyright 2014 Chris McCoy
*/


$group = array(
	'label' => __('Widget Options','bacon-ipsum'),
	'id' => '1312117106',
	'master' => 'banner',
	'fields' => array(
		'banner'	=>	array(
			'label'		=> 	__('Bacon Ipsum Banner','bacon-ipsum'),
          'caption'   =>  '',
			'type'		=>	'dropdown',
			'default'	=> 	'*one||One,two||Two,three||Three',
		),
	),
	'multiple'	=> false,
);

