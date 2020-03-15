<?php
	
	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
		'Balumedien.' . $_EXTKEY,
		'clubms',
		array(
			'Club' => 'list, show, sections',
			'ClubSection' => 'list, show',
			'Competition' => 'list, show',
			'CompetitionSeason' => 'list, show',
			'Game' => 'list, show',
			'Person' => 'list, show',
			'PersonProfile' => 'list, show',
			'Season' => 'list, show',
			'Team' => 'list, show',
			'TeamSeason' => 'list, show',
			'Venue' => 'list, show',
		),
		array(
		
		)
	);
	
	/* ===========================================================================
		Add Plugin to PluginList
	=========================================================================== */
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
		'<INCLUDE_TYPOSCRIPT: source="FILE:EXT:clubms/Configuration/TSconfig/ContentElementWizard.txt">'
	);



?>