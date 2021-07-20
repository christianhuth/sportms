<?php
    
    if (!defined('TYPO3_MODE')) {
        die ('Access denied.');
    }
    
    return [
        'ctrl' => [
            'crdate' => 'crdate',
            'cruser_id' => 'cruser_id',
            'default_sortby' => 'ORDER BY label DESC',
            'delete' => 'deleted',
            'enablecolumns' => [
                'disabled' => 'hidden',
                'starttime' => 'starttime',
                'endtime' => 'endtime',
            ],
            'iconfile' => 'EXT:sportms/Resources/Public/Icons/tx_sportms_domain_model_season.svg',
            'label' => 'label',
            'searchFields' => '',
            'title' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_season',
            'tstamp' => 'tstamp',
            'versioningWS' => true,
        ],
        'types' => [
            '1' => [
                'showitem' => ' --div--;LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.tab.general,
                                    --palette--;;label_abbreviation,
                                    --palette--;;dates,
                                --div--;LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.tab.visibility,
                                    --palette--;LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.palette.visibility_general;visibility_general,
                                    --palette--;LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.palette.visibility_detail;visibility_detail',
            ],
        ],
        'palettes' => [
            'label_abbreviation' => ['showitem' => 'label, abbreviation'],
            'dates' => ['showitem' => 'startdate, winter_break, enddate'],
            'visibility_general' => ['showitem' => 'hidden, starttime, endtime'],
            'visibility_detail' => ['showitem' => 'detail_link, slug'],
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
                'exclude' => true,
                'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
                'config' => [
                    'type' => 'input',
                    'renderType' => 'inputDateTime',
                    'eval' => 'datetime,int',
                    'default' => 0,
                    'behaviour' => [
                        'allowLanguageSynchronization' => true,
                    ],
                ],
            ],
            'endtime' => [
                'exclude' => true,
                'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
                'config' => [
                    'type' => 'input',
                    'renderType' => 'inputDateTime',
                    'eval' => 'datetime,int',
                    'default' => 0,
                    'range' => [
                        'upper' => mktime(0, 0, 0, 1, 1, 2038),
                    ],
                    'behaviour' => [
                        'allowLanguageSynchronization' => true,
                    ],
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
            'abbreviation' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.abbreviation',
                'config' => [
                    'type' => 'input',
                    'size' => 30,
                    'eval' => 'trim',
                ],
            ],
            
            'startdate' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.startdate',
                'config' => [
                    'type' => 'input',
                    'size' => 8,
                    'eval' => 'date, required',
                    'placeholder' => 'dd-mm-yyyy',
                    'renderType' => 'inputDateTime',
                ],
            ],
            'enddate' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.enddate',
                'config' => [
                    'type' => 'input',
                    'size' => 8,
                    'eval' => 'date, required',
                    'placeholder' => 'dd-mm-yyyy',
                    'renderType' => 'inputDateTime',
                ],
            ],
            'winter_break' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_season.winter_break',
                'config' => [
                    'type' => 'input',
                    'size' => 8,
                    'eval' => 'date',
                    'placeholder' => 'dd-mm-yyyy',
                    'renderType' => 'inputDateTime',
                ],
            ],
            
            'detail_link' => [
                'exclude' => true,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.detail_link',
                'config' => [
                    'default' => false,
                    'renderType' => 'checkboxToggle',
                    'type' => 'check',
                ],
            ],
            'slug' => [
                'exclude' => true,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.slug',
                'config' => [
                    'default' => '',
                    'eval' => 'uniqueInSite',
                    'fallbackCharacter' => '-',
                    'generatorOptions' => [
                        'fields' => ['label'],
                        'fieldSeparator' => '-',
                        'prefixParentPageSlug' => false,
                        'replacements' => [
                            '/' => '-',
                        ],
                    ],
                    'prependSlash' => false,
                    'type' => 'slug',
                ],
            ],
        
        ],
    ];
