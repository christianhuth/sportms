<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

return array(
    'ctrl' => array(
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'delete' => 'deleted',
        'dividers2tabs' => TRUE,
        'enablecolumns' => array(
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ),
		'hideTable' => TRUE,
		'iconfile' => 'EXT:sportms/Resources/Public/Icons/tx_sportms_domain_model_address.svg',
		'label' => '',
		'label_userFunc' => \Balumedien\Sportms\Configuration\TCA\UserFunc\UserFunc::class . '->addressLabel',
        'searchFields' => '',
        'sortby' => 'sorting',
        'title'	=> 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_address',
        'tstamp' => 'tstamp',
		'versioningWS' => TRUE,
    ),
	'interface' => array(
		'showRecordFieldList' => 'street, housenumber, zipcode, location, country, region',
	),
	'types' => array(
		'1' => array('showitem' => '--div--;LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.tab.general,
										--palette--;;street_housenumber,
										--palette--;;zipcode_location,
										--palette--;;region_country,
		                            --div--;LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.tab.visibility,
		                                --palette--;LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.palette.visibility_general;visibility_general'),
	),
	'palettes' => array(
		'street_housenumber' => array('showitem' => 'street, housenumber'),
		'zipcode_location' => array('showitem' => 'zipcode, location'),
		'region_country' => array('showitem' => 'region, country'),
		'visibility_general' => array('showitem' => 'hidden, starttime, endtime')
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

		'street' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_address.street',
			'config' => array(
                'eval' => 'required',
                'size' => 255,
                'type' => 'input',
			),
		),
		'housenumber' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_address.housenumber',
			'config' => array(
                'eval' => 'trim, trim',
				'size' => 255,
				'type' => 'input',
			),
		),
        'zipcode' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_address.zipcode',
            'config' => array(
                'eval' => 'num, trim, trim',
                'size' => 255,
                'type' => 'input',
            ),
        ),
        'location' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_address.location',
            'config' => array(
                'eval' => 'required',
                'size' => 255,
                'type' => 'input',
            ),
        ),
        'country' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_address.country',
            'config' => array(
                'eval' => 'required',
				'foreign_table' => 'static_countries',
				'items' => Array (
                    array('LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_general.select', ''),
				),
				'maxItems' => 1,
				'renderType' => 'selectSingle',
                'size' => 1,
                'type' => 'select',
            ),
        ),
        'region' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_address.region',
            'config' => array(
                'type' => 'input',
                'size' => 255,
                'eval' => 'trim'
            ),
        ),
		
	),
);
