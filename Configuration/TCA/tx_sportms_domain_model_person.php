<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

return array(
    'ctrl' => array(
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
		'default_sortby' => 'ORDER BY lastname ASC, firstname ASC',
        'delete' => 'deleted',
        'dividers2tabs' => TRUE,
        'enablecolumns' => array(
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ),
		'iconfile' => 'EXT:sportms/Resources/Public/Icons/tx_sportms_domain_model_person.svg',
        'label' => 'lastname',
		'label_alt' => 'firstname',
		'label_alt_force' => 1,
        'searchFields' => 'lastname, firstname, birthname, nickname',
        'title'	=> 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_person',
        'tstamp' => 'tstamp',
		'versioningWS' => TRUE,
    ),
	'interface' => array(
		'showRecordFieldList' => 'firstname, lastname, nickname, date_of_birth, zodiac_sign, place_of_birth, nationalities, sex, height, weight, hander, footer, address, phone, url',
	),
	'types' => array(
		'1' => array('showitem' => '--palette--;Name;firstname_lastname, --palette--;;birthname_nickname, --palette--;;birth, nationalities, sex,
									--div--;LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_person.tab_personal, --palette--;;weight_height_shoesize, --palette--;;hander_footer, family_status, --palette--;;graduation_job, characteristics, hobbies, --palette--;;dish_drink,
									--div--;LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_person.tab_contact, addresses, phones, mails, urls,
									--div--;LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_person.tab_profiles, person_profiles,
									--div--;LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.tab_visibility, hidden, show_birthday, detail_link, slug,
		                            '),
	),
	'palettes' => array(
		'firstname_lastname' => array('showitem' => 'firstname, lastname'),
		'birthname_nickname' => array('showitem' => 'birthname, nickname'),
		'birth' => array('showitem' => 'date_of_birth, zodiac_sign, place_of_birth'),
		'weight_height_shoesize' => array('showitem' => 'weight, height, size_of_shoe'),
		'hander_footer' => array('showitem' => 'hander, footer'),
		'graduation_job' => array('showitem' => 'graduation, job'),
		'dish_drink' => array('showitem' => 'favorite_dish, favorite_drink'),
	),
	'columns' => array(
        
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
						'invertStateDisplay' => true
					]
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
                    'allowLanguageSynchronization' => true
                ]
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
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ],
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],

		'firstname' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_person.firstname',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim, required'
			),
		),
		'lastname' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_person.lastname',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim, required'
			),
		),
		'birthname' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_person.birthname',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
        'nickname' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_person.nickname',
            'config' => array(
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ),
        ),
        'date_of_birth' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_person.date_of_birth',
            'config' => array(
                'type' => 'input',
                'size' => 12,
                'eval' => 'date',
                'placeholder' => 'dd-mm-yyyy',
				'renderType' => 'inputDateTime',
            ),
        ),
        'zodiac_sign' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_person.zodiac_sign',
            'config' => array(
				'items' => Array (
                    array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.select', 0),
					array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_person.zodiac_sign.1', 1),
					array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_person.zodiac_sign.2', 2),
					array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_person.zodiac_sign.3', 3),
					array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_person.zodiac_sign.4', 4),
					array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_person.zodiac_sign.5', 5),
					array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_person.zodiac_sign.6', 6),
					array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_person.zodiac_sign.7', 7),
					array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_person.zodiac_sign.8', 8),
					array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_person.zodiac_sign.9', 9),
					array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_person.zodiac_sign.10', 10),
					array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_person.zodiac_sign.11', 11),
					array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_person.zodiac_sign.12', 12),
				),
				'maxItems' => 1,
				'renderType' => 'selectSingle',
                'size' => 1,
                'type' => 'select',
            ),
        ),
        'place_of_birth' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_person.place_of_birth',
            'config' => array(
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
            ),
        ),
		'nationalities' => array(
			'exclude' => true,
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_person.nationalities',
			'config' => array(
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
			),
		),
        'sex' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_person.sex',
            'config' => array(
				'items' => array(
                    array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.select', ''),
					array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_person.sex_diverse', 'd'),
					array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_person.sex_male', 'm'),
					array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_person.sex_female', 'f'),
				),
                'renderType' => 'selectSingle',
				'type' => 'select',
            ),
        ),
		
        'weight' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_person.weight',
            'config' => array(
                'eval' => 'double2, trim',
                'size' => 3,
                'type' => 'input',
            ),
        ),
        'height' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_person.height',
            'config' => array(
                'eval' => 'double2, trim',
                'size' => 3,
                'type' => 'input',
            ),
        ),
        'size_of_shoe' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_person.size_of_shoe',
            'config' => array(
                'eval' => 'trim',
                'size' => 3,
                'type' => 'input',
            ),
        ),
        'footer' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_person.footer',
            'config' => array(
				'items' => Array (
                    array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.select', ""),
					array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_person.footer_1', 1),
					array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_person.footer_2', 2),
					array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_person.footer_3', 3),
				),
				'maxItems' => 1,
				'renderType' => 'selectSingle',
                'size' => 1,
                'type' => 'select',
            ),
        ),
        'hander' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_person.hander',
            'config' => array(
				'items' => Array (
                    array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.select', ""),
					array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_person.hander_1', 1),
					array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_person.hander_2', 2),
					array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_person.hander_3', 3),
				),
				'maxItems' => 1,
				'renderType' => 'selectSingle',
                'size' => 1,
                'type' => 'select',
            ),
        ),
        'family_status' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_person.family_status',
	        'config' => array(
		        'items' => array(
			        array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.select', ''),
			        array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_person.family_status.1', '1'),
			        array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_person.family_status.2', '2'),
			        array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_person.family_status.3', '3'),
			        array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_person.family_status.4', '4'),
			        array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_person.family_status.5', '5'),
			        array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_person.family_status.6', '6'),
			        array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_person.family_status.7', '7'),
		        ),
		        'renderType' => 'selectSingle',
		        'type' => 'select',
	        ),
        ),
        'graduation' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_person.graduation',
            'config' => array(
                'type' => 'input',
				'size' => 30,
                'eval' => 'trim',
            ),
        ),
        'job' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_person.job',
            'config' => array(
                'type' => 'input',
				'size' => 30,
                'eval' => 'trim',
            ),
        ),
        'characteristics' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_person.characteristics',
            'config' => array(
                'type' => 'input',
				'size' => 30,
                'eval' => 'trim',
            ),
        ),
        'hobbies' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_person.hobbies',
            'config' => array(
                'type' => 'input',
				'size' => 30,
                'eval' => 'trim',
            ),
        ),
        'favorite_dish' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_person.favorite_dish',
            'config' => array(
                'type' => 'input',
				'size' => 30,
                'eval' => 'trim',
            ),
        ),
        'favorite_drink' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_person.favorite_drink',
            'config' => array(
                'type' => 'input',
				'size' => 30,
                'eval' => 'trim',
            ),
        ),
		
        'addresses' => array(
            'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_addresses',
            'config' => array(
				'appearance' => array(
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
				),
	            'foreign_field' => 'foreign_uid',
	            'foreign_sortby' => 'sorting',
	            'foreign_table' => 'tx_sportms_domain_model_address',
	            'foreign_table_field' => 'foreign_table',
				'type' => 'inline',
            ),
        ),
        'phones' => array(
            'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_phones',
            'config' => array(
				'appearance' => array(
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
				),
	            'foreign_field' => 'foreign_uid',
	            'foreign_sortby' => 'sorting',
	            'foreign_table' => 'tx_sportms_domain_model_phone',
	            'foreign_table_field' => 'foreign_table',
				'type' => 'inline',
            ),
        ),
        'mails' => array(
            'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_mails',
            'config' => array(
				'appearance' => array(
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
				),
	            'foreign_field' => 'foreign_uid',
	            'foreign_sortby' => 'sorting',
	            'foreign_table' => 'tx_sportms_domain_model_mail',
	            'foreign_table_field' => 'foreign_table',
				'type' => 'inline',
            ),
        ),
        'urls' => array(
            'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_urls',
            'config' => array(
	            'appearance' => array(
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
	            ),
	            'foreign_field' => 'foreign_uid',
	            'foreign_sortby' => 'sorting',
	            'foreign_table' => 'tx_sportms_domain_model_url',
	            'foreign_table_field' => 'foreign_table',
				'type' => 'inline',
            ),
        ),
		
		'person_profiles' => array(
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_personprofiles',
			'config' => array(
				'appearance' => array(
					'useSortable' => 1,
				),
				'foreign_field' => 'person',
				'foreign_sortby' => 'sorting',
				'foreign_table' => 'tx_sportms_domain_model_personprofile',
				'type' => 'inline',
			),
		),
		
		'slug' => [
			'exclude' => true,
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.slug',
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
		
		'show_birthday' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_person.show_birthday',
			'config' => array(
				'default' => FALSE,
				'renderType' => 'checkboxToggle',
				'type' => 'check',
			),
		),
		'detail_link' => [
			'exclude' => true,
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.detail_link',
			'config' => [
				'default' => FALSE,
				'renderType' => 'checkboxToggle',
				'type' => 'check',
			],
		],
		
	),
);
