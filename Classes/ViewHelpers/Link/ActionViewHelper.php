<?php
	
	namespace Balumedien\Clubms\ViewHelpers\Link;
	
	class ActionViewHelper extends \TYPO3\CMS\Fluid\ViewHelpers\Link\ActionViewHelper {
		
		/**
		 * @var \TYPO3\CMS\Extbase\Object\ObjectManager
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		private $objectManager;
		
		/**
		 * @var \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		private $configurationManager;
		
		/**
		 * @var array
		 */
		private $settings;
		
		/**
		 * @var array
		 */
		private $listOfClubMsDomainModels;
		
		/**
		 * @var string
		 */
		private $clubMsDomainModel;
		
		/**
		 * @return \TYPO3\CMS\Extbase\Object\ObjectManager
		 */
		private function getObjectManager(): \TYPO3\CMS\Extbase\Object\ObjectManager {
			return $this->objectManager;
		}
		
		/**
		 * @param \TYPO3\CMS\Extbase\Object\ObjectManager $objectManager
		 */
		private function setObjectManager(\TYPO3\CMS\Extbase\Object\ObjectManager $objectManager): void {
			$this->objectManager = $objectManager;
		}
		
		/**
		 * @return \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface
		 */
		private function getConfigurationManager(): \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface {
			return $this->configurationManager;
		}
		
		/**
		 * @param \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface $configurationManager
		 */
		private function setConfigurationManager(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface $configurationManager): void {
			$this->configurationManager = $configurationManager;
		}
		
		/**
		 * @return array
		 */
		private function getSettings(): array {
			return $this->settings;
		}
		
		/**
		 * @param array $settings
		 */
		private function setSettings(array $settings): void {
			$this->settings = $settings;
		}
		
		/**
		 * @return array
		 */
		private function getListOfClubMsDomainModels(): array {
			return $this->listOfClubMsDomainModels;
		}
		
		/**
		 * @param array $listOfClubMsDomainModels
		 */
		private function setListOfClubMsDomainModels(array $listOfClubMsDomainModels): void {
			$this->listOfClubMsDomainModels = $listOfClubMsDomainModels;
		}
		
		/**
		 * @return string
		 */
		private function getClubMsDomainModel(): string {
			return $this->clubMsDomainModel;
		}
		
		/**
		 * @param string $clubMsDomainModel
		 */
		private function setClubMsDomainModel(string $clubMsDomainModel): void {
			$this->clubMsDomainModel = $clubMsDomainModel;
		}
		
		/**
		 * Arguments initialization
		 */
		public function initializeArguments() {
			parent::initializeArguments();
			$this->initSettings();
			$this->initListOfClubMsDomainModels();
			foreach($this->getListOfClubMsDomainModels() as $clubMsDomainModel) {
				$this->registerArgument($clubMsDomainModel, '\Balumedien\Clubms\Domain\Model\\' . $clubMsDomainModel, strtolower($clubMsDomainModel) . ' to show', false);
			}
		}
		
		# Needed so we can fill $this->getSettings()
		private function initSettings() {
			$configurationManager = $this->objectManager->get('TYPO3\CMS\Extbase\Configuration\ConfigurationManager');
			$this->setSettings($configurationManager->getConfiguration(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_SETTINGS, 'Clubms', 'clubms'));
		}
		
		private function initListOfClubMsDomainModels() {
			$ListOfClubMsDomainModels = "Club, ClubSection, Competition, CompetitionSeason, Game, Person, Season, Section, Team, TeamSeason, Venue";
			$this->setListOfClubMsDomainModels(explode(",", str_replace(" ", "", trim($ListOfClubMsDomainModels))));
		}
		
		/**
		 * @return string Rendered link
		 */
		public function render() {
			\TYPO3\CMS\Core\Utility\DebugUtility::debug($this->arguments, 'Debug: ' . __FILE__ . ' in Line: ' . __LINE__);
			foreach($this->getListOfClubMsDomainModels() as $clubMsDomainModel) {
				if($this->arguments[strtolower($clubMsDomainModel)]) {
					$this->setClubMsDomainModel(strtolower($clubMsDomainModel));
					break;
				}
			}
			$extensionName = "clubms";
			$pluginName = "clubms";
			$action = "show";
			$controller = $this->getClubMsDomainModel();
			$pageUid = (int) $this->getSettings()[strtolower($this->getClubMsDomainModel())][$action . 'Pid'] ? : NULL;
			$parameters = array();
			$parameters[strtolower($this->getClubMsDomainModel())] = $this->arguments[$this->getClubMsDomainModel()];
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