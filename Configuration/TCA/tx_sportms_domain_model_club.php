<?php
    
    if (!defined('TYPO3')) {
        die ('Access denied.');
    }
    
    return [
        'ctrl' => [
            'crdate' => 'crdate',
            'cruser_id' => 'cruser_id',
            'default_sortby' => 'ORDER BY name ASC',
            'delete' => 'deleted',
            'enablecolumns' => [
                'disabled' => 'hidden',
                'starttime' => 'starttime',
                'endtime' => 'endtime',
            ],
            'iconfile' => 'EXT:sportms/Resources/Public/Icons/tx_sportms_domain_model_club.svg',
            'label' => 'name',
            'searchFields' => 'name',
            'title' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_club',
            'tstamp' => 'tstamp',
            'versioningWS' => true,
        ],
        'types' => [
            '1' => [
                'showitem' => ' --div--;LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.tab.general,
                                    name,
                                --div--;LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.tab.history,
                                    --palette--;; founding,
                                    club_members,
                                --div--;LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.tab.appearance,
                                    logos,
                                    colours,
                                    colour_pickers,
                                --div--;LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_general.contact_information,
                                    addresses, phones, mails, urls,
                                --div--;LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_clubground.plural,
                                    club_grounds, home_venues,
                                --div--;LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_clubsection.plural,
                                    club_sections,
                                --div--;LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_clubofficial.plural,
                                    club_officials,
                                --div--;LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.tab.visibility,
                                    --palette--;LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.palette.visibility_general;visibility_general,
                                    --palette--;LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.palette.visibility_detail;visibility_detail',
            ],
        ],
        'palettes' => [
            'founding' => ['showitem' => 'date_of_founding, year_of_founding'],
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
            
            'name' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_club.name',
                'config' => [
                    'type' => 'input',
                    'size' => 30,
                    'eval' => 'trim, required',
                ],
            ],
            'date_of_founding' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_club.date_of_founding',
                'config' => [
                    'type' => 'input',
                    'size' => 8,
                    'eval' => 'date',
                    'placeholder' => 'dd-mm-yyyy',
                    'renderType' => 'inputDateTime',
                ],
            ],
            'year_of_founding' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_club.year_of_founding',
                'config' => [
                    'eval' => 'int, trim',
                    'max' => 4,
                    'min' => 4,
                    'range' => [
                        'lower' => 0,
                    ],
                    'size' => 10,
                    'type' => 'input',
                ],
            ],
            'club_members' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_clubmembers.plural',
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
                    ],
                    'foreign_field' => 'club',
                    'foreign_table' => 'tx_sportms_domain_model_clubmembers',
                    'type' => 'inline',
                ],
            ],
            
            'logos' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_club.logos',
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
            'colours' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_club.colours',
                'config' => [
                    'eval' => 'trim',
                    'size' => 30,
                    'type' => 'input',
                ],
            ],
            'colour_pickers' => [
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_colour.plural',
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
                    'foreign_table' => 'tx_sportms_domain_model_colour',
                    'foreign_table_field' => 'foreign_table',
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
            
            'club_grounds' => [
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_clubground.plural',
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
                    'foreign_field' => 'club',
                    'foreign_sortby' => 'sorting',
                    'foreign_table' => 'tx_sportms_domain_model_clubground',
                    'type' => 'inline',
                ],
            ],
            'home_venues' => [
                'exclude' => true,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_club.home_venues',
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
                    'foreign_table' => 'tx_sportms_domain_model_venue',
                    'foreign_table_where' => 'ORDER BY tx_sportms_domain_model_venue.name ASC',
                    'MM' => 'tx_sportms_venue_club_mm',
                    'MM_opposite_field' => 'home_venues',
                    'multiple' => 0,
                    'renderType' => 'selectMultipleSideBySide',
                    'size' => 10,
                    'type' => 'select',
                ],
            ],
            
            'club_sections' => [
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_clubsection.plural',
                'config' => [
                    'appearance' => [
                        'enabledControls' => [
                            'info' => true,
                            'new' => true,
                            'sort' => true,
                            'hide' => true,
                            'dragdrop' => true,
                            'delete' => true,
                            'localize' => false,
                        ],
                        'levelLinksPosition' => 'bottom',
                        'useSortable' => 1,
                    ],
                    'foreign_field' => 'club',
                    'foreign_sortby' => 'sorting',
                    'foreign_table' => 'tx_sportms_domain_model_clubsection',
                    'type' => 'inline',
                ],
            ],
            
            'club_officials' => [
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_clubofficial.plural',
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
                    'foreign_field' => 'club',
                    'foreign_table' => 'tx_sportms_domain_model_clubofficial',
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
                    'fallbackCharacter' => '-',
                    'generatorOptions' => [
                        'fields' => ['name'],
                        'fieldSeparator' => '-',
                        'prefixParentPageSlug' => false,
                        'replacements' => [
                            '/' => '-',
                        ],
                    ],
                    'type' => 'slug',
                ],
            ],
        
        ],
    ];
