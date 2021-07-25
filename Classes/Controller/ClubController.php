<?php
    
    namespace Balumedien\Sportms\Controller;
    
    use Balumedien\Sportms\Domain\Model\Club;
    use TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException;

    /**
     * ClubController
     */
    class ClubController extends SportMSBaseController
    {
        
        /**
         * @var \Balumedien\Sportms\Domain\Repository\ClubRepository
         * @TYPO3\CMS\Extbase\Annotation\Inject
         */
        protected $clubRepository;
        
        /**
         * @return void
         * @throws InvalidQueryException
         */
        public function listAction(): void
        {
            $this->initializeActions();
            $clubs = $this->clubRepository->findAll($this->getClubsFilter());
            $this->view->assign('clubs', $clubs);
            $this->pagetitle("Vereine", "Liste");
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
         * @param Club $club
         */
        public function sectionsAction(Club $club = null): void
        {
            if ($club === null) {
                $clubUid = $this->settings['club']['uid'];
                $club = $this->clubRepository->findByUid($clubUid);
            }
            $this->view->assign('club', $club);
            $this->pagetitleForClub($club, "Abteilungen");
        }
        
        /**
         * @param Club $club
         * @param string $actionLabel
         */
        private function pagetitleForClub(Club $club, string $actionLabel)
        {
            $clubName = $club->getName();
            $this->pagetitle($clubName, $actionLabel);
        }
        
    }