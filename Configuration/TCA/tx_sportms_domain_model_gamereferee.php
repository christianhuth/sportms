<?php
    
    use ChristianKnell\Sportms\UserFunc\ItemsProcFunc;
    use ChristianKnell\Sportms\UserFunc\UserFunc;
    
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
            'iconfile' => 'EXT:sportms/Resources/Public/Icons/tx_sportms_domain_model_gamereferee.svg',
            'label' => '',
            'label_userFunc' => UserFunc::class . '->GameRefereeLabel',
            'searchFields' => '',
            'title' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_gamereferee',
            'tstamp' => 'tstamp',
            'versioningWS' => true,
        ],
        'types' => [
            '1' => ['showitem' => '--palette;;referee_person'],
        ],
        'palettes' => [
            'referee_person' => ['showitem' => 'referee_job, person_profile'],
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
            
            'referee_job' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_refereejob',
                'config' => [
                    'eval' => 'required',
                    'foreign_table' => 'tx_sportms_domain_model_refereejob',
                    'foreign_table_where' => 'ORDER BY label ASC',
                    'items' => [
                        ['LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_select.something', ""],
                    ],
                    'maxItems' => 1,
                    'minItems' => 1,
                    'renderType' => 'selectSingle',
                    'size' => 1,
                    'type' => 'select',
                ],
            ],
            'person_profile' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_person',
                'config' => [
                    'eval' => 'required',
                    'items' => [
                        [
                            'LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_select.something',
                            null,
                        ],
                    ],
                    'itemsProcFunc' => ItemsProcFunc::class . '->tx_sportms_domain_model_personprofile',
                    'itemsProcConfig' => [
                        'profile_type' => '4'
                    ],
                    'maxItems' => 1,
                    'minItems' => 1,
                    'renderType' => 'selectSingle',
                    'size' => 1,
                    'type' => 'select',
                ],
            ],
        
        ],
    ];
