<?php
	
	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
		'Balumedien.' . $_EXTKEY,
		'clubms',
		array(
			'Club' => 'list, show, sections',
			'Competition' => 'list, show',
			'Game' => 'list, show',
			'Person' => 'list, show',
			'Season' => 'list, show',
			'Team' => 'list, show',
			'TeamSeason' => 'list, show',
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