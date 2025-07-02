<?php
    
    declare(strict_types=1);
    
    namespace ChristianKnell\Sportms\Controller;
    
    use ChristianKnell\Sportms\Domain\Repository\ClubRepository;
    use ChristianKnell\Sportms\Domain\Repository\CompetitionRepository;
    use ChristianKnell\Sportms\Domain\Repository\GameRepository;
    use ChristianKnell\Sportms\Domain\Repository\PersonRepository;
    use ChristianKnell\Sportms\Domain\Repository\SeasonRepository;
    use ChristianKnell\Sportms\Domain\Repository\TeamRepository;
    use TYPO3\CMS\Extbase\Utility\LocalizationUtility;

    /**
     * SportMSController
     */
    class SportMSController extends SportMSBaseController
    {
        
        /**
         * @var ClubRepository
         */
        protected $clubRepository = null;
        
        /**
         * @var CompetitionRepository
         */
        protected $competitionRepository = null;
        
        /**
         * @var GameRepository
         */
        protected $gameRepository = null;
        
        /**
         * @var PersonRepository
         */
        protected $personRepository = null;
        
        /**
         * @var SeasonRepository
         */
        protected $seasonRepository = null;
        
        /**
         * @var TeamRepository
         */
        protected $teamRepository = null;

        /**
         * Constructor that injects the repositories
         */
        public function __construct(ClubRepository $clubRepository, CompetitionRepository $competitionRepository, GameRepository $gameRepository, PersonRepository $personRepository, SeasonRepository $seasonRepository, TeamRepository $teamRepository)
        {
            $this->clubRepository = $clubRepository;
            $this->competitionRepository = $competitionRepository;
            $this->gameRepository = $gameRepository;
            $this->personRepository = $personRepository;
            $this->seasonRepository = $seasonRepository;
            $this->teamRepository = $teamRepository;
        }
        
        /**
         * @return void
         */
        public function dbStatsAction()
        {
            $dbStats = $this->settings['dbStats'];
            
            /* Domain Model Club */
            if (strpos($dbStats, 'Club') !== false) {
                $this->view->assign('clubCount', $this->clubRepository->findAll()->count());
            }
            /* Domain Model Competition */
            if (strpos($dbStats, 'Competition') !== false) {
                $this->view->assign('competitionCount', $this->competitionRepository->findAll()->count());
            }
            /* Domain Model Game */
            if (strpos($dbStats, 'Game') !== false) {
                $this->view->assign('gameCount', $this->gameRepository->findAll()->count());
            }
            /* Domain Model Person */
            if (strpos($dbStats, 'Person') !== false) {
                $this->view->assign('personCount', $this->personRepository->findAll()->count());
            }
            /* Domain Model Season */
            if (strpos($dbStats, 'Season') !== false) {
                $this->view->assign('seasonCount', $this->seasonRepository->findAll()->count());
            }
            /* Domain Model Team */
            if (strpos($dbStats, 'Team') !== false) {
                $this->view->assign('teamCount', $this->teamRepository->findAll()->count());
            }
            
            /* PAGETITLE */
            $this->pagetitle(
                "Sport Management System",
                LocalizationUtility::translate('tx_sportms_action.sportms.dbstats', "sportms")
            );
        }
        
    }