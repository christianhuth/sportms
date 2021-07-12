<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

return array(
    'ctrl' => array(
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'default_sortby' => 'ORDER BY label ASC',
        'delete' => 'deleted',
        'dividers2tabs' => TRUE,
        'enablecolumns' => array(
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ),
	    'hideTable' => FALSE,
		'iconfile' => 'EXT:sportms/Resources/Public/Icons/tx_sportms_domain_model_team.svg',
        'label' => 'label',
        'searchFields' => 'label',
        'title'	=> 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_team',
        'tstamp' => 'tstamp',
		'versioningWS' => TRUE,
    ),
	'interface' => array(
		'showRecordFieldList' => 'label, club, sport, team_seasons',
	),
	'types' => array(
		'1' => array('showitem' => 'club, sport, sport_age_group, sport_age_level, label, dummy,
									--div--;LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_team.tab_seasons, team_seasons,
									--div--;LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.tab.visibility, hidden, detail_link, slug,
		                            '),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(
        
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
				'items' => [
					[
						0 => '',
						1 => '',
						'invertStateDisplay' => true
					]
				],
				'renderType' => 'checkboxToggle',
				'type' => 'check',
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
            'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_club',
            'config' => array(
                'eval' => 'required',
                'foreign_table' => 'tx_sportms_domain_model_club',
                'foreign_table_where' => 'ORDER BY name ASC',
                'items' => Array (
                    array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.select', ""),
                ),
                'renderType' => 'selectSingle',
                'size' => 1,
                'type' => 'select',
            ),
        ),
        'sport' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_sport',
            'config' => array(
                'eval' => 'required',
                'foreign_table' => 'tx_sportms_domain_model_sport',
                'foreign_table_where' => ' ORDER BY tx_sportms_domain_model_sport.label ASC',
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
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_sportagegroup',
			'config' => array(
				'eval' => 'required',
				'foreign_table' => 'tx_sportms_domain_model_sportagegroup',
				'foreign_table_where' => ' AND tx_sportms_domain_model_sportagegroup.sport = ###REC_FIELD_sport### ORDER BY tx_sportms_domain_model_sportagegroup.label ASC',
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
            'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_sportagelevel',
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
		'label' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.label',
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
				'default' => FALSE,
				'renderType' => 'checkboxToggle',
				'type' => 'check',
			),
		),
		
		'team_seasons' => array(
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_teamseasons',
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
				'foreign_sortby' => 'sorting',
				'foreign_table' => 'tx_sportms_domain_model_teamseason',
				'type' => 'inline',
			),
		),
		
		'slug' => [
			'exclude' => true,
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.slug',
			'config' => [
				'default' => '',
				'fallbackCharacter' => '-',
				'generatorOptions' => [
					'fields' => ['uid', 'label'],
					'fieldSeparator' => '/',
					'prefixParentPageSlug' => false,
					'replacements' => [
						'/' => '-',
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
				'default' => FALSE,
				'renderType' => 'checkboxToggle',
				'type' => 'check',
			],
		],
		
	),
);
