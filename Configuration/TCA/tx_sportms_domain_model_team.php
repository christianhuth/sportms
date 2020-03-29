<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

return array(
    'ctrl' => array(
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'default_sortby' => 'ORDER BY name ASC',
        'delete' => 'deleted',
        'languageField' => 'sys_language_uid',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'transOrigPointerField' => 'l10n_parent',
        'dividers2tabs' => TRUE,
        'enablecolumns' => array(
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ),
		'iconfile' => 'EXT:sportms/Resources/Public/Icons/tx_sportms_domain_model_team.svg',
        'label' => 'name',
        'searchFields' => '',
        'title'	=> 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_team',
        'tstamp' => 'tstamp',
		'versioningWS' => TRUE,
    ),
	'interface' => array(
		'showRecordFieldList' => 'name, club, club_section, team_seasons',
	),
	'types' => array(
		'1' => array('showitem' => 'club, sport, sport_age_group, sport_age_level, name, dummy,
									--div--;LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_team.tab_seasons, team_seasons,
									--div--;LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.tab_visibility, hidden, detail_link, slug,
		                            --div--;LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.tab_language, sys_language_uid, l10n_parent, l10n_diffsource,
		                            '),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(
		
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'special' => 'languages',
                'items' => [
                    [
                        'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.allLanguages',
                        -1,
                        'flags-multiple'
                    ]
                ],
                'default' => 0,
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'default' => 0,
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_sportms_domain_model_team',
                'foreign_table_where' => 'AND {#tx_sportms_domain_model_team}.{#pid}=###CURRENT_PID### AND {#tx_sportms_domain_model_team}.{#sys_language_uid} IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        
        't3ver_label' => [
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.versionLabel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 255,
            ],
        ],
        
        'hidden' => [
			'exclude' => true,
			'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.visible',
			'config' => [
				'type' => 'check',
				'renderType' => 'checkboxToggle',
				'items' => [
					[
						0 => '',
						1 => '',
						'invertStateDisplay' => true
					]
				],
			],
		],
		
		'starttime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],
		'endtime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ],
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],

        'club' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_team.club',
            'config' => array(
                'eval' => 'required',
                'foreign_table' => 'tx_sportms_domain_model_club',
                'foreign_table_where' => 'ORDER BY name ASC',
                'items' => Array (
                    array("LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.select", ""),
                ),
                'renderType' => 'selectSingle',
                'size' => 1,
                'type' => 'select',
            ),
        ),
        'sport' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_team.sport',
            'config' => array(
                'eval' => 'required',
                'foreign_table' => 'tx_sportms_domain_model_sport',
                'foreign_default_sortby' => 'sorting',
                'items' => Array (
                    array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.select', ''),
                ),
                'renderType' => 'selectSingle',
                'size' => 1,
                'type' => 'select',
            ),
	        'onChange' => 'reload',
        ),
		'sport_age_group' => array(
			'displayCond' => 'FIELD:sport:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_team.sport_age_group',
			'config' => array(
				'eval' => 'required',
				'foreign_table' => 'tx_sportms_domain_model_sportagegroup',
				'foreign_table_where' => ' AND tx_sportms_domain_model_sportagegroup.section = ###REC_FIELD_sport###) ORDER BY tx_sportms_domain_model_sportagegroup.label ASC',
				'items' => Array (
					array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.select', ''),
				),
				'renderType' => 'selectSingle',
				'size' => 1,
				'type' => 'select',
			),
			'onChange' => 'reload',
		),
        'sport_age_level' => array(
	        'displayCond' => 'FIELD:sport_age_group:>:0',
            'exclude' => 1,
            'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_team.sport_age_level',
            'config' => array(
                'eval' => 'required',
                'foreign_table' => 'tx_sportms_domain_model_sportagelevel',
                'foreign_table_where' => ' AND tx_sportms_domain_model_sportagelevel.sport_age_group = ###REC_FIELD_sport_age_group### ORDER BY tx_sportms_domain_model_sportagelevel.label ASC',
                'items' => Array (
                    array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.select', ''),
                ),
                'renderType' => 'selectSingle',
                'size' => 1,
                'type' => 'select',
            ),
        ),
		'name' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_team.name',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim, required'
			),
		),
		'dummy' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_team.dummy',
			'config' => array(
				'type' => 'check',
			),
		),
		
		'team_seasons' => array(
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_team.team_seasons',
			'config' => array(
				'appearance' => array(
                    'enabledControls' => [
                        'info' => false,
                        'new' => true,
                        'sort' => false,
                        'hide' => true,
                        'dragdrop' => true,
                        'delete' => true,
                        'localize' => true,
                    ],
					'levelLinksPosition' => 'bottom',
                    'useSortable' => 1,
				),
				'foreign_field' => 'team',
				'foreign_table' => 'tx_sportms_domain_model_teamseason',
				'type' => 'inline',
			),
		),
		
		'slug' => [
			'exclude' => true,
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.slug',
			'config' => [
				'default' => '',
				'eval' => 'uniqueInSite',
				'fallbackCharacter' => '-',
				'generatorOptions' => [
					'fields' => ['name', 'section_age_level'],
					'fieldSeparator' => '-',
					'prefixParentPageSlug' => false,
					'replacements' => [
						'/' => '',
					],
				],
				'prependSlash' => false,
				'type' => 'slug',
			],
		],
		
		'detail_link' => [
			'exclude' => true,
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.detail_link',
			'config' => [
				'default' => '1',
				'renderType' => 'checkboxToggle',
				'type' => 'check',
			],
		],
		
	),
);
