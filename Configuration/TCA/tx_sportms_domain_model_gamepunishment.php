<?php
	
	if(!defined('TYPO3_MODE')) {
		die ('Access denied.');
	}
	
	return [
		'ctrl' => [
			'crdate' => 'crdate',
			'cruser_id' => 'cruser_id',
			'default_sortby' => 'ORDER BY period ASC, minute ASC, minute_additional ASC',
			'delete' => 'deleted',
			'enablecolumns' => [
				'disabled' => 'hidden',
				'starttime' => 'starttime',
				'endtime' => 'endtime',
			],
			'hideTable' => TRUE,
			'iconfile' => 'EXT:sportms/Resources/Public/Icons/tx_sportms_domain_model_gamepunishment.svg',
			'label' => '',
			'label_userFunc' => \Balumedien\Sportms\Classes\UserFunc\UserFunc::class . '->GamePunishmentLabel',
			'searchFields' => '',
			'title' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_gamepunishment',
			'tstamp' => 'tstamp',
			'versioningWS' => TRUE,
		],
		'interface' => [
			'showRecordFieldList' => '',
		],
		'types' => [
			'1' => ['showitem' => 'game, ---palette---;;goal, ---palette---;;time, punished_person, ---palette---;;punishment_details,
		                            '],
		],
		'palettes' => [
			'time' => ['showitem' => 'period, minute, minute_additional'],
			'punishment_details' => ['showitem' => 'type, duration, reason'],
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
			
			'game' => [
				'exclude' => 1,
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game',
				'config' => [
					'eval' => 'required',
					'foreign_table' => 'tx_sportms_domain_model_game',
					'items' => [
						['LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.select', 0],
					],
					'maxItems' => 1,
					'renderType' => 'selectSingle',
					'size' => 1,
					'type' => 'select',
				],
			],
			
			'period' => [
				'exclude' => 1,
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_gamepunishment.period',
				'config' => [
					'default' => NULL,
					'eval' => 'null',
					'range' => [
						'lower' => 1,
						'upper' => 1000,
					],
					'type' => 'input',
					'size' => 10,
				],
			],
			'minute' => [
				'exclude' => 1,
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_gamepunishment.minute',
				'config' => [
					'eval' => 'int, required, trim',
					'range' => [
						'lower' => 1,
						'upper' => 1000,
					],
					'size' => 10,
					'type' => 'input',
				],
			],
			'minute_additional' => [
				'exclude' => 1,
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_gamepunishment.minute_additional',
				'config' => [
					'default' => NULL,
					'eval' => 'null',
					'range' => [
						'lower' => 1,
						'upper' => 1000,
					],
					'type' => 'input',
					'size' => 10,
				],
			],
			'punished_person' => [
				'exclude' => 1,
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_gamepunishment.punished_person',
				'config' => [
					'eval' => 'required',
					'foreign_table' => 'tx_sportms_domain_model_person',
					'foreign_table_where' => '  AND tx_sportms_domain_model_person.uid IN (SELECT tx_sportms_domain_model_gamelineup.person FROM tx_sportms_domain_model_gamelineup WHERE tx_sportms_domain_model_gamelineup.game = ###REC_FIELD_game###)',
					'items' => [
						['LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.select', ""],
					],
					'maxItems' => 1,
					'minIteams' => 1,
					'renderType' => 'selectSingle',
					'size' => 1,
					'type' => 'select',
				],
			],
			'type' => [
				'exclude' => 1,
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_gamepunishment.type',
				'config' => [
					'items' => [
						['LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.select', 0],
						['LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_gamepunishment.type.yellow', 1],
						['LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_gamepunishment.type.yellowred', 2],
						['LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_gamepunishment.type.red', 3],
						['LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_gamepunishment.type.time', 4],
					],
					'renderType' => 'selectSingle',
					'type' => 'select',
				],
			],
			'duration' => [
				'exclude' => 1,
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_gamepunishment.duration',
				'config' => [
					'default' => NULL,
					'eval' => 'null',
					'range' => [
						'lower' => 1,
						'upper' => 1000,
					],
					'type' => 'input',
					'size' => 10,
				],
			],
			'reason' => [
				'exclude' => 1,
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_gamepunishment.reason',
				'config' => [
					'items' => [
						['LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.select', 0],
						['LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_gamepunishment.reason.foul', 1],
						['LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_gamepunishment.reason.beef', 2],
						['LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_gamepunishment.reason.insult', 3],
						['LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_gamepunishment.reason.violence', 4],
						['LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_gamepunishment.reason.hands', 5],
						['LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_gamepunishment.reason.hoalding', 6],
						['LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_gamepunishment.reason.last_man', 7],
						['LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_gamepunishment.reason.time_play', 8],
						['LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_gamepunishment.reason.unsportsmanlike', 9],
					],
					'renderType' => 'selectSingle',
					'type' => 'select',
				],
			],
		
		],
	];
