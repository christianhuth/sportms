<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$GLOBALS['TCA']['tx_clubms_domain_model_team'] = array(
    'ctrl' => array(
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'default_sortby' => 'ORDER BY name ASC',
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
        'title'	=> 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_team',
        'tstamp' => 'tstamp',
		'versioningWS' => TRUE,
    ),
	'interface' => array(
		'showRecordFieldList' => 'name, club, club_section, team_seasons',
	),
	'types' => array(
		'1' => array('showitem' => 'club, club_section, section_age_group, section_age_level, name, dummy,
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
                'eval' => 'required',
                'foreign_table' => 'tx_clubms_domain_model_club',
                'foreign_table_where' => 'ORDER BY name ASC',
                'items' => Array (
                    array("LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_general.select", ""),
                ),
                'renderType' => 'selectSingle',
                'size' => 1,
                'type' => 'select',
            ),
            'onChange' => 'reload',
        ),
        'club_section' => array(
	        'displayCond' => 'FIELD:club:>:0',
            'exclude' => 1,
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_team.club_section',
            'config' => array(
                'eval' => 'required',
                'foreign_table' => 'tx_clubms_domain_model_clubsection',
                'foreign_table_where' => ' AND tx_clubms_domain_model_clubsection.club = ###REC_FIELD_club### ORDER BY ordering ASC',
                'items' => Array (
                    array("LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_general.select", ""),
                ),
                'renderType' => 'selectSingle',
                'size' => 1,
                'type' => 'select',
            ),
	        'onChange' => 'reload',
        ),
		'section_age_group' => array(
			'displayCond' => 'FIELD:club_section:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_team.section_age_group',
			'config' => array(
				'eval' => 'required',
				'foreign_table' => 'tx_clubms_domain_model_sectionagegroup',
				'foreign_table_where' => ' AND tx_clubms_domain_model_sectionagegroup.section = (SELECT section FROM tx_clubms_domain_model_clubsection WHERE uid=###REC_FIELD_club_section###) ORDER BY section ASC',
				'items' => Array (
					array("LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_general.select", ""),
				),
				'renderType' => 'selectSingle',
				'size' => 1,
				'type' => 'select',
			),
			'onChange' => 'reload',
		),
        'section_age_level' => array(
	        'displayCond' => 'FIELD:section_age_group:>:0',
            'exclude' => 1,
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_team.section_age_level',
            'config' => array(
                'eval' => 'required',
                'foreign_table' => 'tx_clubms_domain_model_sectionagelevel',
                'foreign_table_where' => ' AND tx_clubms_domain_model_sectionagelevel.section_age_group = ###REC_FIELD_section_age_group### ORDER BY label ASC',
                'items' => Array (
                    array("LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_general.select", ""),
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
