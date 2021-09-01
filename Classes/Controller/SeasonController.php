<?php
    
    namespace ChristianKnell\Sportms\Controller;
    
    use ChristianKnell\Sportms\Domain\Model\Season;
    use TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException;
    use TYPO3\CMS\Extbase\Utility\LocalizationUtility;

    /**
     * SeasonController
     */
    class SeasonController extends SportMSBaseController
    {
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Repository\SeasonRepository
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
         * @param string $actionLabel
         */
        private function pagetitleForSeason(Season $season, string $actionLabel)
        {
            $seasonLabel = $season->getLabel();
            $this->pagetitle($seasonLabel, $actionLabel);
        }
        
    }