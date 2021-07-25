<?php
    
    namespace Balumedien\Sportms\Controller;
    
    /**
     * CompetitionController
     */
    class CompetitionController extends SportMSBaseController
    {
        
        /**
         * @var \Balumedien\Sportms\Domain\Repository\CompetitionRepository
         * @TYPO3\CMS\Extbase\Annotation\Inject
         */
        protected $competitionRepository;
        
        /**
         * @var \Balumedien\Sportms\Domain\Repository\GameRepository
         * @TYPO3\CMS\Extbase\Annotation\Inject
         */
        protected $gameRepository;
        
        /**
         * @var \Balumedien\Sportms\Domain\Repository\SportRepository
         * @TYPO3\CMS\Extbase\Annotation\Inject
         */
        protected $sportRepository;
        
        /**
         * @var \Balumedien\Sportms\Domain\Repository\SportAgeGroupRepository
         * @TYPO3\CMS\Extbase\Annotation\Inject
         */
        protected $sportAgeGroupRepository;
        
        /**
         * @var \Balumedien\Sportms\Domain\Repository\SportAgeLevelRepository
         * @TYPO3\CMS\Extbase\Annotation\Inject
         */
        protected $sportAgeLevelRepository;
        
        /**
         * @var \Balumedien\Sportms\Domain\Repository\CompetitionTypeRepository
         * @TYPO3\CMS\Extbase\Annotation\Inject
         */
        protected $competitionTypeRepository;
        
        /**
         * Initializes the controller before invoking an action method.
         * Use this method to solve tasks which all actions have in common.
         */
        public function initializeAction()
        {
            $this->mapRequestsToSettings();
        }
        
        /**
         * @return void
         * @throws \TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException
         */
        public function listAction(): void
        {
            $this->initializeActions();
            $competitions = $this->competitionRepository->findAll($this->getSportsFilter(),
                $this->getSportAgeGroupsFilter(), $this->getSportAgeLevelsFilter(), $this->getCompetitionTypesFilter(),
                $this->getCompetitionsFilter());
            $this->view->assign('competitions', $competitions);
            /* FRONTEND FILTERS */
            if ($this->settings['sport']['selectbox']['enabled'] || $this->settings['competitionType']['selectbox']['enabled']) {
                if ($this->settings['sport']['selectbox']['enabled']) {
                    $sportsSelectbox = $this->sportRepository->findAll($this->getSportsFilter(false));
                    $this->view->assign('sportsSelectbox', $sportsSelectbox);
                    if ($this->settings['sport']['selected'] && $this->settings['sportAgeGroup']['sportAgeGroupsSelectbox']) {
                        $sportAgeGroupsSelectbox = $this->sportAgeGroupRepository->findAll($this->getSportsFilter(),
                            $this->getSportAgeGroupsFilter(false));
                        $this->view->assign('sportAgeGroupsSelectbox', $sportAgeGroupsSelectbox);
                        if ($this->settings['sportAgeGroup']['selected'] && $this->settings['sportAgeLevel']['sportAgeLevelsSelectbox']) {
                            $sportAgeLevelsSelectbox = $this->sportAgeLevelRepository->findAll($this->getSportsFilter(),
                                $this->getSportAgeGroupsFilter(), $this->getSportAgeLevelsFilter(false));
                            $this->view->assign('sportAgeLevelsSelectbox', $sportAgeLevelsSelectbox);
                        }
                    }
                }
                if ($this->settings['competitionType']['selectbox']['enabled']) {
                    $competitionTypesSelectbox = $this->competitionTypeRepository->findAll($this->getCompetitionTypesFilter(false));
                    $this->view->assign('competitionTypesSelectbox', $competitionTypesSelectbox);
                }
            }
            $this->pagetitle("Wettbewerbe", "Liste");
        }
        
        /**
         * Use this method to solve tasks which all actions have in common, when VIEW-Context is needed
         */
        public function initializeActions()
        {
            #$listOfPossibleShowViews = 'index,games,teams';
            #$this->determineShowView($this->model);
            #$this->determineShowViews($this->model, $listOfPossibleShowViews);
            #$this->view->assign('settings', $this->settings);
        }
        
    }