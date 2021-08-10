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
            'iconfile' => 'EXT:sportms/Resources/Public/Icons/tx_sportms_domain_model_clubofficial.svg',
            'label' => '',
            'label_userFunc' => UserFunc::class . '->clubOfficialLabel',
            'searchFields' => '',
            'sortby' => 'sorting',
            'title' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_clubofficial',
            'tstamp' => 'tstamp',
            'versioningWS' => true,
        ],
        'types' => [
            '1' => [
                'showitem' => ' --div--;LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.tab.general,
                                    --palette--;LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_teamseasonofficial;person_job,
                                    --palette--;LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.palette.date;date,
                                --div--;LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.tab.visibility,
                                    --palette--;LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.palette.visibility_general;visibility_general',
            ],
        ],
        'palettes' => [
            'person_job' => ['showitem' => 'official_job, person_profile'],
            'date' => ['showitem' => 'startdate, until_today, enddate'],
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
            
            'club' => [
                'config' => [
                    'type' => 'passthrough',
                ],
            ],
            
            'official_job' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_officialjob',
                'config' => [
                    'eval' => 'required',
                    'foreign_table' => 'tx_sportms_domain_model_officialjob',
                    'foreign_table_where' => ' AND tx_sportms_domain_model_officialjob.is_club_job = 1 ORDER BY tx_sportms_domain_model_officialjob.label ASC',
                    'items' => [
                        [
                            'LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_select.something',
                            null,
                        ],
                    ],
                    'maxItems' => 1,
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
                    'foreign_table' => 'tx_sportms_domain_model_personprofile',
                    'foreign_table_where' => ' AND tx_sportms_domain_model_personprofile.profile_type = 1',
                    'items' => [
                        [
                            'LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_select.something',
                            null,
                        ],
                    ],
                    'maxItems' => 1,
                    'minItems' => 1,
                    'renderType' => 'selectSingle',
                    'size' => 1,
                    'type' => 'select',
                ],
            ],
            
            'startdate' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_general.official.startdate',
                'config' => [
                    'type' => 'input',
                    'size' => 8,
                    'eval' => 'date',
                    'placeholder' => 'dd-mm-yyyy',
                    'renderType' => 'inputDateTime',
                ],
            ],
            'until_today' => [
                'config' => [
                    'default' => true,
                    'renderType' => 'checkboxToggle',
                    'type' => 'check',
                ],
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_general.official.until_today',
                'onChange' => 'reload',
            ],
            'enddate' => [
                'config' => [
                    'type' => 'input',
                    'size' => 8,
                    'eval' => 'date',
                    'placeholder' => 'dd-mm-yyyy',
                    'renderType' => 'inputDateTime',
                ],
                'displayCond' => 'FIELD:until_today:<:1',
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_general.official.enddate',
            ],
        
        ],
    ];
