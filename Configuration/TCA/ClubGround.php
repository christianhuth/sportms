<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$GLOBALS['TCA']['tx_clubms_domain_model_clubground'] = array(
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
		'iconfile' => 'EXT:clubms/Resources/Public/Icons/tx_clubms_domain_model_clubground.svg',
        'label' => 'name',
        'searchFields' => '',
		'sortby' => 'ordering',
        'title'	=> 'LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_club_ground',
        'tstamp' => 'tstamp',
		'versioningWS' => TRUE,
    ),
	'interface' => array(
		'showRecordFieldList' => 'hidden, section',
	),
	'types' => array(
		'1' => array('showitem' => 'name, address, journey,
									--div--;LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_club_ground.image, images,
									--div--;LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_club_ground.details, description, club_owned, club_owned_since, date_of_building, year_of_building,
									--div--;LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_club_ground.venues, venues,'),
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
		
		'name' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_club_ground.name',
			'config' => array(
				'eval' => 'required, trim',
				'size' => 30,
				'type' => 'input',
			),
		),
		
		'address' => array(
			'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_address',
			'config' => array(
				'appearance' => array(
					'levelLinksPosition' => 'bottom',
					'useSortable' => 1,
				),
				'eval' => 'required',
				'foreign_field' => 'club_ground',
				'foreign_table' => 'tx_clubms_domain_model_address',
				'type' => 'inline',
			),
		),
		
		'journey' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_club_ground.journey',
			'config' => array(
				'cols' => '40',
				'rows' => '15',
				'type' => 'text',
			),
		),
		
		'images' => array(
				'exclude' => 1,
				'label' => 'Image',
				'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
					'image',
					array(
						'appearance' => array(
								'createNewRelationLinkTitle' => 'LLL:EXT:cms/locallang_ttc.xlf:images.addFileReference'
						),
					),
					$GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
				),
		),
		
		'description' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_club_ground.description',
			'config' => array(
				'cols' => '40',
				'rows' => '15',
				'type' => 'text',
			),
		),
		
		'club_owned' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_club_ground.club_owned',
			'config' => array(
				'type' => 'check',
			),
		),
		
		'club_owned_since' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_club_ground.club_owned_since',
			'config' => array(
				'type' => 'input',
				'size' => 8,
				'eval' => 'date',
				'placeholder' => 'dd-mm-yyyy',
				'renderType' => 'inputDateTime',
			),
		),
		
		'year_of_building' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_club_ground.year_of_building',
			'config' => array(
				'eval' => 'trim',
				'size' => 5,
				'type' => 'input',
			),
		),
		
		'date_of_building' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_club_ground.date_of_building',
			'config' => array(
				'type' => 'input',
				'size' => 8,
				'eval' => 'date',
				'placeholder' => 'dd-mm-yyyy',
				'renderType' => 'inputDateTime',
			),
		),
		
		'venues' => array(
			'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_db.xlf:tx_clubms_domain_model_club_ground.venues',
			'config' => array(
				'appearance' => array(
					'levelLinksPosition' => 'bottom',
					'useSortable' => 1,
				),
				'eval' => 'required',
				'foreign_field' => 'club_ground',
				'foreign_table' => 'tx_clubms_domain_model_clubvenue',
				'type' => 'inline',
			),
		),
		
	),
);
