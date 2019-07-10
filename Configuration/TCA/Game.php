<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$GLOBALS['TCA']['tx_clubms_domain_model_game'] = array(
	'ctrl' => array(
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'default_sortby' => 'ORDER BY section ASC, competition_season ASC, team_season_home ASC',
		'delete' => 'deleted',
		'dividers2tabs' => TRUE,
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'iconfile' => 'EXT:clubms/Resources/Public/Icons/tx_clubms_domain_model_game.svg',
        'label' => '',
        'label_userFunc' => \Balumedien\Clubms\Configuration\TCA\UserFunc\UserFunc::class . '->GameLabel',
		'searchFields' => '',
		'title'	=> 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_game',
		'tstamp' => 'tstamp',
		'versioningWS' => TRUE,
	),
	'interface' => array(
		'showRecordFieldList' => '',
	),
	'types' => array(
		'1' => array('showitem' => 'section, season, competition_season, 
		                            --div--;LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_game.tab_details, status, --palette--;;date_time, --palette--;;venue_spectators,
		                            --div--;LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_game.tab_result, result_type,
		                                --palette--;LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_game.palette_result_halfs;result_halfs,
		                                --palette--;LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_game.palette_result_thirds;result_thirds,
		                            --div--;LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_game.tab_home, team_season_home, game_lineup_homes, trainer_home,
		                            --div--;LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_game.tab_guest, team_season_guest, game_lineup_guests, trainer_guest,
		                            --div--;LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_game.tab_referees, game_referees,
		                            --div--;LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_game.tab_reports, game_reports,
		                            --div--;LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_game.tab_visibility, hidden, detail_link,
		                            '),
	),
	'palettes' => array(
        'date_time' => array('showitem' => 'date, time'),
        'venue_spectators' => array('showitem' => 'venue, spectators'),
        'result_halfs' => array('showitem' => 'result_halfs_end_home, result_halfs_end_guest, result_halfs_half_home, result_halfs_half_guest'),
        'result_thirds' => array('showitem' => 'result_thirds_end_home, result_thirds_end_guest, result_thirds_first_home, result_thirds_first_guest, result_thirds_second_home, result_thirds_second_guest, result_thirds_third_home, result_thirds_third_guest'),
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

		'section' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_game.section',
			'config' => array(
				'eval' => 'required',
				'foreign_table' => 'tx_clubms_domain_model_section',
				'foreign_table_where' => 'ORDER BY label ASC',
				'items' => Array (
					array("LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_general.select", ""),
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
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_game.season',
            'config' => array(
                'eval' => 'required',
                'foreign_table' => 'tx_clubms_domain_model_season',
                'foreign_table_where' => 'ORDER BY season_name DESC',
                'items' => Array (
                    array("LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_general.select", ""),
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
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_game.competition_season',
            'config' => array(
                'eval' => 'required',
                'foreign_table' => 'tx_clubms_domain_model_competitionseason',
	            'foreign_table_where' => '  AND tx_clubms_domain_model_competitionseason.season = ###REC_FIELD_season###
	                                        AND tx_clubms_domain_model_competitionseason.competition IN (SELECT competition FROM tx_clubms_domain_model_competition WHERE section = ###REC_FIELD_section###) 
	                                        ORDER BY tx_clubms_domain_model_competitionseason.competition ASC',
                'items' => Array (
                    array("LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_general.select", ""),
                ),
                'maxItems' => 1,
                'minItems' => 1,
                'renderType' => 'selectSingle',
                'size' => 1,
                'type' => 'select',
            ),
            'onChange' => 'reload',
        ),

        'status' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_game.status',
            'config' => array(
                'items' => array(
                    array('LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_game.status_planned', 0),
                    array('LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_game.status_scheduled', 1),
                    array('LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_game.status_running', 2),
                    array('LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_game.status_finished', 3),
                    array('LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_game.status_rescheduled', -10),
                    array('LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_game.status_uncompleted', -20),
                    array('LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_game.status_invalid', -30),
                    array('LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_game.status_canceled', -40),
                ),
                'renderType' => 'selectSingle',
                'type' => 'select',
            ),
        ),
        'date' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_game.date',
            'config' => array(
                'eval' => 'date',
                'placeholder' => 'dd-mm-yyyy',
                'renderType' => 'inputDateTime',
                'size' => '10',
                'type' => 'input',
            ),
        ),
        'time' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_game.time',
            'config' => array(
                'eval' => 'time',
                'placeholder' => 'hh:mm',
                'renderType' => 'inputDateTime',
                'size' => '10',
                'type' => 'input',
            ),
        ),
        'venue' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_game.venue',
            'config' => array(
                'foreign_table' => 'tx_clubms_domain_model_clubvenue',
                'foreign_table_where' => 'ORDER BY name ASC',
                'items' => Array (
                    array("LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_general.select", ""),
                ),
                'renderType' => 'selectSingle',
                'size' => 1,
                'type' => 'select',
            ),
        ),
        'spectators' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_game.spectators',
            'config' => array(
                'eval' => 'int, trim',
                'range' => array(
                    'lower' => '0',
                    'upper' => '1000000',
                ),
                'size' => 10,
                'type' => 'input',
            ),
        ),

        'result_type' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_game.result_type',
            'config' => array(
                'default' => '2',
                'eval' => 'required',
                'items' => array(
                    array('LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_game.result_type_halfs', 2),
                    array('LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_game.result_type_thirds', 3),
                    array('LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_game.result_type_quarters', 4),
                    array('LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_game.result_type_sets', 10),
                ),
                'renderType' => 'selectSingle',
                'type' => 'select',
            ),
            'onChange' => 'reload',
        ),
        'result_halfs_end_home' => array(
            'displayCond' => 'FIELD:result_type:=:2',
            'exclude' => 1,
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_game.result_halfs_end_home',
            'config' => array(
                'eval' => 'null',
                'range' => array(
                    'lower' => '0',
                    'upper' => '1000',
                ),
                'size' => 10,
                'type' => 'input',
            ),
        ),
        'result_halfs_end_guest' => array(
            'displayCond' => 'FIELD:result_type:=:2',
            'exclude' => 1,
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_game.result_halfs_end_guest',
            'config' => array(
                'eval' => 'null',
                'range' => array(
                    'lower' => '0',
                    'upper' => '1000',
                ),
                'size' => 10,
                'type' => 'input',
            ),
        ),
        'result_halfs_half_home' => array(
            'displayCond' => 'FIELD:result_type:=:2',
            'exclude' => 1,
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_game.result_halfs_half_home',
            'config' => array(
                'eval' => 'null',
                'range' => array(
                    'lower' => '0',
                    'upper' => '1000',
                ),
                'size' => 10,
                'type' => 'input',
            ),
        ),
        'result_halfs_half_guest' => array(
            'displayCond' => 'FIELD:result_type:=:2',
            'exclude' => 1,
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_game.result_halfs_half_guest',
            'config' => array(
                'eval' => 'null',
                'range' => array(
                    'lower' => '0',
                    'upper' => '1000',
                ),
                'size' => 10,
                'type' => 'input',
            ),
        ),
        'result_thirds_end_home' => array(
            'displayCond' => 'FIELD:result_type:=:3',
            'exclude' => 1,
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_game.result_thirds_end_home',
            'config' => array(
                'eval' => 'int, trim',
                'range' => array(
                    'lower' => '0',
                    'upper' => '1000',
                ),
                'size' => 10,
                'type' => 'input',
            ),
        ),
        'result_thirds_end_guest' => array(
            'displayCond' => 'FIELD:result_type:=:3',
            'exclude' => 1,
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_game.result_thirds_end_guest',
            'config' => array(
                'eval' => 'int, trim',
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
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_game.result_thirds_first_home',
            'config' => array(
                'eval' => 'int, trim',
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
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_game.result_thirds_first_guest',
            'config' => array(
                'eval' => 'int, trim',
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
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_game.result_thirds_second_home',
            'config' => array(
                'eval' => 'int, trim',
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
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_game.result_thirds_second_guest',
            'config' => array(
                'eval' => 'int, trim',
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
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_game.result_thirds_third_home',
            'config' => array(
                'eval' => 'int, trim',
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
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_game.result_thirds_third_guest',
            'config' => array(
                'eval' => 'int, trim',
                'range' => array(
                    'lower' => '0',
                    'upper' => '1000',
                ),
                'size' => 10,
                'type' => 'input',
            ),
        ),

        'team_season_home' => array(
            'displayCond' => 'FIELD:competition_season:>:0',
            'exclude' => 1,
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_game.team_season_home',
            'config' => array(
                'eval' => 'required',
                'foreign_table' => 'tx_clubms_domain_model_teamseason',
                'foreign_table_where' => '  AND tx_clubms_domain_model_teamseason.uid IN (SELECT uid_foreign FROM tx_clubms_competitionseason_teamseason_mm WHERE uid_local = ###REC_FIELD_competition_season###)
	                                        ORDER BY tx_clubms_domain_model_teamseason.team ASC',
                'items' => Array (
                    array("LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_general.select", ""),
                ),
                'maxItems' => 1,
                'minItems' => 1,
                'renderType' => 'selectSingle',
                'size' => 1,
                'type' => 'select',
            ),
            'onChange' => 'reload',
        ),
        'game_lineup_homes' => array(
            'displayCond' => 'FIELD:team_season_home:>:0',
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_game.game_lineup_homes',
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
                'foreign_table' => 'tx_clubms_domain_model_gamelineup',
                #'overrideChildTca' => array(
                #    'columns' => array(
                #        'person' => array(
                #            'config' => array(
                #                'foreign_table_where' => '  AND tx_clubms_domain_model_teamseasonsquadmember.team_season = ###REC_FIELD_team_season_home###
                #                                            ORDER BY tx_clubms_domain_model_teamseasonsquadmember.sorting ASC',
                #            ),
                #        ),
                #        'section_position' => array(
                #            'config' => array(
                #                'foreign_table_where' => '  AND tx_clubms_domain_model_sectionposition.section_position_group IN
				#                                            (SELECT uid FROM tx_clubms_domain_model_sectionpositiongroup WHERE section = ###REC_FIELD_section###)
				#                                            ORDER BY tx_clubms_domain_model_sectionposition.sorting ASC',
                #            ),
                #        ),
                #    ),
                #),
                'type' => 'inline',
            ),
        ),
        'trainer_home' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_game.trainer_home',
            'config' => array(
                'foreign_table' => 'tx_clubms_domain_model_teamseasonofficial',
                'foreign_table_where' => ' AND team_season = ###REC_FIELD_team_season_home###',
                'items' => Array (
                    array("LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_general.select", ""),
                ),
                'maxItems' => 1,
                'minItems' => 1,
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
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_game.team_season_guest',
            'config' => array(
                'eval' => 'required',
                'foreign_table' => 'tx_clubms_domain_model_teamseason',
                'foreign_table_where' => '  AND tx_clubms_domain_model_teamseason.uid IN (SELECT uid_foreign FROM tx_clubms_competitionseason_teamseason_mm WHERE uid_local = ###REC_FIELD_competition_season###)
                                            AND tx_clubms_domain_model_teamseason.uid != ###REC_FIELD_team_season_home###
	                                        ORDER BY tx_clubms_domain_model_teamseason.team ASC',
                'items' => Array (
                    array("LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_general.select", ""),
                ),
                'maxItems' => 1,
                'minItems' => 1,
                'renderType' => 'selectSingle',
                'size' => 1,
                'type' => 'select',
            ),
            'onChange' => 'reload',
        ),
        'game_lineup_guests' => array(
            'displayCond' => 'FIELD:team_season_home:>:0',
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_game.game_lineup_guests',
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
                'foreign_table' => 'tx_clubms_domain_model_gamelineup',
                #'overrideChildTca' => array(
                #    'columns' => array(
                #        'person' => array(
                #            'config' => array(
                #                'foreign_table_where' => '  AND tx_clubms_domain_model_teamseasonsquadmember.team_season = ###REC_FIELD_team_season_guest###
                #                                            ORDER BY tx_clubms_domain_model_teamseasonsquadmember.sorting ASC',
                #            ),
                #        ),
                #        'section_position' => array(
                #            'config' => array(
                #                'foreign_table_where' => '  AND tx_clubms_domain_model_sectionposition.section_position_group IN
				#                                            (SELECT uid FROM tx_clubms_domain_model_sectionpositiongroup WHERE section = ###REC_FIELD_section###)
				#                                            ORDER BY tx_clubms_domain_model_sectionposition.sorting ASC',
                #            ),
                #        ),
                #    ),
                #),
                'type' => 'inline',
            ),
        ),
        'trainer_guest' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_game.trainer_guest',
            'config' => array(
                'foreign_table' => 'tx_clubms_domain_model_teamseasonofficial',
                'foreign_table_where' => ' AND team_season = ###REC_FIELD_team_guest###',
                'items' => Array (
                    array("LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_general.select", ""),
                ),
                'maxItems' => 1,
                'minItems' => 1,
                'renderType' => 'selectSingle',
                'size' => 1,
                'type' => 'select',
            ),
        ),

        'game_referees' => array(
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_game.game_referees',
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
                'foreign_table' => 'tx_clubms_domain_model_gamereferee',
                'type' => 'inline',
            ),
        ),

        'game_reports' => array(
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_game.game_reports',
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
                'foreign_table' => 'tx_clubms_domain_model_gamereport',
                'type' => 'inline',
            ),
        ),

        'detail_link' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_game.detail_link',
            'config' => array(
                'default' => '1',
                'type' => 'check',
            ),
        ),
		
	),
);
