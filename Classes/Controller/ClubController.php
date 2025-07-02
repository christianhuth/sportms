<?php
    
    declare(strict_types=1);
    
    namespace ChristianKnell\Sportms\Controller;
    
    use ChristianKnell\Sportms\Domain\Model\Club;
    use ChristianKnell\Sportms\Domain\Repository\ClubRepository;
    use Psr\Http\Message\ResponseInterface;
    use TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException;
    use TYPO3\CMS\Extbase\Utility\LocalizationUtility;

    /**
     * ClubController
     */
    class ClubController extends SportMSBaseController
    {
        
        /**
         * @var ClubRepository
         */
        protected $clubRepository;

        /**
         * Constructor that injects the repositories
         */
        public function __construct(ClubRepository $clubRepository)
        {
            $this->clubRepository = $clubRepository;
        }
        
        /**
         * @return void
         * @throws InvalidQueryException
         */
        public function listAction(): ResponseInterface
        {
            /* MAIN CONTENT */
            $clubs = $this->clubRepository->findAll($this->getClubsFilter());
            $this->view->assign('clubs', $clubs);
            
            /* PAGETITLE */
            $this->pagetitle(
                LocalizationUtility::translate('tx_sportms_domain_model_club.plural', "sportms"),
                LocalizationUtility::translate('tx_sportms_action.club.list', "sportms")
            );
            
            return $this->htmlResponse();
        }
        
        /**
         * @param Club $club
         */
        public function sectionsAction(Club $club = null): ResponseInterface
        {
            /* MAIN CONTENT */
            $club = $this->assignClubToView($club);
            
            /* PAGETITLE */
            $this->pagetitleForClub(
                $club,
                LocalizationUtility::translate('tx_sportms_action.club.sections', "sportms")
            );
            
            return $this->htmlResponse();
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