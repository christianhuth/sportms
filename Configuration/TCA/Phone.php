<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$GLOBALS['TCA']['tx_clubms_domain_model_phone'] = array(
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
		'iconfile' => 'EXT:clubms/Resources/Public/Icons/tx_clubms_domain_model_phone.svg',
		'label' => 'areaCode',
		'label_alt' => 'callingNumber',
		'label_alt_force' => 1,
		'label_userFunc' => \Balumedien\Clubms\Configuration\TCA\UserFunc\UserFunc::class . '->phoneLabel',
		'searchFields' => '',
		'sortby' => 'ordering',
		'title'	=> 'LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_phone',
		'tstamp' => 'tstamp',
		'versioningWS' => TRUE,
	),
	'interface' => array(
		'showRecordFieldList' => 'areaCode, callingNumber, internationalAreaCode, type, public',
	),
	'types' => array(
		'1' => array('showitem' => '--div--;LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_phone, areaCode, callingNumber, internationalAreaCode, type, public,'),
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
		
		'areaCode' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_phone.areaCode',
			'config' => array(
				'type' => 'input',
				'size' => 255,
				'eval' => 'trim'
			),
		),
		
		'callingNumber' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_phone.callingNumber',
			'config' => array(
				'type' => 'input',
				'size' => 255,
				'eval' => 'trim'
			),
		),
		
		'internationalAreaCode' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_phone.internationalAreaCode',
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
		
		'type' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_phone.type',
			'config' => array(
				'items' => array(
					array('', '0'),
					array('LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_phone.type_1', '1'),
					array('LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_phone.type_2', '2'),
					array('LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_phone.type_3', '3'),
				),
				'maxItems' => '1',
				'minItems' => '0',
				'renderType' => 'selectSingle',
				'size' => '1',
				'type' => 'select',
			),
		),
		
		'public' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_phone.public',
			'config' => array(
				'type' => 'check',
			),
		),
		
	),
);