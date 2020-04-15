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
		public $listOfSportMsDomainModels;
		
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
		public function getListOfSportMsDomainModels(): array {
			return $this->listOfSportMsDomainModels;
		}
		
		/**
		 * @param array $listOfSportMSDomainModels
		 */
		public function setListOfSportMsDomainModels(array $listOfSportMSDomainModels): void {
			$this->listOfSportMsDomainModels = $listOfSportMSDomainModels;
		}
		
		/**
		 * @return string
		 */
		public function getSportMsDomainModel(): string {
			return $this->sportMsDomainModel ? $this->sportMsDomainModel : "";
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
		public function initializeArguments() {
			parent::initializeArguments();
			$this->initListOfSportMsDomainModels();
			foreach($this->getListOfSportMsDomainModels() as $sportMsDomainModel) {
				$name = $sportMsDomainModel;
				$type = 'string';
				$description = lcfirst($sportMsDomainModel) . ' to show';
				$this->registerArgument($name, $type, $description, FALSE);
			}
		}
		
		# Needed so we can fill $this->getSettings()
		public function initSettings() {
			$configurationManager = $this->objectManager->get('TYPO3\CMS\Extbase\Configuration\ConfigurationManager');
			$this->setSettings($configurationManager->getConfiguration(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_SETTINGS, 'Sportms', 'sportms'));
		}
		
		public function initListOfSportMsDomainModels() {
			$ListOfSportMsDomainModels = 'Club, ClubSection, Competition, Game, Person, Team, Venue';
			$this->setListOfSportMsDomainModels(explode(',', str_replace(' ', '', trim($ListOfSportMsDomainModels))));
		}
		
		/**
		 * @return string Rendered link
		 */
		public function render() {
			$this->initSettings();
			$this->initListOfSportMsDomainModels();
			foreach($this->getListOfSportMsDomainModels() as $sportMsDomainModel) {
				if($this->arguments[$sportMsDomainModel]) {
					$this->setSportMsDomainModel($sportMsDomainModel);
					break;
				}
			}
			
			$extensionName = 'sportms';
			$pluginName = 'sportms';
			
			var_dump($showView);
			if(strpos('show', (string) $showView) !== FALSE) {
				if(is_null($this->arguments[$this->sportMsDomainModel]) || !$this->arguments[$this->sportMsDomainModel]->isDetailLink()) {
					$this->tagName = 'span';
					$this->setTagBuilder(new \TYPO3Fluid\Fluid\Core\ViewHelper\TagBuilder($this->tagName));
					$this->tag->setContent($this->renderChildren());
					return $this->tag->render();
				}
			}
			
			$controller = $this->arguments['controller'] ? $this->arguments['controller'] : $this->getSportMsDomainModel();
			$pageUid = $this->arguments['pageUid'] ? (int) $this->arguments['pageUid'] : (int) $this->getSettings()[lcfirst($controller)][$action . 'Pid'] ? : NULL;
			$parameters = $this->arguments['arguments'] ? $this->arguments['arguments'] : array();
			if(($action == "show") && ($showView)) {
				$parameters['showView'] = $showView;
			}
			if($this->getSportMsDomainModel() != NULL) {
				if($this->getSportMsDomainModel() != "CompetitionSeason" && $this->getSportMsDomainModel() != "TeamSeason") {
					$parameters[lcfirst($this->getSportMsDomainModel())] = $this->arguments[$this->getSportMsDomainModel()];
				} else {
					switch($this->getSportMsDomainModel()) {
						case "CompetitionSeason":
							$parameters['competition'] = $this->arguments[$sportMsDomainModel]->getCompetition();
							$parameters['season'] = $this->arguments[$sportMsDomainModel]->getSeason();
							break;
						case "TeamSeason":
							$parameters['team'] = $this->arguments[$sportMsDomainModel]->getTeam();
							$parameters['season'] = $this->arguments[$sportMsDomainModel]->getSeason();
							break;
					}
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