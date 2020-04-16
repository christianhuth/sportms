<?php
	
	namespace Balumedien\Sportms\Controller;
	
	/**
	 * TeamController
	 */
	class TeamController extends SportMSBaseController {
		
		/**
		 * @var \Balumedien\Sportms\Domain\Repository\ClubRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $clubRepository;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Repository\CompetitionRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $competitionRepository;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Repository\GameRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $gameRepository;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Repository\SeasonRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $seasonRepository;
		
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
		 * @var \Balumedien\Sportms\Domain\Repository\TeamRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $teamRepository;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Repository\TeamSeasonRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $teamSeasonRepository;
		
		/**
		 * Initializes the controller before invoking an action method.
		 * Use this method to solve tasks which all actions have in common.
		 */
		public function initializeAction(): void {
			$this->mapRequestsToSettings();
		}
		
		/**
		 * @return void
		 * @throws \TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException
		 */
		public function listAction(): void {
			$teams = $this->teamRepository->findAll($this->getSportsFilter(), $this->getSportAgeGroupsFilter(), $this->getSportAgeLevelsFilter(), $this->getClubsFilter(), $this->getTeamsFilter());
			$this->view->assign('teams', $teams);
			/* FRONTEND FILTERS */
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
			if($this->settings['club']['clubsSelectbox']) {
				$clubsSelectbox = $this->clubRepository->findAll($this->getClubsFilter(FALSE));
				$this->view->assign('clubsSelectbox', $clubsSelectbox);
			}
		}
		
		/**
		 * @param \Balumedien\Sportms\Domain\Model\Team $team
		 */
		public function historyRecordGamesAction(\Balumedien\Sportms\Domain\Model\Team $team = NULL) {
			if($team === NULL) {
				$team = $this->determineTeamFromFlexform();
			}
			$this->view->assign('team', $team);
			$teamUid = $team->getUid();
			$gamesWithHighestWins = $this->gameRepository->findGamesWithHighestWinsForTeam($teamUid, $this->settings['team']['historyRecordGames']['limit']);
			$this->view->assign('gamesWithHighestWins', $gamesWithHighestWins);
			$gamesWithHighestLosts = $this->gameRepository->findGamesWithHighestLostsForTeam($teamUid, $this->settings['team']['historyRecordGames']['limit']);
			$this->view->assign('gamesWithHighestLosts', $gamesWithHighestLosts);
			$gamesWithMostGoals = $this->gameRepository->findGamesWithMostGoalsForTeam($teamUid, $this->settings['team']['historyRecordGames']['limit']);
			$this->view->assign('gamesWithMostGoals', $gamesWithMostGoals);
			$gamesWithMostSpectators = $this->gameRepository->findGamesWithMostSpectatorsForTeam($teamUid, $this->settings['team']['historyRecordGames']['limit']);
			$this->view->assign('gamesWithMostSpectators', $gamesWithMostSpectators);
			$gamesWithFewestSpectators = $this->gameRepository->findGamesWithFewestSpectatorsForTeam($teamUid, $this->settings['team']['historyRecordGames']['limit']);
			$this->view->assign('gamesWithFewestSpectators', $gamesWithFewestSpectators);
			/* FRONTEND FILTERS */
			if($this->settings['competition']['competitionsSelectbox']) {
				$competitionsSelectbox = $this->competitionRepository->findAll($this->getSportsFilter(), $this->getSportAgeGroupsFilter(), $this->getSportAgeLevelsFilter(), $this->getCompetitionTypesFilter(), $this->getCompetitionsFilter(FALSE));
				$this->view->assign('competitionsSelectbox', $competitionsSelectbox);
			}
			if($this->settings['season']['seasonsSelectbox']) {
				$seasonsSelectbox = $this->seasonRepository->findAll($this->getSeasonsFilter(FALSE));
				$this->view->assign('seasonsSelectbox', $seasonsSelectbox);
			}
		}
		
	}