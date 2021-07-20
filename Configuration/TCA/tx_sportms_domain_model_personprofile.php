<?php
	
	if(!defined('TYPO3_MODE')) {
		die ('Access denied.');
	}
	
	return [
		'ctrl' => [
			'crdate' => 'crdate',
			'cruser_id' => 'cruser_id',
			'delete' => 'deleted',
			'dividers2tabs' => TRUE,
			'enablecolumns' => [
				'disabled' => 'hidden',
				'starttime' => 'starttime',
				'endtime' => 'endtime',
			],
			'hideTable' => TRUE,
			'iconfile' => 'EXT:sportms/Resources/Public/Icons/tx_sportms_domain_model_personprofile.svg',
			'label' => '',
			'label_userFunc' => \Balumedien\Sportms\Classes\UserFunc\UserFunc::class . '->personProfileLabel',
			'searchFields' => '',
			'sortby' => 'sorting',
			'title' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_personprofile',
			'tstamp' => 'tstamp',
			'versioningWS' => TRUE,
		],
		'types' => [
			'1' => ['showitem' => 'profile_type, sport,
									--palette--;LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_personprofile.palette_main_position;main_position,
									--palette--;LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_personprofile.palette_side_positions;side_positions,
									--div--;LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_personprofile.tab_images, profile_images,
		                            '],
		],
		'palettes' => [
			'main_position' => ['showitem' => 'main_sport_position_group, main_sport_position'],
			'side_positions' => ['showitem' => 'side_sport_position_groups, side_sport_positions'],
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
			
			'person' => [
				'exclude' => 1,
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_person',
				'config' => [
					'foreign_table' => 'tx_sportms_domain_model_person',
					'foreign_table_where' => 'ORDER BY lastname ASC, firstname ASC',
					'items' => [
						['LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.select', ''],
					],
					'maxItems' => 1,
					'renderType' => 'selectSingle',
					'size' => 1,
					'type' => 'select',
				],
				'onChange' => 'reload',
			],
			
			'profile_type' => [
				'exclude' => 1,
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_personprofile.profiletype',
				'config' => [
					'eval' => 'required',
					'items' => [
						['LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.select', ''],
						['LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_personprofile.profiletype.official', 'official'],
						['LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_personprofile.profiletype.player', 'player'],
						['LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_personprofile.profiletype.referee', 'referee'],
					],
					'renderType' => 'selectSingle',
					'type' => 'select',
				],
				'onChange' => 'reload',
			],
			'sport' => [
				'exclude' => 1,
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_sport',
				'config' => [
					'eval' => 'required',
					'foreign_table' => 'tx_sportms_domain_model_sport',
					'foreign_table_where' => 'ORDER BY tx_sportms_domain_model_sport.label ASC',
					'items' => [
						['LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.select', ''],
					],
					'maxItems' => 1,
					'renderType' => 'selectSingle',
					'size' => 1,
					'type' => 'select',
				],
				'onChange' => 'reload',
			],
			'main_sport_position_group' => [
				'displayCond' => [
					'AND' => [
						'FIELD:profile_type:=:player',
						'FIELD:sport:>:0',
					],
				],
				'exclude' => 1,
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_sportpositiongroup',
				'config' => [
					'foreign_table' => 'tx_sportms_domain_model_sportpositiongroup',
					'foreign_sortby' => 'sorting',
					'foreign_table_where' => ' AND tx_sportms_domain_model_sportpositiongroup.sport = ###REC_FIELD_sport###
											ORDER BY tx_sportms_domain_model_sportpositiongroup.label ASC',
					'items' => [
						['LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.select', ''],
					],
					'maxItems' => 1,
					'renderType' => 'selectSingle',
					'size' => 1,
					'type' => 'select',
				],
				'onChange' => 'reload',
			],
			'main_sport_position' => [
				'displayCond' => [
					'AND' => [
						'FIELD:profile_type:=:player',
						'FIELD:sport:>:0',
					],
				],
				'exclude' => 1,
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_sportposition',
				'config' => [
					'foreign_table' => 'tx_sportms_domain_model_sportposition',
					'foreign_table_where' => '  AND tx_sportms_domain_model_sportposition.sport_position_group = ###REC_FIELD_main_sport_position_group###
                                            ORDER BY tx_sportms_domain_model_sportposition.label ASC',
					'items' => [
						['LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.select', ''],
					],
					'maxItems' => 1,
					'renderType' => 'selectSingle',
					'size' => 1,
					'type' => 'select',
				],
			],
			'side_sport_position_groups' => [
				'displayCond' => [
					'AND' => [
						'FIELD:profile_type:=:player',
						'FIELD:sport:>:0',
					],
				],
				'exclude' => TRUE,
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_sportpositiongroups',
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
					'foreign_table' => 'tx_sportms_domain_model_sportpositiongroup',
					'foreign_table_where' => '  AND tx_sportms_domain_model_sportpositiongroup.uid != ###REC_FIELD_main_sport_position_group###
											ORDER BY tx_sportms_domain_model_sportpositiongroup.label ASC',
					'MM' => 'tx_sportms_personprofile_sportpositiongroup_mm',
					'multiple' => 0,
					'renderType' => 'selectMultipleSideBySide',
					'size' => 10,
					'type' => 'select',
				],
			],
			'side_sport_positions' => [
				'displayCond' => [
					'AND' => [
						'FIELD:profile_type:=:player',
						'FIELD:sport:>:0',
					],
				],
				'exclude' => TRUE,
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_sportpositions',
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
					'foreign_table' => 'tx_sportms_domain_model_sportposition',
					'foreign_table_where' => '  AND tx_sportms_domain_model_sportposition.uid != ###REC_FIELD_main_sport_position###
											ORDER BY tx_sportms_domain_model_sportposition.label ASC',
					'MM' => 'tx_sportms_personprofile_sportposition_mm',
					'multiple' => 0,
					'renderType' => 'selectMultipleSideBySide',
					'size' => 10,
					'type' => 'select',
				],
			],
			
			'profile_images' => [
				'exclude' => 1,
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_personprofile.profile_images',
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
		
		],
	];