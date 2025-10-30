<?php
    
    defined('TYPO3') or die();
    
    use ChristianKnell\Sportms\Controller\ClubController;
    use ChristianKnell\Sportms\Controller\CompetitionController;
    use ChristianKnell\Sportms\Controller\GameController;
    use ChristianKnell\Sportms\Controller\PersonController;
    use ChristianKnell\Sportms\Controller\SeasonController;
    use ChristianKnell\Sportms\Controller\SportMSController;
    use ChristianKnell\Sportms\Controller\TeamController;
    use TYPO3\CMS\Core\Utility\GeneralUtility;
    
    $vendor = 'ChristianKnell';
    $_EXTKEY = 'sportms';
    $extensionName = GeneralUtility::underscoredToUpperCamelCase($_EXTKEY);
    
    # Configure Plugins and their allowed Actions
    $pluginNamesAndTheirActions = [];
    $pluginNamesAndTheirActions[0]['name'] = 'ClubDetail';
    $pluginNamesAndTheirActions[0]['cacheableActions'] = [ClubController::class => 'sections'];
    $pluginNamesAndTheirActions[0]['nonCacheableActions'] = [];
    $pluginNamesAndTheirActions[1]['name'] = 'ClubList';
    $pluginNamesAndTheirActions[1]['cacheableActions'] = [ClubController::class => 'list'];
    $pluginNamesAndTheirActions[1]['nonCacheableActions'] = [];
    $pluginNamesAndTheirActions[2]['name'] = 'CompetitionDetail';
    $pluginNamesAndTheirActions[2]['cacheableActions'] = [CompetitionController::class => 'seasonGames, seasonClubs, seasonTeams'];
    $pluginNamesAndTheirActions[2]['nonCacheableActions'] = [];
    $pluginNamesAndTheirActions[3]['name'] = 'CompetitionList';
    $pluginNamesAndTheirActions[3]['cacheableActions'] = [CompetitionController::class => 'list'];
    $pluginNamesAndTheirActions[3]['nonCacheableActions'] = [];
    $pluginNamesAndTheirActions[4]['name'] = 'PersonList';
    $pluginNamesAndTheirActions[4]['cacheableActions'] = [PersonController::class => 'list'];
    $pluginNamesAndTheirActions[4]['nonCacheableActions'] = [];
    $pluginNamesAndTheirActions[5]['name'] = 'SeasonList';
    $pluginNamesAndTheirActions[5]['cacheableActions'] = [SeasonController::class => 'list'];
    $pluginNamesAndTheirActions[5]['nonCacheableActions'] = [];
    $pluginNamesAndTheirActions[6]['name'] = 'SportMS';
    $pluginNamesAndTheirActions[6]['cacheableActions'] = [SportMSController::class => 'dbstats'];
    $pluginNamesAndTheirActions[6]['nonCacheableActions'] = [];
    $pluginNamesAndTheirActions[7]['name'] = 'GameDetail';
    $pluginNamesAndTheirActions[7]['cacheableActions'] = [GameController::class => 'index, history, report'];
    $pluginNamesAndTheirActions[7]['nonCacheableActions'] = [];
    $pluginNamesAndTheirActions[8]['name'] = 'GameList';
    $pluginNamesAndTheirActions[8]['cacheableActions'] = [GameController::class => 'list'];
    $pluginNamesAndTheirActions[8]['nonCacheableActions'] = [];
    $pluginNamesAndTheirActions[9]['name'] = 'TeamDetail';
    $pluginNamesAndTheirActions[9]['cacheableActions'] = [TeamController::class => 'seasonIndex, historyCompetitions, historyImages, historyOfficials, historyRecordGames, historyRecordPlayers, seasonGamesByCompetition, seasonGamesByDate'];
    $pluginNamesAndTheirActions[9]['nonCacheableActions'] = [];
    $pluginNamesAndTheirActions[10]['name'] = 'TeamList';
    $pluginNamesAndTheirActions[10]['cacheableActions'] = [TeamController::class => 'list'];
    $pluginNamesAndTheirActions[10]['nonCacheableActions'] = [];
    
    for ($i = 0; $i < count($pluginNamesAndTheirActions); $i++) {
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            $extensionName,
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
