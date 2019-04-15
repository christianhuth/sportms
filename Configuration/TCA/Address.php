<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$GLOBALS['TCA']['tx_clubms_domain_model_address'] = array(
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
		'iconfile' => 'EXT:clubms/Resources/Public/Icons/tx_clubms_domain_model_address.svg',
        'label' => 'street',
		'label_alt' => 'housenumber, zipcode, location',
		'label_alt_force' => 1,
		'label_userFunc' => \Balumedien\Clubms\Configuration\TCA\UserFunc\UserFunc::class . '->addressLabel',
        'searchFields' => '',
		'sortby' => 'ordering',
        'title'	=> 'LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_address',
        'tstamp' => 'tstamp',
		'versioningWS' => TRUE,
    ),
	'interface' => array(
		'showRecordFieldList' => 'street, housenumber, zipcode, location, country, region, public',
	),
	'types' => array(
		'1' => array('showitem' => '--div--;LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_address, street, housenumber, zipcode, location, country, region, public,'),
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
		
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
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

		'street' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_address.street',
			'config' => array(
				'type' => 'input',
				'size' => 255,
				'eval' => 'trim'
			),
		),
		
		'housenumber' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_address.housenumber',
			'config' => array(
				'type' => 'input',
				'size' => 255,
				'eval' => 'trim'
			),
		),
		
        'zipcode' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_address.zipcode',
            'config' => array(
                'type' => 'input',
                'size' => 255,
                'eval' => 'trim'
            ),
        ),
		
        'location' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_address.location',
            'config' => array(
                'type' => 'input',
                'size' => 255,
                'eval' => 'trim'
            ),
        ),
		
        'country' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_address.country',
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
		
        'region' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_address.region',
            'config' => array(
                'type' => 'input',
                'size' => 255,
                'eval' => 'trim'
            ),
        ),
		
        'public' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_address.public',
            'config' => array(
                'type' => 'check',
            ),
        ),
		
	),
);
