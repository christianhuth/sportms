<?php
	
	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
		'Balumedien.' . $_EXTKEY,
		'sportms',
		array(
			'SportMS' => 'dbStats',
			'Club' => 'list',
			'Competition' => 'list, showIndex',
			'Game' => 'list, showIndex',
			'Person' => 'list, showIndex',
			'Sport' => 'list, showIndex',
			'Team' => 'list, showIndex',
		),
		array(
		)
	);
	
	/* ===========================================================================
		Add Plugin to PluginList
	=========================================================================== */
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
		'<INCLUDE_TYPOSCRIPT: source="FILE:EXT:sportms/Configuration/TSconfig/ContentElementWizard.txt">'
	);
	
	/* ===========================================================================
		Register Icons for the Backend
	=========================================================================== */
	if (TYPO3_MODE === 'BE') {
		$icons = [
			'ext-sportms-wizard-icon' => 'Extension.svg',
		];
		$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
		foreach ($icons as $identifier => $filename) {
			if (!$iconRegistry->isRegistered($identifier)) {
				$iconRegistry->registerIcon(
					$identifier,
					\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
					['source' => 'EXT:sportms/Resources/Public/Icons/' . $filename]
				);
			}
		}
	}