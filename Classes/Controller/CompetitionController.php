<?php
    
    declare(strict_types=1);
    
    namespace ChristianKnell\Sportms\Controller;
    
    use ChristianKnell\Sportms\Domain\Model\Competition;
    use ChristianKnell\Sportms\Domain\Model\CompetitionSeason;
    use ChristianKnell\Sportms\Domain\Model\CompetitionSeasonGameday;
    use ChristianKnell\Sportms\Domain\Model\Season;
    use TYPO3\CMS\Extbase\Utility\LocalizationUtility;

    /**
     * CompetitionController
     */
    class CompetitionController extends SportMSBaseController
    {
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Repository\CompetitionRepository
         * @TYPO3\CMS\Extbase\Annotation\Inject
         */
        protected $competitionRepository;
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Repository\CompetitionSeasonRepository
         * @TYPO3\CMS\Extbase\Annotation\Inject
         */
        protected $competitionSeasonRepository;
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Repository\CompetitionSeasonGamedayRepository
         * @TYPO3\CMS\Extbase\Annotation\Inject
         */
        protected $competitionSeasonGamedayRepository;
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Repository\GameRepository
         * @TYPO3\CMS\Extbase\Annotation\Inject
         */
        protected $gameRepository;
        
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
         * @var \ChristianKnell\Sportms\Domain\Repository\CompetitionTypeRepository
         * @TYPO3\CMS\Extbase\Annotation\Inject
         */
        protected $competitionTypeRepository;
        
        /**
         * @return void
         * @throws \TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException
         */
        public function listAction(): void
        {
            /* MAIN CONTENT */
            $competitions = $this->competitionRepository->findAll($this->getSportsFilter(),
                $this->getSportAgeGroupsFilter(), $this->getSportAgeLevelsFilter(), $this->getCompetitionTypesFilter(),
                $this->getCompetitionsFilter());
            $this->view->assign('competitions', $competitions);
            
            /* FRONTEND FILTERS */
            $this->assignSelectboxValues('sport');
            $this->assignSelectboxValues('sportAgeGroup');
            $this->assignSelectboxValues('sportAgeLevel');
            $this->assignSelectboxValues('competitionType');
            
            /* PAGETITLE */
            $this->pagetitle(
                LocalizationUtility::translate('tx_sportms_domain_model_competition.plural', "sportms"),
                LocalizationUtility::translate('tx_sportms_action.competition.list', "sportms")
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
            /* MAIN CONTENT */
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
            $games = $this->gameRepository->findGamesbyCompetitionSeason($competitionSeason, $competitionSeasonGameday);
            $this->view->assign('games', $games);
            
            /* FRONTEND FILTERS */
            $this->assignSeasonSelectboxValuesToView($competition);
            $this->assignCompetitionSeasonGamedaySelectboxValuesToView($competitionSeason);
            
            /* PAGETITLE */
            $this->pagetitleForCompetition(
                $competition,
                LocalizationUtility::translate('tx_sportms_action.competition.seasongames', "sportms"),
                $season,
                $competitionSeasonGameday
            );
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
        
        /**
         * @param Competition $competition
         * @param string $actionLabel
         * @param Season|null $season
         */
        private function pagetitleForCompetition(
            Competition $competition,
            string $actionLabel,
            Season $season = null,
            CompetitionSeasonGameday $competitionSeasonGameday = null
        ) {
            $competitionLabel = $competition->getLabel();
            if ($season) {
                $seasonLabel = $season->getLabel();
                $competitionLabel .= " " . $seasonLabel;
            }
            if ($competitionSeasonGameday) {
                $competitionSeasonGamedayLabel = $competitionSeasonGameday->getLabel();
                $competitionLabel .= " " . $competitionSeasonGamedayLabel;
            }
            $this->pagetitle($competitionLabel, $actionLabel);
        }
        
        /**
         * @param Competition|null $competition
         * @param Season|null $season
         */
        protected function seasonClubsAction(Competition $competition = null, Season $season = null)
        {
            /* MAIN CONTENT */
            $competition = $this->assignCompetitionToView($competition);
            $season = $this->assignSeasonToView($competition, $season);
            $competitionSeason = $this->assignCompetitionSeasonToView($competition, $season);
            
            /* FRONTEND FILTERS */
            $this->assignSeasonSelectboxValuesToView($competition);
            
            /* PAGETITLE */
            $this->pagetitleForCompetition(
                $competition,
                LocalizationUtility::translate('tx_sportms_action.competition.seasonclubs', "sportms"),
                $season
            );
        }
        
        /**
         * @param Competition|null $competition
         * @param Season|null $season
         */
        protected function seasonTeamsAction(Competition $competition = null, Season $season = null): void
        {
            /* MAIN CONTENT */
            $competition = $this->assignCompetitionToView($competition);
            $season = $this->assignSeasonToView($competition, $season);
            $competitionSeason = $this->assignCompetitionSeasonToView($competition, $season);
            
            /* FRONTEND FILTERS */
            $this->assignSeasonSelectboxValuesToView($competition);
            
            /* PAGETITLE */
            $this->pagetitleForCompetition(
                $competition,
                LocalizationUtility::translate('tx_sportms_action.competition.seasonteams', "sportms"),
                $season
            );
        }
        
    }