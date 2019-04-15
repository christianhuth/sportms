<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$GLOBALS['TCA']['tx_clubms_domain_model_club_section'] = array(
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
		'iconfile' => 'EXT:clubms/Resources/Public/Icons/tx_clubms_domain_model_club_section.svg',
		'label' => 'section',
		'searchFields' => '',
		'sortby' => 'ordering',
		'title'	=> 'LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_club_section',
		'tstamp' => 'tstamp',
		'versioningWS' => TRUE,
	),
	'interface' => array(
		'showRecordFieldList' => 'hidden, section, member, address, phone, mail, url, club_section_official_job',
	),
	'types' => array(
		'1' => array('showitem' => '--div--;LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_club_section, section, members,
									--div--;LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_club_section.contact, address, phone, mail, url,
									--div--;LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_club_section.official, club_section_official_job'),
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
			'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_section',
			'config' => array(
				'foreign_table' => 'tx_clubms_domain_model_section',
				'foreign_table_where' => 'ORDER BY tx_clubms_domain_model_section.label ASC',
				'maxItems' => 1,
				'renderType' => 'selectSingle',
				'size' => 1,
				'type' => 'select',
			),
		),
		
		'members' => array(
			'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_club_section_members',
			'config' => array(
				'appearance' => array(
					'levelLinksPosition' => 'bottom',
					'useSortable' => 1,
				),
				'foreign_field' => 'club_section',
				'foreign_table' => 'tx_clubms_domain_model_club_section_members',
				'type' => 'inline',
			),
		),
		
		'address' => array(
			'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_person.addresses',
			'config' => array(
				'appearance' => array(
					'levelLinksPosition' => 'bottom',
					'useSortable' => 1,
				),
				'foreign_field' => 'club_section',
				'foreign_table' => 'tx_clubms_domain_model_address',
				'type' => 'inline',
            ),
        ),
		
        'phone' => array(
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_phone',
            'config' => array(
				'appearance' => array(
					'levelLinksPosition' => 'bottom',
					'useSortable' => 1,
				),
				'foreign_field' => 'club_section',
				'foreign_table' => 'tx_clubms_domain_model_phone',
				'type' => 'inline',
            ),
        ),
		
        'mail' => array(
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_mail',
            'config' => array(
				'appearance' => array(
					'levelLinksPosition' => 'bottom',
					'useSortable' => 1,
				),
				'foreign_field' => 'club_section',
				'foreign_table' => 'tx_clubms_domain_model_mail',
				'type' => 'inline',
			),
		),
		
		'url' => array(
			'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_url',
			'config' => array(
				'appearance' => array(
					'levelLinksPosition' => 'bottom',
					'useSortable' => 1,
				),
				'foreign_field' => 'club_section',
				'foreign_table' => 'tx_clubms_domain_model_url',
				'type' => 'inline',
			),
		),
		
		'club_section_official_job' => array(
			'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_club_section.official',
			'config' => array(
				'appearance' => array(
					'levelLinksPosition' => 'bottom',
					'useSortable' => 1,
				),
				'foreign_field' => 'club_section',
				'foreign_table' => 'tx_clubms_domain_model_club_section_official_job',
				'type' => 'inline',
			),
		),
		
	),
);
