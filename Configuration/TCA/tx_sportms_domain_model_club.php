<?php
	
	if(!defined('TYPO3_MODE')) {
		die ('Access denied.');
	}
	
	return [
		'ctrl' => [
			'crdate' => 'crdate',
			'cruser_id' => 'cruser_id',
			'default_sortby' => 'ORDER BY name ASC',
			'delete' => 'deleted',
			'enablecolumns' => [
				'disabled' => 'hidden',
				'starttime' => 'starttime',
				'endtime' => 'endtime',
			],
			'iconfile' => 'EXT:sportms/Resources/Public/Icons/tx_sportms_domain_model_club.svg',
			'label' => 'name',
			'searchFields' => 'name',
			'title' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_club',
			'tstamp' => 'tstamp',
			'versioningWS' => TRUE,
		],
		'interface' => [
			'showRecordFieldList' => '',
		],
		'types' => [
			'1' => ['showitem' => '--div--;LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.tab.general,
										name,
										colours,
										--palette--;; founding,
										club_members,
									--div--;LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_club.tab_logos,
										logos,
									--div--;LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.tab.contact,
										addresses, phones, mails, urls,
									--div--;LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_club.tab_grounds,
										club_grounds, home_venues,
									--div--;LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_club.tab_sections,
										club_sections,
									--div--;LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_club.tab_officials,
										club_officials,
									--div--;LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.tab.visibility,
										--palette--;LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.palette.visibility_general;visibility_general,
										--palette--;LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.palette.visibility_detail;visibility_detail'],
		],
		'palettes' => [
			'founding' => ['showitem' => 'date_of_founding, year_of_founding'],
			'visibility_general' => ['showitem' => 'hidden, starttime, endtime'],
			'visibility_detail' => ['showitem' => 'detail_link, slug'],
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
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_club.name',
				'config' => [
					'type' => 'input',
					'size' => 30,
					'eval' => 'trim, required',
				],
			],
			'colours' => [
				'exclude' => 1,
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_club.colours',
				'config' => [
					'eval' => 'trim',
					'size' => 30,
					'type' => 'input',
				],
			],
			'date_of_founding' => [
				'exclude' => 1,
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_club.date_of_founding',
				'config' => [
					'type' => 'input',
					'size' => 8,
					'eval' => 'date',
					'placeholder' => 'dd-mm-yyyy',
					'renderType' => 'inputDateTime',
				],
			],
			'year_of_founding' => [
				'exclude' => 1,
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_club.year_of_founding',
				'config' => [
					'eval' => 'int, trim',
					'max' => 4,
					'min' => 4,
					'range' => [
						'lower' => 0,
					],
					'size' => 30,
					'type' => 'input',
				],
			],
			'club_members' => [
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_clubmembers.plural',
				'config' => [
					'appearance' => [
						'enabledControls' => [
							'info' => FALSE,
							'new' => TRUE,
							'sort' => FALSE,
							'hide' => TRUE,
							'dragdrop' => FALSE,
							'delete' => TRUE,
							'localize' => TRUE,
						],
						'levelLinksPosition' => 'bottom',
					],
					'foreign_field' => 'club',
					'foreign_table' => 'tx_sportms_domain_model_clubmembers',
					'type' => 'inline',
				],
			],
			
			'logos' => [
				'exclude' => 1,
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_club.logos',
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
			
			'addresses' => [
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_address.plural',
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
					'type' => 'inline',
				],
			],
			'phones' => [
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_phone.plural',
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
					'foreign_table' => 'tx_sportms_domain_model_phone',
					'foreign_table_field' => 'foreign_table',
					'type' => 'inline',
				],
			],
			'mails' => [
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_mail.plural',
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
					'foreign_table' => 'tx_sportms_domain_model_mail',
					'foreign_table_field' => 'foreign_table',
					'type' => 'inline',
				],
			],
			'urls' => [
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_url.plural',
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
					'foreign_table' => 'tx_sportms_domain_model_url',
					'foreign_table_field' => 'foreign_table',
					'type' => 'inline',
				],
			],
			
			'club_grounds' => [
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_clubgrounds',
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
					'foreign_field' => 'club',
					'foreign_sortby' => 'sorting',
					'foreign_table' => 'tx_sportms_domain_model_clubground',
					'type' => 'inline',
				],
			],
			'home_venues' => [
				'exclude' => TRUE,
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_club.home_venues',
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
					'foreign_table' => 'tx_sportms_domain_model_venue',
					'foreign_table_where' => 'ORDER BY tx_sportms_domain_model_venue.name ASC',
					'MM' => 'tx_sportms_venue_club_mm',
					'MM_opposite_field' => 'home_venues',
					'multiple' => 0,
					'renderType' => 'selectMultipleSideBySide',
					'size' => 10,
					'type' => 'select',
				],
			],
			
			'club_sections' => [
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_clubsection.plural',
				'config' => [
					'appearance' => [
						'enabledControls' => [
							'info' => TRUE,
							'new' => TRUE,
							'sort' => TRUE,
							'hide' => TRUE,
							'dragdrop' => TRUE,
							'delete' => TRUE,
							'localize' => FALSE,
						],
						'levelLinksPosition' => 'bottom',
						'useSortable' => 1,
					],
					'foreign_field' => 'club',
					'foreign_sortby' => 'sorting',
					'foreign_table' => 'tx_sportms_domain_model_clubsection',
					'type' => 'inline',
				],
			],
			
			'club_officials' => [
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_clubofficials',
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
					'foreign_field' => 'club',
					'foreign_table' => 'tx_sportms_domain_model_clubofficial',
					'type' => 'inline',
				],
			],
			
			'slug' => [
				'exclude' => TRUE,
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.slug',
				'config' => [
					'default' => '',
					'eval' => 'uniqueInSite',
					'fallbackCharacter' => '-',
					'generatorOptions' => [
						'fields' => ['uid', 'name'],
						'fieldSeparator' => '-',
						'prefixParentPageSlug' => FALSE,
						'replacements' => [
							'/' => '',
						],
					],
					'prependSlash' => FALSE,
					'type' => 'slug',
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
		
		],
	];
