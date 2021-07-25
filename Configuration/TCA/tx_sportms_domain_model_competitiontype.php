<?php
    
    if (!defined('TYPO3_MODE')) {
        die ('Access denied.');
    }
    
    return [
        'ctrl' => [
            'crdate' => 'crdate',
            'cruser_id' => 'cruser_id',
            'delete' => 'deleted',
            'enablecolumns' => [
                'disabled' => 'hidden',
                'starttime' => 'starttime',
                'endtime' => 'endtime',
            ],
            'iconfile' => 'EXT:sportms/Resources/Public/Icons/tx_sportms_domain_model_competitiontype.svg',
            'label' => 'label',
            'searchFields' => '',
            'sortby' => 'sorting',
            'title' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_competitiontype',
            'tstamp' => 'tstamp',
            'versioningWS' => true,
        ],
        'types' => [
            '1' => [
                'showitem' => ' --div--;LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.tab.general,
                                    label,
                                --div--;LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.tab.visibility,
                                    --palette--;LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.palette.visibility_general;visibility_general,
                                    --palette--;LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.palette.visibility_detail;visibility_detail',
            ],
        ],
        'palettes' => [
            'visibility_general' => ['showitem' => 'hidden, starttime, endtime'],
            'visibility_detail' => ['showitem' => 'slug'],
        ],
        'columns' => [
            
            't3ver_label' => [
                'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.versionLabel',
                'config' => [
                    'type' => 'input',
                    'size' => 30,
                    'max' => 255,
                ],
            ],
            
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
            
            'starttime' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:starttime_formlabel',
                'config' => [
                    'behaviour' => [
                        'allowLanguageSynchronization' => true,
                    ],
                    'type' => 'input',
                    'size' => 13,
                    'eval' => 'datetime',
                    'checkbox' => 0,
                    'default' => 0,
                    'range' => [
                        'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y')),
                    ],
                    'renderType' => 'inputDateTime',
                ],
            ],
            'endtime' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:endtime_formlabel',
                'config' => [
                    'behaviour' => [
                        'allowLanguageSynchronization' => true,
                    ],
                    'type' => 'input',
                    'size' => 13,
                    'eval' => 'datetime',
                    'checkbox' => 0,
                    'default' => 0,
                    'range' => [
                        'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y')),
                    ],
                    'renderType' => 'inputDateTime',
                ],
            ],
            
            'label' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_general.label',
                'config' => [
                    'type' => 'input',
                    'size' => 30,
                    'eval' => 'trim, required',
                ],
            ],
    
            'slug' => [
                'exclude' => true,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.slug',
                'config' => [
                    'fallbackCharacter' => '-',
                    'generatorOptions' => [
                        'fields' => ['label'],
                        'fieldSeparator' => '-',
                        'prefixParentPageSlug' => false,
                        'replacements' => [
                            '/' => '-',
                        ],
                    ],
                    'type' => 'slug',
                ],
            ],
        
        ],
    ];
