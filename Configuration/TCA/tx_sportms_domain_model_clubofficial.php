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
			'iconfile' => 'EXT:sportms/Resources/Public/Icons/tx_sportms_domain_model_clubofficial.svg',
			'label' => '',
			'label_userFunc' => \Balumedien\Sportms\Classes\UserFunc\UserFunc::class . '->clubOfficialLabel',
			'searchFields' => '',
			'sortby' => 'sorting',
			'title' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_clubofficial',
			'tstamp' => 'tstamp',
			'versioningWS' => TRUE,
		],
		'interface' => [
			'showRecordFieldList' => '',
		],
		'types' => [
			'1' => ['showitem' => 'club_official_job, person,
		                            --div--;LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_clubofficial.tab_date, startdate, until_today, enddate,
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
			
			'club' => [
				'config' => [
					'type' => 'passthrough',
				],
			],
			
			'club_official_job' => [
				'exclude' => 1,
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_clubofficialjob',
				'config' => [
					'eval' => 'required',
					'foreign_table' => 'tx_sportms_domain_model_clubofficialjob',
					'foreign_table_where' => 'ORDER BY tx_sportms_domain_model_clubofficialjob.label ASC',
					'items' => [
						['LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.select', "0"],
					],
					'maxItems' => 1,
					'renderType' => 'selectSingle',
					'size' => 1,
					'type' => 'select',
				],
			],
			'person' => [
				'exclude' => 1,
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_person',
				'config' => [
					'eval' => 'required',
					'foreign_table' => 'tx_sportms_domain_model_person',
					'foreign_table_where' => '  tx_sportms_domain_model_person.uid IN (
                                                SELECT person FROM tx_sportms_domain_model_personprofile WHERE profile_type = "official"
                                            )
                                            ORDER BY tx_sportms_domain_model_person.lastname ASC, tx_sportms_domain_model_person.firstname ASC',
					'items' => [
						['LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.select', "0"],
					],
					'maxItems' => 1,
					'minItems' => 1,
					'renderType' => 'selectSingle',
					'size' => 1,
					'type' => 'select',
				],
			],
			
			'startdate' => [
				'config' => [
					'type' => 'input',
					'size' => 8,
					'eval' => 'date',
					'placeholder' => 'dd-mm-yyyy',
					'renderType' => 'inputDateTime',
				],
				'exclude' => 1,
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.startdate',
			],
			'until_today' => [
				'config' => [
					'default' => TRUE,
					'renderType' => 'checkboxToggle',
					'type' => 'check',
				],
				'exclude' => 1,
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_clubofficial.until_today',
				'onChange' => 'reload',
			],
			'enddate' => [
				'config' => [
					'type' => 'input',
					'size' => 8,
					'eval' => 'date',
					'placeholder' => 'dd-mm-yyyy',
					'renderType' => 'inputDateTime',
				],
				'displayCond' => 'FIELD:until_today:=:0',
				'exclude' => 1,
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.enddate',
			],
		
		],
	];
