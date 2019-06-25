<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$GLOBALS['TCA']['tx_clubms_domain_model_team'] = array(
    'ctrl' => array(
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'default_sortby' => 'ORDER BY name DESC',
        'delete' => 'deleted',
        'dividers2tabs' => TRUE,
        'enablecolumns' => array(
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ),
		'iconfile' => 'EXT:clubms/Resources/Public/Icons/tx_clubms_domain_model_team.svg',
        'label' => 'name',
        'searchFields' => '',
		'sortby' => 'ordering',
        'title'	=> 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_team',
        'tstamp' => 'tstamp',
		'versioningWS' => TRUE,
    ),
	'interface' => array(
		'showRecordFieldList' => 'name, club, section, team_seasons',
	),
	'types' => array(
		'1' => array('showitem' => 'club, section, age_level, name, dummy,
									--div--;LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_team.tab_seasons, team_seasons,
									--div--;LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_team.tab_visibility, hidden, detail_link'),
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

        'club' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_team.club',
            'config' => array(
                'foreign_table' => 'tx_clubms_domain_model_club',
                'foreign_table_where' => 'ORDER BY name ASC',
                'items' => Array (
                    Array("Bitte wählen", ''),
                ),
                'renderType' => 'selectSingle',
                'size' => 1,
                'type' => 'select',
            ),
        ),
        'section' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_team.section',
            'config' => array(
                'foreign_table' => 'tx_clubms_domain_model_section',
                'foreign_table_where' => 'ORDER BY label ASC',
                'items' => Array (
                    Array("Bitte wählen", ''),
                ),
                'renderType' => 'selectSingle',
                'size' => 1,
                'type' => 'select',
            ),
        ),
        'age_level' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_team.age_level',
            'config' => array(
                'foreign_table' => 'tx_clubms_domain_model_agelevel',
                'foreign_table_where' => 'ORDER BY label ASC',
                'items' => Array (
                    Array("Bitte wählen", ''),
                ),
                'renderType' => 'selectSingle',
                'size' => 1,
                'type' => 'select',
            ),
        ),
		'name' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_team.name',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim, required'
			),
		),
		'dummy' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_team.dummy',
			'config' => array(
				'type' => 'check',
			),
		),
		
		'team_seasons' => array(
			'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_team.team_seasons',
			'config' => array(
				'appearance' => array(
					'levelLinksPosition' => 'bottom',
                    'useSortable' => 1,
				),
				'foreign_field' => 'team',
				'foreign_table' => 'tx_clubms_domain_model_teamseason',
				'type' => 'inline',
			),
		),
		
		'detail_link' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_team.detail_link',
			'config' => array(
				'type' => 'check',
			),
		),
		
	),
);
