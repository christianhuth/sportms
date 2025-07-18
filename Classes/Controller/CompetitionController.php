<?php
    
    declare(strict_types=1);
    
    namespace ChristianKnell\Sportms\Controller;
    
    use ChristianKnell\Sportms\Domain\Model\Competition;
    use ChristianKnell\Sportms\Domain\Model\CompetitionSeason;
    use ChristianKnell\Sportms\Domain\Model\CompetitionSeasonGameday;
    use ChristianKnell\Sportms\Domain\Model\Season;
    use ChristianKnell\Sportms\Domain\Repository\CompetitionRepository;
    use ChristianKnell\Sportms\Domain\Repository\CompetitionSeasonRepository;
    use ChristianKnell\Sportms\Domain\Repository\CompetitionSeasonGamedayRepository;
    use ChristianKnell\Sportms\Domain\Repository\CompetitionTypeRepository;
    use ChristianKnell\Sportms\Domain\Repository\GameRepository;
    use ChristianKnell\Sportms\Domain\Repository\SportRepository;
    use ChristianKnell\Sportms\Domain\Repository\SportAgeGroupRepository;
    use ChristianKnell\Sportms\Domain\Repository\SportAgeLevelRepository;
    use Psr\Http\Message\ResponseInterface;
    use TYPO3\CMS\Extbase\Utility\LocalizationUtility;

    /**
     * CompetitionController
     */
    class CompetitionController extends SportMSBaseController
    {
        
        /**
         * @var CompetitionRepository
         */
        protected $competitionRepository;
        
        /**
         * @var CompetitionSeasonRepository
         */
        protected $competitionSeasonRepository;
        
        /**
         * @var CompetitionSeasonGamedayRepository
         */
        protected $competitionSeasonGamedayRepository;
        
        /**
         * @var CompetitionTypeRepository
         */
        protected $competitionTypeRepository;
        
        /**
         * @var GameRepository
         */
        protected $gameRepository;
        
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
         * Constructor that injects the repositories
         */
        public function __construct(CompetitionRepository $competitionRepository, CompetitionSeasonRepository $competitionSeasonRepository, CompetitionSeasonGamedayRepository $competitionSeasonGamedayRepository, CompetitionTypeRepository $competitionTypeRepository, GameRepository $gameRepository, SportRepository $sportRepository, SportAgeGroupRepository $sportAgeGroupRepository, SportAgeLevelRepository $sportAgeLevelRepository)
        {
            $this->competitionRepository = $competitionRepository;
            $this->competitionSeasonRepository = $competitionSeasonRepository;
            $this->competitionSeasonGamedayRepository = $competitionSeasonGamedayRepository;
            $this->competitionTypeRepository = $competitionTypeRepository;
            $this->gameRepository = $gameRepository;
            $this->sportRepository = $sportRepository;
            $this->sportAgeGroupRepository = $sportAgeGroupRepository;
            $this->sportAgeLevelRepository = $sportAgeLevelRepository;
        }
        
        /**
         * @return void
         * @throws \TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException
         */
        public function listAction(): ResponseInterface
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
            
            return $this->htmlResponse();
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
        ): ResponseInterface {
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
            
            return $this->htmlResponse();
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
        protected function seasonClubsAction(Competition $competition = null, Season $season = null): ResponseInterface
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
            
            return $this->htmlResponse();
        }
        
        /**
         * @param Competition|null $competition
         * @param Season|null $season
         */
        protected function seasonTeamsAction(Competition $competition = null, Season $season = null): ResponseInterface
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
            
            return $this->htmlResponse();
        }
        
    }