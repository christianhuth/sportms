<?php
    
    declare(strict_types=1);
    
    namespace ChristianKnell\Sportms\Controller;
    
    use TYPO3\CMS\Extbase\Utility\LocalizationUtility;

    /**
     * SportMSController
     */
    class SportMSController extends SportMSBaseController
    {
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Repository\ClubRepository
         * @TYPO3\CMS\Extbase\Annotation\Inject
         */
        protected $clubRepository = null;
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Repository\CompetitionRepository
         * @TYPO3\CMS\Extbase\Annotation\Inject
         */
        protected $competitionRepository = null;
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Repository\GameRepository
         * @TYPO3\CMS\Extbase\Annotation\Inject
         */
        protected $gameRepository = null;
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Repository\PersonRepository
         * @TYPO3\CMS\Extbase\Annotation\Inject
         */
        protected $personRepository = null;
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Repository\SeasonRepository
         * @TYPO3\CMS\Extbase\Annotation\Inject
         */
        protected $seasonRepository = null;
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Repository\TeamRepository
         * @TYPO3\CMS\Extbase\Annotation\Inject
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