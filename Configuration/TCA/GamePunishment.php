<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$GLOBALS['TCA']['tx_clubms_domain_model_gamepunishment'] = array(
	'ctrl' => array(
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
        'default_sortby' => 'ORDER BY period ASC, minute ASC, minute_additional ASC',
		'delete' => 'deleted',
		'dividers2tabs' => TRUE,
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'hideTable' => TRUE,
		'iconfile' => 'EXT:clubms/Resources/Public/Icons/tx_clubms_domain_model_gamepunishment.svg',
        'label' => '',
        'label_userFunc' => \Balumedien\Clubms\Configuration\TCA\UserFunc\UserFunc::class . '->GamePunishmentLabel',
		'searchFields' => '',
		'title'	=> 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_gamepunishment',
		'tstamp' => 'tstamp',
		'versioningWS' => TRUE,
	),
	'interface' => array(
		'showRecordFieldList' => '',
	),
	'types' => array(
		'1' => array('showitem' => 'game, ---palette---;;goal, ---palette---;;time, punished_person, ---palette---;;punishment_details'),
	),
	'palettes' => array(
		'time' => array('showitem' => 'period, minute, minute_additional'),
		'punishment_details' => array('showitem' => 'type, duration, reason'),
	),
	'columns' => array(

		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),
        'hidden' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.hidden',
            'config' => array(
                'type' => 'check',
            ),
        ),
		'starttime' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
			'config' => array(
				'behaviour' => array(
					'allowLanguageSynchronization' => TRUE,
				),
				'type' => 'input',
				'size' => 13,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
				'renderType' => 'inputDateTime',
			),
		),
		'endtime' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
			'config' => array(
				'behaviour' => array(
					'allowLanguageSynchronization' => TRUE,
				),
				'type' => 'input',
				'size' => 13,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
				'renderType' => 'inputDateTime',
			),
		),

        'game' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_gamepunishment.game',
            'config' => array(
                'eval' => 'required',
                'foreign_table' => 'tx_clubms_domain_model_game',
                'items' => array(
                    array("LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_general.select", ""),
                ),
                'maxItems' => 1,
                'renderType' => 'selectSingle',
                'size' => 1,
                'type' => 'select',
            ),
        ),

		'period' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_gamepunishment.period',
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
			'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_gamepunishment.minute',
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
			'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_gamepunishment.minute_additional',
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
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_gamepunishment.punished_person',
            'config' => array(
                'foreign_table' => 'tx_clubms_domain_model_gamelineup',
                'foreign_table_where' => '  AND tx_clubms_domain_model_gamelineup.game = ###REC_FIELD_game###
                                            ORDER BY tx_clubms_domain_model_gamelineup.jersey_number ASC',
                'items' => array(
                    array("LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_general.select", ""),
                ),
                'maxItems' => 1,
                'renderType' => 'selectSingle',
                'size' => 1,
                'type' => 'select',
            ),
        ),
		'type' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_gamepunishment.type',
			'config' => array(
				'items' => array(
					array("LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_general.select", 0),
					array('LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_gamepunishment.type_yellow', 1),
					array('LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_gamepunishment.type_yellowred', 2),
					array('LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_gamepunishment.type_red', 3),
					array('LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_gamepunishment.type_time', 4),
				),
				'renderType' => 'selectSingle',
				'type' => 'select',
			),
		),
		'duration' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_gamepunishment.duration',
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
			'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_gamepunishment.reason',
			'config' => array(
				'items' => array(
					array("LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_general.select", 0),
					array('LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_gamepunishment.reason_foul', 1),
					array('LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_gamepunishment.reason_beef', 2),
					array('LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_gamepunishment.reason_insult', 3),
					array('LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_gamepunishment.reason_violence', 4),
					array('LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_gamepunishment.reason_hands', 5),
					array('LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_gamepunishment.reason_hoalding', 6),
					array('LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_gamepunishment.reason_last_man', 7),
					array('LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_gamepunishment.reason_time_play', 8),
					array('LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_gamepunishment.reason_unsportsmanlike', 9),
				),
				'renderType' => 'selectSingle',
				'type' => 'select',
			),
		),
		
	),
);
