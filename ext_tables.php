<?php
	
	if(!defined('TYPO3_MODE')) {
		die('Access denied.');
	}
	
	// Add Static Template File
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Club Management System');
	
	// Register Plugin in the Backend Plugin List
	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
		$_EXTKEY,					                        // Extension-Key
		'clubms',					                        // Plugin-Name
		'Club Management System',	                        // Plugin-Label
        'EXT:clubms/Resources/Public/Icons/Extension.png'   // Extension Icon in Plugin Selection
	);
	
	$extensionName = strtolower(\TYPO3\CMS\Core\Utility\GeneralUtility::underscoredToUpperCamelCase($_EXTKEY));
	$pluginName = strtolower('clubms');
	$pluginSignature = $extensionName.'_'.$pluginName;
	
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
		$pluginSignature, 'FILE:EXT:'.$_EXTKEY . '/Configuration/FlexForms/flexform_clubms.xml'
	);
	
?>