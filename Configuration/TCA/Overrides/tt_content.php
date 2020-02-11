<?php
	defined('TYPO3_MODE') or die();
	
	/***************
	 * Register Plugin in the Backend Plugin List
	 */
	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
		'clubms',					                        // Extension-Key
		'clubms',					                        // Plugin-Name
		'Club Management System',	                        // Plugin-Label
		'EXT:clubms/Resources/Public/Icons/Extension.png'   // Extension Icon in Plugin Selection
	);
	
	$extensionName = strtolower(\TYPO3\CMS\Core\Utility\GeneralUtility::underscoredToUpperCamelCase($_EXTKEY));
	$pluginName = strtolower('clubms');
	$pluginSignature = $extensionName.'_'.$pluginName;
	
	$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature] = 'layout,select_key,pages';
	$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
		$pluginSignature, 'FILE:EXT:'.$_EXTKEY . '/Configuration/FlexForms/flexform_clubms.xml'
	);