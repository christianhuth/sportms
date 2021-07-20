<?php
    
    namespace Balumedien\Sportms\ViewHelpers\Page;
    
    class HeadlineViewHelper extends \TYPO3\CMS\Fluid\ViewHelpers\Link\ActionViewHelper
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
        
        /**
         * Arguments initialization
         */
        public function initializeArguments(): void
        {
            parent::initializeArguments();
        }
        
        # Needed so we can fill $this->getSettings()
        
        /**
         * @return string Rendered link
         */
        public function render(): string
        {
            $this->initSettings();
            
            $extensionName = 'sportms';
            $pluginName = 'sportms';
            
            # we now know controller and action
            # pageUid can only be set via Settings (only TypoScript at the moment)
            $pageUid = 12;
            
            $parameters = $this->arguments['arguments'] ?: [];
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
        
        /**
         * Headline for CompetitionSeason --> gameday
         */
        private function competitionSeasonGameday()
        {
        }
        
    }