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
			'iconfile' => 'EXT:sportms/Resources/Public/Icons/tx_sportms_domain_model_sportagegroup.svg',
			'label' => 'label',
			'searchFields' => 'label',
			'sortby' => 'sorting',
			'title' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_sportagegroup',
			'tstamp' => 'tstamp',
			'versioningWS' => TRUE,
		],
		'interface' => [
			'showRecordFieldList' => 'label, short',
		],
		'types' => [
			'1' => ['showitem' => ' --div--;LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.tab.general,
		                            	--palette--;;label_abbreviation,
		                            --div--;LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_sportagelevel.plural,
		                                sport_age_levels,
		                            --div--;LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.tab.visibility,
		                                --palette--;LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.palette.visibility_general;visibility_general,
										--palette--;LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.palette.visibility_detail;visibility_detail'],
		],
		'palettes' => [
			'label_abbreviation' => ['showitem' => 'label, abbreviation'],
			'visibility_general' => ['showitem' => 'hidden, starttime, endtime'],
			'visibility_detail' => ['showitem' => 'slug'],
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
			
			'sport' => [
				'exclude' => 1,
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_sport',
				'config' => [
					'eval' => 'required',
					'foreign_table' => 'tx_sportms_domain_model_sport',
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
			'label' => [
				'exclude' => 1,
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.label',
				'config' => [
					'eval' => 'required, trim',
					'size' => 255,
					'type' => 'input',
				],
			],
			'abbreviation' => [
				'exclude' => 1,
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.abbreviation',
				'config' => [
					'eval' => 'trim',
					'size' => 255,
					'type' => 'input',
				],
			],
			
			'sport_age_levels' => [
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_sportagelevel.plural',
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
					'foreign_field' => 'sport_age_group',
					'foreign_sortby' => 'sorting',
					'foreign_table' => 'tx_sportms_domain_model_sportagelevel',
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
						'fields' => ['label'],
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
		
		],
	];