<?php
    
    declare(strict_types=1);
    
    namespace ChristianKnell\Sportms\ViewHelpers\Person;
    
    class ZodiacSignViewHelper extends \TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper
    {
        
        /**
         * @return void
         */
        public function initializeArguments()
        {
            parent::initializeArguments();
            $this->registerArgument('zodiacSign', 'int', 'the zodiac sign', true);
        }
        
        /**
         * @return string
         */
        public function render()
        {
            $localizationUtility = new \TYPO3\CMS\Extbase\Utility\LocalizationUtility;
            $langKey = 'tx_sportms_domain_model_person.zodiac_sign_' . $this->arguments['zodiacSign'];
            return $localizationUtility->translate($langKey, "sportms");
        }
        
    }
