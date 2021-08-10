<?php
    
    namespace Balumedien\Sportms\Controller;
    
    use Balumedien\Sportms\Domain\Model\Club;
    use TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException;
    use TYPO3\CMS\Extbase\Utility\LocalizationUtility;

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
            /* MAIN CONTENT */
            $clubs = $this->clubRepository->findAll($this->getClubsFilter());
            $this->view->assign('clubs', $clubs);
            
            /* PAGETITLE */
            $this->pagetitle(
                LocalizationUtility::translate('tx_sportms_domain_model_club.plural', "sportms"),
                LocalizationUtility::translate('tx_sportms_action.club.list', "sportms")
            );
        }
        
        /**
         * @param Club $club
         */
        public function sectionsAction(Club $club = null): void
        {
            /* MAIN CONTENT */
            $club = $this->assignClubToView($club);
            
            /* PAGETITLE */
            $this->pagetitleForClub(
                $club,
                LocalizationUtility::translate('tx_sportms_action.club.sections', "sportms")
            );
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