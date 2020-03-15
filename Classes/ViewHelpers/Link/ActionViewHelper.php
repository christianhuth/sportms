<?php
	
	namespace Balumedien\Clubms\ViewHelpers\Link;
	
	class ActionViewHelper extends \TYPO3\CMS\Fluid\ViewHelpers\Link\ActionViewHelper {
		
		/**
		 * @var \TYPO3\CMS\Extbase\Object\ObjectManager
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $objectManager;
		
		/**
		 * @var \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $configurationManager;
		
		/**
		 * @var array
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $settings;
		
		/**
		 * @return \TYPO3\CMS\Extbase\Object\ObjectManager
		 */
		protected function getObjectManager(): \TYPO3\CMS\Extbase\Object\ObjectManager {
			return $this->objectManager;
		}
		
		/**
		 * @param \TYPO3\CMS\Extbase\Object\ObjectManager $objectManager
		 */
		protected function setObjectManager(\TYPO3\CMS\Extbase\Object\ObjectManager $objectManager): void {
			$this->objectManager = $objectManager;
		}
		
		/**
		 * @return \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface
		 */
		protected function getConfigurationManager(): \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface {
			return $this->configurationManager;
		}
		
		/**
		 * @param \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface $configurationManager
		 */
		protected function setConfigurationManager(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface $configurationManager): void {
			$this->configurationManager = $configurationManager;
		}
		
		/**
		 * @return array
		 */
		protected function getSettings(): array {
			return $this->settings;
		}
		
		/**
		 * @param array $settings
		 */
		protected function setSettings(array $settings): void {
			$this->settings = $settings;
		}
		
		/**
		 * Arguments initialization
		 */
		public function initializeArguments() {
			parent::initializeArguments();
			$this->initSettings();
		}
		
		# Needed so we can fill $this->getSettings()
		protected function initSettings() {
			$configurationManager = $this->objectManager->get('TYPO3\CMS\Extbase\Configuration\ConfigurationManager');
			$this->setSettings($configurationManager->getConfiguration(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_SETTINGS, 'Clubms', 'clubms'));
		}
		
		/**
		 * @return string Rendered link
		 */
		public function renderLink($action = null, $controller = null, $pageUid = null, $parameters = null) {
			\TYPO3\CMS\Core\Utility\DebugUtility::debug($parameters, 'Debug: ' . __FILE__ . ' in Line: ' . __LINE__);
			$extensionName = "clubms";
			$pluginName = "clubms";
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
			$parameters = $this->arguments['arguments'];
			\TYPO3\CMS\Core\Utility\DebugUtility::debug($parameters, 'Debug: ' . __FILE__ . ' in Line: ' . __LINE__);
			$uriBuilder = $this->renderingContext->getControllerContext()->getUriBuilder();
			$uri = $uriBuilder->reset()->setTargetPageUid($pageUid)->setTargetPageType($pageType)->setNoCache($noCache)->setUseCacheHash(!$noCacheHash)->setSection($section)->setFormat($format)->setLinkAccessRestrictedPages($linkAccessRestrictedPages)->setArguments($additionalParams)->setCreateAbsoluteUri($absolute)->setAddQueryString($addQueryString)->setArgumentsToBeExcludedFromQueryString($argumentsToBeExcludedFromQueryString)->setAddQueryStringMethod($addQueryStringMethod)->uriFor($action, $parameters, $controller, $extensionName, $pluginName);
			$this->tag->addAttribute('href', $uri);
			$this->tag->setContent($this->renderChildren());
			$this->tag->forceClosingTag(TRUE);
			return $this->tag->render();
		}
		
	}