<?php
    
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
            'iconfile' => 'EXT:sportms/Resources/Public/Icons/tx_sportms_domain_model_sport.svg',
            'label' => 'label',
            'searchFields' => 'label',
            'title' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_sport',
            'tstamp' => 'tstamp',
            'versioningWS' => true,
        ],
        'types' => [
            '1' => [
                'showitem' => ' --div--;LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.tab.general,
                                    label,
                                    --palette--;;team_individual, sport_types,
                                --div--;LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_sportagegroup.plural,
                                    sport_age_groups,
                                --div--;LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_sportpositiongroup.plural,
                                    sport_position_groups,
                                --div--;LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.tab.visibility,
                                    --palette--;LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.palette.visibility_general;visibility_general,
                                    --palette--;LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.palette.visibility_detail;visibility_detail,
                                    --palette--;LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_domain_model_sport.palette.competition_pids;competition_pids,
                                    --palette--;LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_domain_model_sport.palette.game_pids;game_pids,
                                    --palette--;LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_domain_model_sport.palette.team_pids;team_pids',
            ],
        ],
        'palettes' => [
            'team_individual' => ['showitem' => 'is_team_sport, is_individual_sport'],
            'visibility_general' => ['showitem' => 'hidden, starttime, endtime'],
            'visibility_detail' => ['showitem' => 'slug'],
            'competition_pids' => ['showitem' => 'competition_detail_pid, competition_list_pid'],
            'game_pids' => ['showitem' => 'game_detail_pid, game_list_pid'],
            'team_pids' => ['showitem' => 'team_detail_pid, team_list_pid'],
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
            'is_team_sport' => [
                'exclude' => true,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_sport.is_team_sport',
                'config' => [
                    'default' => false,
                    'renderType' => 'checkboxToggle',
                    'type' => 'check',
                ],
            ],
            'is_individual_sport' => [
                'exclude' => true,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_sport.is_individual_sport',
                'config' => [
                    'default' => false,
                    'renderType' => 'checkboxToggle',
                    'type' => 'check',
                ],
            ],
            'sport_types' => [
                'exclude' => true,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_sporttype.plural',
                'config' => [
                    'type' => 'select',
                    'renderType' => 'selectMultipleSideBySide',
                    'foreign_table' => 'tx_sportms_domain_model_sporttype',
                    'foreign_table_where' => ' ORDER BY tx_sportms_domain_model_sporttype.label ASC',
                    'MM' => 'tx_sportms_sport_sporttype_mm',
                    'size' => 10,
                    'autoSizeMax' => 30,
                    'maxitems' => 9999,
                    'multiple' => 0,
                ],
            ],
            'sport_age_groups' => [
                'exclude' => true,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_sportagegroup.plural',
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
                    'foreign_field' => 'sport',
                    'foreign_sortby' => 'sorting',
                    'foreign_table' => 'tx_sportms_domain_model_sportagegroup',
                    'type' => 'inline',
                ],
            ],
            'sport_position_groups' => [
                'exclude' => true,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_sportpositiongroup.plural',
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
                    'foreign_field' => 'sport',
                    'foreign_sortby' => 'sorting',
                    'foreign_table' => 'tx_sportms_domain_model_sportpositiongroup',
                    'type' => 'inline',
                ],
            ],
            'slug' => [
                'exclude' => true,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.slug',
                'config' => [
                    'default' => '',
                    'fallbackCharacter' => '-',
                    'generatorOptions' => [
                        'fields' => ['label'],
                        'fieldSeparator' => '_',
                        'prefixParentPageSlug' => false,
                        'replacements' => [
                            '/' => '-',
                        ],
                    ],
                    'prependSlash' => false,
                    'type' => 'slug',
                ],
            ],
            'competition_detail_pid' => [
                'exclude' => true,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.detail_pid',
                'config' => [
                    'allowed' => 'pages',
                    'default' => 0,
                    'internal_type' => 'db',
                    'maxitems' => 1,
                    'size' => 1,
                    'suggestOptions' => [
                        'default' => [
                            'searchWholePhrase' => true,
                        ],
                    ],
                    'type' => 'group',
                ],
            ],
            'competition_list_pid' => [
                'exclude' => true,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.list_pid',
                'config' => [
                    'allowed' => 'pages',
                    'default' => 0,
                    'internal_type' => 'db',
                    'maxitems' => 1,
                    'size' => 1,
                    'suggestOptions' => [
                        'default' => [
                            'searchWholePhrase' => true,
                        ],
                    ],
                    'type' => 'group',
                ],
            ],
            'game_detail_pid' => [
                'exclude' => true,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.detail_pid',
                'config' => [
                    'allowed' => 'pages',
                    'default' => 0,
                    'internal_type' => 'db',
                    'maxitems' => 1,
                    'size' => 1,
                    'suggestOptions' => [
                        'default' => [
                            'searchWholePhrase' => true,
                        ],
                    ],
                    'type' => 'group',
                ],
            ],
            'game_list_pid' => [
                'exclude' => true,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.list_pid',
                'config' => [
                    'allowed' => 'pages',
                    'default' => 0,
                    'internal_type' => 'db',
                    'maxitems' => 1,
                    'size' => 1,
                    'suggestOptions' => [
                        'default' => [
                            'searchWholePhrase' => true,
                        ],
                    ],
                    'type' => 'group',
                ],
            ],
            'team_detail_pid' => [
                'exclude' => true,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.detail_pid',
                'config' => [
                    'allowed' => 'pages',
                    'default' => 0,
                    'internal_type' => 'db',
                    'maxitems' => 1,
                    'size' => 1,
                    'suggestOptions' => [
                        'default' => [
                            'searchWholePhrase' => true,
                        ],
                    ],
                    'type' => 'group',
                ],
            ],
            'team_list_pid' => [
                'exclude' => true,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.list_pid',
                'config' => [
                    'allowed' => 'pages',
                    'default' => 0,
                    'internal_type' => 'db',
                    'maxitems' => 1,
                    'size' => 1,
                    'suggestOptions' => [
                        'default' => [
                            'searchWholePhrase' => true,
                        ],
                    ],
                    'type' => 'group',
                ],
            ],
        
        ],
    ];