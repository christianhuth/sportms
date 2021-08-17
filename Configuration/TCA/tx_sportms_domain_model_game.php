<?php
    
    use Balumedien\Sportms\UserFunc\UserFunc;
    
    if (!defined('TYPO3_MODE')) {
        die ('Access denied.');
    }
    
    return [
        'ctrl' => [
            'crdate' => 'crdate',
            'cruser_id' => 'cruser_id',
            'default_sortby' => 'ORDER BY sport ASC, competition_season ASC, team_season_home ASC',
            'delete' => 'deleted',
            'enablecolumns' => [
                'disabled' => 'hidden',
                'starttime' => 'starttime',
                'endtime' => 'endtime',
            ],
            'iconfile' => 'EXT:sportms/Resources/Public/Icons/tx_sportms_domain_model_game.svg',
            'label' => '',
            'label_userFunc' => UserFunc::class . '->GameLabel',
            'searchFields' => '',
            'title' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_game',
            'tstamp' => 'tstamp',
            'versioningWS' => true,
        ],
        'types' => [
            '1' => [
                'showitem' => ' --div--;LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.tab.general,
                                    sport,
                                    season,
                                    competition_season,
                                --div--;LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.tab.details,
                                    game_appointment,
                                    --palette--;LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_domain_model_game.palette.gameday_date_time;gameday_date_time,
                                    --palette--;;venue_spectators,
                                    --palette--;LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_gameperiod.plural;periods,
                                    game_periods,
                                --div--;LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_game.result,
                                    game_rating,
                                    --palette--;LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_domain_model_game.palette.result_special;result_special,
                                    --palette--;LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_domain_model_game.palette.result_end_regular;result_end_regular,
                                    --palette--;LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_domain_model_game.palette.result_end_additional;result_end_additional,
                                    result_type,
                                    --palette--;LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_domain_model_game.palette.result_halfs;result_halfs,
                                    --palette--;LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_domain_model_game.palette.result_thirds;result_thirds,
                                    --palette--;LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_domain_model_game.palette.result_fourths;result_fourths,
                                    --palette--;LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_domain_model_game.palette.result_sets;result_sets,
                                --div--;LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_domain_model_game.tab.home,
                                    team_season_home,
                                    game_lineup_home_starts,
                                    game_lineup_home_substitutes,
                                    captain_home,
                                    trainer_home,
                                --div--;LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_domain_model_game.tab.guest,
                                    team_season_guest,
                                    game_lineup_guest_starts,
                                    game_lineup_guest_substitutes,
                                    captain_guest,
                                    trainer_guest,
                                --div--;LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_gamechange.plural,
                                    game_changes,
                                --div--;LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_gamegoal.plural,
                                    game_goals,
                                --div--;LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_gamepunishment.plural,
                                    game_punishments,
                                --div--;LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_gamereferee.plural,
                                    game_referees,
                                --div--;LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_gamereport,
                                    game_report,
                                --div--;LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.tab.visibility,
                                    --palette--;LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.palette.visibility_general;visibility_general,
                                    --palette--;LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.palette.visibility_detail;visibility_detail,',
            ],
        ],
        'palettes' => [
            'gameday_date_time' => ['showitem' => 'gameday, date, time'],
            'venue_spectators' => ['showitem' => 'venue, spectators'],
            'periods' => ['showitem' => 'period_count, period_duration'],
            'result_end_regular' => ['showitem' => 'result_end_regular_home, result_end_regular_guest, result_end_additional'],
            'result_end_additional' => ['showitem' => 'result_end_overtime_home, result_end_overtime_guest, result_end_penalty_home, result_end_penalty_guest'],
            'result_halfs' => ['showitem' => 'result_halfs_first_home, result_halfs_first_guest, result_halfs_second_home, result_halfs_second_guest'],
            'result_thirds' => ['showitem' => 'result_thirds_first_home, result_thirds_first_guest, result_thirds_second_home, result_thirds_second_guest, result_thirds_third_home, result_thirds_third_guest'],
            'result_fourths' => ['showitem' => 'result_fourths_first_home, result_fourths_first_guest, result_fourths_second_home, result_fourths_second_guest, result_fourths_third_home, result_fourths_third_guest, result_fourths_fourth_home, result_fourths_fourth_guest'],
            'result_sets' => ['showitem' => 'result_sets'],
            'result_special' => ['showitem' => 'result_special_home, result_special_guest, result_special_reason'],
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
                'exclude' => true,
                'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.visible',
                'config' => [
                    'items' => [
                        [
                            0 => '',
                            1 => '',
                            'invertStateDisplay' => true,
                        ],
                    ],
                    'renderType' => 'checkboxToggle',
                    'type' => 'check',
                ],
            ],
            'starttime' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
                'config' => [
                    'behaviour' => [
                        'allowLanguageSynchronization' => true,
                    ],
                    'type' => 'input',
                    'size' => 13,
                    'eval' => 'datetime',
                    'checkbox' => 0,
                    'default' => 0,
                    'range' => [
                        'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y')),
                    ],
                    'renderType' => 'inputDateTime',
                ],
            ],
            'endtime' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
                'config' => [
                    'behaviour' => [
                        'allowLanguageSynchronization' => true,
                    ],
                    'type' => 'input',
                    'size' => 13,
                    'eval' => 'datetime',
                    'checkbox' => 0,
                    'default' => 0,
                    'range' => [
                        'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y')),
                    ],
                    'renderType' => 'inputDateTime',
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
                        ['LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_select.something', ""],
                    ],
                    'maxItems' => 1,
                    'minItems' => 1,
                    'renderType' => 'selectSingle',
                    'size' => 1,
                    'type' => 'select',
                ],
                'onChange' => 'reload',
            ],
            'season' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_season',
                'config' => [
                    'eval' => 'required',
                    'foreign_table' => 'tx_sportms_domain_model_season',
                    'foreign_table_where' => 'ORDER BY tx_sportms_domain_model_season.label DESC',
                    'items' => [
                        ['LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_select.something', ""],
                    ],
                    'maxItems' => 1,
                    'minItems' => 1,
                    'renderType' => 'selectSingle',
                    'size' => 1,
                    'type' => 'select',
                ],
                'onChange' => 'reload',
            ],
            'competition_season' => [
                'displayCond' => 'FIELD:season:>:0',
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_competitionseason',
                'config' => [
                    'eval' => 'required',
                    'foreign_table' => 'tx_sportms_domain_model_competitionseason',
                    'foreign_table_where' => '  AND tx_sportms_domain_model_competitionseason.season = ###REC_FIELD_season###
	                                        AND tx_sportms_domain_model_competitionseason.competition IN (SELECT competition FROM tx_sportms_domain_model_competition WHERE sport = ###REC_FIELD_sport###)
	                                        ORDER BY tx_sportms_domain_model_competitionseason.competition ASC',
                    'items' => [
                        ['LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_select.something', ""],
                    ],
                    'maxItems' => 1,
                    'minItems' => 1,
                    'renderType' => 'selectSingle',
                    'size' => 1,
                    'type' => 'select',
                ],
                'onChange' => 'reload',
            ],
            
            'game_appointment' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_domain_model_game.game_appointment',
                'config' => [
                    'items' => [
                        [
                            'LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_domain_model_game.game_appointment.planned',
                            1,
                        ],
                        [
                            'LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_domain_model_game.game_appointment.canceled',
                            2,
                        ],
                        [
                            'LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_domain_model_game.game_appointment.dropped',
                            3,
                        ],
                        [
                            'LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_domain_model_game.game_appointment.running',
                            4,
                        ],
                        [
                            'LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_domain_model_game.game_appointment.uncompleted',
                            5,
                        ],
                        [
                            'LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_domain_model_game.game_appointment.finished',
                            6,
                        ],
                    ],
                    'renderType' => 'selectSingle',
                    'type' => 'select',
                ],
            ],
            'gameday' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_competitionseasongameday',
                'config' => [
                    'foreign_table' => 'tx_sportms_domain_model_competitionseasongameday',
                    'foreign_table_where' => ' AND tx_sportms_domain_model_competitionseasongameday.competition_season = ###REC_FIELD_competition_season###
											ORDER BY tx_sportms_domain_model_competitionseasongameday.sorting ASC',
                    'items' => [
                        ['LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_select.something', ""],
                    ],
                    'maxItems' => 1,
                    'minItems' => 1,
                    'renderType' => 'selectSingle',
                    'size' => 1,
                    'type' => 'select',
                ],
            ],
            'date' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_general.date',
                'config' => [
                    'eval' => 'date',
                    'placeholder' => 'dd-mm-yyyy',
                    'renderType' => 'inputDateTime',
                    'size' => 10,
                    'type' => 'input',
                ],
            ],
            'time' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.time',
                'config' => [
                    'dbType' => 'time',
                    'eval' => 'required, time',
                    'placeholder' => 'hh:mm',
                    'renderType' => 'inputDateTime',
                    'size' => 10,
                    'type' => 'input',
                ],
            ],
            'venue' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_venue',
                'config' => [
                    'foreign_table' => 'tx_sportms_domain_model_venue',
                    'foreign_table_where' => 'ORDER BY name ASC',
                    'items' => [
                        ['LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_select.something', ''],
                    ],
                    'renderType' => 'selectSingle',
                    'size' => 1,
                    'type' => 'select',
                ],
            ],
            'spectators' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_game.spectators',
                'config' => [
                    'default' => null,
                    'eval' => 'null',
                    'range' => [
                        'lower' => '0',
                        'upper' => '1000000',
                    ],
                    'size' => 10,
                    'type' => 'input',
                ],
            ],
            'period_count' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_game.period_count',
                'config' => [
                    'default' => null,
                    'eval' => 'null',
                    'range' => [
                        'lower' => '1',
                        'upper' => '1000',
                    ],
                    'size' => 10,
                    'type' => 'input',
                ],
            ],
            'period_duration' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_game.period_duration',
                'config' => [
                    'default' => null,
                    'eval' => 'null',
                    'range' => [
                        'lower' => '1',
                        'upper' => '1000',
                    ],
                    'size' => 10,
                    'type' => 'input',
                ],
            ],
            'game_periods' => [
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_gameperiod.plural',
                'config' => [
                    'appearance' => [
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
                    ],
                    'foreign_field' => 'game',
                    'foreign_sortby' => 'sorting',
                    'foreign_table' => 'tx_sportms_domain_model_gameperiod',
                    'type' => 'inline',
                ],
            ],
            
            'game_rating' => [
                'config' => [
                    'items' => [
                        [
                            'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_game.game_rating.normal',
                            1,
                        ],
                        [
                            'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_game.game_rating.special',
                            2,
                        ],
                        [
                            'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_game.game_rating.invalid',
                            3,
                        ],
                    ],
                    'renderType' => 'selectSingle',
                    'type' => 'select',
                ],
                'exclude' => true,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_game.game_rating',
                'onChange' => 'reload',
            ],
            'result_special_reason' => [
                'config' => [
                    'items' => [
                        ['LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_select.something', 0],
                        [
                            'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_game.result_special_reason.1',
                            1,
                        ],
                        [
                            'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_game.result_special_reason.2',
                            2,
                        ],
                        [
                            'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_game.result_special_reason.3',
                            3,
                        ],
                        [
                            'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_game.result_special_reason.4',
                            4,
                        ],
                    ],
                    'renderType' => 'selectSingle',
                    'type' => 'select',
                ],
                'displayCond' => 'FIELD:game_rating:=:2',
                'exclude' => true,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_game.result_special_reason',
            ],
            
            'result_special_home' => [
                'config' => [
                    'default' => null,
                    'eval' => 'null',
                    'range' => [
                        'lower' => '0',
                        'upper' => '1000',
                    ],
                    'size' => 10,
                    'type' => 'input',
                ],
                'displayCond' => 'FIELD:game_rating:=:2',
                'exclude' => true,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_game.result_special_home',
            ],
            'result_special_guest' => [
                'config' => [
                    'default' => null,
                    'eval' => 'null',
                    'range' => [
                        'lower' => '0',
                        'upper' => '1000',
                    ],
                    'size' => 10,
                    'type' => 'input',
                ],
                'displayCond' => 'FIELD:game_rating:=:2',
                'exclude' => true,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_game.result_special_guest',
            ],
            'result_end_regular_home' => [
                'config' => [
                    'default' => null,
                    'eval' => 'null',
                    'range' => [
                        'lower' => '0',
                        'upper' => '1000',
                    ],
                    'size' => 10,
                    'type' => 'input',
                ],
                'exclude' => true,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_game.result_end_regular_home',
            ],
            'result_end_regular_guest' => [
                'config' => [
                    'default' => null,
                    'eval' => 'null',
                    'range' => [
                        'lower' => '0',
                        'upper' => '1000',
                    ],
                    'size' => 10,
                    'type' => 'input',
                ],
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_game.result_end_regular_guest',
            ],
            'result_end_additional' => [
                'config' => [
                    'default' => false,
                    'renderType' => 'checkboxToggle',
                    'type' => 'check',
                ],
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_game.result_end_additional',
                'onChange' => 'reload',
            ],
            'result_end_overtime_home' => [
                'displayCond' => 'FIELD:result_end_additional:=:1',
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_game.result_end_overtime_home',
                'config' => [
                    'default' => null,
                    'eval' => 'null',
                    'range' => [
                        'lower' => '0',
                        'upper' => '1000',
                    ],
                    'size' => 10,
                    'type' => 'input',
                ],
            ],
            'result_end_overtime_guest' => [
                'displayCond' => 'FIELD:result_end_additional:=:1',
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_game.result_end_overtime_guest',
                'config' => [
                    'default' => null,
                    'eval' => 'null',
                    'range' => [
                        'lower' => '0',
                        'upper' => '1000',
                    ],
                    'size' => 10,
                    'type' => 'input',
                ],
            ],
            'result_end_penalty_home' => [
                'displayCond' => 'FIELD:result_end_additional:=:1',
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_game.result_end_penalty_home',
                'config' => [
                    'default' => null,
                    'eval' => 'null',
                    'range' => [
                        'lower' => '0',
                        'upper' => '1000',
                    ],
                    'size' => 10,
                    'type' => 'input',
                ],
            ],
            'result_end_penalty_guest' => [
                'displayCond' => 'FIELD:result_end_additional:=:1',
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_game.result_end_penalty_guest',
                'config' => [
                    'default' => null,
                    'eval' => 'null',
                    'range' => [
                        'lower' => '0',
                        'upper' => '1000',
                    ],
                    'size' => 10,
                    'type' => 'input',
                ],
            ],
            'result_type' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_game.result_type',
                'config' => [
                    'default' => '2',
                    'eval' => 'required',
                    'items' => [
                        [
                            'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_game.result_type_halfs',
                            2,
                        ],
                        [
                            'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_game.result_type_thirds',
                            3,
                        ],
                        [
                            'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_game.result_type_quarters',
                            4,
                        ],
                        [
                            'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_game.result_type_sets',
                            -10,
                        ],
                    ],
                    'renderType' => 'selectSingle',
                    'type' => 'select',
                ],
                'onChange' => 'reload',
            ],
            'result_halfs_first_home' => [
                'displayCond' => 'FIELD:result_type:=:2',
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_game.result_halfs_first_home',
                'config' => [
                    'default' => null,
                    'eval' => 'null',
                    'range' => [
                        'lower' => '0',
                        'upper' => '1000',
                    ],
                    'size' => 10,
                    'type' => 'input',
                ],
            ],
            'result_halfs_first_guest' => [
                'displayCond' => 'FIELD:result_type:=:2',
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_game.result_halfs_first_guest',
                'config' => [
                    'default' => null,
                    'eval' => 'null',
                    'range' => [
                        'lower' => '0',
                        'upper' => '1000',
                    ],
                    'size' => 10,
                    'type' => 'input',
                ],
            ],
            'result_halfs_second_home' => [
                'displayCond' => 'FIELD:result_type:=:2',
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_game.result_halfs_second_home',
                'config' => [
                    'default' => null,
                    'eval' => 'null',
                    'range' => [
                        'lower' => '0',
                        'upper' => '1000',
                    ],
                    'size' => 10,
                    'type' => 'input',
                ],
            ],
            'result_halfs_second_guest' => [
                'displayCond' => 'FIELD:result_type:=:2',
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_game.result_halfs_second_guest',
                'config' => [
                    'default' => null,
                    'eval' => 'null',
                    'range' => [
                        'lower' => '0',
                        'upper' => '1000',
                    ],
                    'size' => 10,
                    'type' => 'input',
                ],
            ],
            'result_thirds_first_home' => [
                'displayCond' => 'FIELD:result_type:=:3',
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_game.result_thirds_first_home',
                'config' => [
                    'default' => null,
                    'eval' => 'null',
                    'range' => [
                        'lower' => '0',
                        'upper' => '1000',
                    ],
                    'size' => 10,
                    'type' => 'input',
                ],
            ],
            'result_thirds_first_guest' => [
                'displayCond' => 'FIELD:result_type:=:3',
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_game.result_thirds_first_guest',
                'config' => [
                    'default' => null,
                    'eval' => 'null',
                    'range' => [
                        'lower' => '0',
                        'upper' => '1000',
                    ],
                    'size' => 10,
                    'type' => 'input',
                ],
            ],
            'result_thirds_second_home' => [
                'displayCond' => 'FIELD:result_type:=:3',
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_game.result_thirds_second_home',
                'config' => [
                    'default' => null,
                    'eval' => 'null',
                    'range' => [
                        'lower' => '0',
                        'upper' => '1000',
                    ],
                    'size' => 10,
                    'type' => 'input',
                ],
            ],
            'result_thirds_second_guest' => [
                'displayCond' => 'FIELD:result_type:=:3',
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_game.result_thirds_second_guest',
                'config' => [
                    'default' => null,
                    'eval' => 'null',
                    'range' => [
                        'lower' => '0',
                        'upper' => '1000',
                    ],
                    'size' => 10,
                    'type' => 'input',
                ],
            ],
            'result_thirds_third_home' => [
                'displayCond' => 'FIELD:result_type:=:3',
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_game.result_thirds_third_home',
                'config' => [
                    'default' => null,
                    'eval' => 'null',
                    'range' => [
                        'lower' => '0',
                        'upper' => '1000',
                    ],
                    'size' => 10,
                    'type' => 'input',
                ],
            ],
            'result_thirds_third_guest' => [
                'displayCond' => 'FIELD:result_type:=:3',
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_game.result_thirds_third_guest',
                'config' => [
                    'default' => null,
                    'eval' => 'null',
                    'range' => [
                        'lower' => '0',
                        'upper' => '1000',
                    ],
                    'size' => 10,
                    'type' => 'input',
                ],
            ],
            'result_fourths_first_home' => [
                'displayCond' => 'FIELD:result_type:=:4',
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_game.result_fourths_first_home',
                'config' => [
                    'default' => null,
                    'eval' => 'null',
                    'range' => [
                        'lower' => '0',
                        'upper' => '1000',
                    ],
                    'size' => 10,
                    'type' => 'input',
                ],
            ],
            'result_fourths_first_guest' => [
                'displayCond' => 'FIELD:result_type:=:4',
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_game.result_fourths_first_guest',
                'config' => [
                    'default' => null,
                    'eval' => 'null',
                    'range' => [
                        'lower' => '0',
                        'upper' => '1000',
                    ],
                    'size' => 10,
                    'type' => 'input',
                ],
            ],
            'result_fourths_second_home' => [
                'displayCond' => 'FIELD:result_type:=:4',
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_game.result_fourths_second_home',
                'config' => [
                    'default' => null,
                    'eval' => 'null',
                    'range' => [
                        'lower' => '0',
                        'upper' => '1000',
                    ],
                    'size' => 10,
                    'type' => 'input',
                ],
            ],
            'result_fourths_second_guest' => [
                'displayCond' => 'FIELD:result_type:=:4',
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_game.result_fourths_second_guest',
                'config' => [
                    'default' => null,
                    'eval' => 'null',
                    'range' => [
                        'lower' => '0',
                        'upper' => '1000',
                    ],
                    'size' => 10,
                    'type' => 'input',
                ],
            ],
            'result_fourths_third_home' => [
                'displayCond' => 'FIELD:result_type:=:4',
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_game.result_fourths_third_home',
                'config' => [
                    'default' => null,
                    'eval' => 'null',
                    'range' => [
                        'lower' => '0',
                        'upper' => '1000',
                    ],
                    'size' => 10,
                    'type' => 'input',
                ],
            ],
            'result_fourths_third_guest' => [
                'displayCond' => 'FIELD:result_type:=:4',
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_game.result_fourths_third_guest',
                'config' => [
                    'default' => null,
                    'eval' => 'null',
                    'range' => [
                        'lower' => '0',
                        'upper' => '1000',
                    ],
                    'size' => 10,
                    'type' => 'input',
                ],
            ],
            'result_fourths_fourth_home' => [
                'displayCond' => 'FIELD:result_type:=:4',
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_game.result_fourths_fourth_home',
                'config' => [
                    'default' => null,
                    'eval' => 'null',
                    'range' => [
                        'lower' => '0',
                        'upper' => '1000',
                    ],
                    'size' => 10,
                    'type' => 'input',
                ],
            ],
            'result_fourths_fourth_guest' => [
                'displayCond' => 'FIELD:result_type:=:4',
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_game.result_fourths_fourth_guest',
                'config' => [
                    'default' => null,
                    'eval' => 'null',
                    'range' => [
                        'lower' => '0',
                        'upper' => '1000',
                    ],
                    'size' => 10,
                    'type' => 'input',
                ],
            ],
            'result_sets' => [
                'displayCond' => 'FIELD:result_type:=:-10',
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_gameresultset.plural',
                'config' => [
                    'appearance' => [
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
                    ],
                    'foreign_default_sortby' => 'ORDER BY set_number ASC',
                    'foreign_field' => 'game',
                    'foreign_table' => 'tx_sportms_domain_model_gameresultset',
                    'type' => 'inline',
                ],
            ],
            
            'team_season_home' => [
                'displayCond' => 'FIELD:competition_season:>:0',
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_game.team_season_home',
                'config' => [
                    'eval' => 'required',
                    'foreign_table' => 'tx_sportms_domain_model_teamseason',
                    'foreign_table_where' => '  AND tx_sportms_domain_model_teamseason.uid IN (SELECT uid_foreign FROM tx_sportms_competitionseason_teamseason_mm WHERE uid_local = ###REC_FIELD_competition_season###)
	                                        AND tx_sportms_domain_model_teamseason.season = ###REC_FIELD_season###
	                                        ORDER BY tx_sportms_domain_model_teamseason.team ASC',
                    'items' => [
                        ['LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_select.something', 0],
                    ],
                    'maxItems' => 1,
                    'minItems' => 1,
                    'renderType' => 'selectSingle',
                    'size' => 1,
                    'type' => 'select',
                ],
                'onChange' => 'reload',
            ],
            'game_lineup_home_starts' => [
                'displayCond' => 'FIELD:team_season_home:>:0',
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_game.game_lineup_home_starts',
                'config' => [
                    'appearance' => [
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
                    ],
                    'foreign_field' => 'game',
                    'foreign_match_fields' => [
                        'team' => 'home',
                        'type' => 'start',
                    ],
                    'foreign_sortby' => 'sorting',
                    'foreign_table' => 'tx_sportms_domain_model_gamelineup',
                    'overrideChildTca' => [
                        'columns' => [
                            'person_profile' => [
                                'config' => [
                                    'foreign_table_where' => '  AND tx_sportms_domain_model_personprofile.uid IN (
                                                                    SELECT  tx_sportms_domain_model_teamseasonsquadmember.person_profile
                                                                    FROM    tx_sportms_domain_model_teamseasonsquadmember
                                                                    WHERE   tx_sportms_domain_model_teamseasonsquadmember.team_season = (
                                                                        SELECT  tx_sportms_domain_model_game.team_season_home
                                                                        FROM    tx_sportms_domain_model_game
                                                                        WHERE   tx_sportms_domain_model_game.uid = ###REC_FIELD_game###
                                                                    )
                                                                )',
                                ],
                            ],
                        ],
                    ],
                    'type' => 'inline',
                ],
            ],
            'game_lineup_home_substitutes' => [
                'displayCond' => 'FIELD:team_season_home:>:0',
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_game.game_lineup_home_substitutes',
                'config' => [
                    'appearance' => [
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
                    ],
                    'foreign_field' => 'game',
                    'foreign_match_fields' => [
                        'team' => 'home',
                        'type' => 'substitute',
                    ],
                    'foreign_sortby' => 'sorting',
                    'foreign_table' => 'tx_sportms_domain_model_gamelineup',
                    'overrideChildTca' => [
                        'columns' => [
                            'person_profile' => [
                                'config' => [
                                    'foreign_table_where' => '  AND tx_sportms_domain_model_personprofile.uid IN (
                                                                    SELECT  tx_sportms_domain_model_teamseasonsquadmember.person_profile
                                                                    FROM    tx_sportms_domain_model_teamseasonsquadmember
                                                                    WHERE   tx_sportms_domain_model_teamseasonsquadmember.team_season = (
                                                                        SELECT  tx_sportms_domain_model_game.team_season_home
                                                                        FROM    tx_sportms_domain_model_game
                                                                        WHERE   tx_sportms_domain_model_game.uid = ###REC_FIELD_game###
                                                                    )
                                                                )',
                                ],
                            ],
                        ],
                    ],
                    'type' => 'inline',
                ],
            ],
            'captain_home' => [
                'displayCond' => 'FIELD:team_season_home:>:0',
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_game.captain',
                'config' => [
                    'foreign_table' => 'tx_sportms_domain_model_personprofile',
                    'foreign_table_where' => '  AND tx_sportms_domain_model_personprofile.uid IN (
                                                    SELECT  tx_sportms_domain_model_gamelineup.person_profile
                                                    FROM    tx_sportms_domain_model_gamelineup
                                                    WHERE   tx_sportms_domain_model_gamelineup.team = "home" AND
                                                            tx_sportms_domain_model_gamelineup.game = ###THIS_UID###
                                                )',
                    'items' => [
                        ['LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_select.something', 0],
                    ],
                    'maxItems' => 1,
                    'minItems' => 0,
                    'renderType' => 'selectSingle',
                    'size' => 1,
                    'type' => 'select',
                ],
            ],
            'trainer_home' => [
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_game.trainer_home',
                'config' => [
                    'foreign_table' => 'tx_sportms_domain_model_personprofile',
                    'foreign_table_where' => '  AND tx_sportms_domain_model_personprofile.uid IN (
                                                    SELECT  tx_sportms_domain_model_teamseasonofficial.person_profile
                                                    FROM    tx_sportms_domain_model_teamseasonofficial
                                                    WHERE   tx_sportms_domain_model_teamseasonofficial.team_season = ###REC_FIELD_team_season_home###
                                                )',
                    'items' => [
                        [
                            'LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_domain_model_game.select.trainer',
                            0,
                        ],
                    ],
                    'maxItems' => 1,
                    'minItems' => 0,
                    'renderType' => 'selectSingle',
                    'size' => 1,
                    'type' => 'select',
                ],
            ],
            
            'team_season_guest' => [
                'displayCond' => [
                    'AND' => [
                        'FIELD:competition_season:>:0',
                        'FIELD:team_season_home:>:0',
                    ],
                ],
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_game.team_season_guest',
                'config' => [
                    'eval' => 'required',
                    'foreign_table' => 'tx_sportms_domain_model_teamseason',
                    'foreign_table_where' => '  AND tx_sportms_domain_model_teamseason.uid IN (SELECT uid_foreign FROM tx_sportms_competitionseason_teamseason_mm WHERE uid_local = ###REC_FIELD_competition_season###)
                                                AND tx_sportms_domain_model_teamseason.uid != ###REC_FIELD_team_season_home###
                                                AND tx_sportms_domain_model_teamseason.season = ###REC_FIELD_season###
                                                ORDER BY tx_sportms_domain_model_teamseason.team ASC',
                    'items' => [
                        ['LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_select.something', 0],
                    ],
                    'maxItems' => 1,
                    'minItems' => 1,
                    'renderType' => 'selectSingle',
                    'size' => 1,
                    'type' => 'select',
                ],
                'onChange' => 'reload',
            ],
            'game_lineup_guest_starts' => [
                'displayCond' => 'FIELD:team_season_guest:>:0',
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_game.game_lineup_guest_starts',
                'config' => [
                    'appearance' => [
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
                    ],
                    'foreign_field' => 'game',
                    'foreign_match_fields' => [
                        'team' => 'guest',
                        'type' => 'start',
                    ],
                    'foreign_sortby' => 'sorting',
                    'foreign_table' => 'tx_sportms_domain_model_gamelineup',
                    'overrideChildTca' => [
                        'columns' => [
                            'person_profile' => [
                                'config' => [
                                    'foreign_table_where' => '  AND tx_sportms_domain_model_personprofile.uid IN (
                                                                    SELECT  tx_sportms_domain_model_teamseasonsquadmember.person_profile
                                                                    FROM    tx_sportms_domain_model_teamseasonsquadmember
                                                                    WHERE   tx_sportms_domain_model_teamseasonsquadmember.team_season = (
                                                                        SELECT  tx_sportms_domain_model_game.team_season_guest
                                                                        FROM    tx_sportms_domain_model_game
                                                                        WHERE   tx_sportms_domain_model_game.uid = ###REC_FIELD_game###
                                                                    )
                                                                )',
                                ],
                            ],
                        ],
                    ],
                    'type' => 'inline',
                ],
            ],
            'game_lineup_guest_substitutes' => [
                'displayCond' => 'FIELD:team_season_guest:>:0',
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_game.game_lineup_guest_substitutes',
                'config' => [
                    'appearance' => [
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
                    ],
                    'foreign_field' => 'game',
                    'foreign_match_fields' => [
                        'team' => 'guest',
                        'type' => 'substitute',
                    ],
                    'foreign_sortby' => 'sorting',
                    'foreign_table' => 'tx_sportms_domain_model_gamelineup',
                    'overrideChildTca' => [
                        'columns' => [
                            'person_profile' => [
                                'config' => [
                                    'foreign_table_where' => '  AND tx_sportms_domain_model_personprofile.uid IN (
                                                                    SELECT  tx_sportms_domain_model_teamseasonsquadmember.person_profile
                                                                    FROM    tx_sportms_domain_model_teamseasonsquadmember
                                                                    WHERE   tx_sportms_domain_model_teamseasonsquadmember.team_season = (
                                                                        SELECT  tx_sportms_domain_model_game.team_season_guest
                                                                        FROM    tx_sportms_domain_model_game
                                                                        WHERE   tx_sportms_domain_model_game.uid = ###REC_FIELD_game###
                                                                    )
                                                                )',
                                ],
                            ],
                        ],
                    ],
                    'type' => 'inline',
                ],
            ],
            'captain_guest' => [
                'displayCond' => 'FIELD:team_season_guest:>:0',
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_game.captain',
                'config' => [
                    'foreign_table' => 'tx_sportms_domain_model_personprofile',
                    'foreign_table_where' => '  AND tx_sportms_domain_model_personprofile.uid IN (
                                                    SELECT  tx_sportms_domain_model_gamelineup.person_profile
                                                    FROM    tx_sportms_domain_model_gamelineup
                                                    WHERE   tx_sportms_domain_model_gamelineup.team = "guest" AND
                                                            tx_sportms_domain_model_gamelineup.game = ###THIS_UID###
                                                )',
                    'items' => [
                        ['LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_select.something', 0],
                    ],
                    'maxItems' => 1,
                    'minItems' => 0,
                    'renderType' => 'selectSingle',
                    'size' => 1,
                    'type' => 'select',
                ],
            ],
            'trainer_guest' => [
                'displayCond' => 'FIELD:team_season_guest:>:0',
                'exclude' => 1,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_game.trainer_guest',
                'config' => [
                    'foreign_table' => 'tx_sportms_domain_model_personprofile',
                    'foreign_table_where' => '  AND tx_sportms_domain_model_personprofile.uid IN (
                                                    SELECT  tx_sportms_domain_model_teamseasonofficial.person_profile
                                                    FROM    tx_sportms_domain_model_teamseasonofficial
                                                    WHERE   tx_sportms_domain_model_teamseasonofficial.team_season = ###REC_FIELD_team_season_guest###
                                                )',
                    'items' => [
                        [
                            'LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_domain_model_game.select.trainer',
                            0,
                        ],
                    ],
                    'maxItems' => 1,
                    'minItems' => 0,
                    'renderType' => 'selectSingle',
                    'size' => 1,
                    'type' => 'select',
                ],
            ],
            
            'game_changes' => [
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_gamechange.plural',
                'config' => [
                    'appearance' => [
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
                    ],
                    'foreign_field' => 'game',
                    'foreign_table' => 'tx_sportms_domain_model_gamechange',
                    'type' => 'inline',
                ],
            ],
            
            'game_goals' => [
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_gamegoal.plural',
                'config' => [
                    'appearance' => [
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
                    ],
                    'foreign_field' => 'game',
                    'foreign_table' => 'tx_sportms_domain_model_gamegoal',
                    'type' => 'inline',
                ],
            ],
            
            'game_punishments' => [
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_gamepunishment.plural',
                'config' => [
                    'appearance' => [
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
                    ],
                    'foreign_field' => 'game',
                    'foreign_table' => 'tx_sportms_domain_model_gamepunishment',
                    'type' => 'inline',
                ],
            ],
            
            'game_referees' => [
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_gamereferee.plural',
                'config' => [
                    'appearance' => [
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
                    ],
                    'foreign_field' => 'game',
                    'foreign_sortby' => 'sorting',
                    'foreign_table' => 'tx_sportms_domain_model_gamereferee',
                    'type' => 'inline',
                ],
            ],
            
            'game_report' => [
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang.xlf:tx_sportms_domain_model_gamereport',
                'config' => [
                    'appearance' => [
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
                    ],
                    'foreign_field' => 'game',
                    'foreign_table' => 'tx_sportms_domain_model_gamereport',
                    'maxitems' => 1,
                    'type' => 'inline',
                ],
            ],
            
            'detail_link' => [
                'exclude' => true,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.detail_link',
                'config' => [
                    'default' => false,
                    'renderType' => 'checkboxToggle',
                    'type' => 'check',
                ],
            ],
            'slug' => [
                'exclude' => true,
                'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_be.xlf:tx_sportms_general.slug',
                'config' => [
                    'default' => '',
                    'fallbackCharacter' => '-',
                    'generatorOptions' => [
                        'fields' => ['uid'],
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
        
        ],
    ];
