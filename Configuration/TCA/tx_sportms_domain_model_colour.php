<?php
    
    if (!defined('TYPO3')) {
        die ('Access denied.');
    }
    
    return [
        'ctrl' => [
            'crdate' => 'crdate',
            'cruser_id' => 'cruser_id',
            'delete' => 'deleted',
            'enablecolumns' => [
                'disabled' => 'hidden',
            ],
            'iconfile' => 'EXT:sportms/Resources/Public/Icons/tx_sportms_domain_model_colour.svg',
            'label' => '',
            'label_alt' => 'label, colour',
            'label_alt_force' => true,
            'searchFields' => 'label, colour',
            'title' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_colour',
            'tstamp' => 'tstamp',
            'versioningWS' => false,
        ],
        'types' => [
            '1' => [
                'showitem' => ' --div--;LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.tab.general,
                                    --palette--;;colour,
                                --div--;LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.tab.visibility,
                                    --palette--;LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.palette.visibility_general;visibility_general',
            ],
        ],
        'palettes' => [
            'colour' => ['showitem' => 'colour, label'],
            'visibility_general' => ['showitem' => 'hidden'],
        ],
        'columns' => [
            
            'hidden' => [
                'exclude' => true,
                'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.visible',
                'config' => [
                    'items' => [
                        [
                            0 => '',
                            1 => '',
                            'invertStateDisplay' => true,
                        ],
                    ],
                    'renderType' => 'checkboxToggle',
                    'type' => 'check',
                ],
            ],
            
            'colour' => [
                'config' => [
                    'eval' => 'required',
                    'renderType' => 'colorpicker',
                    'size' => 10,
                    'type' => 'input',
                ],
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_colour',
            ],
            'label' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_general.label',
                'config' => [
                    'type' => 'input',
                    'size' => 30,
                    'eval' => 'trim',
                ],
            ],
        ],
    ];
