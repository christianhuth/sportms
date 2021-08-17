<?php
    
    use Balumedien\Sportms\UserFunc\UserFunc;
    
    if (!defined('TYPO3_MODE')) {
        die ('Access denied.');
    }
    
    return [
        'ctrl' => [
            'crdate' => 'crdate',
            'cruser_id' => 'cruser_id',
            'delete' => 'deleted',
            'dividers2tabs' => true,
            'enablecolumns' => [
                'disabled' => 'hidden',
                'starttime' => 'starttime',
                'endtime' => 'endtime',
            ],
            'hideTable' => true,
            'iconfile' => 'EXT:sportms/Resources/Public/Icons/tx_sportms_domain_model_personprofile.svg',
            'label' => '',
            'label_userFunc' => UserFunc::class . '->personProfileLabel',
            'searchFields' => '',
            'sortby' => 'sorting',
            'title' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_personprofile',
            'tstamp' => 'tstamp',
            'type' => 'profile_type',
            'typeicon_classes' => [
                1 => 'sportms-domain-model-clubofficialprofile-icon',
                2 => 'sportms-domain-model-clubsectionofficialprofile-icon',
                3 => 'sportms-domain-model-playerprofile-icon',
                4 => 'sportms-domain-model-refereeprofile-icon',
                5 => 'sportms-domain-model-teamseasonofficialprofile-icon',
            ],
            'typeicon_column' => 'profile_type',
            'versioningWS' => true,
        ],
        'types' => [
            '1' => [
                'showitem' => ' --div--;LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.tab.general,
                                    --palette--;;sport_profile,
                                    --palette--;LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_domain_model_personprofile.palette.main_position;main_position,
                                    --palette--;LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_domain_model_personprofile.palette.side_positions;side_positions,
                                --div--;LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_domain_model_personprofile.profile_images,
                                    profile_images,
                                --div--;LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.tab.visibility,
                                    --palette--;LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.palette.visibility_general;visibility_general,
                                    --palette--;LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.palette.visibility_detail;visibility_detail,',
            ],
        ],
        'palettes' => [
            'sport_profile' => ['showitem' => 'sport, profile_type'],
            'main_position' => ['showitem' => 'main_sport_position_group, main_sport_position'],
            'side_positions' => ['showitem' => 'side_sport_position_groups, side_sport_positions'],
            'visibility_general' => ['showitem' => 'hidden, starttime, endtime'],
            'visibility_detail' => ['showitem' => 'detail_link'],
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
            
            'person' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_person',
                'config' => [
                    'foreign_table' => 'tx_sportms_domain_model_person',
                    'foreign_table_where' => 'ORDER BY lastname ASC, firstname ASC',
                    'items' => [
                        ['LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_select.something', ''],
                    ],
                    'maxItems' => 1,
                    'renderType' => 'selectSingle',
                    'size' => 1,
                    'type' => 'select',
                ],
                'onChange' => 'reload',
            ],
            
            'profile_type' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_domain_model_personprofile.profiletype',
                'config' => [
                    'eval' => 'required',
                    'fieldWizard' => [
                        'selectIcons' => [
                            'disabled' => false,
                        ],
                    ],
                    'items' => [
                        [
                            'LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_select.something',
                            null,
                        ],
                        [
                            'LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_domain_model_personprofile.profiletype.clubofficial',
                            1,
                            'sportms-domain-model-clubofficialprofile-icon',
                        ],
                        [
                            'LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_domain_model_personprofile.profiletype.clubsectionofficial',
                            2,
                            'sportms-domain-model-clubsectionofficialprofile-icon',
                        ],
                        [
                            'LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_domain_model_personprofile.profiletype.player',
                            3,
                            'sportms-domain-model-playerprofile-icon',
                        ],
                        [
                            'LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_domain_model_personprofile.profiletype.referee',
                            4,
                            'sportms-domain-model-refereeprofile-icon',
                        ],
                        [
                            'LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_domain_model_personprofile.profiletype.teamseasonofficial',
                            5,
                            'sportms-domain-model-teamseasonofficialprofile-icon',
                        ],
                    ],
                    'renderType' => 'selectSingle',
                    'type' => 'select',
                    'size' => 1,
                    'maxitems' => 1,
                ],
                'onChange' => 'reload',
            ],
            'sport' => [
                'displayCond' => [
                    'OR' => [
                        'FIELD:profile_type:=:2',
                        'FIELD:profile_type:=:3',
                        'FIELD:profile_type:=:4',
                        'FIELD:profile_type:=:5',
                    ],
                ],
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_sport',
                'config' => [
                    'eval' => 'required',
                    'foreign_table' => 'tx_sportms_domain_model_sport',
                    'foreign_table_where' => 'ORDER BY tx_sportms_domain_model_sport.label ASC',
                    'items' => [
                        ['LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_select.something', ''],
                    ],
                    'maxItems' => 1,
                    'renderType' => 'selectSingle',
                    'size' => 1,
                    'type' => 'select',
                ],
                'onChange' => 'reload',
            ],
            'main_sport_position_group' => [
                'displayCond' => [
                    'AND' => [
                        'FIELD:profile_type:=:3',
                        'FIELD:sport:>:0',
                    ],
                ],
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_sportpositiongroup',
                'config' => [
                    'foreign_table' => 'tx_sportms_domain_model_sportpositiongroup',
                    'foreign_sortby' => 'sorting',
                    'foreign_table_where' => ' AND tx_sportms_domain_model_sportpositiongroup.sport = ###REC_FIELD_sport###
											ORDER BY tx_sportms_domain_model_sportpositiongroup.label ASC',
                    'items' => [
                        ['LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_select.something', ''],
                    ],
                    'maxItems' => 1,
                    'renderType' => 'selectSingle',
                    'size' => 1,
                    'type' => 'select',
                ],
                'onChange' => 'reload',
            ],
            'main_sport_position' => [
                'displayCond' => [
                    'AND' => [
                        'FIELD:profile_type:=:3',
                        'FIELD:sport:>:0',
                    ],
                ],
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_sportposition',
                'config' => [
                    'foreign_table' => 'tx_sportms_domain_model_sportposition',
                    'foreign_table_where' => '  AND tx_sportms_domain_model_sportposition.sport_position_group = ###REC_FIELD_main_sport_position_group###
                                            ORDER BY tx_sportms_domain_model_sportposition.label ASC',
                    'items' => [
                        ['LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_select.something', ''],
                    ],
                    'maxItems' => 1,
                    'renderType' => 'selectSingle',
                    'size' => 1,
                    'type' => 'select',
                ],
            ],
            'side_sport_position_groups' => [
                'displayCond' => [
                    'AND' => [
                        'FIELD:profile_type:=:3',
                        'FIELD:sport:>:0',
                    ],
                ],
                'exclude' => true,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_sportpositiongroup.plural',
                'config' => [
                    'autoSizeMax' => 30,
                    'fieldControl' => [
                        'editPopup' => [
                            'disabled' => true,
                        ],
                        'addRecord' => [
                            'disabled' => true,
                        ],
                        'listModule' => [
                            'disabled' => true,
                        ],
                    ],
                    'foreign_table' => 'tx_sportms_domain_model_sportpositiongroup',
                    'foreign_table_where' => '  AND tx_sportms_domain_model_sportpositiongroup.uid != ###REC_FIELD_main_sport_position_group###
											ORDER BY tx_sportms_domain_model_sportpositiongroup.label ASC',
                    'MM' => 'tx_sportms_personprofile_sportpositiongroup_mm',
                    'multiple' => 0,
                    'renderType' => 'selectMultipleSideBySide',
                    'size' => 10,
                    'type' => 'select',
                ],
            ],
            'side_sport_positions' => [
                'displayCond' => [
                    'AND' => [
                        'FIELD:profile_type:=:3',
                        'FIELD:sport:>:0',
                    ],
                ],
                'exclude' => true,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_sportposition.plural',
                'config' => [
                    'autoSizeMax' => 30,
                    'fieldControl' => [
                        'editPopup' => [
                            'disabled' => true,
                        ],
                        'addRecord' => [
                            'disabled' => true,
                        ],
                        'listModule' => [
                            'disabled' => true,
                        ],
                    ],
                    'foreign_table' => 'tx_sportms_domain_model_sportposition',
                    'foreign_table_where' => '  AND tx_sportms_domain_model_sportposition.uid != ###REC_FIELD_main_sport_position###
											ORDER BY tx_sportms_domain_model_sportposition.label ASC',
                    'MM' => 'tx_sportms_personprofile_sportposition_mm',
                    'multiple' => 0,
                    'renderType' => 'selectMultipleSideBySide',
                    'size' => 10,
                    'type' => 'select',
                ],
            ],
            
            'profile_images' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_domain_model_personprofile.profile_images',
                'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                    'image',
                    [
                        'appearance' => [
                            'createNewRelationLinkTitle' => 'LLL:EXT:cms/locallang_ttc.xlf:images.addFileReference',
                        ],
                    ],
                    $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
                ),
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
        
        ],
    ];