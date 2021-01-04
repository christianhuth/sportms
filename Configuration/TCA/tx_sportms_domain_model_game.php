<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

return array(
	'ctrl' => array(
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'default_sortby' => 'ORDER BY sport ASC, competition_season ASC, team_season_home ASC',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'iconfile' => 'EXT:sportms/Resources/Public/Icons/tx_sportms_domain_model_game.svg',
        'label' => '',
        'label_userFunc' => \Balumedien\Sportms\Configuration\TCA\UserFunc\UserFunc::class . '->GameLabel',
		'searchFields' => '',
		'title'	=> 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game',
		'tstamp' => 'tstamp',
		'versioningWS' => TRUE,
	),
	'interface' => array(
		'showRecordFieldList' => '',
	),
	'types' => array(
		'1' => array('showitem' => 'sport, season, competition_season,
		                            --div--;LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.tab_details, game_appointment, --palette--;LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.palette_gameday_date_time;gameday_date_time, --palette--;;venue_spectators, --palette--;LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.palette_periods;periods, game_periods,
		                            --div--;LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.tab_result,
		                                --palette--;LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.palette_result_end_regular;result_end_regular,
		                                --palette--;LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.palette_result_end_additional;result_end_additional,
		                                result_type,
		                                --palette--;LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.palette_result_halfs;result_halfs,
		                                --palette--;LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.palette_result_thirds;result_thirds,
		                                --palette--;LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.palette_result_fourths;result_fourths,
		                                --palette--;LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.palette_result_sets;result_sets,
		                                game_rating,
		                                --palette--;LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.palette_result_special;result_special,
		                            --div--;LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.tab_home, team_season_home, game_lineup_home_starts, game_lineup_home_substitutes, captain_home, trainer_home,
		                            --div--;LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.tab_guest, team_season_guest, game_lineup_guest_starts, game_lineup_guest_substitutes, captain_guest, trainer_guest,
		                            --div--;LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.tab_changes, game_changes,
		                            --div--;LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.tab_goals, game_goals,
		                            --div--;LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.tab_punishments, game_punishments,
		                            --div--;LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.tab_referees, game_referees,
		                            --div--;LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.tab_reports, game_reports,
		                            --div--;LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.tab_visibility, hidden, detail_link, slug,
		                            '),
	),
	'palettes' => array(
        'gameday_date_time' => array('showitem' => 'gameday, date, time'),
        'venue_spectators' => array('showitem' => 'venue, spectators'),
        'periods' => array('showitem' => 'period_count, period_duration'),
		'result_end_regular' => array('showitem' => 'result_end_regular_home, result_end_regular_guest, result_end_additional'),
		'result_end_additional' => array('showitem' => 'result_end_overtime_home, result_end_overtime_guest, result_end_penalty_home, result_end_penalty_guest'),
		'result_halfs' => array('showitem' => 'result_halfs_first_home, result_halfs_first_guest, result_halfs_second_home, result_halfs_second_guest'),
		'result_thirds' => array('showitem' => 'result_thirds_first_home, result_thirds_first_guest, result_thirds_second_home, result_thirds_second_guest, result_thirds_third_home, result_thirds_third_guest'),
		'result_fourths' => array('showitem' => 'result_fourths_first_home, result_fourths_first_guest, result_fourths_second_home, result_fourths_second_guest, result_fourths_third_home, result_fourths_third_guest, result_fourths_fourth_home, result_fourths_fourth_guest'),
		'result_sets' => array('showitem' => 'result_sets'),
		'result_special' => array('showitem' => 'result_special_home, result_special_guest'),
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
		
		'starttime' => array(
			'exclude' => 1,
            'label' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:starttime_formlabel',
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
            'label' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:endtime_formlabel',
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

		'sport' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_sport',
			'config' => array(
				'eval' => 'required',
				'foreign_table' => 'tx_sportms_domain_model_sport',
				'foreign_table_where' => 'ORDER BY label ASC',
				'items' => Array (
					array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.select', ""),
				),
				'maxItems' => 1,
				'minItems' => 1,
				'renderType' => 'selectSingle',
				'size' => 1,
				'type' => 'select',
			),
			'onChange' => 'reload',
		),
		'season' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_season',
            'config' => array(
                'eval' => 'required',
                'foreign_table' => 'tx_sportms_domain_model_season',
                'foreign_table_where' => 'ORDER BY tx_sportms_domain_model_season.label DESC',
                'items' => Array (
                    array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.select', ""),
                ),
                'maxItems' => 1,
                'minItems' => 1,
                'renderType' => 'selectSingle',
                'size' => 1,
                'type' => 'select',
            ),
            'onChange' => 'reload',
		),
        'competition_season' => array(
            'displayCond' => 'FIELD:season:>:0',
            'exclude' => 1,
            'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_competitionseason',
            'config' => array(
                'eval' => 'required',
                'foreign_table' => 'tx_sportms_domain_model_competitionseason',
	            'foreign_table_where' => '  AND tx_sportms_domain_model_competitionseason.season = ###REC_FIELD_season###
	                                        AND tx_sportms_domain_model_competitionseason.competition IN (SELECT competition FROM tx_sportms_domain_model_competition WHERE sport = ###REC_FIELD_sport###)
	                                        ORDER BY tx_sportms_domain_model_competitionseason.competition ASC',
                'items' => Array (
                    array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.select', ""),
                ),
                'maxItems' => 1,
                'minItems' => 1,
                'renderType' => 'selectSingle',
                'size' => 1,
                'type' => 'select',
            ),
            'onChange' => 'reload',
        ),
		
		'game_appointment' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.game_appointment',
			'config' => array(
				'items' => array(
					array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.game_appointment.planned', 1),
					array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.game_appointment.canceled', 2),
					array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.game_appointment.dropped', 3),
					array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.game_appointment.running', 4),
					array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.game_appointment.uncompleted', 5),
					array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.game_appointment.finished', 6),
				),
				'renderType' => 'selectSingle',
				'type' => 'select',
			),
		),
		'gameday' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_competitionseasongameday',
			'config' => array(
				'foreign_table' => 'tx_sportms_domain_model_competitionseasongameday',
				'foreign_table_where' => ' AND tx_sportms_domain_model_competitionseasongameday.competition_season = ###REC_FIELD_competition_season###
											ORDER BY tx_sportms_domain_model_competitionseasongameday.sorting ASC',
				'items' => Array (
					array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.select', ""),
				),
				'maxItems' => 1,
				'minItems' => 1,
				'renderType' => 'selectSingle',
				'size' => 1,
				'type' => 'select',
			),
			'onChange' => 'reload',
		),
        'date' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.date',
            'config' => array(
                'eval' => 'date',
                'placeholder' => 'dd-mm-yyyy',
                'renderType' => 'inputDateTime',
                'size' => 10,
                'type' => 'input',
            ),
        ),
        'time' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.time',
            'config' => array(
                'eval' => 'time',
                'placeholder' => 'hh:mm',
                'renderType' => 'inputDateTime',
                'size' => 10,
                'type' => 'input',
            ),
        ),
        'venue' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_venue',
            'config' => array(
                'foreign_table' => 'tx_sportms_domain_model_venue',
                'foreign_table_where' => 'ORDER BY name ASC',
                'items' => Array (
                    array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.select', ''),
                ),
                'renderType' => 'selectSingle',
                'size' => 1,
                'type' => 'select',
            ),
        ),
        'spectators' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.spectators',
            'config' => array(
                'default' => null,
                'eval' => 'null',
                'range' => array(
                    'lower' => '0',
                    'upper' => '1000000',
                ),
                'size' => 10,
                'type' => 'input',
            ),
        ),
		'period_count' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.period_count',
			'config' => array(
				'default' => null,
				'eval' => 'null',
				'range' => array(
					'lower' => '1',
					'upper' => '1000',
				),
				'size' => 10,
				'type' => 'input',
			),
		),
		'period_duration' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.period_duration',
			'config' => array(
				'default' => null,
				'eval' => 'null',
				'range' => array(
					'lower' => '1',
					'upper' => '1000',
				),
				'size' => 10,
				'type' => 'input',
			),
		),
		'game_periods' => array(
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_gameperiods',
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
				'foreign_field' => 'game',
				'foreign_sortby' => 'sorting',
				'foreign_table' => 'tx_sportms_domain_model_gameperiod',
				'type' => 'inline',
			),
		),

		'result_end_regular_home' => array(
			'config' => array(
				'default' => null,
				'eval' => 'null',
				'range' => array(
					'lower' => '0',
					'upper' => '1000',
				),
				'size' => 10,
				'type' => 'input',
			),
			'exclude' => 1,
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.result_end_regular_home',
		),
		'result_end_regular_guest' => array(
			'config' => array(
				'default' => null,
				'eval' => 'null',
				'range' => array(
					'lower' => '0',
					'upper' => '1000',
				),
				'size' => 10,
				'type' => 'input',
			),
			'exclude' => 1,
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.result_end_regular_guest',
		),
		'result_end_additional' => array(
			'config' => array(
				'default' => FALSE,
				'renderType' => 'checkboxToggle',
				'type' => 'check',
			),
			'exclude' => 1,
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.result_end_additional',
			'onChange' => 'reload',
		),
		'result_end_overtime_home' => array(
			'displayCond' => 'FIELD:result_end_additional:=:1',
			'exclude' => 1,
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.result_end_overtime_home',
			'config' => array(
				'default' => null,
				'eval' => 'null',
				'range' => array(
					'lower' => '0',
					'upper' => '1000',
				),
				'size' => 10,
				'type' => 'input',
			),
		),
		'result_end_overtime_guest' => array(
			'displayCond' => 'FIELD:result_end_additional:=:1',
			'exclude' => 1,
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.result_end_overtime_guest',
			'config' => array(
				'default' => null,
				'eval' => 'null',
				'range' => array(
					'lower' => '0',
					'upper' => '1000',
				),
				'size' => 10,
				'type' => 'input',
			),
		),
		'result_end_penalty_home' => array(
			'displayCond' => 'FIELD:result_end_additional:=:1',
			'exclude' => 1,
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.result_end_penalty_home',
			'config' => array(
				'default' => null,
				'eval' => 'null',
				'range' => array(
					'lower' => '0',
					'upper' => '1000',
				),
				'size' => 10,
				'type' => 'input',
			),
		),
		'result_end_penalty_guest' => array(
			'displayCond' => 'FIELD:result_end_additional:=:1',
			'exclude' => 1,
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.result_end_penalty_guest',
			'config' => array(
				'default' => null,
				'eval' => 'null',
				'range' => array(
					'lower' => '0',
					'upper' => '1000',
				),
				'size' => 10,
				'type' => 'input',
			),
		),
        'result_type' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.result_type',
            'config' => array(
                'default' => '2',
                'eval' => 'required',
                'items' => array(
                    array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.result_type_halfs', 2),
                    array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.result_type_thirds', 3),
                    array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.result_type_quarters', 4),
                    array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.result_type_sets', -10),
                ),
                'renderType' => 'selectSingle',
                'type' => 'select',
            ),
            'onChange' => 'reload',
        ),
        'result_halfs_first_home' => array(
            'displayCond' => 'FIELD:result_type:=:2',
            'exclude' => 1,
            'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.result_halfs_first_home',
            'config' => array(
                'default' => null,
                'eval' => 'null',
                'range' => array(
                    'lower' => '0',
                    'upper' => '1000',
                ),
                'size' => 10,
                'type' => 'input',
            ),
        ),
        'result_halfs_first_guest' => array(
            'displayCond' => 'FIELD:result_type:=:2',
            'exclude' => 1,
            'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.result_halfs_first_guest',
            'config' => array(
                'default' => null,
                'eval' => 'null',
                'range' => array(
                    'lower' => '0',
                    'upper' => '1000',
                ),
                'size' => 10,
                'type' => 'input',
            ),
        ),
        'result_halfs_second_home' => array(
            'displayCond' => 'FIELD:result_type:=:2',
            'exclude' => 1,
            'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.result_halfs_second_home',
            'config' => array(
                'default' => null,
                'eval' => 'null',
                'range' => array(
                    'lower' => '0',
                    'upper' => '1000',
                ),
                'size' => 10,
                'type' => 'input',
            ),
        ),
        'result_halfs_second_guest' => array(
            'displayCond' => 'FIELD:result_type:=:2',
            'exclude' => 1,
            'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.result_halfs_second_guest',
            'config' => array(
                'default' => null,
                'eval' => 'null',
                'range' => array(
                    'lower' => '0',
                    'upper' => '1000',
                ),
                'size' => 10,
                'type' => 'input',
            ),
        ),
        'result_thirds_first_home' => array(
            'displayCond' => 'FIELD:result_type:=:3',
            'exclude' => 1,
            'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.result_thirds_first_home',
            'config' => array(
	            'default' => null,
	            'eval' => 'null',
                'range' => array(
                    'lower' => '0',
                    'upper' => '1000',
                ),
                'size' => 10,
                'type' => 'input',
            ),
        ),
        'result_thirds_first_guest' => array(
            'displayCond' => 'FIELD:result_type:=:3',
            'exclude' => 1,
            'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.result_thirds_first_guest',
            'config' => array(
	            'default' => null,
	            'eval' => 'null',
                'range' => array(
                    'lower' => '0',
                    'upper' => '1000',
                ),
                'size' => 10,
                'type' => 'input',
            ),
        ),
        'result_thirds_second_home' => array(
            'displayCond' => 'FIELD:result_type:=:3',
            'exclude' => 1,
            'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.result_thirds_second_home',
            'config' => array(
	            'default' => null,
	            'eval' => 'null',
                'range' => array(
                    'lower' => '0',
                    'upper' => '1000',
                ),
                'size' => 10,
                'type' => 'input',
            ),
        ),
        'result_thirds_second_guest' => array(
            'displayCond' => 'FIELD:result_type:=:3',
            'exclude' => 1,
            'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.result_thirds_second_guest',
            'config' => array(
	            'default' => null,
	            'eval' => 'null',
                'range' => array(
                    'lower' => '0',
                    'upper' => '1000',
                ),
                'size' => 10,
                'type' => 'input',
            ),
        ),
        'result_thirds_third_home' => array(
            'displayCond' => 'FIELD:result_type:=:3',
            'exclude' => 1,
            'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.result_thirds_third_home',
            'config' => array(
	            'default' => null,
	            'eval' => 'null',
                'range' => array(
                    'lower' => '0',
                    'upper' => '1000',
                ),
                'size' => 10,
                'type' => 'input',
            ),
        ),
		'result_thirds_third_guest' => array(
			'displayCond' => 'FIELD:result_type:=:3',
			'exclude' => 1,
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.result_thirds_third_guest',
			'config' => array(
				'default' => null,
				'eval' => 'null',
				'range' => array(
					'lower' => '0',
					'upper' => '1000',
				),
				'size' => 10,
				'type' => 'input',
			),
		),
		'result_fourths_first_home' => array(
			'displayCond' => 'FIELD:result_type:=:4',
			'exclude' => 1,
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.result_fourths_first_home',
			'config' => array(
				'default' => null,
				'eval' => 'null',
				'range' => array(
					'lower' => '0',
					'upper' => '1000',
				),
				'size' => 10,
				'type' => 'input',
			),
		),
		'result_fourths_first_guest' => array(
			'displayCond' => 'FIELD:result_type:=:4',
			'exclude' => 1,
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.result_fourths_first_guest',
			'config' => array(
				'default' => null,
				'eval' => 'null',
				'range' => array(
					'lower' => '0',
					'upper' => '1000',
				),
				'size' => 10,
				'type' => 'input',
			),
		),
		'result_fourths_second_home' => array(
			'displayCond' => 'FIELD:result_type:=:4',
			'exclude' => 1,
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.result_fourths_second_home',
			'config' => array(
				'default' => null,
				'eval' => 'null',
				'range' => array(
					'lower' => '0',
					'upper' => '1000',
				),
				'size' => 10,
				'type' => 'input',
			),
		),
		'result_fourths_second_guest' => array(
			'displayCond' => 'FIELD:result_type:=:4',
			'exclude' => 1,
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.result_fourths_second_guest',
			'config' => array(
				'default' => null,
				'eval' => 'null',
				'range' => array(
					'lower' => '0',
					'upper' => '1000',
				),
				'size' => 10,
				'type' => 'input',
			),
		),
		'result_fourths_third_home' => array(
			'displayCond' => 'FIELD:result_type:=:4',
			'exclude' => 1,
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.result_fourths_third_home',
			'config' => array(
				'default' => null,
				'eval' => 'null',
				'range' => array(
					'lower' => '0',
					'upper' => '1000',
				),
				'size' => 10,
				'type' => 'input',
			),
		),
		'result_fourths_third_guest' => array(
			'displayCond' => 'FIELD:result_type:=:4',
			'exclude' => 1,
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.result_fourths_third_guest',
			'config' => array(
				'default' => null,
				'eval' => 'null',
				'range' => array(
					'lower' => '0',
					'upper' => '1000',
				),
				'size' => 10,
				'type' => 'input',
			),
		),
		'result_fourths_fourth_home' => array(
			'displayCond' => 'FIELD:result_type:=:4',
			'exclude' => 1,
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.result_fourths_fourth_home',
			'config' => array(
				'default' => null,
				'eval' => 'null',
				'range' => array(
					'lower' => '0',
					'upper' => '1000',
				),
				'size' => 10,
				'type' => 'input',
			),
		),
		'result_fourths_fourth_guest' => array(
			'displayCond' => 'FIELD:result_type:=:4',
			'exclude' => 1,
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.result_fourths_fourth_guest',
			'config' => array(
				'default' => null,
				'eval' => 'null',
				'range' => array(
					'lower' => '0',
					'upper' => '1000',
				),
				'size' => 10,
				'type' => 'input',
			),
		),
		'result_sets' => array(
			'displayCond' => 'FIELD:result_type:=:-10',
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.result_sets',
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
				'foreign_default_sortby' => 'ORDER BY set_number ASC',
				'foreign_field' => 'game',
				'foreign_table' => 'tx_sportms_domain_model_gameresultset',
				'type' => 'inline',
			),
		),
		'game_rating' => array(
			'config' => array(
				'items' => array(
					array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.game_rating.normal', 1),
					array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.game_rating.special', 2),
					array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.game_rating.invalid', 3),
				),
				'renderType' => 'selectSingle',
				'type' => 'select',
			),
			'exclude' => TRUE,
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.game_rating',
			'onChange' => 'reload',
		),
		'result_special_home' => array(
			'config' => array(
				'default' => null,
				'eval' => 'null',
				'range' => array(
					'lower' => '0',
					'upper' => '1000',
				),
				'size' => 10,
				'type' => 'input',
			),
			'displayCond' => 'FIELD:game_rating:=:2',
			'exclude' => 1,
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.result_special_home',
		),
		'result_special_guest' => array(
			'config' => array(
				'default' => null,
				'eval' => 'null',
				'range' => array(
					'lower' => '0',
					'upper' => '1000',
				),
				'size' => 10,
				'type' => 'input',
			),
			'displayCond' => 'FIELD:game_rating:=:2',
			'exclude' => 1,
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.result_special_guest',
		),

        'team_season_home' => array(
            'displayCond' => 'FIELD:competition_season:>:0',
            'exclude' => 1,
            'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.team_season_home',
            'config' => array(
                'eval' => 'required',
                'foreign_table' => 'tx_sportms_domain_model_teamseason',
                'foreign_table_where' => '  AND tx_sportms_domain_model_teamseason.uid IN (SELECT uid_foreign FROM tx_sportms_competitionseason_teamseason_mm WHERE uid_local = ###REC_FIELD_competition_season###)
	                                        AND tx_sportms_domain_model_teamseason.season = ###REC_FIELD_season###
	                                        ORDER BY tx_sportms_domain_model_teamseason.team ASC',
                'items' => Array (
                    array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.select', 0),
                ),
                'maxItems' => 1,
                'minItems' => 1,
                'renderType' => 'selectSingle',
                'size' => 1,
                'type' => 'select',
            ),
            'onChange' => 'reload',
        ),
		'game_lineup_home_starts' => array(
			'displayCond' => 'FIELD:team_season_home:>:0',
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.game_lineup_home_starts',
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
				'foreign_field' => 'game',
				'foreign_match_fields' => array(
					'team' => 'home',
					'type' => 'start',
				),
				'foreign_sortby' => 'sorting',
				'foreign_table' => 'tx_sportms_domain_model_gamelineup',
				'overrideChildTca' => [
					'columns' => [
						'person' => array(
							'config' => array(
								'foreign_table_where' => 'AND tx_sportms_domain_model_person.uid IN (SELECT tx_sportms_domain_model_teamseasonsquadmember.person FROM tx_sportms_domain_model_teamseasonsquadmember WHERE tx_sportms_domain_model_teamseasonsquadmember.team_season = (SELECT tx_sportms_domain_model_game.team_season_home FROM tx_sportms_domain_model_game WHERE tx_sportms_domain_model_game.uid = ###REC_FIELD_game###))',
							),
						),
					],
				],
				'type' => 'inline',
			),
		),
		'game_lineup_home_substitutes' => array(
			'displayCond' => 'FIELD:team_season_home:>:0',
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.game_lineup_home_substitutes',
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
				'foreign_field' => 'game',
				'foreign_match_fields' => array(
					'team' => 'home',
					'type' => 'substitute',
				),
				'foreign_sortby' => 'sorting',
				'foreign_table' => 'tx_sportms_domain_model_gamelineup',
				'overrideChildTca' => [
					'columns' => [
						'person' => array(
							'config' => array(
								'foreign_table_where' => 'AND tx_sportms_domain_model_person.uid IN (SELECT tx_sportms_domain_model_teamseasonsquadmember.person FROM tx_sportms_domain_model_teamseasonsquadmember WHERE tx_sportms_domain_model_teamseasonsquadmember.team_season = (SELECT tx_sportms_domain_model_game.team_season_home FROM tx_sportms_domain_model_game WHERE tx_sportms_domain_model_game.uid = ###REC_FIELD_game###))',
							),
						),
					],
				],
				'type' => 'inline',
			),
		),
		'captain_home' => array(
			'displayCond' => 'FIELD:team_season_home:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.captain',
			'config' => array(
				'foreign_table' => 'tx_sportms_domain_model_person',
				'foreign_table_where' => 'AND tx_sportms_domain_model_person.uid IN (SELECT tx_sportms_domain_model_gamelineup.person FROM tx_sportms_domain_model_gamelineup WHERE tx_sportms_domain_model_gamelineup.team = "home" AND tx_sportms_domain_model_gamelineup.game = ###THIS_UID###)',
				'items' => Array (
					array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.select', 0),
				),
				'maxItems' => 1,
				'minItems' => 0,
				'renderType' => 'selectSingle',
				'size' => 1,
				'type' => 'select',
			),
		),
        'trainer_home' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.trainer_home',
            'config' => array(
                'foreign_table' => 'tx_sportms_domain_model_person',
                'foreign_table_where' => ' AND tx_sportms_domain_model_person.uid IN (SELECT tx_sportms_domain_model_teamseasonofficial.person FROM tx_sportms_domain_model_teamseasonofficial WHERE tx_sportms_domain_model_teamseasonofficial.team_season = ###REC_FIELD_team_season_home###)',
                'items' => Array (
                    array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.select', 0),
                ),
                'maxItems' => 1,
                'minItems' => 0,
                'renderType' => 'selectSingle',
                'size' => 1,
                'type' => 'select',
            ),
        ),

        'team_season_guest' => array(
            'displayCond' => array(
                'AND' => array(
                    'FIELD:competition_season:>:0',
                    'FIELD:team_season_home:>:0',
                ),
            ),
            'exclude' => 1,
            'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.team_season_guest',
            'config' => array(
                'eval' => 'required',
                'foreign_table' => 'tx_sportms_domain_model_teamseason',
                'foreign_table_where' => '  AND tx_sportms_domain_model_teamseason.uid IN (SELECT uid_foreign FROM tx_sportms_competitionseason_teamseason_mm WHERE uid_local = ###REC_FIELD_competition_season###)
                                            AND tx_sportms_domain_model_teamseason.uid != ###REC_FIELD_team_season_home###
	                                        AND tx_sportms_domain_model_teamseason.season = ###REC_FIELD_season###
											ORDER BY tx_sportms_domain_model_teamseason.team ASC',
                'items' => Array (
                    array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.select', 0),
                ),
                'maxItems' => 1,
                'minItems' => 1,
                'renderType' => 'selectSingle',
                'size' => 1,
                'type' => 'select',
            ),
            'onChange' => 'reload',
        ),
		'game_lineup_guest_starts' => array(
			'displayCond' => 'FIELD:team_season_guest:>:0',
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.game_lineup_guest_starts',
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
				'foreign_field' => 'game',
				'foreign_match_fields' => array(
					'team' => 'guest',
		            'type' => 'start',
				),
				'foreign_sortby' => 'sorting',
				'foreign_table' => 'tx_sportms_domain_model_gamelineup',
				'overrideChildTca' => [
					'columns' => [
						'person' => array(
							'config' => array(
								'foreign_table_where' => 'AND tx_sportms_domain_model_person.uid IN (SELECT tx_sportms_domain_model_teamseasonsquadmember.person FROM tx_sportms_domain_model_teamseasonsquadmember WHERE tx_sportms_domain_model_teamseasonsquadmember.team_season = (SELECT tx_sportms_domain_model_game.team_season_guest FROM tx_sportms_domain_model_game WHERE tx_sportms_domain_model_game.uid = ###REC_FIELD_game###))',
							),
						),
					],
				],
				'type' => 'inline',
			),
		),
		'game_lineup_guest_substitutes' => array(
			'displayCond' => 'FIELD:team_season_guest:>:0',
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.game_lineup_guest_substitutes',
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
				'foreign_field' => 'game',
				'foreign_match_fields' => array(
					'team' => 'guest',
		            'type' => 'substitute',
				),
				'foreign_sortby' => 'sorting',
				'foreign_table' => 'tx_sportms_domain_model_gamelineup',
				'overrideChildTca' => [
					'columns' => [
						'person' => array(
							'config' => array(
								'foreign_table_where' => 'AND tx_sportms_domain_model_person.uid IN (SELECT tx_sportms_domain_model_teamseasonsquadmember.person FROM tx_sportms_domain_model_teamseasonsquadmember WHERE tx_sportms_domain_model_teamseasonsquadmember.team_season = (SELECT tx_sportms_domain_model_game.team_season_guest FROM tx_sportms_domain_model_game WHERE tx_sportms_domain_model_game.uid = ###REC_FIELD_game###))',
							),
						),
					],
				],
				'type' => 'inline',
			),
		),
		'captain_guest' => array(
			'displayCond' => 'FIELD:team_season_guest:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.captain',
			'config' => array(
				'foreign_table' => 'tx_sportms_domain_model_person',
				'foreign_table_where' => 'AND tx_sportms_domain_model_person.uid IN (SELECT tx_sportms_domain_model_gamelineup.person FROM tx_sportms_domain_model_gamelineup WHERE tx_sportms_domain_model_gamelineup.team = "guest" AND tx_sportms_domain_model_gamelineup.game = ###THIS_UID###)',
				'items' => Array (
					array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.select', 0),
				),
				'maxItems' => 1,
				'minItems' => 0,
				'renderType' => 'selectSingle',
				'size' => 1,
				'type' => 'select',
			),
		),
        'trainer_guest' => array(
			'displayCond' => 'FIELD:team_season_guest:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.trainer_guest',
			'config' => array(
				'foreign_table' => 'tx_sportms_domain_model_person',
				'foreign_table_where' => ' AND tx_sportms_domain_model_person.uid IN (SELECT tx_sportms_domain_model_teamseasonofficial.person FROM tx_sportms_domain_model_teamseasonofficial WHERE tx_sportms_domain_model_teamseasonofficial.team_season = ###REC_FIELD_team_season_guest###)',
				'items' => Array (
					array('LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.select', 0),
				),
				'maxItems' => 1,
				'minItems' => 0,
				'renderType' => 'selectSingle',
				'size' => 1,
				'type' => 'select',
			),
		),

		'game_changes' => array(
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.game_changes',
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
				),
				'foreign_field' => 'game',
				'foreign_table' => 'tx_sportms_domain_model_gamechange',
				'type' => 'inline',
			),
		),

		'game_goals' => array(
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.game_goals',
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
				),
				'foreign_field' => 'game',
				'foreign_table' => 'tx_sportms_domain_model_gamegoal',
				'type' => 'inline',
			),
		),

		'game_punishments' => array(
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.game_punishments',
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
				),
				'foreign_field' => 'game',
				'foreign_table' => 'tx_sportms_domain_model_gamepunishment',
				'type' => 'inline',
			),
		),

        'game_referees' => array(
            'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.game_referees',
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
                'foreign_field' => 'game',
	            'foreign_sortby' => 'sorting',
                'foreign_table' => 'tx_sportms_domain_model_gamereferee',
                'type' => 'inline',
            ),
        ),

        'game_reports' => array(
            'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_game.game_reports',
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
                'foreign_field' => 'game',
	            'foreign_sortby' => 'sorting',
                'foreign_table' => 'tx_sportms_domain_model_gamereport',
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
		
		'slug' => [
			'exclude' => true,
			'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.slug',
			'config' => [
				'default' => '',
				'fallbackCharacter' => '-',
				'generatorOptions' => [
					'fields' => ['uid', 'team_season_home', 'team_season_guest'],
					'fieldSeparator' => '_',
					'prefixParentPageSlug' => false,
					'replacements' => [
						'/' => '-',
					],
				],
				'prependSlash' => false,
				'type' => 'slug',
			],
		],
		
	),
);
