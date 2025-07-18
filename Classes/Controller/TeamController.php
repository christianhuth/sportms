<?php
    
    declare(strict_types=1);
    
    namespace ChristianKnell\Sportms\Controller;
    
    use ChristianKnell\Sportms\Domain\Model\Season;
    use ChristianKnell\Sportms\Domain\Model\Team;
    use ChristianKnell\Sportms\Domain\Model\TeamSeason;
    use ChristianKnell\Sportms\Domain\Model\TeamSeasonOfficial;
    use ChristianKnell\Sportms\Domain\Repository\ClubRepository;
    use ChristianKnell\Sportms\Domain\Repository\CompetitionRepository;
    use ChristianKnell\Sportms\Domain\Repository\CompetitionSeasonRepository;
    use ChristianKnell\Sportms\Domain\Repository\CompetitionTypeRepository;
    use ChristianKnell\Sportms\Domain\Repository\GameRepository;
    use ChristianKnell\Sportms\Domain\Repository\GameGoalRepository;
    use ChristianKnell\Sportms\Domain\Repository\GameLineupRepository;
    use ChristianKnell\Sportms\Domain\Repository\OfficialJobRepository;
    use ChristianKnell\Sportms\Domain\Repository\PersonRepository;
    use ChristianKnell\Sportms\Domain\Repository\PersonProfileRepository;
    use ChristianKnell\Sportms\Domain\Repository\SeasonRepository;
    use ChristianKnell\Sportms\Domain\Repository\SportRepository;
    use ChristianKnell\Sportms\Domain\Repository\SportAgeGroupRepository;
    use ChristianKnell\Sportms\Domain\Repository\SportAgeLevelRepository;
    use ChristianKnell\Sportms\Domain\Repository\SportPositionGroupRepository;
    use ChristianKnell\Sportms\Domain\Repository\SportPositionRepository;
    use ChristianKnell\Sportms\Domain\Repository\TeamRepository;
    use ChristianKnell\Sportms\Domain\Repository\TeamSeasonRepository;
    use ChristianKnell\Sportms\Domain\Repository\TeamSeasonOfficialRepository;
    use Psr\Http\Message\ResponseInterface;
    use TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException;
    use TYPO3\CMS\Extbase\Persistence\QueryInterface;
    use TYPO3\CMS\Extbase\Utility\LocalizationUtility;

    /**
     * TeamController
     */
    class TeamController extends SportMSBaseController
    {
        
        /**
         * @var ClubRepository
         */
        protected $clubRepository;
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Repository\CompetitionRepository
         */
        protected $competitionRepository;
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Repository\CompetitionSeasonRepository
         */
        protected $competitionSeasonRepository;
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Repository\CompetitionTypeRepository
         */
        protected $competitionTypeRepository;
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Repository\GameRepository
         */
        protected $gameRepository;
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Repository\GameGoalRepository
         */
        protected $gameGoalRepository;
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Repository\GameLineupRepository
         */
        protected $gameLineupRepository;
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Repository\OfficialJobRepository
         */
        protected $officialJobRepository;
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Repository\PersonRepository
         */
        protected $personRepository;
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Repository\PersonProfileRepository
         */
        protected $personProfileRepository;
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Repository\SeasonRepository
         */
        protected $seasonRepository;
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Repository\SportRepository
         */
        protected $sportRepository;
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Repository\SportAgeGroupRepository
         */
        protected $sportAgeGroupRepository;
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Repository\SportAgeLevelRepository
         */
        protected $sportAgeLevelRepository;
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Repository\SportPositionGroupRepository
         */
        protected $sportPositionGroupRepository;
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Repository\SportPositionRepository
         */
        protected $sportPositionRepository;
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Repository\TeamRepository
         */
        protected $teamRepository;
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Repository\TeamSeasonRepository
         */
        protected $teamSeasonRepository;
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Repository\TeamSeasonOfficialRepository
         */
        protected $teamSeasonOfficialRepository;

        /**
         * Constructor that injects the repositories
         */
        public function __construct(ClubRepository $clubRepository, CompetitionRepository $competitionRepository, CompetitionSeasonRepository $competitionSeasonRepository, CompetitionTypeRepository $competitionTypeRepository, GameRepository $gameRepository, GameGoalRepository $gameGoalRepository, GameLineupRepository $gameLineupRepository, OfficialJobRepository $officialJobRepository, PersonRepository $personRepository, PersonProfileRepository $personProfileRepository, SeasonRepository $seasonRepository, SportRepository $sportRepository, SportAgeGroupRepository $sportAgeGroupRepository, SportAgeLevelRepository $sportAgeLevelRepository, SportPositionGroupRepository $sportPositionGroupRepository, SportPositionRepository $sportPositionRepository, TeamRepository $teamRepository, TeamSeasonRepository $teamSeasonRepository, TeamSeasonOfficialRepository $teamSeasonOfficialRepository)
        {
            $this->clubRepository = $clubRepository;
            $this->competitionRepository = $competitionRepository;
            $this->competitionSeasonRepository = $competitionSeasonRepository;
            $this->competitionTypeRepository = $competitionTypeRepository;
            $this->gameRepository = $gameRepository;
            $this->gameGoalRepository = $gameGoalRepository;
            $this->gameLineupRepository = $gameLineupRepository;
            $this->officialJobRepository = $officialJobRepository;
            $this->personRepository = $personRepository;
            $this->personProfileRepository = $personProfileRepository;
            $this->seasonRepository = $seasonRepository;
            $this->sportRepository = $sportRepository;
            $this->sportAgeGroupRepository = $sportAgeGroupRepository;
            $this->sportAgeLevelRepository = $sportAgeLevelRepository;
            $this->sportPositionGroupRepository = $sportPositionGroupRepository;
            $this->sportPositionRepository = $sportPositionRepository;
            $this->teamRepository = $teamRepository;
            $this->teamSeasonRepository = $teamSeasonRepository;
            $this->teamSeasonOfficialRepository = $teamSeasonOfficialRepository;
        }
        
        /**
         * @param Team|null $team
         * @param Season|null $season
         */
        private function assignSeasonToView(Team $team = null, Season $season = null): Season
        {
            if ($season === null) {
                $season = $this->determineSeason();
            }
            if ($season === null) {
                if ($team->getTeamSeasons()) {
                    $season = $team->getTeamSeasons()[0]->getSeason();
                } else {
                    die();
                }
            }
            $this->view->assign('season', $season);
            return $season;
        }
        
        /**
         * @param Team $team
         */
        private function assignSeasonSelectboxValuesToView(Team $team)
        {
            $seasonSelectboxValues = $this->teamSeasonRepository->findbyTeam($team);
            $this->view->assign('seasonSelectboxValues', $seasonSelectboxValues);
        }
        
        /**
         * @param Team $team
         * @param Season $season
         */
        private function assignTeamSeasonToView(Team $team, Season $season): TeamSeason
        {
            $teamSeason = $this->teamSeasonRepository->findByTeamAndSeason($team, $season);
            $this->view->assign('teamSeason', $teamSeason);
            return $teamSeason;
        }
        
        /**
         * @param Team|null $team
         */
        public function historyOfficialsAction(Team $team = null): ResponseInterface
        {
            /* MAIN CONTENT */
            $team = $this->assignTeamToView($team);
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
                if (($lastOfficial->getPersonProfile() !== $official->getPersonProfile()) || ($lastOfficial->getOfficialJob() !== $official->getOfficialJob())) {
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
            
            # TODO: FRONTEND FILTERS THE NEW WAY
            $officialJobsSelectbox = $this->officialJobRepository->findAll();
            $this->view->assign('officialJobsSelectbox', $officialJobsSelectbox);
            
            /* PAGETITLE */
            $this->pagetitleForTeam(
                $team,
                LocalizationUtility::translate('tx_sportms_action.team.historyofficials', "sportms")
            );
            
            return $this->htmlResponse();
        }
        
        /**
         * @param TeamSeasonOfficial $officialTerm1
         * @param TeamSeasonOfficial $officialTerm2
         */
        private function consecutiveTeamSeasonOfficials(
            \ChristianKnell\Sportms\Domain\Model\TeamSeasonOfficial $officialTerm1,
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
                $endDateDiff = strcmp((string)$b->getEnddate(), (string)$a->getEnddate());
                if ($endDateDiff) {
                    return $endDateDiff;
                }
                $startDateDiff = strcmp((string)$b->getStartdate(), (string)$a->getStartdate());
                if ($startDateDiff) {
                    return $startDateDiff;
                }
                return strcmp($a->getPersonProfile()->getPerson()->getLastname(),
                    $b->getPersonProfile()->getPerson()->getFirstname());
            });
            return $teamSeasonOfficials;
        }
        
        /**
         * @param Team $team
         * @param string $actionLabel
         * @param Season|null $season
         */
        private function pagetitleForTeam(Team $team, string $actionLabel, Season $season = null)
        {
            $teamLabel = $team->getLabel();
            if ($season) {
                $seasonLabel = $season->getLabel();
                $teamLabel .= " " . $seasonLabel;
            }
            $this->pagetitle($teamLabel, $actionLabel);
        }
        
        /**
         * @param Team|null $team
         */
        public function historyRecordGamesAction(Team $team = null): ResponseInterface
        {
            /* MAIN CONTENT */
            $team = $this->assignTeamToView($team);
            $teamUid = $team->getUid();
            $gamesWithHighestWins = $this->gameRepository->findGamesWithHighestWinsForTeam($teamUid,
                (int)$this->settings['team']['historyRecordGames']['limit'], $this->getCompetitionsFilter(),
                $this->getSeasonsFilter());
            $this->view->assign('gamesWithHighestWins', $gamesWithHighestWins);
            $gamesWithHighestLosts = $this->gameRepository->findGamesWithHighestLostsForTeam($teamUid,
                (int)$this->settings['team']['historyRecordGames']['limit'], $this->getCompetitionsFilter(),
                $this->getSeasonsFilter());
            $this->view->assign('gamesWithHighestLosts', $gamesWithHighestLosts);
            $gamesWithMostGoals = $this->gameRepository->findGamesWithMostGoalsForTeam($teamUid,
                (int)$this->settings['team']['historyRecordGames']['limit'], $this->getCompetitionsFilter(),
                $this->getSeasonsFilter());
            $this->view->assign('gamesWithMostGoals', $gamesWithMostGoals);
            $gamesWithMostSpectators = $this->gameRepository->findGamesWithMostSpectatorsForTeam($teamUid,
                (int)$this->settings['team']['historyRecordGames']['limit'], $this->getCompetitionsFilter(),
                $this->getSeasonsFilter());
            $this->view->assign('gamesWithMostSpectators', $gamesWithMostSpectators);
            $gamesWithFewestSpectators = $this->gameRepository->findGamesWithFewestSpectatorsForTeam($teamUid,
                (int)$this->settings['team']['historyRecordGames']['limit'], $this->getCompetitionsFilter(),
                $this->getSeasonsFilter());
            $this->view->assign('gamesWithFewestSpectators', $gamesWithFewestSpectators);
            
            /* FRONTEND FILTERS */
            $this->assignSelectboxValues('competition');
            $this->assignSelectboxValues('season');
            
            /* PAGETITLE */
            $this->pagetitleForTeam(
                $team,
                LocalizationUtility::translate('tx_sportms_action.team.historyrecordgames', "sportms")
            );
            
            return $this->htmlResponse();
        }
        
        /**
         * @param Team $team
         */
        public function historyRecordPlayersAction(Team $team = null): ResponseInterface
        {
            /* MAIN CONTENT */
            $team = $this->assignTeamToView($team);
            $teamUid = $team->getUid();
            $playersWithMostGamesAsArray = $this->gameLineupRepository->findPlayersWithMostGames($this->getSportsFilter(),
                $this->getSportAgeGroupsFilter(), $this->getSportAgeLevelsFilter(),
                $this->getSportPositionGroupsFilter(), $this->getSportPositionsFilter(),
                $this->getCompetitionTypesFilter(), $this->getCompetitionsFilter(), $this->getClubsFilter(), [$teamUid],
                $this->getSeasonsFilter(), (int)$this->settings['team']['historyRecordPlayers']['limit']);
            $playersWithMostGames = [];
            foreach ($playersWithMostGamesAsArray as $playerWithMostGamesAsArray) {
                $playerWithMostGames = new \ChristianKnell\Sportms\Domain\Model\PlayerStat();
                $playerWithMostGames->setPerson($this->personProfileRepository->findByUid($playerWithMostGamesAsArray['person_profile']));
                $playerWithMostGames->setNumberOfGames($playerWithMostGamesAsArray['numberOfGames']);
                $playerWithMostGames->setNumberOfStartingFormation((int)$playerWithMostGamesAsArray['numberOfStartingFormation']);
                $playersWithMostGames[] = $playerWithMostGames;
            }
            $this->view->assign('playersWithMostGames', $playersWithMostGames);
            $playersWithMostGoalsAsArray = $this->gameGoalRepository->findPlayersWithMostGoals($this->getSportsFilter(),
                $this->getSportAgeGroupsFilter(), $this->getSportAgeLevelsFilter(),
                $this->getSportPositionGroupsFilter(), $this->getSportPositionsFilter(),
                $this->getCompetitionTypesFilter(), $this->getCompetitionsFilter(), $this->getClubsFilter(),
                (string)$teamUid,
                $this->getSeasonsFilter(), (int)$this->settings['team']['historyRecordPlayers']['limit']);
            $playersWithMostGoals = [];
            foreach ($playersWithMostGoalsAsArray as $playerWithMostGoalsAsArray) {
                $playerWithMostGoals = new \ChristianKnell\Sportms\Domain\Model\PlayerStat();
                $playerWithMostGoals->setPerson($this->personProfileRepository->findByUid($playerWithMostGoalsAsArray['scorer']));
                $playerWithMostGoals->setNumberOfGoals($playerWithMostGoalsAsArray['numberOfGoals']);
                $playersWithMostGoals[] = $playerWithMostGoals;
            }
            $this->view->assign('playersWithMostGoals', $playersWithMostGoals);
            $playersWithMostAssistsAsArray = $this->gameGoalRepository->findPlayersWithMostAssists($this->getSportsFilter(),
                $this->getSportAgeGroupsFilter(), $this->getSportAgeLevelsFilter(),
                $this->getSportPositionGroupsFilter(), $this->getSportPositionsFilter(),
                $this->getCompetitionTypesFilter(), $this->getCompetitionsFilter(), $this->getClubsFilter(),
                (string)$teamUid,
                $this->getSeasonsFilter(), (int)$this->settings['team']['historyRecordPlayers']['limit']);
            $playersWithMostAssists = [];
            foreach ($playersWithMostAssistsAsArray as $playerWithMostAssistsAsArray) {
                $playerWithMostAssists = new \ChristianKnell\Sportms\Domain\Model\PlayerStat();
                $playerWithMostAssists->setPerson($this->personProfileRepository->findByUid($playerWithMostAssistsAsArray['assist']));
                $playerWithMostAssists->setNumberOfAssists($playerWithMostAssistsAsArray['numberOfAssists']);
                $playersWithMostAssists[] = $playerWithMostAssists;
            }
            $this->view->assign('playersWithMostAssists', $playersWithMostAssists);
            
            /* FRONTEND FILTERS */
            # TODO: NEW WAY OF FRONTEND FILTERS
            if ($this->settings['competitionType']['selectbox']['enabled']) {
                $competitionTypesSelectbox = $this->competitionTypeRepository->findAll($this->getCompetitionTypesFilter(false));
                $this->view->assign('competitionTypesSelectbox', $competitionTypesSelectbox);
            }
            if ($this->settings['competition']['selectbox']['enabled']) {
                $competitionsSelectbox = $this->competitionRepository->findAll($this->getSportsFilter(),
                    $this->getSportAgeGroupsFilter(), $this->getSportAgeLevelsFilter(),
                    $this->getCompetitionTypesFilter(), $this->getCompetitionsFilter(false), (string)$teamUid);
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
            
            /* PAGETITLE */
            $this->pagetitleForTeam(
                $team,
                LocalizationUtility::translate('tx_sportms_action.team.historyrecordplayers', "sportms")
            );
            
            return $this->htmlResponse();
        }
        
        /**
         * @return void
         * @throws InvalidQueryException
         */
        public function listAction(): ResponseInterface
        {
            /* MAIN CONTENT */
            $teams = $this->teamRepository->findAll($this->getSportsFilter(), $this->getSportAgeGroupsFilter(),
                $this->getSportAgeLevelsFilter(), $this->getClubsFilter(), $this->getTeamsFilter());
            $this->view->assign('teams', $teams);

            /* FRONTEND FILTERS */
            $this->assignSelectboxValues('sport');
            $this->assignSelectboxValues('sportAgeGroup');
            $this->assignSelectboxValues('sportAgeLevel');
            $this->assignSelectboxValues('club');
            
            /* PAGETITLE */
            $this->pagetitle(
                LocalizationUtility::translate('tx_sportms_domain_model_team.plural', "sportms"),
                LocalizationUtility::translate('tx_sportms_action.team.list', "sportms")
            );
            
            return $this->htmlResponse();
        }
        
        /**
         * @param Team|null $team
         * @param Season|null $season
         */
        public function seasonGamesByCompetitionAction(Team $team = null, Season $season = null): ResponseInterface
        {
            /* MAIN CONTENT */
            $team = $this->assignTeamToView($team);
            $season = $this->assignSeasonToView($team, $season);
            $teamSeason = $this->assignTeamSeasonToView($team, $season);
            $orderings = [
                'competitionSeason.competition.competitionType.sorting' => QueryInterface::ORDER_ASCENDING,
                'competitionSeason.competition.label' => QueryInterface::ORDER_ASCENDING,
                'date' => QueryInterface::ORDER_ASCENDING,
                'time' => QueryInterface::ORDER_ASCENDING,
            ];
            $games = $this->gameRepository->findGamesByTeamSeason($teamSeason, $orderings);
            $this->view->assign('games', $games);
            
            /* FRONTEND FILTERS */
            $this->assignSeasonSelectboxValuesToView($team);
            
            /* PAGETITLE */
            $this->pageTitleForTeam(
                $team,
                LocalizationUtility::translate('tx_sportms_action.team.seasongamesbycompetition', "sportms"),
                $season
            );
            
            return $this->htmlResponse();
        }
        
        /**
         * @param Team|null $team
         */
        public function historyCompetitionsAction(Team $team = null): ResponseInterface
        {
            /* MAIN CONTENT */
            $team = $this->assignTeamToView($team);
            
            return $this->htmlResponse();
        }
        
        /**
         * @param Team|null $team
         */
        public function historyImagesAction(Team $team = null): ResponseInterface
        {
            /* MAIN CONTENT */
            $team = $this->assignTeamToView($team);
            
            return $this->htmlResponse();
        }
        
        /**
         * @param Team|null $team
         * @param Season|null $season
         */
        public function seasonGamesByDateAction(Team $team = null, Season $season = null): ResponseInterface
        {
            /* MAIN CONTENT */
            $team = $this->assignTeamToView($team);
            $season = $this->assignSeasonToView($team, $season);
            $teamSeason = $this->assignTeamSeasonToView($team, $season);
            $orderings = [
                'date' => QueryInterface::ORDER_ASCENDING,
                'time' => QueryInterface::ORDER_ASCENDING,
            ];
            $games = $this->gameRepository->findGamesByTeamSeason($teamSeason, $orderings);
            $this->view->assign('games', $games);
            
            /* FRONTEND FILTERS */
            $this->assignSeasonSelectboxValuesToView($team);
            
            /* PAGETITLE */
            $this->pagetitleForTeam(
                $team,
                LocalizationUtility::translate('tx_sportms_action.team.seasongamesbydate', "sportms"),
                $season
            );
            
            return $this->htmlResponse();
        }
        
        public function seasonIndexAction(Team $team = null, Season $season = null): ResponseInterface
        {
            /* MAIN CONTENT */
            $team = $this->assignTeamToView($team);
            $season = $this->assignSeasonToView($team, $season);
            $teamSeason = $this->assignTeamSeasonToView($team, $season);
            
            /* FRONTEND FILTERS */
            $this->assignSeasonSelectboxValuesToView($team);
            
            /* PAGETITLE */
            $this->pagetitleForTeam(
                $team,
                LocalizationUtility::translate('tx_sportms_action.team.seasonindex', "sportms"),
                $season
            );
            
            return $this->htmlResponse();
        }
        
    }
