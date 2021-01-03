<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

return array(
	'ctrl' => array(
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'hideTable' => TRUE,
		'iconfile' => 'EXT:sportms/Resources/Public/Icons/tx_sportms_domain_model_gamelineup.svg',
        'label' => '',
        'label_userFunc' => \Balumedien\Sportms\Configuration\TCA\UserFunc\UserFunc::class . '->GameLineupLabel',
		'searchFields' => '',
		'sortby' => 'sorting',
		'title'	=> 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_gamelineup',
		'tstamp' => 'tstamp',
		'versioningWS' => TRUE,
	),
	'interface' => array(
		'showRecordFieldList' => '',
	),
	'types' => array(
		'1' => array('showitem' => 'game, jersey_number, person, sport_position, is_team_captain'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
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
		'team' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
		'type' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
		
		'jersey_number' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_gamelineup.jersey_number',
			'config' => array(
				'type' => 'input',
				'size' => 10,
				'eval' => 'trim'
			),
		),
		'person' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_person',
			'config' => array(
				'eval' => '',
				'foreign_table' => 'tx_sportms_domain_model_person',
				'items' => array(
					array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.select', ''),
				),
				'renderType' => 'selectSingle',
				'size' => 1,
				'type' => 'select',
			),
		),
		'sport_position' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_sportposition',
			'config' => array(
				'foreign_table' => 'tx_sportms_domain_model_sportposition',
				'foreign_table_where' => '  ORDER BY tx_sportms_domain_model_sportposition.label ASC',
				'items' => Array (
					array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.select', ''),
				),
				'maxItems' => 1,
				'renderType' => 'selectSingle',
				'size' => 1,
				'type' => 'select',
			),
		),
		'is_team_captain' => [
			'exclude' => true,
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_gamelineup.is_team_captain',
			'config' => [
				'default' => FALSE,
				'renderType' => 'checkboxToggle',
				'type' => 'check',
			],
		],
		
	),
);
