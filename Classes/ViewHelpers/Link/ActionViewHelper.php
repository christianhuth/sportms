<?php
	
	namespace Balumedien\Sportms\ViewHelpers\Link;
	
	class ActionViewHelper extends \TYPO3\CMS\Fluid\ViewHelpers\Link\ActionViewHelper {
		
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
		 * @var array
		 */
		protected $listOfControllersAndTheirActions;
		
		/**
		 * @var array
		 */
		protected $listOfAllowedSportMsDomainModels;
		
		/**
		 * @var string
		 */
		public $sportMsDomainModel;
		
		/**
		 * @return \TYPO3\CMS\Extbase\Object\ObjectManager
		 */
		public function getObjectManager(): \TYPO3\CMS\Extbase\Object\ObjectManager {
			return $this->objectManager;
		}
		
		/**
		 * @param \TYPO3\CMS\Extbase\Object\ObjectManager $objectManager
		 */
		public function setObjectManager(\TYPO3\CMS\Extbase\Object\ObjectManager $objectManager): void {
			$this->objectManager = $objectManager;
		}
		
		/**
		 * @return \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface
		 */
		public function getConfigurationManager(): \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface {
			return $this->configurationManager;
		}
		
		/**
		 * @param \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface $configurationManager
		 */
		public function setConfigurationManager(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface $configurationManager): void {
			$this->configurationManager = $configurationManager;
		}
		
		/**
		 * @return array
		 */
		public function getSettings(): array {
			return $this->settings;
		}
		
		/**
		 * @param array $settings
		 */
		public function setSettings(array $settings): void {
			$this->settings = $settings;
		}
		
		/**
		 * @return array
		 */
		public function getListOfControllersAndTheirActions(): array {
			return $this->listOfControllersAndTheirActions;
		}
		
		/**
		 * @param array $listOfControllersAndTheirActions
		 */
		public function setListOfControllersAndTheirActions(array $listOfControllersAndTheirActions): void {
			$this->listOfControllersAndTheirActions = $listOfControllersAndTheirActions;
		}
		
		/**
		 * @return array
		 */
		public function getListOfAllowedSportMsDomainModels(): array {
			return $this->listOfAllowedSportMsDomainModels;
		}
		
		/**
		 * @param array $listOfAllowedSportMsDomainModels
		 */
		public function setListOfAllowedSportMsDomainModels(array $listOfAllowedSportMsDomainModels): void {
			$this->listOfAllowedSportMsDomainModels = $listOfAllowedSportMsDomainModels;
		}
		
		/**
		 * @return string
		 */
		public function getSportMsDomainModel(): string {
			return $this->sportMsDomainModel ? : "";
		}
		
		/**
		 * @param string $sportMsDomainModel
		 */
		public function setSportMsDomainModel(string $sportMsDomainModel): void {
			$this->sportMsDomainModel = $sportMsDomainModel;
		}
		
		/**
		 * Arguments initialization
		 */
		public function initializeArguments(): void {
			parent::initializeArguments();
			$this->initListOfAllowedSportMsDomainModels();
			foreach($this->getListOfAllowedSportMsDomainModels() as $sportMsDomainModel) {
				$name = $sportMsDomainModel;
				$type = 'string';
				$description = lcfirst($sportMsDomainModel);
				$this->registerArgument($name, $type, $description, FALSE);
			}
			$this->overrideArgument("controller", "string", "Target controller. Needs to be defined.", TRUE);
		}

		# Needed so we can fill $this->getSettings()
		public function initSettings(): void {
			$configurationManager = $this->objectManager->get(\TYPO3\CMS\Extbase\Configuration\ConfigurationManager::class);
			$this->setSettings($configurationManager->getConfiguration(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_SETTINGS, 'Sportms', 'sportms'));
		}
		
		public function initListOfAllowedSportMsDomainModels(): void {
			$listOfAllowedSportMsDomainModels = array();
			$listOfAllowedSportMsDomainModels[] = 'Club';
			$listOfAllowedSportMsDomainModels[] = 'ClubSection';
			$listOfAllowedSportMsDomainModels[] = 'Competition';
			$listOfAllowedSportMsDomainModels[] = 'CompetitionSeason';
			$listOfAllowedSportMsDomainModels[] = 'CompetitionSeasonGameday';
			$listOfAllowedSportMsDomainModels[] = 'Game';
			$listOfAllowedSportMsDomainModels[] = 'Person';
			$listOfAllowedSportMsDomainModels[] = 'Season';
			$listOfAllowedSportMsDomainModels[] = 'Sport';
			$listOfAllowedSportMsDomainModels[] = 'SportAgeGroup';
			$listOfAllowedSportMsDomainModels[] = 'SportAgeLevel';
			$listOfAllowedSportMsDomainModels[] = 'Team';
			$listOfAllowedSportMsDomainModels[] = 'TeamSeason';
			$listOfAllowedSportMsDomainModels[] = 'Venue';
			$this->setListOfAllowedSportMsDomainModels($listOfAllowedSportMsDomainModels);
		}
		
		protected function initListOfControllersAndTheirActions(): void {
			$listofControllersAndTheirActions = array();
			$listofControllersAndTheirActions['Club'] = ['list'];
			$listofControllersAndTheirActions['ClubSection'] = ['list'];
			$listofControllersAndTheirActions['Competition'] = ['list', 'seasonGames', 'seasonStandings'];
			$listofControllersAndTheirActions['CompetitionSeason'] = ['games', 'standings'];
			$listofControllersAndTheirActions['Game'] = ['list', 'history', 'index', 'info', 'lineup', 'report'];
			$listofControllersAndTheirActions['Person'] = ['list', 'officialIndex', 'playerIndex', 'refereeIndex'];
			$listofControllersAndTheirActions['Team'] = ['historyRecordGames', 'historyRecordPlayers', 'list', 'seasonIndex', 'seasonGames', 'seasonGoals', 'seasonSquad'];
			$listofControllersAndTheirActions['TeamSeason'] = ['games', 'goals', 'index', 'squad'];
			$this->setListOfControllersAndTheirActions($listofControllersAndTheirActions);
		}
		
		/**
		 * @return string Rendered link
		 */
		public function render(): string {
			
			$this->initSettings();
			$this->initListOfAllowedSportMsDomainModels();
			$this->initListOfControllersAndTheirActions();
			
			$extensionName = 'sportms';
			$pluginName = 'sportms';

            # find out which Controller to use
            if($this->arguments['controller']) {
                $controller = $this->arguments['controller'];
                if(!array_key_exists($controller, $this->getListOfControllersAndTheirActions())) {
                    die("Wrong Controller $controller given to create Link in sportms Extension.");
                }
            } else {
                die("No Controller given to create Link in sportms Extension.");
            }
			
			# find out which action to use
			if(is_null($this->arguments['action'])) {
				$action = "list";
			} else {
				$action = $this->arguments['action'];
				# TODO: check if Object of Controller is given, else we can't execute the action
                if((is_null($this->arguments[$controller])) && (($controller == "TeamSeason") && (is_null($this->arguments["Team"])))) {
                    #die("No Domain Object given to display.");
                }
			}

            # we now know controller and action
            # pageUid can only be set via Settings (only TypoScript at the moment)
            $pageUid = (int) $this->getSettings()[lcfirst($controller)][$action]['pid'];

            # TODO: add Possibility to add allowed actions to an instance of a DomainModel
            # TODO: check if desired action is in allowed actions
            # if no pageUid is defined, or the desired action is not allowed, than just display a span instead of a link
			if(is_null($pageUid) || is_null($this->arguments[$controller])) {
				$this->tagName = 'span';
				$this->setTagBuilder(new \TYPO3Fluid\Fluid\Core\ViewHelper\TagBuilder($this->tagName));
				$this->tag->setContent($this->renderChildren());
				return $this->tag->render();
			}

			$parameters = $this->arguments['arguments'] ? : array();
			# add every given Domain Object as parameter for the link
            foreach($this->getListOfAllowedSportMsDomainModels() as $sportMsDomainModel) {
                if($this->arguments[$sportMsDomainModel]) {
                    $parameters[lcfirst($sportMsDomainModel)] = $this->arguments[$sportMsDomainModel];
                }
            }
            die(print_r($parameters));
			$pageType = (int) $this->arguments['pageType'];
			$noCache = (bool) $this->arguments['noCache'];
			$noCacheHash = (bool) $this->arguments['noCacheHash'];
			$section = (string) $this->arguments['section'];
			$format = (string) $this->arguments['format'];
			$linkAccessRestrictedPages = (bool) $this->arguments['linkAccessRestrictedPages'];
			$additionalParams = (array) $this->arguments['additionalParams'];
			$absolute = (bool) $this->arguments['absolute'];
			$addQueryString = (bool) $this->arguments['addQueryString'];
			$argumentsToBeExcludedFromQueryString = (array) $this->arguments['argumentsToBeExcludedFromQueryString'];
			$addQueryStringMethod = $this->arguments['addQueryStringMethod'];
			$uriBuilder = $this->renderingContext->getControllerContext()->getUriBuilder();
			$uri = $uriBuilder->reset()->setTargetPageUid($pageUid)->setTargetPageType($pageType)->setNoCache($noCache)->setUseCacheHash(!$noCacheHash)->setSection($section)->setFormat($format)->setLinkAccessRestrictedPages($linkAccessRestrictedPages)->setArguments($additionalParams)->setCreateAbsoluteUri($absolute)->setAddQueryString($addQueryString)->setArgumentsToBeExcludedFromQueryString($argumentsToBeExcludedFromQueryString)->setAddQueryStringMethod($addQueryStringMethod)->uriFor($action, $parameters, $controller, $extensionName, $pluginName);
			$this->tag->addAttribute('href', $uri);
			$this->tag->setContent($this->renderChildren());
			$this->tag->forceClosingTag(TRUE);
			return $this->tag->render();
		}
		
	}