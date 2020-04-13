<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

return array(
	'ctrl' => array(
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'default_sortby' => 'ORDER BY club ASC, sorting ASC',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'hideTable' => TRUE,
		'iconfile' => 'EXT:sportms/Resources/Public/Icons/tx_sportms_domain_model_clubsection.svg',
		'label' => '',
		'label_userFunc' => \Balumedien\Sportms\Configuration\TCA\UserFunc\UserFunc::class . '->clubSectionLabel',
		'searchFields' => '',
		'title'	=> 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_clubsection',
		'tstamp' => 'tstamp',
		'versioningWS' => TRUE,
	),
	'interface' => array(
		'showRecordFieldList' => '',
	),
	'types' => array(
		'1' => array('showitem' => 'club, label, sports, images, club_section_members,
									--div--;LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_clubsection.tab_contact, addresses, phones, mails, urls,
									--div--;LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_clubsection.tab_officials, club_section_officials,
									--div--;LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.tab_visibility, hidden, detail_link,
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
	        'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_clubsection.club',
	        'config' => array(
	        	'eval' => 'required',
		        'foreign_table' => 'tx_sportms_domain_model_club',
		        'foreign_table_where' => 'ORDER BY tx_sportms_domain_model_club.name ASC',
		        'items' => array(
			        array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.select', ""),
		        ),
		        'maxItems' => 1,
		        'renderType' => 'selectSingle',
		        'size' => 1,
		        'type' => 'select',
	        ),
        ),
		'label' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_sport.label',
			'config' => array(
				'eval' => 'trim, required',
				'size' => 30,
				'type' => 'input',
			),
		),
		'sports' => array(
			'exclude' => true,
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_clubsection.sports',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectMultipleSideBySide',
				'foreign_table' => 'tx_sportms_domain_model_sport',
				'foreign_table_where' => ' ORDER BY tx_sportms_domain_model_sport.label ASC',
				'MM' => 'tx_sportms_clubsection_sport_mm',
				'size' => 10,
				'autoSizeMax' => 30,
				'maxitems' => 9999,
				'minitems' => 0,
				'multiple' => 0,
			),
		),
		'images' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_clubsection.images',
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
		'club_section_members' => array(
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_clubsection.club_section_members',
			'config' => array(
				'appearance' => array(
                    'enabledControls' => [
                        'info' => false,
                        'new' => true,
                        'sort' => false,
                        'hide' => true,
                        'dragdrop' => false,
                        'delete' => true,
                        'localize' => true,
                    ],
					'levelLinksPosition' => 'bottom',
					'useSortable' => 1,
				),
				'foreign_field' => 'club_section',
				'foreign_table' => 'tx_sportms_domain_model_clubsectionmembers',
				'type' => 'inline',
			),
		),
		
		'addresses' => array(
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_clubsection.addresses',
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
				'foreign_field' => 'foreign_uid',
				'foreign_sortby' => 'sorting',
				'foreign_table' => 'tx_sportms_domain_model_address',
				'foreign_table_field' => 'foreign_table',
				'type' => 'inline',
            ),
        ),
        'phones' => array(
            'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_clubsection.phones',
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
	            'foreign_field' => 'foreign_uid',
	            'foreign_sortby' => 'sorting',
	            'foreign_table' => 'tx_sportms_domain_model_phone',
	            'foreign_table_field' => 'foreign_table',
				'type' => 'inline',
            ),
        ),
        'mails' => array(
            'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_clubsection.mails',
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
	            'foreign_field' => 'foreign_uid',
	            'foreign_sortby' => 'sorting',
	            'foreign_table' => 'tx_sportms_domain_model_mail',
	            'foreign_table_field' => 'foreign_table',
				'type' => 'inline',
			),
		),
		'urls' => array(
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_clubsection.urls',
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
				'foreign_field' => 'foreign_uid',
				'foreign_sortby' => 'sorting',
				'foreign_table' => 'tx_sportms_domain_model_url',
				'foreign_table_field' => 'foreign_table',
				'type' => 'inline',
			),
		),
		
		'club_section_officials' => array(
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_clubsection.club_section_officials',
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
				'foreign_field' => 'club_section',
				'foreign_table' => 'tx_sportms_domain_model_clubsectionofficial',
				'type' => 'inline',
			),
		),
		
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
