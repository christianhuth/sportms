<?php
	
	if(!defined('TYPO3_MODE')) {
		die ('Access denied.');
	}
	
	return [
		'ctrl' => [
			'crdate' => 'crdate',
			'cruser_id' => 'cruser_id',
			'delete' => 'deleted',
			'enablecolumns' => [
				'disabled' => 'hidden',
				'starttime' => 'starttime',
				'endtime' => 'endtime',
			],
			'hideTable' => TRUE,
			'iconfile' => 'EXT:sportms/Resources/Public/Icons/tx_sportms_domain_model_teamseason.svg',
			'label' => '',
			'label_userFunc' => \Balumedien\Sportms\Configuration\TCA\UserFunc\UserFunc::class . '->teamSeasonLabel',
			'searchFields' => '',
			'sortby' => 'sorting',
			'title' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_teamseason',
			'tstamp' => 'tstamp',
			'versioningWS' => TRUE,
		],
		'interface' => [
			'showRecordFieldList' => '',
		],
		'types' => [
			'1' => ['showitem' => '--div--;LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.tab.general,
										team,
										season,
										team_season_practices,
										team_season_images,
									--div--;LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_teamseason.tab_officials, team_season_officials,
									--div--;LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_teamseason.tab_squad_members, team_season_squad_members, team_season_squad_captains,
									--div--;LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_teamseason.tab_competitions, competition_season_teams,
									--div--;LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.tab.visibility,
										--palette--;LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.palette.visibility_general;visibility_general,
										--palette--;LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.palette.visibility_detail;visibility_detail'],
		],
		'palettes' => [
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
			
			'team' => [
				'exclude' => 1,
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_team',
				'config' => [
					'eval' => 'required',
					'foreign_table' => 'tx_sportms_domain_model_team',
					'foreign_table_where' => 'ORDER BY label ASC',
					'items' => [
						['LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.select', ""],
					],
					'maxItems' => 1,
					'renderType' => 'selectSingle',
					'size' => 1,
					'type' => 'select',
				],
			],
			
			'season' => [
				'exclude' => 1,
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_season',
				'config' => [
					'eval' => 'required',
					'foreign_table' => 'tx_sportms_domain_model_season',
					'foreign_table_where' => 'ORDER BY label DESC',
					'items' => [
						['LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.select', ""],
					],
					'maxItems' => 1,
					'renderType' => 'selectSingle',
					'size' => 1,
					'type' => 'select',
				],
			],
			'team_season_practices' => [
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_teamseasonpractices',
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
					'foreign_field' => 'team_season',
					'foreign_table' => 'tx_sportms_domain_model_teamseasonpractice',
					'type' => 'inline',
				],
			],
			'team_season_images' => [
				'exclude' => 1,
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_teamseason.team_season_images',
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
			
			'team_season_officials' => [
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_teamseasonofficials',
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
					'foreign_field' => 'team_season',
					'foreign_sortby' => 'sorting',
					'foreign_table' => 'tx_sportms_domain_model_teamseasonofficial',
					'type' => 'inline',
				],
			],
			
			'team_season_squad_members' => [
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_teamseasonsquadmembers',
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
						'useSortable' => TRUE,
					],
					'foreign_field' => 'team_season',
					'foreign_sortby' => 'sorting',
					'foreign_table' => 'tx_sportms_domain_model_teamseasonsquadmember',
					'type' => 'inline',
				],
			],
			
			'team_season_squad_captains' => [
				'exclude' => TRUE,
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_teamseason.team_season_squad_captains',
				'config' => [
					'type' => 'select',
					'renderType' => 'selectMultipleSideBySide',
					'foreign_table' => 'tx_sportms_domain_model_person',
					'foreign_table_where' => ' AND tx_sportms_domain_model_person.uid IN (SELECT tx_sportms_domain_model_teamseasonsquadmember.person FROM tx_sportms_domain_model_teamseasonsquadmember WHERE tx_sportms_domain_model_teamseasonsquadmember.team_season = ###THIS_UID###)',
					'MM' => 'tx_sportms_teamseason_person_mm',
					'size' => 10,
					'autoSizeMax' => 30,
					'maxitems' => 9999,
					'multiple' => 0,
					'fieldControl' => [
						'editPopup' => [
							'disabled' => FALSE,
						],
						'addRecord' => [
							'disabled' => FALSE,
						],
						'listModule' => [
							'disabled' => TRUE,
						],
					],
				],
			],
			
			'competition_season_teams' => [
				'exclude' => TRUE,
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_teamseason.competition_season_teams',
				'config' => [
					'type' => 'select',
					'renderType' => 'selectMultipleSideBySide',
					'foreign_table' => 'tx_sportms_domain_model_competitionseason',
					'foreign_table_where' => '  AND tx_sportms_domain_model_competitionseason.season = ###REC_FIELD_season###
											AND tx_sportms_domain_model_competitionseason.competition IN (SELECT uid FROM tx_sportms_domain_model_competition WHERE sport_age_level IN (SELECT sport_age_level FROM tx_sportms_domain_model_team WHERE uid = ###REC_FIELD_team###))
											ORDER BY competition ASC',
					'MM' => 'tx_sportms_competitionseason_teamseason_mm',
					'MM_opposite_field' => 'competition_season_teams',
					'size' => 10,
					'autoSizeMax' => 30,
					'maxitems' => 9999,
					'multiple' => 0,
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
				],
			],
			
			'detail_link' => [
				'exclude' => TRUE,
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_general.detail_link',
				'config' => [
					'default' => FALSE,
					'renderType' => 'checkboxToggle',
					'type' => 'check',
				],
			],
			
			'slug' => [
				'exclude' => TRUE,
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_general.slug',
				'config' => [
					'default' => '',
					'fallbackCharacter' => '-',
					'generatorOptions' => [
						'fields' => ['uid'],
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
