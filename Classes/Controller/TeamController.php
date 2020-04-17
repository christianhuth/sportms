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
		 * @var \Balumedien\Sportms\Domain\Repository\CompetitionTypeRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $competitionTypeRepository;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Repository\GameRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $gameRepository;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Repository\GameGoalRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $gameGoalRepository;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Repository\GameLineupRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $gameLineupRepository;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Repository\PersonRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $personRepository;
		
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
		 * @var \Balumedien\Sportms\Domain\Repository\SportPositionGroupRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $sportPositionGroupRepository;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Repository\SportPositionRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $sportPositionRepository;
		
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
			$gamesWithHighestWins = $this->gameRepository->findGamesWithHighestWinsForTeam($teamUid, $this->settings['team']['historyRecordGames']['limit'], $this->getCompetitionsFilter(), $this->getSeasonsFilter());
			$this->view->assign('gamesWithHighestWins', $gamesWithHighestWins);
			$gamesWithHighestLosts = $this->gameRepository->findGamesWithHighestLostsForTeam($teamUid, $this->settings['team']['historyRecordGames']['limit'], $this->getCompetitionsFilter(), $this->getSeasonsFilter());
			$this->view->assign('gamesWithHighestLosts', $gamesWithHighestLosts);
			$gamesWithMostGoals = $this->gameRepository->findGamesWithMostGoalsForTeam($teamUid, $this->settings['team']['historyRecordGames']['limit'], $this->getCompetitionsFilter(), $this->getSeasonsFilter());
			$this->view->assign('gamesWithMostGoals', $gamesWithMostGoals);
			$gamesWithMostSpectators = $this->gameRepository->findGamesWithMostSpectatorsForTeam($teamUid, $this->settings['team']['historyRecordGames']['limit'], $this->getCompetitionsFilter(), $this->getSeasonsFilter());
			$this->view->assign('gamesWithMostSpectators', $gamesWithMostSpectators);
			$gamesWithFewestSpectators = $this->gameRepository->findGamesWithFewestSpectatorsForTeam($teamUid, $this->settings['team']['historyRecordGames']['limit'], $this->getCompetitionsFilter(), $this->getSeasonsFilter());
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
		
		/**
		 * @param \Balumedien\Sportms\Domain\Model\Team $team
		 */
		public function historyRecordPlayersAction(\Balumedien\Sportms\Domain\Model\Team $team = NULL) {
			if($team === NULL) {
				$team = $this->determineTeamFromFlexform();
			}
			$teamUid = $team->getUid();
			$playersWithMostGamesAsArray = $this->gameLineupRepository->findPlayersWithMostGames($this->getSportsFilter(), $this->getSportAgeGroupsFilter(), $this->getSportAgeLevelsFilter(), $this->getSportPositionGroupsFilter(), $this->getSportPositionsFilter(), $this->getCompetitionTypesFilter(), $this->getCompetitionsFilter(), $this->getClubsFilter(), $teamUid, $this->getSeasonsFilter(), $this->settings['team']['historyRecordPlayers']['limit']);
			$playersWithMostGames = [];
			foreach($playersWithMostGamesAsArray AS $playerWithMostGamesAsArray) {
				$playerWithMostGames = new \Balumedien\Sportms\Domain\Model\PlayerStat();
				$playerWithMostGames->setPerson($this->personRepository->findByUid($playerWithMostGamesAsArray['person']));
				$playerWithMostGames->setNumberOfGames($playerWithMostGamesAsArray['numberOfGames']);
				$playerWithMostGames->setNumberOfStartingFormation($playerWithMostGamesAsArray['numberOfStartingFormation']);
				$playersWithMostGames[] = $playerWithMostGames;
			}
			$this->view->assign('playersWithMostGames', $playersWithMostGames);
			$playersWithMostGoalsAsArray = $this->gameGoalRepository->findPlayersWithMostGoals($this->getSportsFilter(), $this->getSportAgeGroupsFilter(), $this->getSportAgeLevelsFilter(), $this->getSportPositionGroupsFilter(), $this->getSportPositionsFilter(), $this->getCompetitionTypesFilter(), $this->getCompetitionsFilter(), $this->getClubsFilter(), $teamUid, $this->getSeasonsFilter(), $this->settings['team']['historyRecordPlayers']['limit']);
			$playersWithMostGoals = [];
			foreach($playersWithMostGoalsAsArray AS $playerWithMostGoalsAsArray) {
				$playerWithMostGoals = new \Balumedien\Sportms\Domain\Model\PlayerStat();
				$playerWithMostGoals->setPerson($this->personRepository->findByUid($playerWithMostGoalsAsArray['scorer']));
				$playerWithMostGoals->setNumberOfGoals($playerWithMostGoalsAsArray['numberOfGoals']);
				$playersWithMostGoals[] = $playerWithMostGoals;
			}
			$this->view->assign('playersWithMostGoals', $playersWithMostGoals);
			$playersWithMostAssistsAsArray = $this->gameGoalRepository->findPlayersWithMostAssists($this->getSportsFilter(), $this->getSportAgeGroupsFilter(), $this->getSportAgeLevelsFilter(), $this->getSportPositionGroupsFilter(), $this->getSportPositionsFilter(), $this->getCompetitionTypesFilter(), $this->getCompetitionsFilter(), $this->getClubsFilter(), $teamUid, $this->getSeasonsFilter(), $this->settings['team']['historyRecordPlayers']['limit']);
			$playersWithMostAssists = [];
			foreach($playersWithMostAssistsAsArray AS $playerWithMostAssistsAsArray) {
				$playerWithMostAssists = new \Balumedien\Sportms\Domain\Model\PlayerStat();
				$playerWithMostAssists->setPerson($this->personRepository->findByUid($playerWithMostAssistsAsArray['assist']));
				$playerWithMostAssists->setNumberOfAssists($playerWithMostAssistsAsArray['numberOfAssists']);
				$playersWithMostAssists[] = $playerWithMostAssists;
			}
			$this->view->assign('playersWithMostAssists', $playersWithMostAssists);
			/* FRONTEND FILTERS */
			if($this->settings['competitionType']['competitionTypesSelectbox']) {
				$competitionTypesSelectbox = $this->competitionTypeRepository->findAll($this->getCompetitionTypesFilter(FALSE));
				$this->view->assign('competitionTypesSelectbox', $competitionTypesSelectbox);
			}
			if($this->settings['competition']['competitionsSelectbox']) {
				$competitionsSelectbox = $this->competitionRepository->findAll($this->getSportsFilter(), $this->getSportAgeGroupsFilter(), $this->getSportAgeLevelsFilter(), $this->getCompetitionTypesFilter(), $this->getCompetitionsFilter(FALSE));
				$this->view->assign('competitionsSelectbox', $competitionsSelectbox);
			}
			if($this->settings['sportPositionGroup']['sportPositionGroupsSelectbox']) {
				$sportPositionGroupsSelectbox = $this->sportPositionGroupRepository->findAll($this->getSportsFilter(), $this->getSportPositionGroupsFilter(FALSE));
				$this->view->assign('sportPositionGroupsSelectbox', $sportPositionGroupsSelectbox);
			}
			if($this->settings['sportPosition']['sportPositionsSelectbox']) {
				$sportPositionsSelectbox = $this->sportPositionRepository->findAll($this->getSportsFilter(), $this->getSportPositionGroupsFilter(), $this->getSportPositionsFilter(FALSE));
				$this->view->assign('sportPositionsSelectbox', $sportPositionsSelectbox);
			}
		}
		
	}