<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

return array(
	'ctrl' => array(
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'default_sortby' => 'ORDER BY period ASC, minute ASC, minute_additional ASC',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'hideTable' => TRUE,
		'iconfile' => 'EXT:sportms/Resources/Public/Icons/tx_sportms_domain_model_gamegoal.svg',
        'label' => '',
        'label_userFunc' => \Balumedien\Sportms\Configuration\TCA\UserFunc\UserFunc::class . '->GameGoalLabel',
		'searchFields' => '',
		'title'	=> 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_gamegoal',
		'tstamp' => 'tstamp',
		'versioningWS' => TRUE,
	),
	'interface' => array(
		'showRecordFieldList' => '',
	),
	'types' => array(
		'1' => array('showitem' => 'game, ---palette---;;goal, ---palette---;;time, ---palette---;;scorer_assist, ---palette---;;goal_details,
		                            '),
	),
	'palettes' => array(
		'goal' => array('showitem' => 'goal_home, goal_guest'),
		'time' => array('showitem' => 'period, minute, minute_additional'),
		'scorer_assist' => array('showitem' => 'scorer, assist'),
		'goal_details' => array('showitem' => 'own_goal, goal_type'),
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

        'game' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game',
            'config' => array(
                'eval' => 'required',
                'foreign_table' => 'tx_sportms_domain_model_game',
                'items' => array(
                    array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.select', 0),
                ),
                'maxItems' => 1,
                'renderType' => 'selectSingle',
                'size' => 1,
                'type' => 'select',
            ),
        ),

		'goal_home' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_gamegoal.goal_home',
			'config' => array(
				'type' => 'input',
				'size' => 10,
				'eval' => 'int, required, trim'
			),
		),
		'goal_guest' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_gamegoal.goal_guest',
			'config' => array(
				'type' => 'input',
				'size' => 10,
				'eval' => 'int, required, trim'
			),
		),
		'period' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_gamegoal.period',
			'config' => array(
				'default' => null,
				'eval' => 'null',
				'range' => array(
					'lower' => 1,
					'upper' => 1000,
				),
				'type' => 'input',
				'size' => 10,
			),
		),
		'minute' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_gamegoal.minute',
			'config' => array(
				'eval' => 'int, required, trim',
				'range' => array(
					'lower' => 1,
					'upper' => 1000,
				),
				'size' => 10,
				'type' => 'input',
			),
		),
		'minute_additional' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_gamegoal.minute_additional',
			'config' => array(
				'default' => null,
				'eval' => 'null',
				'range' => array(
					'lower' => 1,
					'upper' => 1000,
				),
				'type' => 'input',
				'size' => 10,
			),
		),
        'scorer' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_gamegoal.scorer',
            'config' => array(
                'foreign_table' => 'tx_sportms_domain_model_person',
                'foreign_table_where' => '  AND tx_sportms_domain_model_person.uid IN (SELECT person FROM tx_sportms_domain_model_gamelineup WHERE tx_sportms_domain_model_gamelineup.game = ###REC_FIELD_game###)
                                            ORDER BY tx_sportms_domain_model_person.lastname ASC, tx_sportms_domain_model_person.firstname ASC',
                'items' => array(
                    array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.select', NULL),
                ),
                'maxItems' => 1,
                'renderType' => 'selectSingle',
                'size' => 1,
                'type' => 'select',
            ),
        ),
		'assist' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_gamegoal.assist',
			'config' => array(
				'foreign_table' => 'tx_sportms_domain_model_person',
				'foreign_table_where' => '  AND tx_sportms_domain_model_person.uid IN (SELECT person FROM tx_sportms_domain_model_gamelineup WHERE tx_sportms_domain_model_gamelineup.game = ###REC_FIELD_game###)
											ORDER BY tx_sportms_domain_model_person.lastname ASC, tx_sportms_domain_model_person.firstname ASC',
				'items' => array(
					array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.select', NULL),
				),
				'maxItems' => 1,
				'renderType' => 'selectSingle',
				'size' => 1,
				'type' => 'select',
			),
		),
		'own_goal' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_gamegoal.own_goal',
			'config' => array(
				'default' => FALSE,
				'renderType' => 'checkboxToggle',
				'type' => 'check',
			),
		),
		'goal_type' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_gamegoal.goal_type',
			'config' => array(
				'items' => array(
					array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.select', NULL),
					array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_gamegoal.goal_type.penalty', 1),
					array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_gamegoal.goal_type.freekick', 2),
					array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_gamegoal.goal_type.corner', 3),
				),
				'renderType' => 'selectSingle',
				'type' => 'select',
			),
		),
		
	),
);
