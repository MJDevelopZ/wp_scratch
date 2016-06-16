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
	'id' => '71015425',
	'master' => 'width',
	'fields' => array(
		'width'	=>	array(
			'label'		=> 	__('Width','bacon-ipsum'),
			'caption'	=>	__('Width for Bacon Mockup Images','bacon-ipsum'),
			'type'		=>	'smalltextfield',
			'default'	=> 	'300',
		),
		'height'	=>	array(
			'label'		=> 	__('Height','bacon-ipsum'),
			'caption'	=>	__('Height for Bacon Mockup Images','bacon-ipsum'),
			'type'		=>	'smalltextfield',
			'default'	=> 	'200',
		),
		'alt'	=>	array(
			'label'		=> 	__('Alt Tag','bacon-ipsum'),
			'caption'	=>	__('Alt Tag for Bacon Mockup Images','bacon-ipsum'),
			'type'		=>	'textfield',
			'default'	=> 	'Yummy Bacon!',
		),
		'class'	=>	array(
			'label'		=> 	__('CSS Class','bacon-ipsum'),
			'caption'	=>	__('CSS Class for Bacon Mockup Images','bacon-ipsum'),
			'type'		=>	'smalltextfield',
			'default'	=> 	'baconthumb',
		),
		'tag'	=>	array(
			'label'		=> 	__('Tag','bacon-ipsum'),
			'caption'	=>	__('Pick a Custom Image to Use','bacon-ipsum'),
			'type'		=>	'dropdown',
			'default'	=> 	'*none||None,bacon-eggs||Bacon and Eggs,bacon||Bacon,beef||Beef,brisket||Brisket,corned-beef||Corned Beef,drumstick||Drumstick,drumstick2||More Drum Stick,family-style-bbq||Family Style BBQ,flank-steak||Flank Steak,hamburger||Hamburger,pastrami||Pastrami,pork-ribs||Pork Ribs,pulled-pork||Pulled Pork,ribeye||Rib Eye,ribeye2||More Rib Eye,ribeyes-and-bacon||Ribeye and Bacon,ribs-of-beef||Ribs of Beef,salami||Salami,sausage||Sausage,sausage2||More Sausage,sirloin||Sirloin,wing-rib||Wing Rib,random||Random,bacon2||More Bacon',
		),
	),
	'multiple'	=> false,
);

