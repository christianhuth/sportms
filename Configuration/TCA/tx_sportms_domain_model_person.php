<?php
    
    if (!defined('TYPO3_MODE')) {
        die ('Access denied.');
    }
    
    return [
        'ctrl' => [
            'crdate' => 'crdate',
            'cruser_id' => 'cruser_id',
            'default_sortby' => 'ORDER BY lastname ASC, firstname ASC',
            'delete' => 'deleted',
            'dividers2tabs' => true,
            'enablecolumns' => [
                'disabled' => 'hidden',
                'starttime' => 'starttime',
                'endtime' => 'endtime',
            ],
            'iconfile' => 'EXT:sportms/Resources/Public/Icons/tx_sportms_domain_model_person.svg',
            'label' => 'lastname',
            'label_alt' => 'firstname',
            'label_alt_force' => 1,
            'searchFields' => 'lastname, firstname, birthname, nickname',
            'title' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_person',
            'tstamp' => 'tstamp',
            'versioningWS' => true,
        ],
        'types' => [
            '1' => [
                'showitem' => ' --div--;LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.tab.general,
                                    --palette--;Name;firstname_lastname,
                                    --palette--;;birthname_nickname,
                                    --palette--;;birth,
                                    nationalities,
                                    sex,
                                --div--;LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_domain_model_person.tab.personal,
                                    --palette--;;weight_height_shoesize,
                                    --palette--;;hander_footer,
                                    family_status,
                                    --palette--;;graduation_job,
                                    characteristics,
                                    hobbies,
                                    --palette--;;dish_drink,
                                --div--;LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_general.contact_information,
                                    addresses,
                                    phones,
                                    mails,
                                    urls,
                                --div--;LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_personprofile.plural,
                                    person_profiles,
                                --div--;LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.tab.visibility,
                                    --palette--;LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.palette.visibility_general;visibility_general,
                                    --palette--;LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.palette.visibility_detail;visibility_detail,
                                    show_birthday',
            ],
        ],
        'palettes' => [
            'firstname_lastname' => ['showitem' => 'firstname, lastname'],
            'birthname_nickname' => ['showitem' => 'birthname, nickname'],
            'birth' => ['showitem' => 'date_of_birth, zodiac_sign, place_of_birth'],
            'weight_height_shoesize' => ['showitem' => 'weight, height, size_of_shoe'],
            'hander_footer' => ['showitem' => 'hander, footer'],
            'graduation_job' => ['showitem' => 'graduation, job'],
            'dish_drink' => ['showitem' => 'favorite_dish, favorite_drink'],
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
            
            'firstname' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_person.firstname',
                'config' => [
                    'type' => 'input',
                    'size' => 30,
                    'eval' => 'trim, required',
                ],
            ],
            'lastname' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_person.lastname',
                'config' => [
                    'type' => 'input',
                    'size' => 30,
                    'eval' => 'trim, required',
                ],
            ],
            'birthname' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_person.birthname',
                'config' => [
                    'type' => 'input',
                    'size' => 30,
                    'eval' => 'trim',
                ],
            ],
            'nickname' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_person.nickname',
                'config' => [
                    'type' => 'input',
                    'size' => 30,
                    'eval' => 'trim',
                ],
            ],
            'date_of_birth' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_person.date_of_birth',
                'config' => [
                    'type' => 'input',
                    'size' => 12,
                    'eval' => 'date',
                    'placeholder' => 'dd-mm-yyyy',
                    'renderType' => 'inputDateTime',
                ],
            ],
            'zodiac_sign' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_general.zodiac_sign',
                'config' => [
                    'items' => [
                        ['LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_select.something', 0],
                        [
                            'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_general.zodiac_sign.1',
                            1,
                        ],
                        [
                            'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_general.zodiac_sign.2',
                            2,
                        ],
                        [
                            'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_general.zodiac_sign.3',
                            3,
                        ],
                        [
                            'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_general.zodiac_sign.4',
                            4,
                        ],
                        [
                            'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_general.zodiac_sign.5',
                            5,
                        ],
                        [
                            'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_general.zodiac_sign.6',
                            6,
                        ],
                        [
                            'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_general.zodiac_sign.7',
                            7,
                        ],
                        [
                            'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_general.zodiac_sign.8',
                            8,
                        ],
                        [
                            'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_general.zodiac_sign.9',
                            9,
                        ],
                        [
                            'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_general.zodiac_sign.10',
                            10,
                        ],
                        [
                            'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_general.zodiac_sign.11',
                            11,
                        ],
                        [
                            'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_general.zodiac_sign.12',
                            12,
                        ],
                    ],
                    'maxItems' => 1,
                    'renderType' => 'selectSingle',
                    'size' => 1,
                    'type' => 'select',
                ],
            ],
            'place_of_birth' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_person.place_of_birth',
                'config' => [
                    'type' => 'input',
                    'size' => 30,
                    'eval' => 'trim',
                ],
            ],
            'nationalities' => [
                'exclude' => true,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_person.nationalities',
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
                    'foreign_table' => 'static_countries',
                    'MM' => 'tx_sportms_person_nationality_mm',
                    'multiple' => 0,
                    'multiSelectFilterItems' => [
                        ['', ''],
                        ['54', 'Deutschland (DE)'],
                        ['72', 'Frankreich (FR)'],
                        ['74', 'Großbritannien (GB)'],
                    ],
                    'renderType' => 'selectMultipleSideBySide',
                    'size' => 10,
                    'type' => 'select',
                ],
            ],
            'sex' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_general.sex',
                'config' => [
                    'items' => [
                        ['LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_select.something', ''],
                        [
                            'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_general.sex.diverse',
                            'd',
                        ],
                        ['LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_general.sex.male', 'm'],
                        ['LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_general.sex.female', 'f'],
                    ],
                    'renderType' => 'selectSingle',
                    'type' => 'select',
                ],
            ],
            
            'weight' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_person.weight',
                'config' => [
                    'eval' => 'double2, trim',
                    'size' => 3,
                    'type' => 'input',
                ],
            ],
            'height' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_person.height',
                'config' => [
                    'eval' => 'double2, trim',
                    'size' => 3,
                    'type' => 'input',
                ],
            ],
            'size_of_shoe' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_person.size_of_shoe',
                'config' => [
                    'eval' => 'trim',
                    'size' => 3,
                    'type' => 'input',
                ],
            ],
            'footer' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_person.footer',
                'config' => [
                    'items' => [
                        ['LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_select.something', ""],
                        [
                            'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_person.footer_1',
                            1,
                        ],
                        [
                            'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_person.footer_2',
                            2,
                        ],
                        [
                            'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_person.footer_3',
                            3,
                        ],
                    ],
                    'maxItems' => 1,
                    'renderType' => 'selectSingle',
                    'size' => 1,
                    'type' => 'select',
                ],
            ],
            'hander' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_person.hander',
                'config' => [
                    'items' => [
                        ['LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_select.something', ""],
                        [
                            'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_person.hander_1',
                            1,
                        ],
                        [
                            'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_person.hander_2',
                            2,
                        ],
                        [
                            'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_person.hander_3',
                            3,
                        ],
                    ],
                    'maxItems' => 1,
                    'renderType' => 'selectSingle',
                    'size' => 1,
                    'type' => 'select',
                ],
            ],
            'family_status' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_person.family_status',
                'config' => [
                    'items' => [
                        ['LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_select.something', ''],
                        [
                            'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_person.family_status.1',
                            '1',
                        ],
                        [
                            'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_person.family_status.2',
                            '2',
                        ],
                        [
                            'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_person.family_status.3',
                            '3',
                        ],
                        [
                            'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_person.family_status.4',
                            '4',
                        ],
                        [
                            'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_person.family_status.5',
                            '5',
                        ],
                        [
                            'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_person.family_status.6',
                            '6',
                        ],
                        [
                            'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_person.family_status.7',
                            '7',
                        ],
                    ],
                    'renderType' => 'selectSingle',
                    'type' => 'select',
                ],
            ],
            'graduation' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_person.graduation',
                'config' => [
                    'type' => 'input',
                    'size' => 30,
                    'eval' => 'trim',
                ],
            ],
            'job' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_person.job',
                'config' => [
                    'type' => 'input',
                    'size' => 30,
                    'eval' => 'trim',
                ],
            ],
            'characteristics' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_person.characteristics',
                'config' => [
                    'type' => 'input',
                    'size' => 30,
                    'eval' => 'trim',
                ],
            ],
            'hobbies' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_person.hobbies',
                'config' => [
                    'type' => 'input',
                    'size' => 30,
                    'eval' => 'trim',
                ],
            ],
            'favorite_dish' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_person.favorite_dish',
                'config' => [
                    'type' => 'input',
                    'size' => 30,
                    'eval' => 'trim',
                ],
            ],
            'favorite_drink' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_person.favorite_drink',
                'config' => [
                    'type' => 'input',
                    'size' => 30,
                    'eval' => 'trim',
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
            
            'person_profiles' => [
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_personprofile.plural',
                'config' => [
                    'appearance' => [
                        'useSortable' => 1,
                    ],
                    'foreign_field' => 'person',
                    'foreign_sortby' => 'sorting',
                    'foreign_table' => 'tx_sportms_domain_model_personprofile',
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
                    'eval' => 'uniqueInSite',
                    'fallbackCharacter' => '-',
                    'generatorOptions' => [
                        'fields' => ['lastname', 'firstname'],
                        'fieldSeparator' => '-',
                        'prefixParentPageSlug' => false,
                        'replacements' => [
                            '/' => '',
                        ],
                    ],
                    'prependSlash' => false,
                    'type' => 'slug',
                ],
            ],
            
            'show_birthday' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_domain_model_person.show_birthday',
                'config' => [
                    'default' => false,
                    'renderType' => 'checkboxToggle',
                    'type' => 'check',
                ],
            ],
        
        ],
    ];
