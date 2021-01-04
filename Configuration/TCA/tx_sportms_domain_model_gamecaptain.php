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
		'iconfile' => 'EXT:sportms/Resources/Public/Icons/tx_sportms_domain_model_gamecaptain.svg',
        'label' => 'person',
		'searchFields' => '',
		'title'	=> 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_gamecaptain',
		'tstamp' => 'tstamp',
		'versioningWS' => TRUE,
	),
	'interface' => array(
		'showRecordFieldList' => '',
	),
	'types' => array(
		'1' => array('showitem' => 'game, team, person'),
	),
	'palettes' => array(),
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
			'config' => array(
				'type' => 'passthrough',
			),
		),
		'team' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),

		'person' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.trainer_guest',
			'config' => array(
				'foreign_table' => 'tx_sportms_domain_model_teamseasonofficial',
				'items' => Array (
					array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.select', ''),
				),
				'maxItems' => 1,
				'minItems' => 1,
				'renderType' => 'selectSingle',
				'size' => 1,
				'type' => 'select',
			),
		),
		
	),
);