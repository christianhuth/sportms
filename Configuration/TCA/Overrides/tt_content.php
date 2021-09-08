<?php
    
    use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
    use TYPO3\CMS\Extbase\Utility\ExtensionUtility;
    
    defined('TYPO3_MODE') or die();
    
    $vendor = 'ChristianKnell';
    $_EXTKEY = 'sportms';
    $extensionName = \TYPO3\CMS\Core\Utility\GeneralUtility::underscoredToUpperCamelCase($_EXTKEY);
    $pluginNames = ['ClubDetail', 'ClubList', 'CompetitionDetail', 'CompetitionList', 'GameDetail', 'GameList', 'PersonList', 'SeasonList', 'TeamDetail', 'TeamList'];
    foreach ($pluginNames as $pluginName) {
        // Add the Plugin to Plugin Selection DROPDOWN in the Backend
        ExtensionUtility::registerPlugin(
            $extensionName,
            $pluginName,
            $pluginName . ' Management (' . strtolower($extensionName) . ')',
            'EXT:sportms/Resources/Public/Icons/tx_sportms_domain_model_' . strtolower(str_replace("List", "",
                str_replace("Detail", "", $pluginName))) . '.svg',
            'Sport Management System'
        );
        $pluginSignature = strtolower($extensionName) . '_' . strtolower($pluginName);
        $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature] = 'layout,select_key,pages,recursive';
        $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
        ExtensionManagementUtility::addPiFlexFormValue(
            $pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_' . $pluginSignature . '.xml'
        );
    }
    
    // SPORTMS-PLUGIN
    $pluginName = "SportMS";
    ExtensionUtility::registerPlugin(
        $extensionName,
        $pluginName,
        'Database Statistics (' . strtolower($extensionName) . ')',
        'EXT:sportms/Resources/Public/Icons/Extension.svg',
        'Sport Management System'
    );
    $pluginSignature = strtolower($extensionName) . '_' . strtolower($pluginName);
    $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature] = 'layout,select_key,pages';
    $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
    ExtensionManagementUtility::addPiFlexFormValue(
        $pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_' . $pluginSignature . '.xml'
    );
    
    // Add Static Template File
    ExtensionManagementUtility::addStaticFile(
        $_EXTKEY,
        'Configuration/TypoScript',
        'Sport Management System'
    );