<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$GLOBALS['TCA']['tx_clubms_domain_model_game'] = array(
	'ctrl' => array(
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'default_sortby' => 'ORDER BY team_home ASC',
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
		'1' => array('showitem' => 'section, season, competition_season, team_home, team_guest, date, time, club_venue, game_spectators,
		                            --div--;LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_game.tab_lineup_homes, game_lineup_homes,
		                            --div--;LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_game.tab_lineup_guests, game_lineup_guests,
		                            --div--;LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_game.tab_referees, game_referees,
		                            --div--;LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_game.tab_visibility, hidden, detail_link,
		                            '),
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
        'team_home' => array(
            'displayCond' => 'FIELD:competition_season:>:0',
            'exclude' => 1,
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_game.team_home',
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
        'team_guest' => array(
            'displayCond' => array(
                'AND' => array(
                    'FIELD:competition_season:>:0',
                    'FIELD:team_home:>:0',
                ),
            ),
            'exclude' => 1,
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_game.team_guest',
            'config' => array(
                'eval' => 'required',
                'foreign_table' => 'tx_clubms_domain_model_teamseason',
                'foreign_table_where' => '  AND tx_clubms_domain_model_teamseason.uid IN (SELECT uid_foreign FROM tx_clubms_competitionseason_teamseason_mm WHERE uid_local = ###REC_FIELD_competition_season###)
                                            AND tx_clubms_domain_model_teamseason.uid != ###REC_FIELD_team_home###
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
        'date' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_game.date',
            'config' => array(
                'type' => 'input',
                'eval' => 'date',
                'placeholder' => 'dd-mm-yyyy',
                'renderType' => 'inputDateTime',
            ),
        ),
        'time' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_game.time',
            'config' => array(
                'type' => 'input',
                'eval' => 'time',
                'placeholder' => 'hh:mm',
                'renderType' => 'inputDateTime',
            ),
        ),
        'club_venue' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_game.club_venue',
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
        'game_spectators' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_game.game_spectators',
            'config' => array(
                'type' => 'input',
                'size' => 30,
                'eval' => 'int, trim'
            ),
        ),

        'game_lineup_homes' => array(
            'displayCond' => 'FIELD:team_home:>:0',
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
                'overrideChildTca' => array(
                    'columns' => array(
                        'person' => array(
                            'config' => array(
                                'foreign_table_where' => '  AND tx_clubms_domain_model_teamseasonsquadmember.team_season = ###REC_FIELD_team_home###
                                                            ORDER BY tx_clubms_domain_model_teamseasonsquadmember.sorting ASC',
                            ),
                        ),
                        'section_position' => array(
                            'config' => array(
                                'foreign_table_where' => '  AND tx_clubms_domain_model_sectionposition.section_position_group IN
				                                            (SELECT uid FROM tx_clubms_domain_model_sectionpositiongroup WHERE section = ###REC_FIELD_section###)
				                                            ORDER BY tx_clubms_domain_model_sectionposition.sorting ASC',
                            ),
                        ),
                    ),
                ),
                'type' => 'inline',
            ),
        ),

        'game_lineup_guests' => array(
            'displayCond' => 'FIELD:team_home:>:0',
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
                #                'foreign_table_where' => '  AND tx_clubms_domain_model_teamseasonsquadmember.team_season = ###REC_FIELD_team_guest###
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

        'detail_link' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_club.detail_link',
            'config' => array(
                'default' => '1',
                'type' => 'check',
            ),
        ),
		
	),
);
