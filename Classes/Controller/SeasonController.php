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
         * @return void
         * @throws InvalidQueryException
         */
        public function listAction(): void
        {
            $seasons = $this->seasonRepository->findAll();
            $this->view->assign('seasons', $seasons);
            $this->pagetitle("Saisons", "Liste");
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