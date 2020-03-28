<?php

	if (!defined('TYPO3_MODE')) {
		die ('Access denied.');
	}

	return array(
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
			'iconfile' => 'EXT:sportms/Resources/Public/Icons/tx_sportms_domain_model_teamseason.svg',
            'label' => '',
			'label_userFunc' => \Balumedien\Sportms\Configuration\TCA\UserFunc\UserFunc::class . '->CompetitionSeasonLabel',
			'searchFields' => '',
            'sortby' => 'sorting',
			'title' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_competitionseason',
			'tstamp' => 'tstamp',
			'versioningWS' => TRUE,
		),
		'interface' => array(
			'showRecordFieldList' => '',
		),
		'types' => array(
			'1' => array('showitem' => 'competition, season, competition_season_gamedays,
									--div--;LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_competitionseason.tab_teams, competition_season_teams,
									--div--;LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.tab_visibility, hidden, detail_link'),
		),
		'palettes' => array(
			'1' => array('showitem' => ''),
		),
		'columns' => array(

			't3ver_label' => array(
				'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.versionLabel',
				'config' => array(
					'type' => 'input',
					'size' => 30,
					'max' => 255,
				)
			),
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
			'starttime' => array(
				'exclude' => 1,
				'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
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
				'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
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
			
			'competition' => array(
				'exclude' => 1,
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_competitionseason.competition',
				'config' => array(
					'eval' => 'required',
					'foreign_table' => 'tx_sportms_domain_model_competition',
					'foreign_table_where' => 'ORDER BY name ASC',
					'items' => Array (
						array("LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.select", ""),
					),
					'maxItems' => 1,
					'renderType' => 'selectSingle',
					'size' => 1,
					'type' => 'select',
				),
			),

			'season' => array(
				'exclude' => 1,
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_competitionseason.season',
				'config' => array(
					'eval' => 'required',
					'foreign_table' => 'tx_sportms_domain_model_season',
					'foreign_table_where' => 'ORDER BY season_name DESC',
					'items' => Array(
						array("LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.select", ""),
					),
					'maxItems' => 1,
					'renderType' => 'selectSingle',
					'size' => 1,
					'type' => 'select',
				),
			),
			'competition_season_gamedays' => array(
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_competitionseason.competition_season_gamedays',
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
					'foreign_field' => 'competition_season',
					'foreign_table' => 'tx_sportms_domain_model_competitionseasongameday',
					'type' => 'inline',
				),
			),

			'competition_season_teams' => [
				'exclude' => true,
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_competitionseason.competition_season_teams',
				'config' => [
					'type' => 'select',
					'renderType' => 'selectMultipleSideBySide',
					'foreign_table' => 'tx_sportms_domain_model_teamseason',
					'foreign_table_where' => '  AND tx_sportms_domain_model_teamseason.season = ###REC_FIELD_season###
												AND tx_sportms_domain_model_teamseason.team IN (SELECT uid FROM tx_sportms_domain_model_team WHERE section_age_level IN (SELECT section_age_level FROM tx_sportms_domain_model_competition WHERE uid = ###REC_FIELD_competition###))
												ORDER BY team ASC',
					'MM' => 'tx_sportms_competitionseason_teamseason_mm',
					'size' => 10,
					'autoSizeMax' => 30,
					'maxitems' => 9999,
					'multiple' => 0,
					'fieldControl' => [
						'editPopup' => [
							'disabled' => true,
						],
						'addRecord' => [
							'disabled' => true,
						],
						'listModule' => [
							'disabled' => true,
						],
					],
				],
			],

			'detail_link' => array(
				'exclude' => 1,
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.detail_link',
				'config' => array(
				    'default' => '1',
					'type' => 'check',
				),
			),

		),
	);