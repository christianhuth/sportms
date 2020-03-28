<?php
	
	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
		'Balumedien.' . $_EXTKEY,
		'sportms',
		array(
			'SportMS' => 'dbStats',
			'Club' => 'list',
			'ClubSection' => 'list',
			'Competition' => 'list',
			'CompetitionSeason' => 'list',
			'Game' => 'list',
			'Person' => 'list',
			'PersonProfile' => 'list',
			'Season' => 'list',
			'Section' => 'list',
			'Team' => 'list',
			'TeamSeason' => 'list',
			'Venue' => 'list',
		),
		array(
			'Club' => 'show',
			'ClubSection' => 'show',
			'Competition' => 'show',
			'CompetitionSeason' => 'show',
			'Game' => 'show',
			'Person' => 'show',
			'PersonProfile' => 'show',
			'Season' => 'show',
			'Section' => 'show',
			'Team' => 'show',
			'TeamSeason' => 'show',
			'Venue' => 'show',
		)
	);
	
	/* ===========================================================================
		Add Plugin to PluginList
	=========================================================================== */
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
		'<INCLUDE_TYPOSCRIPT: source="FILE:EXT:sportms/Configuration/TSconfig/ContentElementWizard.txt">'
	);



?>