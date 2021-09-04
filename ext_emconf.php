<?php
	
	$EM_CONF[$_EXTKEY] = [
		'title' => 'Sport Management System',
		'description' => '',
		'category' => 'plugin',
		'author' => 'Christian Knell',
		'author_email' => 'christian@knell.it',
		'state' => 'beta',
		'internal' => '',
		'uploadfolder' => '0',
		'createDirs' => '',
		'clearCacheOnLoad' => 0,
		'version' => '0.0.2',
		'autoload' => [
			'psr-4' => [
				'ChristianKnell\\Sportms\\' => 'Classes',
			],
		],
		'constraints' => [
			'depends' => [
				'static_info_tables' => '',
				'typo3' => '10.4',
			],
			'conflicts' => [
			],
			'suggests' => [
			],
		],
	];