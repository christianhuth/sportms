<?php
    
    use Balumedien\Sportms\Classes\UserFunc\UserFunc;
    
    if (!defined('TYPO3_MODE')) {
        die ('Access denied.');
    }
    
    return [
        'ctrl' => [
            'crdate' => 'crdate',
            'cruser_id' => 'cruser_id',
            'default_sortby' => 'ORDER BY label ASC',
            'delete' => 'deleted',
            'enablecolumns' => [
                'disabled' => 'hidden',
                'starttime' => 'starttime',
                'endtime' => 'endtime',
            ],
            'hideTable' => false,
            'iconfile' => 'EXT:sportms/Resources/Public/Icons/tx_sportms_domain_model_competition.svg',
            'label' => '',
            'label_userFunc' => UserFunc::class . '->CompetitionLabel',
            'searchFields' => 'label, abbreviation',
            'title' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_competition',
            'tstamp' => 'tstamp',
            'versioningWS' => true,
        ],
        'types' => [
            '1' => [
                'showitem' => ' --div--;LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.tab.general,
                                    --palette;;sport,
                                    --palette;;competition,
                                --div--;LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_competitionseason.plural,
                                    competition_seasons,
                                --div--;LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.tab.visibility,
                                    --palette--;LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.palette.visibility_general;visibility_general,
                                    --palette--;LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.palette.visibility_detail;visibility_detail',
            ],
        ],
        'palettes' => [
            'sport' => ['showitem' => 'sport, sport_age_group, sport_age_level'],
            'competition' => ['showitem' => 'competition_type, label, abbreviation'],
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
            
            'sport' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_sport',
                'config' => [
                    'eval' => 'required',
                    'foreign_table' => 'tx_sportms_domain_model_sport',
                    'foreign_table_where' => 'ORDER BY label ASC',
                    'items' => [
                        ['LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.select', ""],
                    ],
                    'maxItems' => 1,
                    'minItems' => 1,
                    'renderType' => 'selectSingle',
                    'size' => 1,
                    'type' => 'select',
                ],
                'onChange' => 'reload',
            ],
            'sport_age_group' => [
                'displayCond' => 'FIELD:sport:>:0',
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_sportagegroup',
                'config' => [
                    'eval' => 'required',
                    'foreign_table' => 'tx_sportms_domain_model_sportagegroup',
                    'foreign_table_where' => ' AND tx_sportms_domain_model_sportagegroup.sport = ###REC_FIELD_sport### ORDER BY tx_sportms_domain_model_sportagegroup.label ASC',
                    'items' => [
                        ['LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.select', ""],
                    ],
                    'renderType' => 'selectSingle',
                    'size' => 1,
                    'type' => 'select',
                ],
                'onChange' => 'reload',
            ],
            'sport_age_level' => [
                'displayCond' => [
                    'AND' => [
                        'FIELD:sport:>:0',
                        'FIELD:sport_age_group:>:0',
                    ],
                ],
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_sportagelevel',
                'config' => [
                    'eval' => 'required',
                    'foreign_table' => 'tx_sportms_domain_model_sportagelevel',
                    'foreign_table_where' => ' AND tx_sportms_domain_model_sportagelevel.sport_age_group = ###REC_FIELD_sport_age_group### ORDER BY tx_sportms_domain_model_sportagelevel.label ASC',
                    'items' => [
                        ['LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.select', ""],
                    ],
                    'renderType' => 'selectSingle',
                    'size' => 1,
                    'type' => 'select',
                ],
            ],
            'competition_type' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_competitiontype',
                'config' => [
                    'eval' => 'required',
                    'foreign_table' => 'tx_sportms_domain_model_competitiontype',
                    'foreign_table_where' => 'ORDER BY label ASC',
                    'items' => [
                        ['LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.select', ""],
                    ],
                    'maxItems' => 1,
                    'minItems' => 1,
                    'renderType' => 'selectSingle',
                    'size' => 1,
                    'type' => 'select',
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
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_general.abbreviation',
                'config' => [
                    'eval' => 'trim',
                    'size' => 15,
                    'type' => 'input',
                ],
            ],
            
            'competition_seasons' => [
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_competitionseason.plural',
                'config' => [
                    'appearance' => [
                        'enabledControls' => [
                            'info' => false,
                            'new' => true,
                            'sort' => false,
                            'hide' => true,
                            'dragdrop' => true,
                            'delete' => true,
                            'localize' => true,
                        ],
                        'levelLinksPosition' => 'bottom',
                        'useSortable' => 1,
                    ],
                    'foreign_field' => 'competition',
                    'foreign_sortby' => 'sorting',
                    'foreign_table' => 'tx_sportms_domain_model_competitionseason',
                    'type' => 'inline',
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
                    'eval' => 'uniqueInPid',
                    'fallbackCharacter' => '-',
                    'generatorOptions' => [
                        'fields' => ['uid', 'label'],
                        'fieldSeparator' => '/',
                        'prefixParentPageSlug' => false,
                        'replacements' => [
                            '/' => '',
                        ],
                    ],
                    'prependSlash' => false,
                    'type' => 'slug',
                ],
            ],
        
        ],
    ];
