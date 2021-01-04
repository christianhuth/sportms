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
		'iconfile' => 'EXT:sportms/Resources/Public/Icons/tx_sportms_domain_model_gamepunishment.svg',
        'label' => '',
        'label_userFunc' => \Balumedien\Sportms\Configuration\TCA\UserFunc\UserFunc::class . '->GamePunishmentLabel',
		'searchFields' => '',
		'title'	=> 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_gamepunishment',
		'tstamp' => 'tstamp',
		'versioningWS' => TRUE,
	),
	'interface' => array(
		'showRecordFieldList' => '',
	),
	'types' => array(
		'1' => array('showitem' => 'game, ---palette---;;goal, ---palette---;;time, punished_person, ---palette---;;punishment_details,
		                            '),
	),
	'palettes' => array(
		'time' => array('showitem' => 'period, minute, minute_additional'),
		'punishment_details' => array('showitem' => 'type, duration, reason'),
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
            'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_gamepunishment.game',
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

		'period' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_gamepunishment.period',
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
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_gamepunishment.minute',
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
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_gamepunishment.minute_additional',
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
        'punished_person' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_gamepunishment.punished_person',
            'config' => array(
            	'eval' => 'required',
                'foreign_table' => 'tx_sportms_domain_model_person',
                'foreign_table_where' => '  AND tx_sportms_domain_model_person.uid IN (SELECT tx_sportms_domain_model_gamelineup.person FROM tx_sportms_domain_model_gamelineup WHERE tx_sportms_domain_model_gamelineup.game = ###REC_FIELD_game###)',
                'items' => array(
                    array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.select', ""),
                ),
                'maxItems' => 1,
                'minIteams' => 1,
                'renderType' => 'selectSingle',
                'size' => 1,
                'type' => 'select',
            ),
        ),
		'type' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_gamepunishment.type',
			'config' => array(
				'items' => array(
					array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.select', 0),
					array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_gamepunishment.type.yellow', 1),
					array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_gamepunishment.type.yellowred', 2),
					array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_gamepunishment.type.red', 3),
					array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_gamepunishment.type.time', 4),
				),
				'renderType' => 'selectSingle',
				'type' => 'select',
			),
		),
		'duration' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_gamepunishment.duration',
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
		'reason' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_gamepunishment.reason',
			'config' => array(
				'items' => array(
					array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.select', 0),
					array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_gamepunishment.reason.foul', 1),
					array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_gamepunishment.reason.beef', 2),
					array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_gamepunishment.reason.insult', 3),
					array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_gamepunishment.reason.violence', 4),
					array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_gamepunishment.reason.hands', 5),
					array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_gamepunishment.reason.hoalding', 6),
					array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_gamepunishment.reason.last_man', 7),
					array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_gamepunishment.reason.time_play', 8),
					array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_gamepunishment.reason.unsportsmanlike', 9),
				),
				'renderType' => 'selectSingle',
				'type' => 'select',
			),
		),
		
	),
);
