<?php
    
    declare(strict_types=1);
    
    namespace ChristianKnell\Sportms\Controller;
    
    use ChristianKnell\Sportms\Domain\Model\Game;
    use ChristianKnell\Sportms\Domain\Repository\ClubRepository;
    use ChristianKnell\Sportms\Domain\Repository\CompetitionTypeRepository;
    use ChristianKnell\Sportms\Domain\Repository\CompetitionRepository;
    use ChristianKnell\Sportms\Domain\Repository\GameRepository;
    use ChristianKnell\Sportms\Domain\Repository\SeasonRepository;
    use ChristianKnell\Sportms\Domain\Repository\SportRepository;
    use ChristianKnell\Sportms\Domain\Repository\SportAgeGroupRepository;
    use ChristianKnell\Sportms\Domain\Repository\SportAgeLevelRepository;
    use ChristianKnell\Sportms\Domain\Repository\TeamRepository;
    use Psr\Http\Message\ResponseInterface;
    use TYPO3\CMS\Extbase\Persistence\QueryInterface;
    use TYPO3\CMS\Extbase\Utility\LocalizationUtility;

    /**
     * GameController
     */
    class GameController extends SportMSBaseController
    {
        
        /**
         * @var ClubRepository
         */
        protected $clubRepository;
        
        /**
         * @var CompetitionTypeRepository
         */
        protected $competitionTypeRepository;
        
        /**
         * @var CompetitionRepository
         */
        protected $competitionRepository;
        
        /**
         * @var GameRepository
         */
        protected $gameRepository;
        
        /**
         * @var SeasonRepository
         */
        protected $seasonRepository;
        
        /**
         * @var SportRepository
         */
        protected $sportRepository;
        
        /**
         * @var SportAgeGroupRepository
         */
        protected $sportAgeGroupRepository;
        
        /**
         * @var SportAgeLevelRepository
         */
        protected $sportAgeLevelRepository;
        
        /**
         * @var TeamRepository
         */
        protected $teamRepository;

        /**
         * Constructor that injects the repositories
         */
        public function __construct(ClubRepository $clubRepository, CompetitionRepository $competitionRepository, CompetitionTypeRepository $competitionTypeRepository, GameRepository $gameRepository, SeasonRepository $seasonRepository, SportRepository $sportRepository, SportAgeGroupRepository $sportAgeGroupRepository, SportAgeLevelRepository $sportAgeLevelRepository, TeamRepository $teamRepository)
        {
            $this->clubRepository = $clubRepository;
            $this->competitionRepository = $competitionRepository;
            $this->competitionTypeRepository = $competitionTypeRepository;
            $this->gameRepository = $gameRepository;
            $this->seasonRepository = $seasonRepository;
            $this->sportRepository = $sportRepository;
            $this->sportAgeGroupRepository = $sportAgeGroupRepository;
            $this->sportAgeLevelRepository = $sportAgeLevelRepository;
            $this->teamRepository = $teamRepository;
        }
        
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
        public function indexAction(Game $game = null): ResponseInterface
        {
            /* MAIN CONTENT */
            // we need to define if the goal is for the home or the away team here
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
            
            return $this->htmlResponse();
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
        public function historyAction(Game $game = null): ResponseInterface
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
            
            return $this->htmlResponse();
        }
        
        /**
         * @param Game|null $game
         */
        public function reportAction(Game $game = null): ResponseInterface
        {
            /* MAIN CONTENT */
            $this->view->assign('game', $game);
            
            /* PAGETITLE */
            $this->pagetitleForGame(
                $game,
                LocalizationUtility::translate('tx_sportms_action.game.report', "sportms")
            );
            
            return $this->htmlResponse();
        }
        
    }