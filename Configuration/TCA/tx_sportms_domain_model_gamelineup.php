<?php
    
    use Balumedien\Sportms\Classes\UserFunc\UserFunc;
    
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
            'hideTable' => true,
            'iconfile' => 'EXT:sportms/Resources/Public/Icons/tx_sportms_domain_model_gamelineup.svg',
            'label' => '',
            'label_userFunc' => UserFunc::class . '->GameLineupLabel',
            'searchFields' => '',
            'sortby' => 'sorting',
            'title' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_gamelineup',
            'tstamp' => 'tstamp',
            'versioningWS' => true,
        ],
        'types' => [
            '1' => [
                'showitem' => ' --div--;LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.tab.general,
                                    game,
                                    --palette;;gamelineup',
            ],
        ],
        'palettes' => [
            'gamelineup' => ['showitem' => 'person_profile, jersey_number, sport_position'],
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
            
            'game' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_game',
                'config' => [
                    'eval' => 'required',
                    'foreign_table' => 'tx_sportms_domain_model_game',
                    'items' => [
                        ['LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_select.something', 0],
                    ],
                    'maxItems' => 1,
                    'renderType' => 'selectSingle',
                    'size' => 1,
                    'type' => 'select',
                ],
            ],
            'team' => [
                'config' => [
                    'type' => 'passthrough',
                ],
            ],
            'type' => [
                'config' => [
                    'type' => 'passthrough',
                ],
            ],
            
            'jersey_number' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_gamelineup.jersey_number',
                'config' => [
                    'type' => 'input',
                    'size' => 10,
                    'eval' => 'trim',
                ],
            ],
            'person_profile' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_person',
                'config' => [
                    'eval' => '',
                    'foreign_table' => 'tx_sportms_domain_model_personprofile',
                    'items' => [
                        ['LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_select.something', ''],
                    ],
                    'renderType' => 'selectSingle',
                    'size' => 1,
                    'type' => 'select',
                ],
            ],
            'sport_position' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_sportposition',
                'config' => [
                    'foreign_table' => 'tx_sportms_domain_model_sportposition',
                    'foreign_table_where' => '  ORDER BY tx_sportms_domain_model_sportposition.label ASC',
                    'items' => [
                        ['LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_select.something', ''],
                    ],
                    'maxItems' => 1,
                    'renderType' => 'selectSingle',
                    'size' => 1,
                    'type' => 'select',
                ],
            ],
        
        ],
    ];
