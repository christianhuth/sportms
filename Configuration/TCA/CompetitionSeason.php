<?php

	use Balumedien\Clubms\Configuration\TCA\UserFunc\UserFunc;

	if (!defined('TYPO3_MODE')) {
		die ('Access denied.');
	}

	$GLOBALS['TCA']['tx_clubms_domain_model_competitionseason'] = array(
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
			'iconfile' => 'EXT:clubms/Resources/Public/Icons/tx_clubms_domain_model_teamseason.svg',
			'label' => '',
			'label_userFunc' => UserFunc::class . '->CompetitionSeasonLabel',
			'searchFields' => '',
            'sortby' => 'ordering',
			'title' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_competitionseason',
			'tstamp' => 'tstamp',
			'versioningWS' => TRUE,
		),
		'interface' => array(
			'showRecordFieldList' => '',
		),
		'types' => array(
			'1' => array('showitem' => 'season, max_teams, gamedays,
									--div--;LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_competitionseason.tab_teams, competition_season_teams,
									--div--;LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_competitionseason.tab_games, games,
									--div--;LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_competitionseason.tab_visibility, hidden, detail_link'),
		),
		'palettes' => array(
			'1' => array('showitem' => ''),
		),
		'columns' => array(

			't3ver_label' => array(
				'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
				'config' => array(
					'type' => 'input',
					'size' => 30,
					'max' => 255,
				)
			),
			'hidden' => array(
				'exclude' => 1,
				'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
				'config' => array(
					'type' => 'check',
				),
			),
			'starttime' => array(
				'exclude' => 1,
				'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
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
				'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
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
				'config' => array(
					'type' => 'passthrough',
				),
			),
			'season' => array(
				'exclude' => 1,
				'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_competitionseason.season',
				'config' => array(
					'eval' => 'required',
					'foreign_table' => 'tx_clubms_domain_model_season',
					'foreign_table_where' => 'ORDER BY season_name DESC',
					'items' => Array(
						array("LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_general.select", ""),
					),
					'maxItems' => 1,
					'renderType' => 'selectSingle',
					'size' => 1,
					'type' => 'select',
				),
			),
			'max_teams' => array(
				'exclude' => 1,
				'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_competitionseason.max_teams',
				'config' => array(
					'type' => 'input',
					'size' => 30,
					'eval' => 'int, trim'
				),
			),
			'gamedays' => array(
				'exclude' => 1,
				'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_competitionseason.gamedays',
				'config' => array(
					'type' => 'input',
					'size' => 30,
					'eval' => 'int, trim'
				),
			),

			'competition_season_teams' => [
				'exclude' => true,
				'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_competitionseason.competition_season_teams',
				'config' => [
					'type' => 'select',
					'renderType' => 'selectMultipleSideBySide',
					'foreign_table' => 'tx_clubms_domain_model_teamseason',
					'foreign_table_where' => ' AND tx_clubms_domain_model_teamseason.season = ###REC_FIELD_season### ORDER BY team ASC',
					'MM' => 'tx_clubms_competitionseason_teamseason_mm',
					'size' => 10,
					'autoSizeMax' => 30,
					'maxitems' => 9999,
					'multiple' => 0,
					'fieldControl' => [
						'editPopup' => [
							'disabled' => false,
						],
						'addRecord' => [
							'disabled' => false,
						],
						'listModule' => [
							'disabled' => true,
						],
					],
				],
			],

			'games' => array(
				'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_competitionseason.games',
				'config' => array(
					'appearance' => array(
						'levelLinksPosition' => 'bottom',
					),
					'foreign_field' => 'competition_season',
					'foreign_table' => 'tx_clubms_domain_model_game',
					'type' => 'inline',
				),
			),

			'detail_link' => array(
				'exclude' => 1,
				'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_competitionseason.detail_link',
				'config' => array(
				    'default' => '1',
					'type' => 'check',
				),
			),

		),
	);
