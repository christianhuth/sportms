<?php
	
	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
		'Balumedien.' . $_EXTKEY,
		'sportms',
		array(
		),
		array(
			'SportMS' => 'dbStats',
			'Club' => 'list, show',
			'ClubSection' => 'list, show',
			'Competition' => 'list, show',
			'CompetitionSeason' => 'list, show',
			'Game' => 'list, show',
			'Person' => 'list, show',
			'PersonProfile' => 'list, show',
			'Season' => 'list, show',
			'Sport' => 'list, show',
			'Team' => 'list, show',
			'TeamSeason' => 'list, show',
			'Venue' => 'list, show',
		)
	);
	
	/* ===========================================================================
		Add Plugin to PluginList
	=========================================================================== */
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
		'<INCLUDE_TYPOSCRIPT: source="FILE:EXT:sportms/Configuration/TSconfig/ContentElementWizard.txt">'
	);

?>