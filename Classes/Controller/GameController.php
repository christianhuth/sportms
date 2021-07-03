<?php
	
	namespace Balumedien\Sportms\Controller;

	use Balumedien\Sportms\Domain\Model\Game;
    use TYPO3\CMS\Extbase\Persistence\QueryInterface;
	
	/**
	 * GameController
	 */
	class GameController extends SportMSBaseController {
		
		protected $model = 'game';
		
		/**
		 * @var \Balumedien\Sportms\Domain\Repository\GameRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $gameRepository;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Repository\SportRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $sportRepository;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Repository\SportAgeGroupRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $sportAgeGroupRepository;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Repository\SportAgeLevelRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $sportAgeLevelRepository;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Repository\CompetitionTypeRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $competitionTypeRepository;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Repository\CompetitionRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $competitionRepository;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Repository\ClubRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $clubRepository;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Repository\TeamRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $teamRepository;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Repository\SeasonRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $seasonRepository;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Repository\CompetitionSeasonRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $competitionSeasonRepository;
		
		/**
		
		/**
		 * Initializes the controller before invoking an action method.
		 * Use this method to solve tasks which all actions have in common.
		 */
		public function initializeAction() {
			$this->mapRequestsToSettings();
		}
		
		/**
		 * Use this method to solve tasks which all actions have in common, when VIEW-Context is needed
		 */
		public function initializeActions() {
			$listOfPossibleShowViews = 'index,history,report,stats,ticket';
			$this->determineShowView($this->model);
			$this->determineShowViews($this->model, $listOfPossibleShowViews);
			$this->determineShowNavigationViews($this->model, $listOfPossibleShowViews);
			$this->view->assign('settings', $this->settings);
		}
		
		/**
		 * @return void
		 */
		public function listAction() {
			$this->initializeActions();
			$games = $this->gameRepository->findAll($this->getSportsFilter(), $this->getSportAgeGroupsFilter(), $this->getSportAgeLevelsFilter(), $this->getCompetitionTypesFilter(), $this->getCompetitionsFilter(), $this->getClubsFilter(), $this->getTeamsFilter(), $this->getSeasonsFilter(), $this->getCompetitionSeasonGamedaysFilter());
			$this->view->assign('games', $games);
			/* FRONTEND FILTERS */
			if($this->settings['sport']['sportsSelectbox'] || $this->settings['competitionType']['competitionTypesSelectbox']|| $this->settings['competition']['competitionsSelectbox'] || $this->settings['club']['clubsSelectbox'] || $this->settings['team']['teamsSelectbox'] || $this->settings['season']['seasonsSelectbox']) {
				if($this->settings['sport']['sportsSelectbox']) {
					$sportsSelectbox = $this->sportRepository->findAll($this->getSportsFilter(FALSE));
					$this->view->assign('sportsSelectbox', $sportsSelectbox);
					if($this->settings['sport']['selected'] && $this->settings['sportAgeGroup']['sportAgeGroupsSelectbox']) {
						$sportAgeGroupsSelectbox = $this->sportAgeGroupRepository->findAll($this->getSportsFilter(), $this->getSportAgeGroupsFilter(FALSE));
						$this->view->assign('sportAgeGroupsSelectbox', $sportAgeGroupsSelectbox);
						if($this->settings['sportAgeGroup']['selected'] && $this->settings['sportAgeLevel']['sportAgeLevelsSelectbox']) {
							$sportAgeLevelsSelectbox = $this->sportAgeLevelRepository->findAll($this->getSportsFilter(), $this->getSportAgeGroupsFilter(), $this->getSportAgeLevelsFilter(FALSE));
							$this->view->assign('sportAgeLevelsSelectbox', $sportAgeLevelsSelectbox);
						}
					}
				}
				if($this->settings['competitionType']['competitionTypesSelectbox']) {
					$competitionTypesSelectbox = $this->competitionTypeRepository->findAll($this->getCompetitionTypesFilter(FALSE));
					$this->view->assign('competitionTypesSelectbox', $competitionTypesSelectbox);
				}
				if($this->settings['competition']['competitionsSelectbox']) {
					$competitionsSelectbox = $this->competitionRepository->findAll($this->getSportsFilter(), $this->getSportAgeGroupsFilter(), $this->getSportAgeLevelsFilter(), $this->getCompetitionTypesFilter(), $this->getCompetitionsFilter(FALSE));
					$this->view->assign('competitionsSelectbox', $competitionsSelectbox);
				}
				if($this->settings['club']['clubsSelectbox']) {
					$clubsSelectbox = $this->clubRepository->findAll($this->getClubsFilter(FALSE));
					$this->view->assign('clubsSelectbox', $clubsSelectbox);
				}
				if($this->settings['team']['teamsSelectbox']) {
					$teamsSelectbox = $this->teamRepository->findAll($this->getSportsFilter(), $this->getSportAgeGroupsFilter(), $this->getSportAgeLevelsFilter(), $this->getClubsFilter(), $this->getTeamsFilter(FALSE));
					$this->view->assign('teamsSelectbox', $teamsSelectbox);
				}
				if($this->settings['season']['seasonsSelectbox']) {
					$seasonsSelectbox = $this->seasonRepository->findAll($this->getSeasonsFilter(FALSE));
					$this->view->assign('seasonsSelectbox', $seasonsSelectbox);
				}
				if($this->settings['competition']['selected'] && $this->settings['season']['selected'] && $this->settings['competitionSeasonGameday']['competitionSeasonGamedaysSelectbox']) {
					$competitionSeasonGamedaysSelectbox = $this->competitionSeasonRepository->findAll($this->getSeasonsFilter(FALSE));
					$this->view->assign('competitionSeasonGamedaysSelectbox', $competitionSeasonGamedaysSelectbox);
				}
			}
            $this->pagetitle("Spiele", "Liste");
		}

        /**
         * @param Game $game
         */
        public function indexAction(Game $game = NULL) {
            $this->initializeActions();
            $this->view->assign('game', $game);
            $this->pagetitleForGame($game, "Spielinfo");
        }

        /**
         * @param Game $game
         */
        public function historyAction(Game $game = NULL) {
            $this->initializeActions();
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
                TRUE,
                $orderings);
            $this->view->assign('gamesInCompetition', $gamesInCompetition);
	        $this->view->assign('game', $game);
	        $this->pagetitleForGame($game, "Historie");
        }

        /**
         * @param Game|null $game
         */
        public function reportAction(Game $game = NULL) {
            $this->view->assign('game', $game);
            $this->pagetitleForGame($game, "Spielbericht");
        }

        /**
         * @param Game $game
         * @param string $action
         */
        private function pagetitleForGame(Game $game, string $actionLabel) {
            $teamSeasonHomeLabel = $game->getTeamSeasonHome()->getTeam()->getLabel();
            $teamSeasonGuestLabel = $game->getTeamSeasonGuest()->getTeam()->getLabel();
            $gameLabel = $teamSeasonHomeLabel . " - " . $teamSeasonGuestLabel;
            $gameLabel .= " " . $this->settings['pagetitle']['seperator'];
            $competitionLabel = $game->getCompetitionSeason()->getCompetition()->getLabel();
            $gameLabel .= " " . $competitionLabel;
            $competitionGamedayLabel = $game->getGameday()->getLabel();
            $gameLabel .= " " . $this->settings['pagetitle']['seperator'];
            $gameLabel .= " " . $competitionGamedayLabel;
            $this->pagetitle($gameLabel, $actionLabel);
        }
		
	}