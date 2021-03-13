<?php
	
	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
		'Balumedien.' . $_EXTKEY,
		'sportms',
		[
			'Club' => 'list, sections',
			'ClubSection' => 'list',
			'Competition' => 'list',
			'CompetitionSeason' => 'games, goals, list, teams',
			'Game' => 'history, index, last',
			'Person' => 'officialProfile, playerProfile, refereeProfile',
			'Team' => 'list, historyRecordGames, historyRecordPlayers',
            'TeamSeason' => 'games, goals, index, list, squad'
		]
	);
	
	/* ===========================================================================
		Add Plugin to PluginList
	=========================================================================== */
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
		'<INCLUDE_TYPOSCRIPT: source="FILE:EXT:sportms/Configuration/TSconfig/ContentElementWizard.txt">'
	);
	
	/* ===========================================================================
		Register Icons for the Backend
	=========================================================================== */
	if (TYPO3_MODE === 'BE') {
		$icons = [
			'ext-sportms-wizard-icon' => 'Extension.svg',
			'ext-sportms-wizard-plugin-club-icon' => 'tx_sportms_domain_model_club.svg',
			'ext-sportms-wizard-plugin-clubsection-icon' => 'tx_sportms_domain_model_clubsection.svg',
			'ext-sportms-wizard-plugin-competition-icon' => 'tx_sportms_domain_model_game.svg',
			'ext-sportms-wizard-plugin-game-icon' => 'tx_sportms_domain_model_game.svg',
			'ext-sportms-wizard-plugin-person-icon' => 'tx_sportms_domain_model_person.svg',
			'ext-sportms-wizard-plugin-team-icon' => 'tx_sportms_domain_model_team.svg',
		];
		$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
		foreach ($icons as $identifier => $filename) {
			if (!$iconRegistry->isRegistered($identifier)) {
				$iconRegistry->registerIcon(
					$identifier,
					\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
					['source' => 'EXT:sportms/Resources/Public/Icons/' . $filename]
				);
			}
		}
	}