<?php
    
    namespace Balumedien\Sportms\Controller;
    
    use Balumedien\Sportms\Domain\Model\Season;
    use Balumedien\Sportms\Domain\Model\Team;
    use Balumedien\Sportms\Domain\Model\TeamSeasonOfficial;

    /**
     * TeamController
     */
    class TeamController extends SportMSBaseController
    {
        
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
         * @var \Balumedien\Sportms\Domain\Repository\TeamSeasonOfficialRepository
         * @TYPO3\CMS\Extbase\Annotation\Inject
         */
        protected $teamSeasonOfficialRepository;
        
        /**
         * @var \Balumedien\Sportms\Domain\Repository\TeamSeasonOfficialJobRepository
         * @TYPO3\CMS\Extbase\Annotation\Inject
         */
        protected $teamSeasonOfficialJobRepository;
        
        /**
         * Initializes the controller before invoking an action method.
         * Use this method to solve tasks which all actions have in common.
         */
        public function initializeAction(): void
        {
            $this->mapRequestsToSettings();
        }
        
        /**
         * @param Team|null $team
         */
        public function historyOfficialsAction(Team $team = null)
        {
            if ($team === null) {
                $team = $this->determineTeam();
            }
            $this->view->assign('team', $team);
            $officials = $this->teamSeasonOfficialRepository->findAllByTeam($team);
            $officialsByTerm = [];
            $lastOfficial = null;
            foreach ($officials as $official) {
                # if no startdate is given we use startdate of the season
                if (empty($official->getStartdate())) {
                    $official->setStartdate($official->getTeamSeason()->getSeason()->getStartdate());
                }
                # if no enddate is given we use enddate of the season
                if (empty($official->getEnddate())) {
                    $official->setEnddate($official->getTeamSeason()->getSeason()->getEnddate());
                }
                if ($lastOfficial === null) {
                    $lastOfficial = $official;
                }
                if (($lastOfficial->getPerson() !== $official->getPerson()) || ($lastOfficial->getTeamSeasonOfficialJob() !== $official->getTeamSeasonOfficialJob())) {
                    $officialsByTerm[] = $lastOfficial;
                } else {
                    if ($this->consecutiveTeamSeasonOfficials($lastOfficial, $official)) {
                        # use the startdate
                        $official->setStartdate($lastOfficial->getStartdate());
                        if ($official->getEnddate() > $lastOfficial->getEnddate()) {
                            $lastOfficial->setEnddate($official->getEnddate());
                        }
                        if ($official->getTeamSeason()->getSeason()->getEnddate() > $lastOfficial->getEnddate()) {
                            $lastOfficial->setEnddate($official->getTeamSeason()->getSeason()->getEnddate());
                        }
                    } else {
                        $officialsByTerm[] = $lastOfficial;
                    }
                }
                $lastOfficial = $official;
            }
            $officialsByTerm = $this->orderTeamSeasonOfficials($officialsByTerm);
            $this->view->assign('officials', $officialsByTerm);
            $officialJobsSelectbox = $this->teamSeasonOfficialJobRepository->findAll();
            $this->view->assign('officialJobsSelectbox', $officialJobsSelectbox);
            $this->pagetitleForTeam($team, "Funktionärshistorie");
        }
        
        /**
         * @param TeamSeasonOfficial $officialTerm1
         * @param TeamSeasonOfficial $officialTerm2
         */
        private function consecutiveTeamSeasonOfficials(
            \Balumedien\Sportms\Domain\Model\TeamSeasonOfficial $officialTerm1,
            TeamSeasonOfficial $officialTerm2
        ): bool {
            # the difference between the old end and the new start is equal to one day OR
            # the old end is earlier than the new start
            if (((($officialTerm2->getStartdate() - $officialTerm1->getEnddate()) / 60 / 60 / 24) == 1) ||
                ($officialTerm1->getEnddate() > $officialTerm2->getStartdate())) {
                return true;
            } else {
                return false;
            }
        }
        
        /**
         * @param array $teamSeasonOfficials
         */
        private function orderTeamSeasonOfficials(array $teamSeasonOfficials): array
        {
            # a - b = ASC
            # b - a = DESC
            usort($teamSeasonOfficials, static function ($a, $b) {
                $endDateDiff = strcmp($b->getEnddate(), $a->getEnddate());
                if ($endDateDiff) {
                    return $endDateDiff;
                }
                $startDateDiff = strcmp($b->getStartdate(), $a->getStartdate());
                if ($startDateDiff) {
                    return $startDateDiff;
                }
                return strcmp($a->getPerson()->getLastname(), $b->getPerson()->getFirstname());
            });
            return $teamSeasonOfficials;
        }
        
        /**
         * @param Team $team
         * @param string $action
         */
        private function pagetitleForTeam(Team $team, string $actionLabel)
        {
            $teamLabel = $team->getLabel();
            $this->pagetitle($teamLabel, $actionLabel);
        }
        
        /**
         * @param Team|null $team
         */
        public function historyRecordGamesAction(Team $team = null)
        {
            if ($team === null) {
                $team = $this->determineTeam();
            }
            $this->view->assign('team', $team);
            $teamUid = $team->getUid();
            $gamesWithHighestWins = $this->gameRepository->findGamesWithHighestWinsForTeam($teamUid,
                $this->settings['team']['historyRecordGames']['limit'], $this->getCompetitionsFilter(),
                $this->getSeasonsFilter());
            $this->view->assign('gamesWithHighestWins', $gamesWithHighestWins);
            $gamesWithHighestLosts = $this->gameRepository->findGamesWithHighestLostsForTeam($teamUid,
                $this->settings['team']['historyRecordGames']['limit'], $this->getCompetitionsFilter(),
                $this->getSeasonsFilter());
            $this->view->assign('gamesWithHighestLosts', $gamesWithHighestLosts);
            $gamesWithMostGoals = $this->gameRepository->findGamesWithMostGoalsForTeam($teamUid,
                $this->settings['team']['historyRecordGames']['limit'], $this->getCompetitionsFilter(),
                $this->getSeasonsFilter());
            $this->view->assign('gamesWithMostGoals', $gamesWithMostGoals);
            $gamesWithMostSpectators = $this->gameRepository->findGamesWithMostSpectatorsForTeam($teamUid,
                $this->settings['team']['historyRecordGames']['limit'], $this->getCompetitionsFilter(),
                $this->getSeasonsFilter());
            $this->view->assign('gamesWithMostSpectators', $gamesWithMostSpectators);
            $gamesWithFewestSpectators = $this->gameRepository->findGamesWithFewestSpectatorsForTeam($teamUid,
                $this->settings['team']['historyRecordGames']['limit'], $this->getCompetitionsFilter(),
                $this->getSeasonsFilter());
            $this->view->assign('gamesWithFewestSpectators', $gamesWithFewestSpectators);
            /* FRONTEND FILTERS */
            if ($this->settings['competition']['competitionsSelectbox']) {
                $competitionsSelectbox = $this->competitionRepository->findAll($this->getSportsFilter(),
                    $this->getSportAgeGroupsFilter(), $this->getSportAgeLevelsFilter(),
                    $this->getCompetitionTypesFilter(), $this->getCompetitionsFilter(false), $teamUid);
                $this->view->assign('competitionsSelectbox', $competitionsSelectbox);
            }
            if ($this->settings['season']['seasonsSelectbox']) {
                $seasonsSelectbox = $this->seasonRepository->findAll($this->getSeasonsFilter(false));
                $this->view->assign('seasonsSelectbox', $seasonsSelectbox);
            }
            $this->pagetitleForTeam($team, "Rekordspiele");
        }
        
        /**
         * @param Team $team
         */
        public function historyRecordPlayersAction(Team $team = null)
        {
            if ($team === null) {
                $team = $this->determineTeam();
            }
            $this->view->assign('team', $team);
            $teamUid = $team->getUid();
            $playersWithMostGamesAsArray = $this->gameLineupRepository->findPlayersWithMostGames($this->getSportsFilter(),
                $this->getSportAgeGroupsFilter(), $this->getSportAgeLevelsFilter(),
                $this->getSportPositionGroupsFilter(), $this->getSportPositionsFilter(),
                $this->getCompetitionTypesFilter(), $this->getCompetitionsFilter(), $this->getClubsFilter(), $teamUid,
                $this->getSeasonsFilter(), $this->settings['team']['historyRecordPlayers']['limit']);
            $playersWithMostGames = [];
            foreach ($playersWithMostGamesAsArray as $playerWithMostGamesAsArray) {
                $playerWithMostGames = new \Balumedien\Sportms\Domain\Model\PlayerStat();
                $playerWithMostGames->setPerson($this->personRepository->findByUid($playerWithMostGamesAsArray['person']));
                $playerWithMostGames->setNumberOfGames($playerWithMostGamesAsArray['numberOfGames']);
                $playerWithMostGames->setNumberOfStartingFormation($playerWithMostGamesAsArray['numberOfStartingFormation']);
                $playersWithMostGames[] = $playerWithMostGames;
            }
            $this->view->assign('playersWithMostGames', $playersWithMostGames);
            $playersWithMostGoalsAsArray = $this->gameGoalRepository->findPlayersWithMostGoals($this->getSportsFilter(),
                $this->getSportAgeGroupsFilter(), $this->getSportAgeLevelsFilter(),
                $this->getSportPositionGroupsFilter(), $this->getSportPositionsFilter(),
                $this->getCompetitionTypesFilter(), $this->getCompetitionsFilter(), $this->getClubsFilter(), $teamUid,
                $this->getSeasonsFilter(), $this->settings['team']['historyRecordPlayers']['limit']);
            $playersWithMostGoals = [];
            foreach ($playersWithMostGoalsAsArray as $playerWithMostGoalsAsArray) {
                $playerWithMostGoals = new \Balumedien\Sportms\Domain\Model\PlayerStat();
                $playerWithMostGoals->setPerson($this->personRepository->findByUid($playerWithMostGoalsAsArray['scorer']));
                $playerWithMostGoals->setNumberOfGoals($playerWithMostGoalsAsArray['numberOfGoals']);
                $playersWithMostGoals[] = $playerWithMostGoals;
            }
            $this->view->assign('playersWithMostGoals', $playersWithMostGoals);
            $playersWithMostAssistsAsArray = $this->gameGoalRepository->findPlayersWithMostAssists($this->getSportsFilter(),
                $this->getSportAgeGroupsFilter(), $this->getSportAgeLevelsFilter(),
                $this->getSportPositionGroupsFilter(), $this->getSportPositionsFilter(),
                $this->getCompetitionTypesFilter(), $this->getCompetitionsFilter(), $this->getClubsFilter(), $teamUid,
                $this->getSeasonsFilter(), $this->settings['team']['historyRecordPlayers']['limit']);
            $playersWithMostAssists = [];
            foreach ($playersWithMostAssistsAsArray as $playerWithMostAssistsAsArray) {
                $playerWithMostAssists = new \Balumedien\Sportms\Domain\Model\PlayerStat();
                $playerWithMostAssists->setPerson($this->personRepository->findByUid($playerWithMostAssistsAsArray['assist']));
                $playerWithMostAssists->setNumberOfAssists($playerWithMostAssistsAsArray['numberOfAssists']);
                $playersWithMostAssists[] = $playerWithMostAssists;
            }
            $this->view->assign('playersWithMostAssists', $playersWithMostAssists);
            /* FRONTEND FILTERS */
            if ($this->settings['competitionType']['selectbox']['enabled']) {
                $competitionTypesSelectbox = $this->competitionTypeRepository->findAll($this->getCompetitionTypesFilter(false));
                $this->view->assign('competitionTypesSelectbox', $competitionTypesSelectbox);
            }
            if ($this->settings['competition']['selectbox']['enabled']) {
                $competitionsSelectbox = $this->competitionRepository->findAll($this->getSportsFilter(),
                    $this->getSportAgeGroupsFilter(), $this->getSportAgeLevelsFilter(),
                    $this->getCompetitionTypesFilter(), $this->getCompetitionsFilter(false), $teamUid);
                $this->view->assign('competitionsSelectbox', $competitionsSelectbox);
            }
            if ($this->settings['sportPositionGroup']['selectbox']['enabled']) {
                $sportPositionGroupsSelectbox = $this->sportPositionGroupRepository->findAll($this->getSportsFilter(),
                    $this->getSportPositionGroupsFilter(false));
                $this->view->assign('sportPositionGroupsSelectbox', $sportPositionGroupsSelectbox);
            }
            if ($this->settings['sportPosition']['selectbox']['enabled']) {
                $sportPositionsSelectbox = $this->sportPositionRepository->findAll($this->getSportsFilter(),
                    $this->getSportPositionGroupsFilter(), $this->getSportPositionsFilter(false));
                $this->view->assign('sportPositionsSelectbox', $sportPositionsSelectbox);
            }
            $this->pagetitleForTeam($team, "Rekordspieler");
        }
        
        /**
         * @return void
         * @throws \TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException
         */
        public function listAction(): void
        {
    
            if($this->request->hasArgument("club")) {
                \TYPO3\CMS\Core\Utility\DebugUtility::debug($this->request->getArgument("club"), 'Debug: ' . __FILE__ . ' in Line: ' . __LINE__);
            }
            
            
            
            $teams = $this->teamRepository->findAll($this->getSportsFilter(), $this->getSportAgeGroupsFilter(),
                $this->getSportAgeLevelsFilter(), $this->getClubsFilter(), $this->getTeamsFilter());
            $this->view->assign('teams', $teams);
            /* FRONTEND FILTERS */
            if ($this->settings['sport']['selectbox']['enabled']) {
                $sportsSelectbox = $this->sportRepository->findAll($this->getSportsFilter(false));
                $this->view->assign('sportsSelectbox', $sportsSelectbox);
                if ($this->settings['sport']['selected'] && $this->settings['sportAgeGroup']['sportAgeGroupsSelectbox']) {
                    $sportAgeGroupsSelectbox = $this->sportAgeGroupRepository->findAll($this->getSportsFilter(),
                        $this->getSportAgeGroupsFilter(false));
                    $this->view->assign('sportAgeGroupsSelectbox', $sportAgeGroupsSelectbox);
                    if ($this->settings['sportAgeGroup']['selected'] && $this->settings['sportAgeLevel']['sportAgeLevelsSelectbox']) {
                        $sportAgeLevelsSelectbox = $this->sportAgeLevelRepository->findAll($this->getSportsFilter(),
                            $this->getSportAgeGroupsFilter(), $this->getSportAgeLevelsFilter(false));
                        $this->view->assign('sportAgeLevelsSelectbox', $sportAgeLevelsSelectbox);
                    }
                }
            }
            if ($this->settings['club']['selectbox']['enabled']) {
                $clubsSelectbox = $this->clubRepository->findAll($this->getClubsFilter(false));
                $this->view->assign('clubsSelectbox', $clubsSelectbox);
            }
            $this->pagetitle("Mannschaften", "Liste");
        }
        
        
        public function seasonIndexAction(Team $team = null, Season $season = null) {
            if ($team === null) {
                $team = $this->determineTeam();
            }
            $this->view->assign('team', $team);
            if ($season === null) {
                $season = $this->determineSeason();
            }
            if ($season === null) {
                if($team->getTeamSeasons()) {
                    $season = $team->getTeamSeasons()[0]->getSeason();
                } else {
                    die();
                }
            }
            $this->view->assign('season', $season);
            $teamSeason = $this->teamSeasonRepository->findByTeamAndSeason($team, $season);
            $this->view->assign('teamSeason', $teamSeason);
        }
        
    }