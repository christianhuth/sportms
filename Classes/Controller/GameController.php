<?php
    
    namespace ChristianKnell\Sportms\Controller;
    
    use ChristianKnell\Sportms\Domain\Model\Game;
    use TYPO3\CMS\Extbase\Persistence\QueryInterface;
    use TYPO3\CMS\Extbase\Utility\LocalizationUtility;

    /**
     * GameController
     */
    class GameController extends SportMSBaseController
    {
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Repository\ClubRepository
         * @TYPO3\CMS\Extbase\Annotation\Inject
         */
        protected $clubRepository;
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Repository\CompetitionTypeRepository
         * @TYPO3\CMS\Extbase\Annotation\Inject
         */
        protected $competitionTypeRepository;
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Repository\CompetitionRepository
         * @TYPO3\CMS\Extbase\Annotation\Inject
         */
        protected $competitionRepository;
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Repository\GameRepository
         * @TYPO3\CMS\Extbase\Annotation\Inject
         */
        protected $gameRepository;
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Repository\SeasonRepository
         * @TYPO3\CMS\Extbase\Annotation\Inject
         */
        protected $seasonRepository;
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Repository\SportRepository
         * @TYPO3\CMS\Extbase\Annotation\Inject
         */
        protected $sportRepository;
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Repository\SportAgeGroupRepository
         * @TYPO3\CMS\Extbase\Annotation\Inject
         */
        protected $sportAgeGroupRepository;
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Repository\SportAgeLevelRepository
         * @TYPO3\CMS\Extbase\Annotation\Inject
         */
        protected $sportAgeLevelRepository;
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Repository\TeamRepository
         * @TYPO3\CMS\Extbase\Annotation\Inject
         */
        protected $teamRepository;
        
        /**
         * @return void
         */
        public function listAction()
        {
            /* MAIN CONTENT */
            $games = $this->gameRepository->findAll($this->getSportsFilter(), $this->getSportAgeGroupsFilter(),
                $this->getSportAgeLevelsFilter(), $this->getCompetitionTypesFilter(), $this->getCompetitionsFilter(),
                $this->getClubsFilter(), $this->getTeamsFilter(), $this->getSeasonsFilter(),
                $this->getCompetitionSeasonGamedaysFilter());
            $this->view->assign('games', $games);
            
            /* FRONTEND FILTERS */
            $this->assignSelectboxValues('club');
            $this->assignSelectboxValues('competition');
            $this->assignSelectboxValues('competitionType');
            $this->assignSelectboxValues('season');
            $this->assignSelectboxValues('sport');
            $this->assignSelectboxValues('sportAgeGroup');
            $this->assignSelectboxValues('sportAgeLevel');
            $this->assignSelectboxValues('team');
            
            /* PAGETITLE */
            $this->pagetitle(
                LocalizationUtility::translate('tx_sportms_domain_model_game.plural', "sportms"),
                LocalizationUtility::translate('tx_sportms_action.game.list', "sportms")
            );
        }
        
        /**
         * @param Game $game
         */
        public function indexAction(Game $game = null)
        {
            /* MAIN CONTENT */
            $gameGoalsWithType = $game->getGameGoals();
            if ($gameGoalsWithType) {
                for ($i = 0; $i < count($gameGoalsWithType); $i++) {
                    $currentGoalHome = $gameGoalsWithType[$i]->getGoalHome();
                    $currentGoalGuest = $gameGoalsWithType[$i]->getGoalGuest();
                    if ($i == 0) {
                        ($currentGoalHome > $currentGoalGuest) ? $type = 'home' : $type = 'guest';
                    } else {
                        if ($currentGoalHome > $previousGoalHome) {
                            $type = 'home';
                        } else {
                            if ($currentGoalGuest > $previousGoalGuest) {
                                $type = 'guest';
                            } else {
                                $type = 'error';
                            }
                        }
                    }
                    $gameGoalsWithType[$i]->setType($type);
                    $previousGoalHome = $currentGoalHome;
                    $previousGoalGuest = $currentGoalGuest;
                }
                $game->setGameGoals($gameGoalsWithType);
            }
            $this->view->assign('game', $game);
            
            /* PAGETITLE */
            $this->pagetitleForGame(
                $game,
                LocalizationUtility::translate('tx_sportms_action.game.index', "sportms")
            );
        }
        
        /**
         * @param Game $game
         * @param string $action
         */
        private function pagetitleForGame(Game $game, string $actionLabel)
        {
            $teamSeasonHomeLabel = $game->getTeamSeasonHome()->getTeam()->getLabel();
            $teamSeasonGuestLabel = $game->getTeamSeasonGuest()->getTeam()->getLabel();
            $gameLabel = $teamSeasonHomeLabel . " - " . $teamSeasonGuestLabel;
            $gameLabel .= " " . $this->settings['pagetitle']['seperator'];
            $competitionLabel = $game->getCompetitionSeason()->getCompetition()->getLabel();
            $gameLabel .= " " . $competitionLabel;
            $seasonLabel = $game->getSeason()->getLabel();
            $gameLabel .= " " . $seasonLabel;
            $competitionGamedayLabel = $game->getGameday()->getLabel();
            $gameLabel .= " " . $this->settings['pagetitle']['seperator'];
            $gameLabel .= " " . $competitionGamedayLabel;
            $this->pagetitle($gameLabel, $actionLabel);
        }
        
        /**
         * @param Game $game
         */
        public function historyAction(Game $game = null)
        {
            /* MAIN CONTENT */
            $orderings = [
                'date' => QueryInterface::ORDER_DESCENDING,
                'time' => QueryInterface::ORDER_DESCENDING,
            ];
            $gamesInCompetition = $this->gameRepository->findAll(
                null,
                null,
                null,
                null,
                null,
                null,
                $game->getTeamSeasonHome()->getTeam()->getUid() . "," . $game->getTeamSeasonGuest()->getTeam()->getUid(),
                null,
                null,
                true,
                $orderings);
            $this->view->assign('gamesInCompetition', $gamesInCompetition);
            $this->view->assign('game', $game);
            
            /* PAGETITLE */
            $this->pagetitleForGame(
                $game,
                LocalizationUtility::translate('tx_sportms_action.game.history', "sportms")
            );
        }
        
        /**
         * @param Game|null $game
         */
        public function reportAction(Game $game = null)
        {
            /* MAIN CONTENT */
            $this->view->assign('game', $game);
            
            /* PAGETITLE */
            $this->pagetitleForGame(
                $game,
                LocalizationUtility::translate('tx_sportms_action.game.report', "sportms")
            );
        }
        
    }