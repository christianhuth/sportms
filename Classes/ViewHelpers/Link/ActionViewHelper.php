<?php
	
	namespace Balumedien\Clubms\ViewHelpers\Link;
	
	class ActionViewHelper extends \TYPO3\CMS\Fluid\ViewHelpers\Link\ActionViewHelper {
		
		/**
		 * @var \TYPO3\CMS\Extbase\Object\ObjectManager
		 * @inject
		 */
		public $objectManager;
		
		/**
		 * @var \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface
		 * @inject
		 */
		protected $configurationManager;
		
		/**
		 * Arguments initialization
		 */
		public function initializeArguments() {
			parent::initializeArguments();
		}
		
		/**
		 * @return string Rendered link
		 */
		public function render() {
			
			# Needed so we can access $this->settings
			$configurationManager = $this->objectManager->get('TYPO3\CMS\Extbase\Configuration\ConfigurationManager');
			$settings = $configurationManager->getConfiguration(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_SETTINGS, 'Clubms', 'clubms');
			
			$action = $this->arguments['action'];
			$controller = $this->arguments['controller'];
			$extensionName = "clubms";
			$pluginName = "clubms";
			$pageUid = (int) $this->settings['Section']['showPid'] ? : NULL;
			
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
			$uriBuilder = $this->renderingContext->getControllerContext()->getUriBuilder();
			$uri = $uriBuilder->reset()->setTargetPageUid($pageUid)->setTargetPageType($pageType)->setNoCache($noCache)->setUseCacheHash(!$noCacheHash)->setSection($section)->setFormat($format)->setLinkAccessRestrictedPages($linkAccessRestrictedPages)->setArguments($additionalParams)->setCreateAbsoluteUri($absolute)->setAddQueryString($addQueryString)->setArgumentsToBeExcludedFromQueryString($argumentsToBeExcludedFromQueryString)->setAddQueryStringMethod($addQueryStringMethod)->uriFor($action, $parameters, $controller, $extensionName, $pluginName);
			$this->tag->addAttribute('href', $uri);
			$this->tag->setContent($this->renderChildren());
			$this->tag->forceClosingTag(TRUE);
			return $this->tag->render();
		}
		
	}