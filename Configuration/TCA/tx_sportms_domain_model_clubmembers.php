<?php
	
	if(!defined('TYPO3_MODE')) {
		die ('Access denied.');
	}
	
	return [
		'ctrl' => [
			'crdate' => 'crdate',
			'cruser_id' => 'cruser_id',
			'default_sortby' => 'ORDER BY date DESC',
			'delete' => 'deleted',
			'dividers2tabs' => TRUE,
			'enablecolumns' => [
				'disabled' => 'hidden',
				'starttime' => 'starttime',
				'endtime' => 'endtime',
			],
			'hideTable' => TRUE,
			'iconfile' => 'EXT:sportms/Resources/Public/Icons/tx_sportms_domain_model_clubmembers.svg',
			'label' => '',
			'label_userFunc' => \Balumedien\Sportms\Classes\UserFunc\UserFunc::class . '->clubMembersLabel',
			'searchFields' => '',
			'title' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_clubmembers',
			'tstamp' => 'tstamp',
			'versioningWS' => TRUE,
		],
		'types' => [
			'1' => ['showitem' => '--div--;LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.tab.general,
										--palette--;;members,
		                            --div--;LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.tab.visibility,
		                                --palette--;LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.palette.visibility_general;visibility_general'],
		],
		'palettes' => [
			'members' => ['showitem' => 'date, members'],
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
				'exclude' => 1,
				'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
				'config' => [
					'behaviour' => [
						'allowLanguageSynchronization' => TRUE,
					],
					'type' => 'input',
					'size' => 13,
					'eval' => 'datetime',
					'checkbox' => 0,
					'default' => 0,
					'range' => [
						'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y')),
					],
					'renderType' => 'inputDateTime',
				],
			],
			'endtime' => [
				'exclude' => 1,
				'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
				'config' => [
					'behaviour' => [
						'allowLanguageSynchronization' => TRUE,
					],
					'type' => 'input',
					'size' => 13,
					'eval' => 'datetime',
					'checkbox' => 0,
					'default' => 0,
					'range' => [
						'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y')),
					],
					'renderType' => 'inputDateTime',
				],
			],
			
			'club' => [
				'exclude' => 1,
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_club',
				'config' => [
					'eval' => 'required',
					'foreign_table' => 'tx_sportms_domain_model_club',
					'foreign_table_where' => 'ORDER BY tx_sportms_domain_model_club.name ASC',
					'items' => [
						['LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_general.select', ''],
					],
					'maxItems' => 1,
					'renderType' => 'selectSingle',
					'size' => 1,
					'type' => 'select',
				],
			],
			
			'members' => [
				'exclude' => 1,
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_clubmembers.members',
				'config' => [
					'eval' => 'int, required, trim',
					'range' => [
						'lower' => 0,
					],
					'size' => 30,
					'type' => 'input',
				],
			],
			'date' => [
				'exclude' => 1,
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_clubmembers.date',
				'config' => [
					'type' => 'input',
					'size' => 8,
					'eval' => 'date, required',
					'placeholder' => 'dd-mm-yyyy',
					'renderType' => 'inputDateTime',
				],
			],
		
		],
	];
