<?php
    
    use Balumedien\Sportms\Classes\UserFunc\UserFunc;
    
    if (!defined('TYPO3_MODE')) {
        die ('Access denied.');
    }
    
    return [
        'ctrl' => [
            'crdate' => 'crdate',
            'cruser_id' => 'cruser_id',
            'default_sortby' => 'ORDER BY club ASC, sorting ASC',
            'delete' => 'deleted',
            'enablecolumns' => [
                'disabled' => 'hidden',
                'starttime' => 'starttime',
                'endtime' => 'endtime',
            ],
            'hideTable' => true,
            'iconfile' => 'EXT:sportms/Resources/Public/Icons/tx_sportms_domain_model_clubsection.svg',
            'label' => '',
            'label_userFunc' => UserFunc::class . '->clubSectionLabel',
            'searchFields' => '',
            'title' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_domain_model_clubsection',
            'tstamp' => 'tstamp',
            'versioningWS' => true,
        ],
        'types' => [
            '1' => [
                'showitem' => ' --div--;LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.tab.general,
                                    club,
                                    label,
                                    sports,
                                    images,
                                    club_section_members,
                                --div--;LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_general.contact_information,
                                    addresses,
                                    phones,
                                    mails,
                                    urls,
                                --div--;LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_clubsectionofficial.plural,
                                    club_section_officials,
                                --div--;LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.tab.visibility,
                                    --palette--;LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.palette.visibility_general;visibility_general,
                                    --palette--;LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.palette.visibility_detail;visibility_detail',
            ],
        ],
        'palettes' => [
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
            
            'club' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_club',
                'config' => [
                    'eval' => 'required',
                    'foreign_table' => 'tx_sportms_domain_model_club',
                    'foreign_table_where' => 'ORDER BY tx_sportms_domain_model_club.name ASC',
                    'items' => [
                        ['LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.select', ""],
                    ],
                    'maxItems' => 1,
                    'renderType' => 'selectSingle',
                    'size' => 1,
                    'type' => 'select',
                ],
            ],
            'label' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_general.label',
                'config' => [
                    'eval' => 'trim, required',
                    'size' => 30,
                    'type' => 'input',
                ],
            ],
            'sports' => [
                'exclude' => true,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_sport.plural',
                'config' => [
                    'type' => 'select',
                    'renderType' => 'selectMultipleSideBySide',
                    'foreign_table' => 'tx_sportms_domain_model_sport',
                    'foreign_table_where' => ' ORDER BY tx_sportms_domain_model_sport.label ASC',
                    'MM' => 'tx_sportms_clubsection_sport_mm',
                    'size' => 10,
                    'autoSizeMax' => 30,
                    'maxitems' => 9999,
                    'minitems' => 0,
                    'multiple' => 0,
                ],
            ],
            'images' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_clubsection.images',
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
            'club_section_members' => [
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_clubsectionmembers.plural',
                'config' => [
                    'appearance' => [
                        'enabledControls' => [
                            'info' => false,
                            'new' => true,
                            'sort' => false,
                            'hide' => true,
                            'dragdrop' => false,
                            'delete' => true,
                            'localize' => true,
                        ],
                        'levelLinksPosition' => 'bottom',
                        'useSortable' => 1,
                    ],
                    'foreign_field' => 'club_section',
                    'foreign_table' => 'tx_sportms_domain_model_clubsectionmembers',
                    'type' => 'inline',
                ],
            ],
            
            'addresses' => [
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_address.plural',
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
                    'foreign_field' => 'foreign_uid',
                    'foreign_sortby' => 'sorting',
                    'foreign_table' => 'tx_sportms_domain_model_address',
                    'foreign_table_field' => 'foreign_table',
                    'type' => 'inline',
                ],
            ],
            'phones' => [
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_phone.plural',
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
                    'foreign_field' => 'foreign_uid',
                    'foreign_sortby' => 'sorting',
                    'foreign_table' => 'tx_sportms_domain_model_phone',
                    'foreign_table_field' => 'foreign_table',
                    'type' => 'inline',
                ],
            ],
            'mails' => [
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_mail.plural',
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
                    'foreign_field' => 'foreign_uid',
                    'foreign_sortby' => 'sorting',
                    'foreign_table' => 'tx_sportms_domain_model_mail',
                    'foreign_table_field' => 'foreign_table',
                    'type' => 'inline',
                ],
            ],
            'urls' => [
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_url.plural',
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
                    'foreign_field' => 'foreign_uid',
                    'foreign_sortby' => 'sorting',
                    'foreign_table' => 'tx_sportms_domain_model_url',
                    'foreign_table_field' => 'foreign_table',
                    'type' => 'inline',
                ],
            ],
            
            'club_section_officials' => [
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_clubsectionofficial.plural',
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
                    'foreign_field' => 'club_section',
                    'foreign_table' => 'tx_sportms_domain_model_clubsectionofficial',
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
        
        ],
    ];
