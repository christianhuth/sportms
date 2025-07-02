<?php
    
    declare(strict_types=1);
    
    namespace ChristianKnell\Sportms\Controller;
    
    use TYPO3\CMS\Extbase\Utility\LocalizationUtility;
    use TYPO3\CMS\Extbase\Annotation\Inject;

    /**
     * SportMSController
     */
    class SportMSController extends SportMSBaseController
    {
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Repository\ClubRepository
         * @Inject
         */
        protected $clubRepository = null;
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Repository\CompetitionRepository
         * @Inject
         */
        protected $competitionRepository = null;
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Repository\GameRepository
         * @Inject
         */
        protected $gameRepository = null;
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Repository\PersonRepository
         * @Inject
         */
        protected $personRepository = null;
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Repository\SeasonRepository
         * @Inject
         */
        protected $seasonRepository = null;
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Repository\TeamRepository
         * @Inject
         */
        protected $teamRepository = null;
        
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