<?php
	
	defined('TYPO3_MODE') or die();
	
	use TYPO3\CMS\Core\Utility\GeneralUtility;
	
	$vendor = 'Balumedien';
	$_EXTKEY = 'sportms';
	$extensionName = GeneralUtility::underscoredToUpperCamelCase($_EXTKEY);
	
	# Configure Plugins and their allowed Actions
	$pluginNamesAndTheirActions = [];
	$pluginNamesAndTheirActions[0]['name'] = 'Club';
	$pluginNamesAndTheirActions[0]['cacheableActions'] = ['Club' => 'list, sections'];
	$pluginNamesAndTheirActions[0]['nonCacheableActions'] = [];
	$pluginNamesAndTheirActions[1]['name'] = 'Competition';
	$pluginNamesAndTheirActions[1]['cacheableActions'] = ['Competition' => 'list, seasonClubs, seasonGames, seasonTeams'];
	$pluginNamesAndTheirActions[1]['nonCacheableActions'] = [];
	$pluginNamesAndTheirActions[2]['name'] = 'Game';
	$pluginNamesAndTheirActions[2]['cacheableActions'] = ['Game' => 'list, history, index, report'];
	$pluginNamesAndTheirActions[2]['nonCacheableActions'] = [];
	$pluginNamesAndTheirActions[3]['name'] = 'Person';
	$pluginNamesAndTheirActions[3]['cacheableActions'] = ['Person' => 'list'];
	$pluginNamesAndTheirActions[3]['nonCacheableActions'] = [];
	$pluginNamesAndTheirActions[4]['name'] = 'Team';
	$pluginNamesAndTheirActions[4]['cacheableActions'] = ['Team' => 'list, historyOfficials, historyRecordGames, historyRecordPlayers, seasonGamesByCompetition, seasonGamesByDate, seasonIndex'];
	$pluginNamesAndTheirActions[4]['nonCacheableActions'] = [];
    $pluginNamesAndTheirActions[5]['name'] = 'Season';
    $pluginNamesAndTheirActions[5]['cacheableActions'] = ['Season' => 'list, teams'];
    $pluginNamesAndTheirActions[5]['nonCacheableActions'] = [];
	$pluginNamesAndTheirActions[6]['name'] = 'SportMS';
	$pluginNamesAndTheirActions[6]['cacheableActions'] = ['SportMS' => 'dbstats'];
	$pluginNamesAndTheirActions[6]['nonCacheableActions'] = [];
	
	for($i = 0; $i < count($pluginNamesAndTheirActions); $i++) {
		\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
			$vendor . '.' . $extensionName,
			$pluginNamesAndTheirActions[$i]['name'],
			$pluginNamesAndTheirActions[$i]['cacheableActions'],
			$pluginNamesAndTheirActions[$i]['nonCacheableActions']
		);
	}
	
	/* ===========================================================================
		Add Plugins to PluginList
	=========================================================================== */
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
		'<INCLUDE_TYPOSCRIPT: source="FILE:EXT:sportms/Configuration/TSconfig/ContentElementWizard.txt">'
	);
	
	/* ===========================================================================
		Register Icons for the Backend
	=========================================================================== */
	if(TYPO3_MODE === 'BE') {
		$icons = [
			'sportms-ce-plugin-sportms-icon' => 'Extension.svg',
			'sportms-ce-plugin-club-icon' => 'tx_sportms_domain_model_club.svg',
			'sportms-ce-plugin-competition-icon' => 'tx_sportms_domain_model_competition.svg',
			'sportms-ce-plugin-game-icon' => 'tx_sportms_domain_model_game.svg',
			'sportms-ce-plugin-person-icon' => 'tx_sportms_domain_model_person.svg',
			'sportms-ce-plugin-season-icon' => 'tx_sportms_domain_model_season.svg',
			'sportms-ce-plugin-team-icon' => 'tx_sportms_domain_model_team.svg',
		];
		$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
		foreach($icons as $identifier => $filename) {
			if(!$iconRegistry->isRegistered($identifier)) {
				$iconRegistry->registerIcon(
					$identifier,
					\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
					['source' => 'EXT:sportms/Resources/Public/Icons/' . $filename]
				);
			}
		}
	}
	
	/* ===========================================================================
		Register PageTitleProvider
	=========================================================================== */
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScriptSetup(trim('
        config.pageTitleProviders {
            sportms {
                provider = Balumedien\Sportms\PageTitle\PageTitleProvider
                before = record
                after = altPageTitle
            }
        }
    '));
