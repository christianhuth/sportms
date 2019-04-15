<?php
	
	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
		'Balumedien.' . $_EXTKEY,
		'clubms',
		array(
			'Club' => 'list, detail',
			'Competition' => 'list, detail',
			'Game' => 'list, detail',
			'Person' => 'list, detail',
			'Season' => 'list, detail',
			'Team' => 'list, detail',
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