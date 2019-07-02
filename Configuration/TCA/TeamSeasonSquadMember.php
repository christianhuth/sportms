<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$GLOBALS['TCA']['tx_clubms_domain_model_teamseasonsquadmember'] = array(
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
		'iconfile' => 'EXT:clubms/Resources/Public/Icons/tx_clubms_domain_model_teamseasonsquadmember.svg',
		'label' => '',
		'label_alt_force' => TRUE,
		'label_userFunc' => \Balumedien\Clubms\Configuration\TCA\UserFunc\UserFunc::class . '->TeamSeasonSquadMemberLabel',
		'searchFields' => '',
		'sortby' => 'sorting',
		'title'	=> 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_teamseasonsquadmember',
		'tstamp' => 'tstamp',
        'versioningWS' => TRUE,
	),
	'interface' => array(
		'showRecordFieldList' => 'squad_number, person',
	),
	'types' => array(
		'1' => array('showitem' => 'person, section_position_group, section_position, squad_number,
									--div--;LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_teamseasonsquadmember.tab_transfer, new_signing, leaving,
									--div--;LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_teamseasonsquadmember.tab_visibility, hidden'),
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

        'team_season' => array(
            'config' => array(
                'type' => 'passthrough',
            ),
        ),

		'person' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_teamseasonsquadmember.person',
			'config' => array(
				'eval' => 'required',
				'foreign_table' => 'tx_clubms_domain_model_person',
                'foreign_table_where' => 'AND profile_player = 1 ORDER BY lastname ASC, firstname ASC',
				'items' => Array (
                    array("LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_general.select", ""),
				),
				'maxItems' => 1,
				'renderType' => 'selectSingle',
				'size' => 1,
				'type' => 'select',
			),
		),
        'section_position_group' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_teamseasonsquadmember.section_position_group',
            'config' => array(
                'foreign_table' => 'tx_clubms_domain_model_sectionpositiongroup',
                'foreign_table_where' => 'ORDER BY tx_clubms_domain_model_sectionpositiongroup.sorting ASC',
                'items' => Array (
                    array("LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_general.select", ""),
                ),
                'maxItems' => 1,
                'renderType' => 'selectSingle',
                'size' => 1,
                'type' => 'select',
            ),
	        'onChange' => 'reload',
        ),
        'section_position' => array(
	        'displayCond' => 'FIELD:section_position_group:>:0',
            'exclude' => 1,
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_teamseasonsquadmember.section_position',
            'config' => array(
                'foreign_table' => 'tx_clubms_domain_model_sectionposition',
                'foreign_table_where' => '  AND tx_clubms_domain_model_sectionposition.section_position_group = ###REC_FIELD_section_position_group### 
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
		'squad_number' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_teamseasonsquadmember.squad_number',
			'config' => array(
				'type' => 'input',
				'size' => 10,
				'eval' => 'trim'
			),
		),
		
		'new_signing' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_teamseasonsquadmember.new_signing',
			'config' => array(
				'type' => 'check',
			),
		),
		'leaving' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_teamseasonsquadmember.leaving',
			'config' => array(
				'type' => 'check',
			),
		),
		
	),
);
