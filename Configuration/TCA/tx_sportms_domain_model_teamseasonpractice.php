<?php
    
    use ChristianKnell\Sportms\UserFunc\UserFunc;
    
    if (!defined('TYPO3')) {
        die ('Access denied.');
    }
    
    return [
        'ctrl' => [
            'crdate' => 'crdate',
            'cruser_id' => 'cruser_id',
            'default_sortby' => 'day ASC, time_start ASC, time_end ASC',
            'delete' => 'deleted',
            'enablecolumns' => [
                'disabled' => 'hidden',
                'starttime' => 'starttime',
                'endtime' => 'endtime',
            ],
            'hideTable' => true,
            'iconfile' => 'EXT:sportms/Resources/Public/Icons/tx_sportms_domain_model_teamseasonpractice.svg',
            'label' => '',
            'label_userFunc' => UserFunc::class . '->teamSeasonPracticeLabel',
            'searchFields' => '',
            'title' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_teamseasonpractice',
            'tstamp' => 'tstamp',
            'versioningWS' => true,
        ],
        'types' => [
            '1' => [
                'showitem' => ' --div--;LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.tab.general,
                                    --palette--;LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_domain_model_teamseasonpractice.palette_day_time;day_time,
                                    venue,
                                    annotation,
                                --div--;LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.tab.visibility,
                                    --palette--;LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.palette.visibility_general;visibility_general,',
            ],
        ],
        'palettes' => [
            'day_time' => ['showitem' => 'day, time_start, time_end'],
            'visibility_general' => ['showitem' => 'hidden, starttime, endtime'],
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
            
            'team_season' => [
                'config' => [
                    'type' => 'passthrough',
                ],
            ],
            
            'day' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.day',
                'config' => [
                    'eval' => 'required',
                    'items' => [
                        ['LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_select.something', 0],
                        ['LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.day.1', 1],
                        ['LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.day.2', 2],
                        ['LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.day.3', 3],
                        ['LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.day.4', 4],
                        ['LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.day.5', 5],
                        ['LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.day.6', 6],
                        ['LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.day.7', 7],
                    ],
                    'renderType' => 'selectSingle',
                    'type' => 'select',
                ],
            ],
            
            'time_start' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.time_start',
                'config' => [
                    'dbType' => 'time',
                    'eval' => 'required, time',
                    'placeholder' => 'hh:mm',
                    'renderType' => 'inputDateTime',
                    'size' => 10,
                    'type' => 'input',
                ],
            ],
            
            'time_end' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.time_end',
                'config' => [
                    'dbType' => 'time',
                    'eval' => 'required, time',
                    'placeholder' => 'hh:mm',
                    'renderType' => 'inputDateTime',
                    'size' => 10,
                    'type' => 'input',
                ],
            ],
            
            'venue' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_domain_model_venue',
                'config' => [
                    'foreign_table' => 'tx_sportms_domain_model_venue',
                    'items' => [
                        ['LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_select.something', ''],
                    ],
                    'maxItems' => 1,
                    'minItems' => 1,
                    'renderType' => 'selectSingle',
                    'size' => 1,
                    'type' => 'select',
                ],
            ],
            
            'annotation' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_domain_model_teamseasonpractice.annotation',
                'config' => [
                    'enableRichtext' => true,
                    'eval' => 'trim',
                    'type' => 'text',
                ],
            ],
        
        ],
    ];
