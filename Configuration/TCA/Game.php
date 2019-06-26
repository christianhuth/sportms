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
		'label' => 'label',
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
		'1' => array('showitem' => 'season, competition, team_home, team_guest, date, time, club_venue, game_spectators,
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
        'competition' => array(
            'displayCond' => 'FIELD:season:>:0',
            'exclude' => 1,
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_game.competition',
            'config' => array(
                'eval' => 'required',
                'foreign_table' => 'tx_clubms_domain_model_competition',
                'foreign_table_where' => 'ORDER BY name DESC',
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
            'displayCond' => 'FIELD:competition:>:0',
            'exclude' => 1,
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_game.team_home',
            'config' => array(
                'eval' => 'required',
                'foreign_table' => 'tx_clubms_domain_model_team',
                'foreign_table_where' => 'ORDER BY name ASC',
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
            'displayCond' => 'FIELD:competition:>:0',
            'exclude' => 1,
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_game.team_guest',
            'config' => array(
                'eval' => 'required',
                'foreign_table' => 'tx_clubms_domain_model_team',
                'foreign_table_where' => 'ORDER BY name ASC',
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

        'game_referees' => array(
            'label' => 'LLL:EXT:clubms/Resources/Private/Language/locallang_tca.xlf:tx_clubms_domain_model_game.game_referees',
            'config' => array(
                'appearance' => array(
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
                'type' => 'check',
            ),
        ),
		
	),
);
