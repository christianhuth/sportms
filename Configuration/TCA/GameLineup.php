<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$GLOBALS['TCA']['tx_clubms_domain_model_gamelineup'] = array(
	'ctrl' => array(
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'delete' => 'deleted',
		'dividers2tabs' => TRUE,
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'hideTable' => TRUE,
		'iconfile' => 'EXT:clubms/Resources/Public/Icons/tx_clubms_domain_model_game.svg',
		'label' => '',
        'label_userFunc' => \Balumedien\Clubms\Configuration\TCA\UserFunc\UserFunc::class . '->GameLineupLabel',
		'searchFields' => '',
		'title'	=> 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_gamelineup',
		'tstamp' => 'tstamp',
		'versioningWS' => TRUE,
	),
	'interface' => array(
		'showRecordFieldList' => '',
	),
	'types' => array(
		'1' => array('showitem' => 'jersey_number, person, section_position'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
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
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
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
			'config' => array(
				'type' => 'passthrough',
			),
		),

		'jersey_number' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_gamelineup.jersey_number',
			'config' => array(
				'type' => 'input',
				'size' => 10,
				'eval' => 'trim'
			),
		),
        'person' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_gamelineup.person',
            'config' => array(
                'foreign_table' => 'tx_clubms_domain_model_teamseasonsquadmember',
                'items' => array(
                    array("LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_general.select", ""),
                ),
                'maxItems' => 1,
                'renderType' => 'selectSingle',
                'size' => 1,
                'type' => 'select',
            ),
        ),
		'section_position' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_gamelineup.section_position',
			'config' => array(
				'foreign_table' => 'tx_clubms_domain_model_sectionposition',
				'foreign_table_where' => '  AND tx_clubms_domain_model_sectionposition.section_position_group IN
				                                (SELECT uid FROM tx_clubms_domain_model_sectionpositiongroup WHERE section = ###REC_FIELD_gamesection###)
				                            ORDER BY tx_clubms_domain_model_sectionposition.sorting ASC',
				'items' => Array (
					array("LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_general.select", ""),
				),
				'maxItems' => 1,
				'renderType' => 'selectSingle',
				'size' => 1,
				'type' => 'select',
			),
		),
		
	),
);
