<?php
	
	if(!defined('TYPO3_MODE')) {
		die ('Access denied.');
	}
	
	return [
		'ctrl' => [
			'crdate' => 'crdate',
			'cruser_id' => 'cruser_id',
			'default_sortby' => 'ORDER BY label ASC',
			'delete' => 'deleted',
			'enablecolumns' => [
				'disabled' => 'hidden',
				'starttime' => 'starttime',
				'endtime' => 'endtime',
			],
			'iconfile' => 'EXT:sportms/Resources/Public/Icons/tx_sportms_domain_model_mailtype.svg',
			'label' => 'label',
			'searchFields' => '',
			'title' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_mailtype',
			'tstamp' => 'tstamp',
			'versioningWS' => TRUE,
		],
		'interface' => [
			'showRecordFieldList' => 'label',
		],
		'types' => [
			'1' => ['showitem' => 'label,
		                            '],
		],
		'palettes' => [
			'1' => ['showitem' => ''],
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
			
			'label' => [
				'exclude' => 1,
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.label',
				'config' => [
					'type' => 'input',
					'size' => 30,
					'eval' => 'trim, required',
				],
			],
		
		],
	];
