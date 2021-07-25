<?php
    
    namespace Balumedien\Sportms\Controller;
    
    use Balumedien\Sportms\Domain\Model\Season;
    use TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException;

    /**
     * SeasonController
     */
    class SeasonController extends SportMSBaseController
    {
        
        /**
         * @var \Balumedien\Sportms\Domain\Repository\SeasonRepository
         * @TYPO3\CMS\Extbase\Annotation\Inject
         */
        protected $seasonRepository;
        
        /**
         * Initializes the controller before invoking an action method.
         * Use this method to solve tasks which all actions have in common.
         */
        public function initializeAction(): void
        {
            $this->mapRequestsToSettings();
        }
        
        /**
         * @return void
         * @throws InvalidQueryException
         */
        public function listAction(): void
        {
            $this->initializeActions();
            $seasons = $this->seasonRepository->findAll();
            $this->view->assign('seasons', $seasons);
            $this->pagetitle("Saisons", "Liste");
        }
        
        /**
         * Use this method to solve tasks which all actions have in common, when VIEW-Context is needed
         */
        public function initializeActions(): void
        {
            #$listOfPossibleShowViews = 'index,officials,sections';
            #$this->determineShowView($this->model);
            #$this->determineShowViews($this->model, $listOfPossibleShowViews);
            #$this->view->assign('settings', $this->settings);
        }
        
        /**
         * @param Season $season
         */
        public function teamsAction(Season $season = null): void
        {
            if ($season === null) {
                $seasonUid = $this->settings['season']['uid'];
                $season = $this->seasonRepository->findByUid($seasonUid);
            }
            $this->view->assign('season', $season);
            $this->pagetitleForSeason($season, "Mannschaften");
        }
        
        /**
         * @param Season $season
         * @param string $actionLabel
         */
        private function pagetitleForSeason(Season $season, string $actionLabel)
        {
            $seasonLabel = $season->getLabel();
            $this->pagetitle($seasonLabel, $actionLabel);
        }
        
    }