<?php
	
	if(!defined('TYPO3_MODE')) {
		die ('Access denied.');
	}
	
	return [
		'ctrl' => [
			'crdate' => 'crdate',
			'cruser_id' => 'cruser_id',
			'delete' => 'deleted',
			'enablecolumns' => [
				'disabled' => 'hidden',
				'starttime' => 'starttime',
				'endtime' => 'endtime',
			],
			'hideTable' => TRUE,
			'iconfile' => 'EXT:sportms/Resources/Public/Icons/tx_sportms_domain_model_phone.svg',
			'label' => '',
			'label_userFunc' => \Balumedien\Sportms\Classes\UserFunc\UserFunc::class . '->phoneLabel',
			'searchFields' => '',
			'sortby' => 'sorting',
			'title' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_phone',
			'tstamp' => 'tstamp',
			'versioningWS' => TRUE,
		],
		'interface' => [
			'showRecordFieldList' => '',
		],
		'types' => [
			'1' => ['showitem' => '--div--;LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.tab.general,
										phone_type,
										--palette--;;phone,
		                            --div--;LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.tab.visibility,
		                                --palette--;LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.palette.visibility_general;visibility_general'],
		],
		'palettes' => [
			'phone' => ['showitem' => 'international_area_code, area_code, calling_number'],
			'visibility_general' => ['showitem' => 'hidden, starttime, endtime'],
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
				'exclude' => TRUE,
				'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.visible',
				'config' => [
					'items' => [
						[
							0 => '',
							1 => '',
							'invertStateDisplay' => TRUE,
						],
					],
					'renderType' => 'checkboxToggle',
					'type' => 'check',
				],
			],
			
			'starttime' => [
				'exclude' => TRUE,
				'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
				'config' => [
					'type' => 'input',
					'renderType' => 'inputDateTime',
					'eval' => 'datetime,int',
					'default' => 0,
					'behaviour' => [
						'allowLanguageSynchronization' => TRUE,
					],
				],
			],
			'endtime' => [
				'exclude' => TRUE,
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
						'allowLanguageSynchronization' => TRUE,
					],
				],
			],
			
			'area_code' => [
				'exclude' => 1,
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_phone.area_code',
				'config' => [
					'eval' => 'required,trim',
					'size' => 255,
					'type' => 'input',
				],
			],
			'calling_number' => [
				'exclude' => 1,
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_phone.calling_number',
				'config' => [
					'eval' => 'required,trim',
					'size' => 255,
					'type' => 'input',
				],
			],
			'international_area_code' => [
				'exclude' => 1,
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_phone.international_area_code',
				'config' => [
					'eval' => 'int',
					'foreign_table' => 'static_countries',
					'items' => [
						['LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.select', 0],
					],
					'maxItems' => 1,
					'renderType' => 'selectSingle',
					'size' => 1,
					'type' => 'select',
				],
			],
			'phone_type' => [
				'exclude' => 1,
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_phonetype',
				'config' => [
					'foreign_table' => 'tx_sportms_domain_model_phonetype',
					'foreign_table_where' => 'ORDER BY label ASC',
					'items' => [
						['LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.select', 0],
					],
					'maxItems' => 1,
					'minItems' => 1,
					'renderType' => 'selectSingle',
					'size' => 1,
					'type' => 'select',
				],
			],
		
		],
	];