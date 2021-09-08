<?php
    
    defined('TYPO3_MODE') or die();
    
    use TYPO3\CMS\Core\Utility\GeneralUtility;
    
    $vendor = 'ChristianKnell';
    $_EXTKEY = 'sportms';
    $extensionName = GeneralUtility::underscoredToUpperCamelCase($_EXTKEY);
    
    # Configure Plugins and their allowed Actions
    $pluginNamesAndTheirActions = [];
    $pluginNamesAndTheirActions[0]['name'] = 'ClubDetail';
    $pluginNamesAndTheirActions[0]['cacheableActions'] = [\ChristianKnell\Sportms\Controller\ClubController::class => 'sections'];
    $pluginNamesAndTheirActions[0]['nonCacheableActions'] = [];
    $pluginNamesAndTheirActions[1]['name'] = 'ClubList';
    $pluginNamesAndTheirActions[1]['cacheableActions'] = [\ChristianKnell\Sportms\Controller\ClubController::class => 'list'];
    $pluginNamesAndTheirActions[1]['nonCacheableActions'] = [];
    $pluginNamesAndTheirActions[2]['name'] = 'CompetitionDetail';
    $pluginNamesAndTheirActions[2]['cacheableActions'] = [\ChristianKnell\Sportms\Controller\CompetitionController::class => 'seasonGames, seasonClubs, seasonTeams'];
    $pluginNamesAndTheirActions[2]['nonCacheableActions'] = [];
    $pluginNamesAndTheirActions[3]['name'] = 'CompetitionList';
    $pluginNamesAndTheirActions[3]['cacheableActions'] = [\ChristianKnell\Sportms\Controller\CompetitionController::class => 'list'];
    $pluginNamesAndTheirActions[3]['nonCacheableActions'] = [];
    $pluginNamesAndTheirActions[4]['name'] = 'PersonList';
    $pluginNamesAndTheirActions[4]['cacheableActions'] = [\ChristianKnell\Sportms\Controller\PersonController::class => 'list'];
    $pluginNamesAndTheirActions[4]['nonCacheableActions'] = [];
    $pluginNamesAndTheirActions[5]['name'] = 'SeasonList';
    $pluginNamesAndTheirActions[5]['cacheableActions'] = [\ChristianKnell\Sportms\Controller\SeasonController::class => 'list'];
    $pluginNamesAndTheirActions[5]['nonCacheableActions'] = [];
    $pluginNamesAndTheirActions[6]['name'] = 'SportMS';
    $pluginNamesAndTheirActions[6]['cacheableActions'] = [\ChristianKnell\Sportms\Controller\SportMSController::class => 'dbstats'];
    $pluginNamesAndTheirActions[6]['nonCacheableActions'] = [];
    $pluginNamesAndTheirActions[7]['name'] = 'GameDetail';
    $pluginNamesAndTheirActions[7]['cacheableActions'] = [\ChristianKnell\Sportms\Controller\GameController::class => 'index, history, report'];
    $pluginNamesAndTheirActions[7]['nonCacheableActions'] = [];
    $pluginNamesAndTheirActions[8]['name'] = 'GameList';
    $pluginNamesAndTheirActions[8]['cacheableActions'] = [\ChristianKnell\Sportms\Controller\GameController::class => 'list'];
    $pluginNamesAndTheirActions[8]['nonCacheableActions'] = [];
    $pluginNamesAndTheirActions[9]['name'] = 'TeamDetail';
    $pluginNamesAndTheirActions[9]['cacheableActions'] = [\ChristianKnell\Sportms\Controller\TeamController::class => 'seasonIndex, historyOfficials, historyRecordGames, historyRecordPlayers, seasonGamesByCompetition, seasonGamesByDate'];
    $pluginNamesAndTheirActions[9]['nonCacheableActions'] = [];
    $pluginNamesAndTheirActions[10]['name'] = 'TeamList';
    $pluginNamesAndTheirActions[10]['cacheableActions'] = [\ChristianKnell\Sportms\Controller\TeamController::class => 'list'];
    $pluginNamesAndTheirActions[10]['nonCacheableActions'] = [];
    
    for ($i = 0; $i < count($pluginNamesAndTheirActions); $i++) {
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
        '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:sportms/Configuration/TsConfig/ContentElementWizard.txt">'
    );
    
    /* ===========================================================================
        Register Icons for the Backend
    =========================================================================== */
    if (TYPO3_MODE === 'BE') {
        $icons = [
            'sportms-ce-plugin-sportms-icon' => 'Extension.svg',
            'sportms-ce-plugin-club-icon' => 'tx_sportms_domain_model_club.svg',
            'sportms-ce-plugin-competition-icon' => 'tx_sportms_domain_model_competition.svg',
            'sportms-ce-plugin-game-icon' => 'tx_sportms_domain_model_game.svg',
            'sportms-ce-plugin-person-icon' => 'tx_sportms_domain_model_person.svg',
            'sportms-ce-plugin-season-icon' => 'tx_sportms_domain_model_season.svg',
            'sportms-ce-plugin-team-icon' => 'tx_sportms_domain_model_team.svg',
            'sportms-domain-model-clubofficialprofile-icon' => 'tx_sportms_domain_model_club.svg',
            'sportms-domain-model-clubsectionofficialprofile-icon' => 'tx_sportms_domain_model_clubsection.svg',
            'sportms-domain-model-playerprofile-icon' => 'tx_sportms_domain_model_sport.svg',
            'sportms-domain-model-teamseasonofficialprofile-icon' => 'tx_sportms_domain_model_teamseason.svg',
            'sportms-domain-model-refereeprofile-icon' => 'tx_sportms_domain_model_refereejob.svg',
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
    
    /* ===========================================================================
        Register PageTitleProvider
    =========================================================================== */
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScriptSetup(trim('
        config.pageTitleProviders {
            sportms {
                provider = ChristianKnell\Sportms\PageTitle\PageTitleProvider
                before = record
                after = altPageTitle
            }
        }
    '));
