<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

return array(
		'ctrl' => array(
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'delete' => 'deleted',
        'languageField' => 'sys_language_uid',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'transOrigPointerField' => 'l10n_parent',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'hideTable' => TRUE,
		'iconfile' => 'EXT:sportms/Resources/Public/Icons/tx_sportms_domain_model_sportagelevel.svg',
		'label' => 'label',
		'label_alt' => 'short',
		'label_alt_force' => TRUE,
		'searchFields' => '',
		'sortby' => 'sorting',
		'title'	=> 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_sportagelevel',
		'tstamp' => 'tstamp',
		'versioningWS' => TRUE,
    ),
	'interface' => array(
		'showRecordFieldList' => 'section_age_group, label, short, slug',
	),
	'types' => array(
		'1' => array('showitem' => 'label, short, slug,
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
                'foreign_table' => 'tx_test_domain_model_test',
                'foreign_table_where' => 'AND {#tx_test_domain_model_test}.{#pid}=###CURRENT_PID### AND {#tx_test_domain_model_test}.{#sys_language_uid} IN (-1,0)',
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
		
		'section_age_group' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_sportagelevel.section_age_group',
			'config' => array(
				'eval' => 'required',
				'foreign_table' => 'tx_sportms_domain_model_sportagegroup',
				'foreign_table_where' => 'ORDER BY name ASC',
				'items' => Array (
					array("LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.select", ""),
				),
				'renderType' => 'selectSingle',
				'size' => 1,
				'type' => 'select',
			),
			'onChange' => 'reload',
		),
		'label' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_sportagelevel.label',
			'config' => array(
				'eval' => 'required, trim',
				'size' => 255,
				'type' => 'input',
			),
		),
		'short' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_sportagelevel.short',
			'config' => array(
				'eval' => 'trim',
				'size' => 255,
				'type' => 'input',
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
		
	),
);