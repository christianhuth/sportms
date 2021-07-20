<?php
	
	if(!defined('TYPO3_MODE')) {
		die ('Access denied.');
	}
	
	return [
		'ctrl' => [
			'crdate' => 'crdate',
			'cruser_id' => 'cruser_id',
			'default_sortby' => 'name',
			'delete' => 'deleted',
			'enablecolumns' => [
				'disabled' => 'hidden',
				'starttime' => 'starttime',
				'endtime' => 'endtime',
			],
			'iconfile' => 'EXT:sportms/Resources/Public/Icons/tx_sportms_domain_model_venue.svg',
			'label' => '',
			'label_userFunc' => \Balumedien\Sportms\Classes\UserFunc\UserFunc::class . '->VenueLabel',
			'searchFields' => 'name',
			'title' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_venue',
			'tstamp' => 'tstamp',
			'versioningWS' => TRUE,
		],
		'types' => [
			'1' => ['showitem' => 'name, address, home_venue_for_clubs, images, description, --palette--;;building, --palette--;;size,
									--div--;LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.tab.visibility, hidden, detail_link, slug,
									'],
		],
		'palettes' => [
			'building' => ['showitem' => 'date_of_building, year_of_building'],
			'size' => ['showitem' => 'dimensions, surface, spectator_capacity'],
		],
		'columns' => [
			
			't3ver_label' => [
				'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.versionLabel',
				'config' => [
					'type' => 'input',
					'size' => 30,
					'max' => 255,
				],
			],
			
			'hidden' => [
				'exclude' => TRUE,
				'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.visible',
				'config' => [
					'items' => [
						[
							0 => '',
							1 => '',
							'invertStateDisplay' => TRUE,
						],
					],
					'renderType' => 'checkboxToggle',
					'type' => 'check',
				],
			],
			
			'starttime' => [
				'exclude' => TRUE,
				'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
				'config' => [
					'type' => 'input',
					'renderType' => 'inputDateTime',
					'eval' => 'datetime,int',
					'default' => 0,
					'behaviour' => [
						'allowLanguageSynchronization' => TRUE,
					],
				],
			],
			'endtime' => [
				'exclude' => TRUE,
				'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
				'config' => [
					'type' => 'input',
					'renderType' => 'inputDateTime',
					'eval' => 'datetime,int',
					'default' => 0,
					'range' => [
						'upper' => mktime(0, 0, 0, 1, 1, 2038),
					],
					'behaviour' => [
						'allowLanguageSynchronization' => TRUE,
					],
				],
			],
			
			'name' => [
				'exclude' => 1,
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_venue.name',
				'config' => [
					'eval' => 'required, trim',
					'size' => 30,
					'type' => 'input',
				],
			],
			'address' => [
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_address',
				'config' => [
					'appearance' => [
						'enabledControls' => [
							'info' => FALSE,
							'new' => TRUE,
							'sort' => FALSE,
							'hide' => TRUE,
							'dragdrop' => TRUE,
							'delete' => TRUE,
							'localize' => TRUE,
						],
						'levelLinksPosition' => 'bottom',
						'useSortable' => 1,
					],
					'foreign_field' => 'foreign_uid',
					'foreign_sortby' => 'sorting',
					'foreign_table' => 'tx_sportms_domain_model_address',
					'foreign_table_field' => 'foreign_table',
					'maxitems' => 1,
					'type' => 'inline',
				],
			],
			'home_venue_for_clubs' => [
				'exclude' => TRUE,
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_venue.home_venue_for_clubs',
				'config' => [
					'autoSizeMax' => 30,
					'fieldControl' => [
						'editPopup' => [
							'disabled' => TRUE,
						],
						'addRecord' => [
							'disabled' => TRUE,
						],
						'listModule' => [
							'disabled' => TRUE,
						],
					],
					'foreign_table' => 'tx_sportms_domain_model_club',
					'foreign_table_where' => 'ORDER BY tx_sportms_domain_model_club.name ASC',
					'MM' => 'tx_sportms_venue_club_mm',
					'multiple' => 0,
					'renderType' => 'selectMultipleSideBySide',
					'size' => 10,
					'type' => 'select',
				],
			],
			
			'images' => [
				'exclude' => 1,
				'label' => 'Image',
				'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
					'image',
					[
						'appearance' => [
							'createNewRelationLinkTitle' => 'LLL:EXT:cms/locallang_ttc.xlf:images.addFileReference',
						],
					],
					$GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
				),
			],
			
			'description' => [
				'exclude' => 1,
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_venue.description',
				'config' => [
					'cols' => '40',
					'rows' => '15',
					'type' => 'text',
				],
			],
			
			'date_of_building' => [
				'exclude' => 1,
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_venue.date_of_building',
				'config' => [
					'type' => 'input',
					'size' => 8,
					'eval' => 'date',
					'placeholder' => 'dd-mm-yyyy',
					'renderType' => 'inputDateTime',
				],
			],
			'year_of_building' => [
				'exclude' => 1,
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_venue.year_of_building',
				'config' => [
					'eval' => 'trim',
					'size' => 5,
					'type' => 'input',
				],
			],
			
			'dimensions' => [
				'exclude' => 1,
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_venue.dimensions',
				'config' => [
					'type' => 'input',
					'size' => 12,
					'eval' => 'trim',
				],
			],
			'surface' => [
				'exclude' => 1,
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_venue.surface',
				'config' => [
					'items' => [
						['LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.select', 0],
						['Halle', 1],
						['Kunstrasen', 2],
						['Rasen', 3],
					],
					'renderType' => 'selectSingle',
					'type' => 'select',
				],
			],
			'spectator_capacity' => [
				'exclude' => 1,
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_venue.spectator_capacity',
				'config' => [
					'type' => 'input',
					'size' => 6,
					'eval' => 'int, trim',
				],
			],
			
			'detail_link' => [
				'exclude' => TRUE,
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.detail_link',
				'config' => [
					'default' => FALSE,
					'renderType' => 'checkboxToggle',
					'type' => 'check',
				],
			],
			'slug' => [
				'exclude' => TRUE,
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.slug',
				'config' => [
					'default' => '',
					'fallbackCharacter' => '-',
					'generatorOptions' => [
						'fields' => ['uid', 'club', 'name'],
						'fieldSeparator' => '_',
						'prefixParentPageSlug' => FALSE,
						'replacements' => [
							'/' => '-',
						],
					],
					'prependSlash' => FALSE,
					'type' => 'slug',
				],
			],
		
		],
	];
