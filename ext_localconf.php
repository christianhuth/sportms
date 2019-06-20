<?php
	
	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
		'Balumedien.' . $_EXTKEY,
		'clubms',
		array(
			'Club' => 'list, detail, section',
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


    /* ===========================================================================
        Add Icon for Extension
    =========================================================================== */
    $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
    $iconRegistry->registerIcon(
        'tx_clubms_clubms',
        \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
        ['source' => 'EXT:clubms/Resources/Public/Icons/Extension.svg']
    );



?>