<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$GLOBALS['TCA']['tx_clubms_domain_model_competition'] = array(
	'ctrl' => array(
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'default_sortby' => 'name',
		'delete' => 'deleted',
		'dividers2tabs' => TRUE,
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'iconfile' => 'EXT:clubms/Resources/Public/Icons/tx_clubms_domain_model_competition.svg',
		'label' => 'name',
		'label_alt' => 'section, age_level',
		'label_alt_force' => TRUE,
		'searchFields' => '',
		'title'	=> 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_competition',
		'tstamp' => 'tstamp',
		'versioningWS' => TRUE,
	),
	'interface' => array(
		'showRecordFieldList' => 'section, competition_type, age_level, name',
	),
	'types' => array(
		'1' => array('showitem' => 'section, competition_type, age_level, name, name_short, 
									--div--;LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_competition.tab_season, competition_seasons,
									--div--;LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_competition.tab_visibility, hidden, detail_link'),
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

        'section' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_competition.section',
            'config' => array(
                'eval' => 'required',
                'foreign_table' => 'tx_clubms_domain_model_section',
                'foreign_table_where' => 'ORDER BY label ASC',
                'items' => array (
                    array("",0),
                ),
                'maxItems' => 1,
                'minItems' => 1,
                'renderType' => 'selectSingle',
                'size' => 1,
                'type' => 'select',
            ),
        ),

        'competition_type' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_competition.competition_type',
            'config' => array(
                'eval' => 'required',
                'foreign_table' => 'tx_clubms_domain_model_competitiontype',
                'foreign_table_where' => 'ORDER BY label ASC',
                'items' => array (
                    array("",0),
                ),
                'maxItems' => 1,
                'minItems' => 1,
                'renderType' => 'selectSingle',
                'size' => 1,
                'type' => 'select',
            ),
        ),

        'age_level' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_competition.age_level',
            'config' => array(
                'eval' => 'required',
                'foreign_table' => 'tx_clubms_domain_model_agelevel',
                'foreign_table_where' => 'ORDER BY label ASC',
                'items' => array (
                    array("",0),
                ),
                'maxItems' => 1,
                'minItems' => 1,
                'renderType' => 'selectSingle',
                'size' => 1,
                'type' => 'select',
            ),
        ),
		
		'name' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_competition.name',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim, required'
			),
		),
		
		'name_short' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_competition.name_short',
			'config' => array(
				'eval' => 'trim',
				'size' => 255,
				'type' => 'input',
			),
		),

        'competition_seasons' => array(
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_competition.competition_seasons',
            'config' => array(
                'appearance' => array(
                    'levelLinksPosition' => 'bottom',
                    'useSortable' => 1,
                ),
                'foreign_field' => 'competition',
                'foreign_table' => 'tx_clubms_domain_model_competitionseason',
                'type' => 'inline',
            ),
        ),
		
		'detail_link' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_competition.detail_link',
			'config' => array(
				'type' => 'check',
			),
		),
		
	),
);
