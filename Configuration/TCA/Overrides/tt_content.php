<?php
	defined('TYPO3_MODE') or die();
	
	$_EXTKEY = 'sportms';
	$extensionName = strtolower(\TYPO3\CMS\Core\Utility\GeneralUtility::underscoredToUpperCamelCase($_EXTKEY));
	$pluginNames = ['sportms', 'club', 'competition', 'game', 'person', 'team'];
	
	foreach($pluginNames AS $pluginName) {
		/***************
		 * Register Plugin in the Backend Plugin List
		 */
		\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
			$_EXTKEY,					                                                                                                                            # Extension-Key
			$pluginName,					                                                                                                                        # Plugin-Name
			'Sport Management System (' . ucfirst($pluginName) . ')',	                                                                                    # Plugin-Label
			# TODO: REMOVE SPORTMS-CASE
			'EXT:sportms/Resources/Public/Icons/' . (($pluginName === 'sportms') ? 'Extension.svg' : 'tx_sportms_domain_model_' . $pluginName) . '.svg'    # Extension Icon in Plugin Selection
		);
		$pluginSignature = $extensionName.'_'.$pluginName;
		$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature] = 'layout,select_key,pages';
		$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
			$pluginSignature, 'FILE:EXT:'.$_EXTKEY . '/Configuration/FlexForms/flexform_sportms.xml'
		);
	}
	
	// Add Static Template File
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Sport Management System');