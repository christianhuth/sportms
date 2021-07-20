<?php
    
    use Balumedien\Sportms\Classes\UserFunc\UserFunc;
    
    if (!defined('TYPO3_MODE')) {
        die ('Access denied.');
    }
    
    return [
        'ctrl' => [
            'crdate' => 'crdate',
            'cruser_id' => 'cruser_id',
            'default_sortby' => 'name',
            'delete' => 'deleted',
            'enablecolumns' => [
                'disabled' => 'hidden',
                'starttime' => 'starttime',
                'endtime' => 'endtime',
            ],
            'iconfile' => 'EXT:sportms/Resources/Public/Icons/tx_sportms_domain_model_venue.svg',
            'label' => '',
            'label_userFunc' => UserFunc::class . '->VenueLabel',
            'searchFields' => 'name',
            'title' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_venue',
            'tstamp' => 'tstamp',
            'versioningWS' => true,
        ],
        'types' => [
            '1' => [
                'showitem' => ' --div--;LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.tab.general,
                                    name,
                                    address,
                                    home_venue_for_clubs,
                                    images,
                                    description,
                                    --palette--;;building,
                                    --palette--;;size,
                                --div--;LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.tab.visibility,
                                    --palette--;LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.palette.visibility_general;visibility_general,
                                    --palette--;LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.palette.visibility_detail;visibility_detail',
            ],
        ],
        'palettes' => [
            'building' => ['showitem' => 'date_of_building, year_of_building'],
            'size' => ['showitem' => 'dimensions, surface, spectator_capacity'],
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
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_venue.name',
                'config' => [
                    'eval' => 'required, trim',
                    'size' => 30,
                    'type' => 'input',
                ],
            ],
            'address' => [
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_address',
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
                    'maxitems' => 1,
                    'type' => 'inline',
                ],
            ],
            'home_venue_for_clubs' => [
                'exclude' => true,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_venue.home_venue_for_clubs',
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
                    'foreign_table' => 'tx_sportms_domain_model_club',
                    'foreign_table_where' => 'ORDER BY tx_sportms_domain_model_club.name ASC',
                    'MM' => 'tx_sportms_venue_club_mm',
                    'multiple' => 0,
                    'renderType' => 'selectMultipleSideBySide',
                    'size' => 10,
                    'type' => 'select',
                ],
            ],
            
            'images' => [
                'exclude' => 1,
                'label' => 'Image',
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
            
            'description' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_venue.description',
                'config' => [
                    'cols' => '40',
                    'rows' => '15',
                    'type' => 'text',
                ],
            ],
            
            'date_of_building' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_venue.date_of_building',
                'config' => [
                    'type' => 'input',
                    'size' => 8,
                    'eval' => 'date',
                    'placeholder' => 'dd-mm-yyyy',
                    'renderType' => 'inputDateTime',
                ],
            ],
            'year_of_building' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_venue.year_of_building',
                'config' => [
                    'eval' => 'trim',
                    'size' => 5,
                    'type' => 'input',
                ],
            ],
            
            'dimensions' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_venue.dimensions',
                'config' => [
                    'type' => 'input',
                    'size' => 12,
                    'eval' => 'trim',
                ],
            ],
            'surface' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_venue.surface',
                'config' => [
                    'items' => [
                        ['LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.select', 0],
                        ['Halle', 1],
                        ['Kunstrasen', 2],
                        ['Rasen', 3],
                    ],
                    'renderType' => 'selectSingle',
                    'type' => 'select',
                ],
            ],
            'spectator_capacity' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_venue.spectator_capacity',
                'config' => [
                    'type' => 'input',
                    'size' => 6,
                    'eval' => 'int, trim',
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
                    'fallbackCharacter' => '-',
                    'generatorOptions' => [
                        'fields' => ['uid', 'club', 'name'],
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
        
        ],
    ];
