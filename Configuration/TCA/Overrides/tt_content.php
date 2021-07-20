<?php
	
	use TYPO3\CMS\Extbase\Utility\ExtensionUtility;
	
	defined('TYPO3_MODE') or die();
	
	$vendor = 'Balumedien';
	$_EXTKEY = 'sportms';
	$extensionName = \TYPO3\CMS\Core\Utility\GeneralUtility::underscoredToUpperCamelCase($_EXTKEY);
	$pluginNames = ['Club', 'Competition', 'Game', 'Person', 'Team'];
	foreach($pluginNames as $pluginName) {
		// Add the Plugin to Plugin Selection DROPDOWN in the Backend
		ExtensionUtility::registerPlugin(
			$extensionName,
			$pluginName,
			$pluginName . ' Management (' . strtolower($extensionName) . ')',
			'EXT:sportms/Resources/Public/Icons/tx_sportms_domain_model_' . strtolower($pluginName) . '.svg'
		);
		$pluginSignature = strtolower($extensionName) . '_' . strtolower($pluginName);
		$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature] = 'layout,select_key,pages';
		$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
			$pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_' . $pluginSignature . '.xml'
		);
	}
	
	// SPORTMS-PLUGIN
	$pluginName = "SportMS";
	ExtensionUtility::registerPlugin(
		$extensionName,
		$pluginName,
		'Database Statistics (' . strtolower($extensionName) . ')',
		'EXT:sportms/Resources/Public/Icons/Extension.svg'
	);
	$pluginSignature = strtolower($extensionName) . '_' . strtolower($pluginName);
	$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature] = 'layout,select_key,pages';
	$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
		$pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_' . $pluginSignature . '.xml'
	);
	
	// Add Static Template File
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Sport Management System');