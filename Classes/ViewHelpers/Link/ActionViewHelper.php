<?php
	
	namespace Balumedien\Clubms\ViewHelpers\Link;
	
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
		public $listOfClubMsDomainModels;
		
		/**
		 * @var string
		 */
		public $clubMsDomainModel;
		
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
		public function getListOfClubMsDomainModels(): array {
			return $this->listOfClubMsDomainModels;
		}
		
		/**
		 * @param array $listOfClubMsDomainModels
		 */
		public function setListOfClubMsDomainModels(array $listOfClubMsDomainModels): void {
			$this->listOfClubMsDomainModels = $listOfClubMsDomainModels;
		}
		
		/**
		 * @return string
		 */
		public function getClubMsDomainModel(): string {
			return $this->clubMsDomainModel ? $this->clubMsDomainModel : "";
		}
		
		/**
		 * @param string $clubMsDomainModel
		 */
		public function setClubMsDomainModel(string $clubMsDomainModel): void {
			$this->clubMsDomainModel = $clubMsDomainModel;
		}
		
		/**
		 * Arguments initialization
		 */
		public function initializeArguments() {
			parent::initializeArguments();
			$this->initListOfClubMsDomainModels();
			foreach($this->getListOfClubMsDomainModels() as $clubMsDomainModel) {
				$name = $clubMsDomainModel;
				$type = "string";
				$description = lcfirst($clubMsDomainModel) . ' to show';
				$this->registerArgument($name, $type, $description, false);
			}
		}
		
		# Needed so we can fill $this->getSettings()
		public function initSettings() {
			$configurationManager = $this->objectManager->get('TYPO3\CMS\Extbase\Configuration\ConfigurationManager');
			$this->setSettings($configurationManager->getConfiguration(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_SETTINGS, 'Clubms', 'clubms'));
		}
		
		public function initListOfClubMsDomainModels() {
			$ListOfClubMsDomainModels = "Club, ClubSection, Competition, CompetitionSeason, Game, Person, Season, Section, Team, TeamSeason, Venue";
			$this->setListOfClubMsDomainModels(explode(",", str_replace(" ", "", trim($ListOfClubMsDomainModels))));
		}
		
		/**
		 * @return string Rendered link
		 */
		public function render() {
			$this->initSettings();
			$this->initListOfClubMsDomainModels();
			foreach($this->getListOfClubMsDomainModels() as $clubMsDomainModel) {
				if($this->arguments[$clubMsDomainModel]) {
					$this->setClubMsDomainModel($clubMsDomainModel);
					break;
				}
			}
			$extensionName = "clubms";
			$pluginName = "clubms";
			$action = $this->arguments['action'] ? $this->arguments['action'] : "show";
			$controller = $this->arguments['controller'] ? $this->arguments['controller'] : $this->getClubMsDomainModel();
			$pageUid = $this->arguments['pageUid'] ? (int) $this->arguments['pageUid'] : (int) $this->getSettings()[lcfirst($controller)][$action . 'Pid'] ? : NULL;
			$parameters = $this->arguments['arguments'] ? $this->arguments['arguments'] : array();
			if($this->getClubMsDomainModel() != null) {
				if($this->getClubMsDomainModel() != "ClubSection" && $this->getClubMsDomainModel() != "ClubSection" != "CompetitionSeason" && $this->getClubMsDomainModel() != "TeamSeason") {
					$parameters[lcfirst($this->getClubMsDomainModel())] = $this->arguments[$this->getClubMsDomainModel()];
				}
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