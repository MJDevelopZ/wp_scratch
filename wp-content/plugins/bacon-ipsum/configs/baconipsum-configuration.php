<?php
/**
*
* fieldconfig for bacon-ipsum/Configuration
*
* @package Bacon_Ipsum
* @author Chris McCoy chris@lod.com
* @license GPL-2.0+
* @link http://github.com/chrismccoy
* @copyright 2014 Chris McCoy
*/


$group = array(
	'label' => __('Configuration','bacon-ipsum'),
	'id' => '68123136',
	'master' => 'bacon_type',
	'fields' => array(
		'bacon_type'	=>	array(
			'label'		=> 	__('Type','bacon-ipsum'),
			'caption'	=>	__('Bacon Type to Use','bacon-ipsum'),
			'type'		=>	'onoff',
			'default'	=> 	'meat||All Meat,*filler||Meat and Filler',
			'inline'	=> 	true,
		),
		'format'	=>	array(
			'label'		=> 	__('Format','bacon-ipsum'),
			'caption'	=>	__('Bacon Format','bacon-ipsum'),
			'type'		=>	'onoff',
			'default'	=> 	'*paragraphs||Paragraphs,sentences||Sentences',
			'inline'	=> 	true,
		),
		'start'	=>	array(
			'label'		=> 	__('Start','bacon-ipsum'),
			'caption'	=>	__('Start with Bacon Ipsum dlor sit amet.','bacon-ipsum'),
			'type'		=>	'onoff',
			'default'	=> 	'*yes||Yes,no||No',
			'inline'	=> 	true,
		),
		'amount'	=>	array(
			'label'		=> 	__('Amount','bacon-ipsum'),
			'caption'	=>	__('Amount of Content to Create','bacon-ipsum'),
			'type'		=>	'slider',
			'default'	=> 	'1,30|5',
			'inline'	=> 	true,
		),
	),
	'styles'	=> array(
		'toggles.css',
		'simple-slider.css',
	),
	'scripts'	=> array(
		'toggles.min.js',
		'simple-slider.min.js',
	),
	'multiple'	=> false,
);

