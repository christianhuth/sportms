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
			'iconfile' => 'EXT:sportms/Resources/Public/Icons/tx_sportms_domain_model_competitionseasongameday.svg',
            'label' => '',
			'label_userFunc' => \Balumedien\Sportms\Configuration\TCA\UserFunc\UserFunc::class . '->CompetitionSeasonGamedayLabel',
			'searchFields' => '',
            'sortby' => 'sorting',
			'title' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_competitionseasongameday',
			'tstamp' => 'tstamp',
			'versioningWS' => TRUE,
		),
		'interface' => array(
			'showRecordFieldList' => '',
		),
		'types' => array(
			'1' => array('showitem' => 'competition_season, label, --palette--;LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_competitionseasongameday.palette_startdate_enddate;startdate_enddate'),
		),
		'palettes' => array(
			'startdate_enddate' => array('showitem' => 'startdate, enddate'),
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
				'label' => 'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.hidden',
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

			'competition_season' => array(
				'exclude' => 1,
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_competitionseasongameday.competition_season',
				'config' => array(
					'eval' => 'required',
					'foreign_table' => 'tx_sportms_domain_model_competitionseason',
					'items' => Array(
						array("LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_general.select", ""),
					),
					'maxItems' => 1,
					'renderType' => 'selectSingle',
					'size' => 1,
					'type' => 'select',
				),
			),

			'label' => array(
				'exclude' => 1,
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_competitionseasongameday.label',
				'config' => array(
					'type' => 'input',
					'size' => 30,
					'eval' => 'trim, required'
				),
			),
			'startdate' => array(
				'exclude' => 1,
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_competitionseasongameday.startdate',
				'config' => array(
					'type' => 'input',
					'size' => 10,
					'eval' => 'date',
					'placeholder' => 'dd-mm-yyyy',
					'renderType' => 'inputDateTime',
				),
			),
			'enddate' => array(
				'exclude' => 1,
				'label' => 'LLL:EXT:sportms/Resources/Private/Language/locallang_tca.xlf:tx_sportms_domain_model_competitionseasongameday.enddate',
				'config' => array(
					'type' => 'input',
					'size' => 10,
					'eval' => 'date',
					'placeholder' => 'dd-mm-yyyy',
					'renderType' => 'inputDateTime',
				),
			),

		),
	);
