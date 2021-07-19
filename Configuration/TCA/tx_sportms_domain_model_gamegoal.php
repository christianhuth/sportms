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
			'iconfile' => 'EXT:sportms/Resources/Public/Icons/tx_sportms_domain_model_gamegoal.svg',
			'label' => '',
			'label_userFunc' => \Balumedien\Sportms\Configuration\TCA\UserFunc\UserFunc::class . '->GameGoalLabel',
			'searchFields' => '',
			'title' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_gamegoal',
			'tstamp' => 'tstamp',
			'versioningWS' => TRUE,
		],
		'interface' => [
			'showRecordFieldList' => '',
		],
		'types' => [
			'1' => ['showitem' => 'game, ---palette---;;goal, ---palette---;;time, ---palette---;;scorer_assist, ---palette---;;goal_details'],
		],
		'palettes' => [
			'goal' => ['showitem' => 'goal_home, goal_guest'],
			'time' => ['showitem' => 'period, minute, minute_additional'],
			'scorer_assist' => ['showitem' => 'scorer, assist'],
			'goal_details' => ['showitem' => 'own_goal, goal_type'],
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
			
			'goal_home' => [
				'exclude' => 1,
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_gamegoal.goal_home',
				'config' => [
					'type' => 'input',
					'size' => 10,
					'eval' => 'int, required, trim',
				],
			],
			'goal_guest' => [
				'exclude' => 1,
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_gamegoal.goal_guest',
				'config' => [
					'type' => 'input',
					'size' => 10,
					'eval' => 'int, required, trim',
				],
			],
			'period' => [
				'exclude' => 1,
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_gamegoal.period',
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
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_gamegoal.minute',
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
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_gamegoal.minute_additional',
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
			'scorer' => [
				'exclude' => 1,
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_gamegoal.scorer',
				'config' => [
					'foreign_table' => 'tx_sportms_domain_model_person',
					'foreign_table_where' => '  AND tx_sportms_domain_model_person.uid IN (SELECT person FROM tx_sportms_domain_model_gamelineup WHERE tx_sportms_domain_model_gamelineup.game = ###REC_FIELD_game###)
                                            ORDER BY tx_sportms_domain_model_person.lastname ASC, tx_sportms_domain_model_person.firstname ASC',
					'items' => [
						['LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.select', 0],
					],
					'maxItems' => 1,
					'minitems' => 0,
					'renderType' => 'selectSingle',
					'size' => 1,
					'type' => 'select',
				],
			],
			'assist' => [
				'exclude' => 1,
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_gamegoal.assist',
				'config' => [
					'foreign_table' => 'tx_sportms_domain_model_person',
					'foreign_table_where' => '  AND tx_sportms_domain_model_person.uid IN (SELECT person FROM tx_sportms_domain_model_gamelineup WHERE tx_sportms_domain_model_gamelineup.game = ###REC_FIELD_game###)
											ORDER BY tx_sportms_domain_model_person.lastname ASC, tx_sportms_domain_model_person.firstname ASC',
					'items' => [
						['LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.select', 0],
					],
					'maxItems' => 1,
					'minitems' => 0,
					'renderType' => 'selectSingle',
					'size' => 1,
					'type' => 'select',
				],
			],
			'own_goal' => [
				'exclude' => 1,
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_gamegoal.own_goal',
				'config' => [
					'default' => FALSE,
					'renderType' => 'checkboxToggle',
					'type' => 'check',
				],
			],
			'goal_type' => [
				'exclude' => 1,
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_gamegoal.goal_type',
				'config' => [
					'items' => [
						['LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.select', NULL],
						['LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_gamegoal.goal_type.penalty', 1],
						['LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_gamegoal.goal_type.freekick', 2],
						['LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_gamegoal.goal_type.corner', 3],
					],
					'renderType' => 'selectSingle',
					'type' => 'select',
				],
			],
		
		],
	];
