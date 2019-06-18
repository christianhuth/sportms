<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$GLOBALS['TCA']['tx_clubms_domain_model_person'] = array(
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
		'iconfile' => 'EXT:clubms/Resources/Public/Icons/tx_clubms_domain_model_person.svg',
        'label' => 'lastname',
		'label_alt' => 'firstname',
		'label_alt_force' => 1,
        'searchFields' => ',',
        'title'	=> 'LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_person',
        'tstamp' => 'tstamp',
		'versioningWS' => TRUE,
    ),
	'interface' => array(
		'showRecordFieldList' => 'firstname, lastname, nickname, date_of_birth, zodiac_sign, place_of_birth, nationality, gender, height, weight, hander, footer, address, phone, url',
	),
	'types' => array(
		'1' => array('showitem' => 'firstname, lastname, birthname, nickname, date_of_birth, zodiac_sign, place_of_birth, nationality, gender,
									--div--;LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_person.personal, weight, height, size_of_shoe, hander, footer, family_status, graduation, job, characteristics, hobbies, favorite_dish, favorite_drink,
									--div--;LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_person.contact, address, phone, mail, url,
									--div--;LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_person.sections, person_sections,
									--div--;LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_person.visibility, hidden, hidden_birthday, detail_link, profile_player, profile_official, profile_referee'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(

		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),
		
		'starttime' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
			'config' => array(
				'behaviour' => array(
					'allowLanguageSynchronization' => TRUE,
				),
				'type' => 'input',
				'size' => 13,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
				'renderType' => 'inputDateTime',
			),
		),
		
		'endtime' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
			'config' => array(
				'behaviour' => array(
					'allowLanguageSynchronization' => TRUE,
				),
				'type' => 'input',
				'size' => 13,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
				'renderType' => 'inputDateTime',
			),
		),

		'firstname' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_person.firstname',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim, required'
			),
		),
		
		'lastname' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_person.lastname',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim, required'
			),
		),
		
		'birthname' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_person.birthname',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		
        'nickname' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_person.nickname',
            'config' => array(
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ),
        ),
		
        'date_of_birth' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_person.dateOfBirth',
            'config' => array(
                'type' => 'input',
                'size' => 8,
                'eval' => 'date',
                'placeholder' => 'dd-mm-yyyy',
				'renderType' => 'inputDateTime',
            ),
        ),
		
        'zodiac_sign' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_person.zodiacSign',
            'config' => array(
				'items' => Array (
					Array("", NULL),
					array('LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_person.zodiacSign_1', 1),
					array('LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_person.zodiacSign_2', 2),
					array('LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_person.zodiacSign_3', 3),
					array('LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_person.zodiacSign_4', 4),
					array('LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_person.zodiacSign_5', 5),
					array('LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_person.zodiacSign_6', 6),
					array('LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_person.zodiacSign_7', 7),
					array('LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_person.zodiacSign_8', 8),
					array('LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_person.zodiacSign_9', 9),
					array('LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_person.zodiacSign_10', 10),
					array('LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_person.zodiacSign_11', 11),
					array('LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_person.zodiacSign_12', 12),
				),
				'maxItems' => 1,
				'renderType' => 'selectSingle',
                'size' => 1,
                'type' => 'select',
            ),
        ),
		
        'place_of_birth' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_person.placeOfBirth',
            'config' => array(
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
            ),
        ),
		
        'nationality' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_person.nationality',
            'config' => array(
				'foreign_table' => 'static_countries',
				'items' => Array (
					Array("", 0),
				),
				'maxItems' => 1,
				'renderType' => 'selectSingle',
                'size' => 1,
                'type' => 'select',
            ),
        ),
		
        'gender' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_person.gender',
            'config' => array(
				'default' => 'm',
                'eval' => 'required',
				'items' => array(
					array('LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_person.gender_male', 'm'),
					array('LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_person.gender_female', 'f'),
				),
				'type' => 'radio',
            ),
        ),
		
        'weight' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_person.weight',
            'config' => array(
                'eval' => 'int, trim',
                'size' => 3,
                'type' => 'input',
            ),
        ),
		
        'height' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_person.height',
            'config' => array(
                'eval' => 'int, trim',
                'size' => 3,
                'type' => 'input',
            ),
        ),
		
        'size_of_shoe' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_person.sizeOfShoe',
            'config' => array(
                'eval' => 'trim',
                'size' => 3,
                'type' => 'input',
            ),
        ),
		
        'footer' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_person.footer',
            'config' => array(
				'items' => Array (
					Array("", 0),
					array('LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_person.footer_1', 1),
					array('LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_person.footer_2', 2),
					array('LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_person.footer_3', 3),
				),
				'maxItems' => 1,
				'renderType' => 'selectSingle',
                'size' => 1,
                'type' => 'select',
            ),
        ),
		
        'hander' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_person.hander',
            'config' => array(
				'items' => Array (
					Array("", 0),
					array('LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_person.hander_1', 1),
					array('LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_person.hander_2', 2),
					array('LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_person.hander_3', 3),
				),
				'maxItems' => 1,
				'renderType' => 'selectSingle',
                'size' => 1,
                'type' => 'select',
            ),
        ),
		
        'family_status' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_person.familyStatus',
            'config' => array(
                'type' => 'input',
				'size' => 30,
                'eval' => 'trim',
            ),
        ),
		
        'graduation' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_person.graduation',
            'config' => array(
                'type' => 'input',
				'size' => 30,
                'eval' => 'trim',
            ),
        ),
		
        'job' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_person.job',
            'config' => array(
                'type' => 'input',
				'size' => 30,
                'eval' => 'trim',
            ),
        ),
		
        'characteristics' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_person.characteristics',
            'config' => array(
                'type' => 'input',
				'size' => 30,
                'eval' => 'trim',
            ),
        ),
		
        'hobbies' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_person.hobbies',
            'config' => array(
                'type' => 'input',
				'size' => 30,
                'eval' => 'trim',
            ),
        ),
		
        'favorite_dish' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_person.favoriteDish',
            'config' => array(
                'type' => 'input',
				'size' => 30,
                'eval' => 'trim',
            ),
        ),
		
        'favorite_drink' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_person.favoriteDrink',
            'config' => array(
                'type' => 'input',
				'size' => 30,
                'eval' => 'trim',
            ),
        ),
		
        'addresses' => array(
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_person.addresses',
            'config' => array(
				'appearance' => array(
					'useSortable' => 1,
				),
				'foreign_field' => 'person',
				'foreign_table' => 'tx_clubms_domain_model_address',
				'type' => 'inline',
            ),
        ),
		
        'phones' => array(
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_phone',
            'config' => array(
				'appearance' => array(
					'useSortable' => 1,
				),
				'foreign_field' => 'person',
				'foreign_table' => 'tx_clubms_domain_model_phone',
				'type' => 'inline',
            ),
        ),
		
        'mails' => array(
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_mail',
            'config' => array(
				'appearance' => array(
					'useSortable' => 1,
				),
				'foreign_field' => 'person',
				'foreign_table' => 'tx_clubms_domain_model_mail',
				'type' => 'inline',
            ),
        ),
		
        'urls' => array(
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_url',
            'config' => array(
				'appearance' => array(
					'useSortable' => 1,
				),
				'foreign_field' => 'person',
				'foreign_table' => 'tx_clubms_domain_model_url',
				'type' => 'inline',
            ),
        ),
		
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_person.visibility_dataset',
			'config' => array(
				'type' => 'check',
			),
		),
		
		'hidden_birthday' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_person.visibility_birthday',
			'config' => array(
				'type' => 'check',
			),
		),
		
		'detail_link' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_person.detail_link',
			'config' => array(
				'type' => 'check',
			),
		),
		
		'profile_player' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_person.profile_player',
			'config' => array(
				'type' => 'check',
			),
		),
		
		'profile_official' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_person.profile_official',
			'config' => array(
				'type' => 'check',
			),
		),
		
		'profile_referee' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_person.profile_referee',
			'config' => array(
				'type' => 'check',
			),
		),
		
	),
);
