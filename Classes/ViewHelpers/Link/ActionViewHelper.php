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
			$listofControllersAndTheirActions[] = ['Club', ['list']];
			$listofControllersAndTheirActions[] = ['ClubSection', ['list']];
			$listofControllersAndTheirActions[] = ['Competition', ['list', 'seasonGames', 'seasonStandings']];
			$listofControllersAndTheirActions[] = ['CompetitionSeason', ['games', 'standings']];
			$listofControllersAndTheirActions[] = ['Game', ['list', 'history', 'index', 'info', 'lineup', 'report']];
			$listofControllersAndTheirActions[] = ['Person', ['list', 'officialIndex', 'playerIndex', 'refereeIndex']];
			$listofControllersAndTheirActions[] = ['Team', ['historyRecordGames', 'historyRecordPlayers', 'list', 'seasonIndex', 'seasonGames', 'seasonGoals', 'seasonSquad']];
			$listofControllersAndTheirActions[] = ['TeamSeason', ['games', 'goals', 'index', 'squad']];
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
			
			# find out which action to use
			if(is_null($this->arguments['action'])) {
				$action = "list";
			} else {
				$action = $this->arguments['action'];
			}
			
			# find out which Controller to use
			if($this->arguments['controller']) {
				$controller = $this->arguments['controller'];
                (in_array($controller, $this->getListOfControllersAndTheirActions(), false)) ? : die("Wrong Controller given to create Link in sportms Extension.");
			} else {
			    die("No Controller given to create Link in sportms Extension.");
			}

			# we now know controller and action
            # let's check if all arguments are given to create the link for the specified combination of controller and action
            foreach($this->getListOfAllowedSportMsDomainModels() as $sportMsDomainModel) {
                if($this->arguments[$sportMsDomainModel]) {
                    $parameters[lcfirst($sportMsDomainModel)] = $this->arguments[$sportMsDomainModel];
                }
            }
			
			if(is_null($this->arguments[$controller]) || !$this->arguments[$controller]->isDetailLink()) {
				$this->tagName = 'span';
				$this->setTagBuilder(new \TYPO3Fluid\Fluid\Core\ViewHelper\TagBuilder($this->tagName));
				$this->tag->setContent($this->renderChildren());
				return $this->tag->render();
			}
			
			# pageUid can only be set via Settings (TypoScript or Flexform)
			$pageUid = (int) $this->getSettings()[lcfirst($controller)][$action]['pid'];
			
			$parameters = $this->arguments['arguments'] ? : array();
			if($this->getSportMsDomainModel() !== NULL) {
				$parameters[lcfirst($this->getSportMsDomainModel())] = $this->arguments[$this->getSportMsDomainModel()];
			}
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