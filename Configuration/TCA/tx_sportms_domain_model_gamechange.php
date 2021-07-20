<?php
    
    use Balumedien\Sportms\Classes\UserFunc\UserFunc;
    
    if (!defined('TYPO3_MODE')) {
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
            'iconfile' => 'EXT:sportms/Resources/Public/Icons/tx_sportms_domain_model_gamechange.svg',
            'label' => '',
            'label_userFunc' => UserFunc::class . '->GameChangeLabel',
            'searchFields' => '',
            'title' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_gamechange',
            'tstamp' => 'tstamp',
            'versioningWS' => true,
        ],
        'types' => [
            '1' => [
                'showitem' => ' --div--;LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.tab.general,
                                        game,
                                        ---palette---;;time,
                                        ---palette---;;person_in_person_out,
                                        reason',
            ],
        ],
        'palettes' => [
            'time' => ['showitem' => 'period, minute, minute_additional'],
            'person_in_person_out' => ['showitem' => 'person_in, person_out'],
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
                        ['LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.select', 0],
                    ],
                    'maxItems' => 1,
                    'renderType' => 'selectSingle',
                    'size' => 1,
                    'type' => 'select',
                ],
            ],
            
            'period' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_gamechange.period',
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
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_gamechange.minute',
                'config' => [
                    'eval' => 'int, required, trim',
                    'range' => [
                        'lower' => 1,
                        'upper' => 1000,
                    ],
                    'type' => 'input',
                    'size' => 10,
                ],
            ],
            'minute_additional' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_gamechange.minute_additional',
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
            'person_in' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_gamechange.person_in',
                'config' => [
                    'foreign_table' => 'tx_sportms_domain_model_person',
                    'foreign_table_where' => '  AND tx_sportms_domain_model_person.uid IN (SELECT person FROM tx_sportms_domain_model_gamelineup WHERE tx_sportms_domain_model_gamelineup.game = ###REC_FIELD_game###)
                                            ORDER BY tx_sportms_domain_model_person.lastname ASC, tx_sportms_domain_model_person.firstname ASC',
                    'items' => [
                        ['LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.select', 0],
                    ],
                    'maxItems' => 1,
                    'renderType' => 'selectSingle',
                    'size' => 1,
                    'type' => 'select',
                ],
            ],
            'person_out' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_gamechange.person_out',
                'config' => [
                    'foreign_table' => 'tx_sportms_domain_model_person',
                    'foreign_table_where' => '  AND tx_sportms_domain_model_person.uid IN (SELECT person FROM tx_sportms_domain_model_gamelineup WHERE tx_sportms_domain_model_gamelineup.game = ###REC_FIELD_game###)
                                                AND tx_sportms_domain_model_person.uid != ###REC_FIELD_person_in###
                                                ORDER BY tx_sportms_domain_model_person.lastname ASC, tx_sportms_domain_model_person.firstname ASC',
                    'items' => [
                        ['LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.select', 0],
                    ],
                    'maxItems' => 1,
                    'renderType' => 'selectSingle',
                    'size' => 1,
                    'type' => 'select',
                ],
            ],
            'reason' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_gamechange.reason',
                'config' => [
                    'items' => [
                        ['LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.select', 0],
                        [
                            'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_gamechange.reason.performance',
                            1,
                        ],
                        [
                            'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_gamechange.reason.tactics',
                            2,
                        ],
                        [
                            'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_gamechange.reason.injury',
                            3,
                        ],
                    ],
                    'renderType' => 'selectSingle',
                    'type' => 'select',
                ],
            ],
        
        ],
    ];
