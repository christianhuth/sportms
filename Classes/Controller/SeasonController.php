<?php
    
    namespace Balumedien\Sportms\Controller;
    
    use Balumedien\Sportms\Domain\Model\Season;
    use TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException;
    use TYPO3\CMS\Extbase\Utility\LocalizationUtility;

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
            /* MAIN CONTENT */
            $seasons = $this->seasonRepository->findAll();
            $this->view->assign('seasons', $seasons);
            
            /* PAGETITLE */
            $this->pagetitle(
                LocalizationUtility::translate('tx_sportms_domain_model_season.plural', "sportms"),
                LocalizationUtility::translate('tx_sportms_action.season.list', "sportms")
            );
        }
        
        /**
         * @param Season $season
         */
        public function teamsAction(Season $season = null): void
        {
            /* MAIN CONTENT */
            if ($season === null) {
                $seasonUid = $this->settings['season']['uid'];
                $season = $this->seasonRepository->findByUid($seasonUid);
            }
            $this->view->assign('season', $season);
            
            /* PAGETITLE */
            $this->pagetitleForSeason(
                $season,
                LocalizationUtility::translate('tx_sportms_action.season.teams', "sportms")
            );
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