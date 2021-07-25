<?php
    
    namespace Balumedien\Sportms\DataProcessing;
    
    use TYPO3\CMS\Core\Database\ConnectionPool;
    use TYPO3\CMS\Core\Database\Query\QueryBuilder;
    use TYPO3\CMS\Core\Utility\GeneralUtility;
    use TYPO3\CMS\Extbase\Utility\LocalizationUtility;
    use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;
    use TYPO3\CMS\Frontend\ContentObject\DataProcessorInterface;
    
    class AddSportmsToMenuProcessor implements DataProcessorInterface
    {
        
        /**
         * The content object renderer
         *
         * @var ContentObjectRenderer
         */
        public $cObj;
        
        /**
         * @param ContentObjectRenderer $cObj The data of the content element or page
         * @param array $contentObjectConfiguration The configuration of Content Object
         * @param array $processorConfiguration The configuration of this processor
         * @param array $processedData Key/value store of processed data (e.g. to be passed to a Fluid View)
         * @return array the processed data as key/value store
         */
        protected $processorConfiguration;
        
        public function process(
            ContentObjectRenderer $cObj,
            array $contentObjectConfiguration,
            array $processorConfiguration,
            array $processedData
        ) {
            $this->cObj = $cObj;
            $this->processorConfiguration = $processorConfiguration;
            
            if (!$this->processorConfiguration['addToMenus']) {
                return $processedData;
            }
            
            // Configuration for "club" argument
            if (GeneralUtility::_GET('tx_sportms_club')['club'] || GeneralUtility::_POST('tx_sportms_club')['club']) {
                $club = $this->getExtensionRecord('tx_sportms_domain_model_club',
                    ((int)GeneralUtility::_GET('tx_sportms_club')['club']) ?: (int)GeneralUtility::_POST('tx_sportms_club')['club']);
                if ($club) {
                    $menus = GeneralUtility::trimExplode(',', $this->processorConfiguration['addToMenus'], true);
                    foreach ($menus as $menu) {
                        if (isset($processedData[$menu])) {
                            $this->addExtensionRecordToMenu($club, $processedData[$menu]);
                            $this->addActionToMenu(
                                LocalizationUtility::translate('tx_sportms_action.club.' . strtolower(GeneralUtility::_GET('tx_sportms_club')['action']),
                                    'sportms'),
                                $processedData[$menu]
                            );
                        }
                    }
                }
            }
            
            // Configuration for "competition" argument
            if (GeneralUtility::_GET('tx_sportms_competition')['competition']) {
                $recordTable = 'tx_sportms_domain_model_competition';
                $recordUid = (int)GeneralUtility::_GET('tx_sportms_competition')['competition'];
                $competition = $this->getExtensionRecord($recordTable, $recordUid);
                if ($competition) {
                    $menus = GeneralUtility::trimExplode(',', $this->processorConfiguration['addToMenus'], true);
                    foreach ($menus as $menu) {
                        if (isset($processedData[$menu])) {
                            $this->addExtensionRecordToMenu($competition, $processedData[$menu]);
                            $this->addActionToMenu(
                                LocalizationUtility::translate('tx_sportms_action.competition.' . strtolower(GeneralUtility::_GET('tx_sportms_competition')['action']),
                                    'sportms'),
                                $processedData[$menu]
                            );
                        }
                    }
                    // Configuration for "season" argument
                    if (GeneralUtility::_GET('tx_sportms_competition')['season']) {
                        $recordTable = 'tx_sportms_domain_model_season';
                        $recordUid = (int)GeneralUtility::_GET('tx_sportms_competition')['season'];
                        $season = $this->getExtensionRecord($recordTable, $recordUid);
                        if ($season) {
                            foreach ($menus as $menu) {
                                if (isset($processedData[$menu])) {
                                    $this->addExtensionRecordToMenu($season, $processedData[$menu], false);
                                }
                            }
                        }
                    }
                }
            }
            
            // Configuration for "competitionSeason" argument
            if (GeneralUtility::_GET('tx_sportms_competition')['competitionSeason'] || GeneralUtility::_POST('tx_sportms_competition')['competitionSeason']) {
                $competitionSeason = $this->getExtensionRecord('tx_sportms_domain_model_competitionseason',
                    ((int)GeneralUtility::_GET('tx_sportms_competition')['competitionSeason']) ?: (int)GeneralUtility::_POST('tx_sportms_competition')['competitionSeason']);
                
                if ($competitionSeason) {
                    $recordTable = 'tx_sportms_domain_model_competition';
                    $recordUid = $competitionSeason['competition'];
                    $competition = $this->getExtensionRecord($recordTable, $recordUid);
                    $menus = GeneralUtility::trimExplode(',', $this->processorConfiguration['addToMenus'], true);
                    foreach ($menus as $menu) {
                        if (isset($processedData[$menu])) {
                            $this->addExtensionRecordToMenu($competition, $processedData[$menu]);
                        }
                    }
                    $recordTable = 'tx_sportms_domain_model_season';
                    $recordUid = $competitionSeason['season'];
                    $season = $this->getExtensionRecord($recordTable, $recordUid);
                    $menus = GeneralUtility::trimExplode(',', $this->processorConfiguration['addToMenus'], true);
                    foreach ($menus as $menu) {
                        if (isset($processedData[$menu])) {
                            $this->addExtensionRecordToMenu($season, $processedData[$menu]);
                            $this->addActionToMenu(
                                LocalizationUtility::translate('tx_sportms_action.competitionseason.' . strtolower(GeneralUtility::_GET('tx_sportms_competition')['action']),
                                    'sportms'),
                                $processedData[$menu]
                            );
                        }
                    }
                }
            }
            
            // Configuration for "game" argument
            if (GeneralUtility::_GET('tx_sportms_game')['game']) {
                $game = $this->getExtensionRecord('tx_sportms_domain_model_game',
                    (int)GeneralUtility::_GET('tx_sportms_game')['game']);
                if ($game) {
                    $menus = GeneralUtility::trimExplode(',', $this->processorConfiguration['addToMenus'], true);
                    foreach ($menus as $menu) {
                        if (isset($processedData[$menu])) {
                            $this->addGameRecordToMenu($game, $processedData[$menu]);
                            $this->addActionToMenu(
                                LocalizationUtility::translate('tx_sportms_action.game.' . strtolower(GeneralUtility::_GET('tx_sportms_game')['action']),
                                    'sportms'),
                                $processedData[$menu]
                            );
                        }
                    }
                }
            }
            
            // Configuration for "team" argument
            if (GeneralUtility::_GET('tx_sportms_team')['team']) {
                $recordTable = 'tx_sportms_domain_model_team';
                $recordUid = (int)GeneralUtility::_GET('tx_sportms_team')['team'];
                $team = $this->getExtensionRecord($recordTable, $recordUid);
                if ($team) {
                    $menus = GeneralUtility::trimExplode(',', $this->processorConfiguration['addToMenus'], true);
                    foreach ($menus as $menu) {
                        if (isset($processedData[$menu])) {
                            $this->addExtensionRecordToMenu($team, $processedData[$menu]);
                            $this->addActionToMenu(
                                LocalizationUtility::translate('tx_sportms_action.team.' . strtolower(GeneralUtility::_GET('tx_sportms_team')['action']),
                                    'sportms'),
                                $processedData[$menu]
                            );
                        }
                    }
                    // Configuration for "season" argument
                    if (GeneralUtility::_GET('tx_sportms_team')['season']) {
                        $recordTable = 'tx_sportms_domain_model_season';
                        $recordUid = (int)GeneralUtility::_GET('tx_sportms_team')['season'];
                        $season = $this->getExtensionRecord($recordTable, $recordUid);
                        if ($season) {
                            foreach ($menus as $menu) {
                                if (isset($processedData[$menu])) {
                                    $this->addExtensionRecordToMenu($season, $processedData[$menu], false);
                                }
                            }
                        }
                    }
                }
            }
            
            return $processedData;
        }
        
        /**
         * Get the extension record
         *
         * @param string $recordTable
         * @param int $recordUid
         */
        protected function getExtensionRecord(string $recordTable, int $recordUid)
        {
            if ($recordTable && $recordUid) {
                /** @var QueryBuilder $queryBuilder */
                $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable($recordTable);
                $row = $queryBuilder
                    ->select('*')
                    ->from($recordTable, 't')
                    ->where($queryBuilder->expr()->eq('t.uid',
                        $queryBuilder->createNamedParameter($recordUid, \PDO::PARAM_INT)))
                    ->execute()
                    ->fetch();
                
                if (is_array($row) && !empty($row)) {
                    return $row;
                }
            }
            return [];
        }
        
        /**
         * Add the extension record to the menu items
         *
         * @param array $record
         * @param array $menu
         */
        protected function addExtensionRecordToMenu(array $record, array &$menu, $setCurrent = true)
        {
            $element = [];
            $element['data'] = $record;
            $element['title'] = ($record['label']) ?: $record['name'];
            $this->addElementToMenu($element, $menu, $setCurrent);
        }
        
        /**
         * Add an element to the menu items
         *
         * @param array $element
         * @param array $menu
         */
        protected function addElementToMenu(array $element, array &$menu, $setCurrent = true)
        {
            # All other elements in the menu shall be treated as currently not active
            if ($setCurrent) {
                foreach ($menu as &$menuItem) {
                    $menuItem['current'] = 0;
                }
            }
            $menu[] = [
                'data' => $element['data'],
                'title' => $element['title'],
                'active' => 1,
                'current' => 1,
                'link' => GeneralUtility::getIndpEnv('TYPO3_REQUEST_URL'),
            ];
        }
        
        /**
         * Add the action name to the menu items
         *
         * @param String $actionName
         * @param array $menu
         */
        protected function addActionToMenu(string $actionName, array &$menu)
        {
            $menu[] = [
                'data' => null,
                'title' => $actionName,
                'active' => 1,
                'current' => 1,
                'link' => GeneralUtility::getIndpEnv('TYPO3_REQUEST_URL'),
            ];
        }
        
        /**
         * Add the game record to the menu items
         *
         * @param array $game
         * @param array $menu
         * @return array|mixed
         */
        protected function addGameRecordToMenu(array $game, array &$menu)
        {
            $teamSeasonHome = $this->getExtensionRecord('tx_sportms_domain_model_teamseason',
                $game['team_season_home']);
            $teamHome = $this->getExtensionRecord('tx_sportms_domain_model_team',
                $teamSeasonHome['team']);
            $teamSeasonGuest = $this->getExtensionRecord('tx_sportms_domain_model_teamseason',
                $game['team_season_guest']);
            $teamGuest = $this->getExtensionRecord('tx_sportms_domain_model_team',
                $teamSeasonGuest['team']);
            
            $element = [];
            $element['data'] = $game;
            $element['title'] = $teamHome['label'] . " - " . $teamGuest['label'];
            $this->addElementToMenu($element, $menu);
        }
        
    }