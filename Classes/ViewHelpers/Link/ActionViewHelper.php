<?php
    
    namespace Balumedien\Sportms\ViewHelpers\Link;
    
    class ActionViewHelper extends \TYPO3\CMS\Fluid\ViewHelpers\Link\ActionViewHelper
    {
        
        /**
         * @var \TYPO3\CMS\Extbase\Object\ObjectManager
         * @TYPO3\CMS\Extbase\Annotation\Inject
         */
        public $objectManager;
        
        /**
         * @var \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface
         * @TYPO3\CMS\Extbase\Annotation\Inject
         */
        public $configurationManager;
        
        /**
         * @var array
         */
        public $settings;
        /**
         * @var string
         */
        public $sportMsDomainModel;
        /**
         * @var array
         */
        protected $listOfControllersAndTheirActions;
        /**
         * @var array
         */
        protected $listOfAllowedSportMsDomainModels;
        
        /**
         * @return \TYPO3\CMS\Extbase\Object\ObjectManager
         */
        public function getObjectManager(): \TYPO3\CMS\Extbase\Object\ObjectManager
        {
            return $this->objectManager;
        }
        
        /**
         * @param \TYPO3\CMS\Extbase\Object\ObjectManager $objectManager
         */
        public function setObjectManager(\TYPO3\CMS\Extbase\Object\ObjectManager $objectManager): void
        {
            $this->objectManager = $objectManager;
        }
        
        /**
         * @return \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface
         */
        public function getConfigurationManager(): \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface
        {
            return $this->configurationManager;
        }
        
        /**
         * @param \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface $configurationManager
         */
        public function setConfigurationManager(
            \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface $configurationManager
        ): void {
            $this->configurationManager = $configurationManager;
        }
        
        /**
         * @return string
         */
        public function getSportMsDomainModel(): string
        {
            return $this->sportMsDomainModel ?: "";
        }
        
        /**
         * @param string $sportMsDomainModel
         */
        public function setSportMsDomainModel(string $sportMsDomainModel): void
        {
            $this->sportMsDomainModel = $sportMsDomainModel;
        }
        
        /**
         * Arguments initialization
         */
        public function initializeArguments(): void
        {
            parent::initializeArguments();
            $this->initListOfAllowedSportMsDomainModels();
            foreach ($this->getListOfAllowedSportMsDomainModels() as $sportMsDomainModel) {
                $name = $sportMsDomainModel;
                $type = 'string';
                $description = lcfirst($sportMsDomainModel);
                $this->registerArgument($name, $type, $description, false);
            }
            $this->registerArgument("OfficialProfile", 'string', 'The OfficialProfile to be shown.', false);
            $this->registerArgument("PlayerProfile", 'string', 'The PlayerProfile to be shown.', false);
            $this->registerArgument("RefereeProfile", 'string', 'The RefereeProfile to be shown.', false);
            $this->overrideArgument("controller", "string", "Target controller. Needs to be defined.", true);
        }
        
        public function initListOfAllowedSportMsDomainModels(): void
        {
            $listOfAllowedSportMsDomainModels = [];
            $listOfAllowedSportMsDomainModels[] = 'Club';
            $listOfAllowedSportMsDomainModels[] = 'ClubSection';
            $listOfAllowedSportMsDomainModels[] = 'Competition';
            $listOfAllowedSportMsDomainModels[] = 'CompetitionSeason';
            $listOfAllowedSportMsDomainModels[] = 'CompetitionSeasonGameday';
            $listOfAllowedSportMsDomainModels[] = 'Game';
            $listOfAllowedSportMsDomainModels[] = 'Person';
            $listOfAllowedSportMsDomainModels[] = 'Sport';
            $listOfAllowedSportMsDomainModels[] = 'Team';
            $listOfAllowedSportMsDomainModels[] = 'TeamSeason';
            $this->setListOfAllowedSportMsDomainModels($listOfAllowedSportMsDomainModels);
        }
        
        /**
         * @return array
         */
        public function getListOfAllowedSportMsDomainModels(): array
        {
            return $this->listOfAllowedSportMsDomainModels;
        }
        
        /**
         * @param array $listOfAllowedSportMsDomainModels
         */
        public function setListOfAllowedSportMsDomainModels(array $listOfAllowedSportMsDomainModels): void
        {
            $this->listOfAllowedSportMsDomainModels = $listOfAllowedSportMsDomainModels;
        }
        
        /**
         * @return string Rendered link
         */
        public function render(): string
        {
            $this->initSettings();
            $this->initListOfAllowedSportMsDomainModels();
            $this->initListOfControllersAndTheirActions();
            
            $extensionName = 'sportms';
            $pluginName = 'sportms';
            
            # find out which Controller to use
            if ($this->arguments['controller']) {
                $controller = $this->arguments['controller'];
                if (!array_key_exists($controller, $this->getListOfControllersAndTheirActions())) {
                    die("Wrong Controller $controller given to create Link in sportms Extension.");
                }
            } else {
                die("No Controller given to create Link in sportms Extension.");
            }
            
            if ($controller === "Club") {
                $pluginName = "Club";
            }
            
            if ($controller === "Competition" || $controller === "Competition") {
                $pluginName = "Competition";
            }
            
            if ($controller === "Game") {
                $pluginName = "Game";
            }
            
            if ($controller === "Person") {
                $pluginName = "Person";
            }
            
            if ($controller === "Team" || $controller === "TeamSeason") {
                $pluginName = "Team";
            }
            
            # find out which action to use
            if (is_null($this->arguments['action'])) {
                $action = "list";
            } else {
                $action = $this->arguments['action'];
                # TODO: check if Object of Controller is given, else we can't execute the action
                if ((is_null($this->arguments[$controller])) && (($controller == "TeamSeason") && (is_null($this->arguments["Team"])))) {
                    #die("No Domain Object given to display.");
                }
            }
            
            # we now know controller and action
            # pageUid can only be set via Settings (only TypoScript at the moment)
            $pageUid = (int)$this->getSettings()[lcfirst($controller)][$action]['pid'];
            
            # TODO: add Possibility to add allowed actions to an instance of a DomainModel
            # TODO: check if desired action is in allowed actions
            # if no pageUid is defined, or the desired action is not allowed, than just display a span instead of a link
            if (empty($pageUid) || empty($this->arguments[$controller])) {
                return $this->renderSpan();
            }
            
            $this->checkIfDetailLink($controller);
            
            $parameters = $this->arguments['arguments'] ?: [];
            # add every given Domain Object as parameter for the link
            foreach ($this->getListOfAllowedSportMsDomainModels() as $sportMsDomainModel) {
                if ($this->arguments[$sportMsDomainModel]) {
                    $parameters[lcfirst($sportMsDomainModel)] = $this->arguments[$sportMsDomainModel];
                }
            }
            $pageType = (int)$this->arguments['pageType'];
            $noCache = (bool)$this->arguments['noCache'];
            $noCacheHash = (bool)$this->arguments['noCacheHash'];
            $section = (string)$this->arguments['section'];
            $format = (string)$this->arguments['format'];
            $linkAccessRestrictedPages = (bool)$this->arguments['linkAccessRestrictedPages'];
            $additionalParams = (array)$this->arguments['additionalParams'];
            $absolute = (bool)$this->arguments['absolute'];
            $addQueryString = (bool)$this->arguments['addQueryString'];
            $argumentsToBeExcludedFromQueryString = (array)$this->arguments['argumentsToBeExcludedFromQueryString'];
            $addQueryStringMethod = $this->arguments['addQueryStringMethod'];
            $uriBuilder = $this->renderingContext->getControllerContext()->getUriBuilder();
            $uri = $uriBuilder->reset()->setTargetPageUid($pageUid)->setTargetPageType($pageType)->setNoCache($noCache)->setUseCacheHash(!$noCacheHash)->setSection($section)->setFormat($format)->setLinkAccessRestrictedPages($linkAccessRestrictedPages)->setArguments($additionalParams)->setCreateAbsoluteUri($absolute)->setAddQueryString($addQueryString)->setArgumentsToBeExcludedFromQueryString($argumentsToBeExcludedFromQueryString)->setAddQueryStringMethod($addQueryStringMethod)->uriFor($action,
                $parameters, $controller, $extensionName, $pluginName);
            $this->tag->addAttribute('href', $uri);
            $this->tag->setContent($this->renderChildren());
            $this->tag->forceClosingTag(true);
            return $this->tag->render();
        }
        
        public function initSettings(): void
        {
            $configurationManager = $this->objectManager->get(\TYPO3\CMS\Extbase\Configuration\ConfigurationManager::class);
            $this->setSettings($configurationManager->getConfiguration(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_SETTINGS,
                'Sportms', 'sportms'));
        }
        
        protected function initListOfControllersAndTheirActions(): void
        {
            $listofControllersAndTheirActions = [];
            $listofControllersAndTheirActions['Club'] = ['list', 'sections'];
            $listofControllersAndTheirActions['Competition'] = ['list, seasonGames'];
            $listofControllersAndTheirActions['Competition'] = ['clubs', 'games', 'teams'];
            $listofControllersAndTheirActions['Game'] = ['history', 'index', 'list', 'report'];
            $listofControllersAndTheirActions['Person'] = [
                'list',
                'officialProfile',
                'playerJerseys',
                'playerProfile',
                'refereeProfile',
            ];
            $listofControllersAndTheirActions['Team'] = [
                'historyOfficials',
                'historyRecordGames',
                'historyRecordPlayers',
                'list',
            ];
            $listofControllersAndTheirActions['TeamSeason'] = ['gamesByCompetition', 'gamesByDate', 'index'];
            $this->setListOfControllersAndTheirActions($listofControllersAndTheirActions);
        }
        
        # Needed so we can fill $this->getSettings()
        
        /**
         * @return array
         */
        public function getListOfControllersAndTheirActions(): array
        {
            return $this->listOfControllersAndTheirActions;
        }
        
        /**
         * @param array $listOfControllersAndTheirActions
         */
        public function setListOfControllersAndTheirActions(array $listOfControllersAndTheirActions): void
        {
            $this->listOfControllersAndTheirActions = $listOfControllersAndTheirActions;
        }
        
        /**
         * @return array
         */
        public function getSettings(): array
        {
            return $this->settings;
        }
        
        /**
         * @param array $settings
         */
        public function setSettings(array $settings): void
        {
            $this->settings = $settings;
        }
        
        private function renderSpan()
        {
            $this->tagName = 'span';
            $this->setTagBuilder(new \TYPO3Fluid\Fluid\Core\ViewHelper\TagBuilder($this->tagName));
            $this->tag->setContent($this->renderChildren());
            return $this->tag->render();
        }
        
        /**
         * @param String $controller
         * @return mixed
         */
        private function checkIfDetailLink(string $controller)
        {
            if ($controller === "Club" ||
                $controller === "Competition" ||
                $controller === "Game" ||
                $controller === "Person" ||
                $controller === "TeamSeason") {
                $object = $this->arguments[$controller];
                $detailLinkForObject = $object->isDetailLink();
                if (!$detailLinkForObject) {
                    return $this->renderSpan();
                }
                if ($controller === "Competition" ||
                    $controller === "TeamSeason") {
                    switch ($controller) {
                        case "Competition":
                            $parentObject = $object->getCompetition();
                            break;
                        case "TeamSeason":
                            $parentObject = $object->getTeam();
                            break;
                    }
                    $detailLinkForParentObject = $parentObject->isDetailLink();
                    if (!$detailLinkForParentObject) {
                        return $this->renderSpan();
                    }
                }
            }
        }
        
    }