<?php
	defined('TYPO3_MODE') or die();
	
	$_EXTKEY = 'sportms';
	
	/***************
	 * Register Plugin in the Backend Plugin List
	 */
	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
		$_EXTKEY,					                                    // Extension-Key
		'sportms',					                        // Plugin-Name
		'Sport Management System',	                            // Plugin-Label
		'EXT:sportms/Resources/Public/Icons/Extension.svg'     // Extension Icon in Plugin Selection
	);
	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
		$_EXTKEY,					                                     // Extension-Key
		'club',					                             // Plugin-Name
		'Sport Management System (Club)',                       // Plugin-Label
		'EXT:sportms/Resources/Public/Icons/tx_sportms_domain_model_club.svg'      // Extension Icon in Plugin Selection
	);
	
	// Add Static Template File
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Sport Management System');
	
	$extensionName = strtolower(\TYPO3\CMS\Core\Utility\GeneralUtility::underscoredToUpperCamelCase($_EXTKEY));
	$pluginName = strtolower('sportms');
	$pluginSignature = $extensionName.'_'.$pluginName;
	
	$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature] = 'layout,select_key,pages';
	$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
		$pluginSignature, 'FILE:EXT:'.$_EXTKEY . '/Configuration/FlexForms/flexform_sportms.xml'
	);