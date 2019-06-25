<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$GLOBALS['TCA']['tx_clubms_domain_model_clubofficialjob'] = array(
    'ctrl' => array(
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
		'default_sortby' => 'ORDER BY official_job ASC',
        'delete' => 'deleted',
        'dividers2tabs' => TRUE,
        'enablecolumns' => array(
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ),
		'hideTable' => TRUE,
		'iconfile' => 'EXT:clubms/Resources/Public/Icons/tx_clubms_domain_model_clubofficialjob.svg',
        'label' => 'official_job',
        'searchFields' => '',
		// 'sortby' => 'ordering',
        'title'	=> 'LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_club_official_job',
        'tstamp' => 'tstamp',
		'versioningWS' => TRUE,
    ),
	'interface' => array(
		'showRecordFieldList' => 'hidden, section',
	),
	'types' => array(
		'1' => array('showitem' => 'official_job, club_officials,'),
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
		    'config' => array(
		        'type' => 'passthrough',
            ),
        ),
		
		'official_job' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_clubofficialjob.official_job',
			'config' => array(
				'foreign_table' => 'tx_clubms_domain_model_officialjob',
				'foreign_table_where' => 'ORDER BY label ASC',
				'items' => array(
                    array("LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_general.select", ""),
                ),
				'maxItems' => 1,
				'renderType' => 'selectSingle',
				'size' => 1,
				'type' => 'select',
			),
		),
		'club_officials' => array(
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_clubofficialjob.club_official',
			'config' => array(
				'appearance' => array(
					'levelLinksPosition' => 'bottom',
					'useSortable' => 1,
				),
				'foreign_field' => 'club_official_job',
				'foreign_table' => 'tx_clubms_domain_model_clubofficial',
				'type' => 'inline',
			),
		),
		
	),
);
