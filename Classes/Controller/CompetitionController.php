<?php
    
    namespace Balumedien\Sportms\Controller;
    
    use Balumedien\Sportms\Domain\Model\Competition;
    use Balumedien\Sportms\Domain\Model\CompetitionSeason;
    use Balumedien\Sportms\Domain\Model\CompetitionSeasonGameday;
    use Balumedien\Sportms\Domain\Model\Season;
    
    /**
     * CompetitionController
     */
    class CompetitionController extends SportMSBaseController
    {
        
        /**
         * @var \Balumedien\Sportms\Domain\Repository\CompetitionRepository
         * @TYPO3\CMS\Extbase\Annotation\Inject
         */
        protected $competitionRepository;
    
        /**
         * @var \Balumedien\Sportms\Domain\Repository\CompetitionSeasonRepository
         * @TYPO3\CMS\Extbase\Annotation\Inject
         */
        protected $competitionSeasonRepository;
    
        /**
         * @var \Balumedien\Sportms\Domain\Repository\CompetitionSeasonGamedayRepository
         * @TYPO3\CMS\Extbase\Annotation\Inject
         */
        protected $competitionSeasonGamedayRepository;
        
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
         * @return void
         * @throws \TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException
         */
        public function listAction(): void
        {
            $competitions = $this->competitionRepository->findAll($this->getSportsFilter(),
                $this->getSportAgeGroupsFilter(), $this->getSportAgeLevelsFilter(), $this->getCompetitionTypesFilter(),
                $this->getCompetitionsFilter());
            $this->view->assign('competitions', $competitions);
            /* FRONTEND FILTERS */
            $this->assignSelectboxValues('sport');
            $this->assignSelectboxValues('sportAgeGroup');
            $this->assignSelectboxValues('sportAgeLevel');
            $this->assignSelectboxValues('competitionType');
            $this->pagetitle(
                "Wettbewerbe",
                "Liste"
            );
        }
        
        /**
         * @param Competition $competition
         * @param string $actionLabel
         * @param Season|null $season
         */
        private function pagetitleForCompetition(Competition $competition, string $actionLabel, Season $season = null)
        {
            $competitionLabel = $competition->getLabel();
            if ($season) {
                $seasonLabel = $season->getLabel();
                $competitionLabel .= " " . $seasonLabel;
            }
            $this->pagetitle($competitionLabel, $actionLabel);
        }
    
        /**
         * @param Competition|null $competition
         * @param Season|null $season
         */
        protected function seasonClubsAction(Competition $competition = null, Season $season = null)
        {
            $competition = $this->assignCompetitionToView($competition);
            $season = $this->assignSeasonToView($competition, $season);
            $competitionSeason = $this->assignCompetitionSeasonToView($competition, $season);
            /* FRONTEND FILTERS */
            $this->assignSeasonSelectboxValuesToView($competition);
            # TODO: USE LOCALIZATION
            $this->pagetitleForCompetition(
                $competition,
                "Vereine",
                $season
            );
        }
        
        /**
         * @param Competition|null $competition
         * @param Season|null $season
         * @param CompetitionSeasonGameday|null $competitionSeasonGameday
         */
        public function seasonGamesAction(
            Competition $competition = null,
            Season $season = null,
            CompetitionSeasonGameday $competitionSeasonGameday = null
        ): void {
            $competition = $this->assignCompetitionToView($competition);
            $season = $this->assignSeasonToView($competition, $season);
            $competitionSeason = $this->assignCompetitionSeasonToView($competition, $season);
            if ($competitionSeasonGameday === null) {
                if ($this->settings['competitionSeasonGameday']['selected'] === null) {
                    $competitionSeasonGameday = $competitionSeason->getCompetitionSeasonGamedays()[0];
                } else {
                    $competitionSeasonGamedayUid = $this->settings['competitionSeasonGameday']['selected'];
                    $competitionSeasonGameday = $this->competitionSeasonGamedayRepository->findByUid($competitionSeasonGamedayUid);
                }
            }
            $this->view->assign('competitionSeasonGameday', $competitionSeasonGameday);
            $competitionSeasonGamedays = $this->competitionSeasonGamedayRepository->findByCompetitionSeason($competitionSeason);
            $this->view->assign('competitionSeasonGamedays', $competitionSeasonGamedays);
            $games = $this->gameRepository->findGamesbyCompetitionSeason($competitionSeason, $competitionSeasonGameday);
            $this->view->assign('games', $games);
            /* FRONTEND FILTERS */
            $this->assignSeasonSelectboxValuesToView($competition);
            $this->assignCompetitionSeasonGamedaySelectboxValuesToView($competitionSeason);
            # TODO: USE LOCALISATION
            $this->pagetitleForCompetition(
                $competition,
                $competitionSeasonGameday->getLabel(),
                $season
            );
        }
        
        /**
         * @param Competition|null $competition
         * @param Season|null $season
         */
        protected function seasonTeamsAction(Competition $competition = null, Season $season = null): void
        {
            $competition = $this->assignCompetitionToView($competition);
            \TYPO3\CMS\Core\Utility\DebugUtility::debug($competition, 'Debug: ' . __FILE__ . ' in Line: ' . __LINE__);
            $season = $this->assignSeasonToView($competition, $season);
            $competitionSeason = $this->assignCompetitionSeasonToView($competition, $season);
            # TODO: USE LOCALIZATION
            $this->assignSeasonSelectboxValuesToView($competition);
            $this->pagetitleForCompetition(
                $competition,
                "Mannschaften",
                $season
            );
        }
        
        private function assignCompetitionToView(Competition $competition = null): Competition
        {
            if ($competition === null) {
                $competition = $this->determineCompetition();
            }
            $this->view->assign('competition', $competition);
            return $competition;
        }
        
        /**
         * @param Competition|null $competition
         * @param Season|null $season
         */
        private function assignSeasonToView(Competition $competition = null, Season $season = null): Season
        {
            if ($season === null) {
                $season = $this->determineSeason();
            }
            if ($season === null) {
                if ($competition->getCompetitionSeasons()) {
                    $season = $competition->getCompetitionSeasons()[0]->getSeason();
                } else {
                    die();
                }
            }
            $this->view->assign('season', $season);
            return $season;
        }
        
        /**
         * @param Competition $competition
         * @param Season $season
         */
        private function assignCompetitionSeasonToView(Competition $competition, Season $season): CompetitionSeason
        {
            $competitionSeason = $this->competitionSeasonRepository->findByCompetitionAndSeason($competition, $season);
            $this->view->assign('competitionSeason', $competitionSeason);
            return $competitionSeason;
        }
        
        /**
         * @param Competition $competition
         */
        private function assignSeasonSelectboxValuesToView(Competition $competition)
        {
            $seasonSelectboxValues = $this->competitionSeasonRepository->findbyCompetition($competition);
            $this->view->assign('seasonSelectboxValues', $seasonSelectboxValues);
        }
    
        /**
         * @param CompetitionSeason $competitionSeason
         */
        private function assignCompetitionSeasonGamedaySelectboxValuesToView(CompetitionSeason $competitionSeason)
        {
            $competitionSeasonGamedaySelectboxValues = $competitionSeason->getCompetitionSeasonGamedays();
            $this->view->assign('competitionSeasonGamedaySelectboxValues', $competitionSeasonGamedaySelectboxValues);
        }
        
    }