<?php
    
    use ChristianKnell\Sportms\UserFunc\UserFunc;
    
    if (!defined('TYPO3')) {
        die ('Access denied.');
    }
    
    return [
        'ctrl' => [
            'crdate' => 'crdate',
            'cruser_id' => 'cruser_id',
            'default_sortby' => 'ORDER BY period ASC, minute ASC, minute_additional ASC',
            'delete' => 'deleted',
            'enablecolumns' => [
                'disabled' => 'hidden',
                'starttime' => 'starttime',
                'endtime' => 'endtime',
            ],
            'hideTable' => true,
            'iconfile' => 'EXT:sportms/Resources/Public/Icons/tx_sportms_domain_model_gamegoal.svg',
            'label' => '',
            'label_userFunc' => UserFunc::class . '->GameGoalLabel',
            'searchFields' => '',
            'title' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_gamegoal',
            'tstamp' => 'tstamp',
            'versioningWS' => true,
        ],
        'types' => [
            '1' => [
                'showitem' => ' --div--;LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.tab.general,
                                        game,
                                        --palette--;;goal,
                                        --palette--;;time,
                                        --palette--;;scorer_assist,
                                        --palette--;;goal_details',
            ],
        ],
        'palettes' => [
            'goal' => ['showitem' => 'goal_home, goal_guest'],
            'time' => ['showitem' => 'period, minute, minute_additional'],
            'scorer_assist' => ['showitem' => 'scorer, assist'],
            'goal_details' => ['showitem' => 'own_goal, goal_type'],
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
            
            'goal_home' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_gamegoal.goal_home',
                'config' => [
                    'type' => 'input',
                    'size' => 10,
                    'eval' => 'int, required, trim',
                ],
            ],
            'goal_guest' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_gamegoal.goal_guest',
                'config' => [
                    'type' => 'input',
                    'size' => 10,
                    'eval' => 'int, required, trim',
                ],
            ],
            'period' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_gamegoal.period',
                'config' => [
                    'default' => null,
                    'eval' => 'null',
                    'range' => [
                        'lower' => 1,
                        'upper' => 1000,
                    ],
                    'type' => 'input',
                    'size' => 10,
                ],
            ],
            'minute' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_gamegoal.minute',
                'config' => [
                    'eval' => 'int, required, trim',
                    'range' => [
                        'lower' => 1,
                        'upper' => 1000,
                    ],
                    'size' => 10,
                    'type' => 'input',
                ],
            ],
            'minute_additional' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_gamegoal.minute_additional',
                'config' => [
                    'default' => null,
                    'eval' => 'null',
                    'range' => [
                        'lower' => 1,
                        'upper' => 1000,
                    ],
                    'type' => 'input',
                    'size' => 10,
                ],
            ],
            'scorer' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_gamegoal.scorer',
                'config' => [
                    'foreign_table' => 'tx_sportms_domain_model_personprofile',
                    'foreign_table_where' => '  AND tx_sportms_domain_model_personprofile.uid IN (
                                                    SELECT  tx_sportms_domain_model_gamelineup.person_profile
                                                    FROM    tx_sportms_domain_model_gamelineup
                                                    WHERE   tx_sportms_domain_model_gamelineup.game = ###REC_FIELD_game###
                                                )',
                    'items' => [
                        ['LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_select.something', 0],
                    ],
                    'maxItems' => 1,
                    'minitems' => 0,
                    'renderType' => 'selectSingle',
                    'size' => 1,
                    'type' => 'select',
                ],
            ],
            'assist' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_gamegoal.assist',
                'config' => [
                    'foreign_table' => 'tx_sportms_domain_model_personprofile',
                    'foreign_table_where' => '  AND tx_sportms_domain_model_personprofile.uid IN (
                                                    SELECT  tx_sportms_domain_model_gamelineup.person_profile
                                                    FROM    tx_sportms_domain_model_gamelineup
                                                    WHERE   tx_sportms_domain_model_gamelineup.game = ###REC_FIELD_game###
                                                )',
                    'items' => [
                        ['LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_select.something', 0],
                    ],
                    'maxItems' => 1,
                    'minitems' => 0,
                    'renderType' => 'selectSingle',
                    'size' => 1,
                    'type' => 'select',
                ],
            ],
            'own_goal' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_gamegoal.own_goal',
                'config' => [
                    'default' => false,
                    'renderType' => 'checkboxToggle',
                    'type' => 'check',
                ],
            ],
            'goal_type' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_gamegoal.goal_type',
                'config' => [
                    'items' => [
                        [
                            'LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_select.something',
                            0,
                        ],
                        [
                            'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_gamegoal.goal_type.1',
                            1,
                        ],
                        [
                            'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_gamegoal.goal_type.2',
                            2,
                        ],
                        [
                            'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_gamegoal.goal_type.3',
                            3,
                        ],
                    ],
                    'renderType' => 'selectSingle',
                    'type' => 'select',
                ],
            ],
        
        ],
    ];
