<?php
	
	namespace Balumedien\Clubms\ViewHelpers;
	
	class ZodiacSignViewHelper extends \TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper {
		
		/**
		 * @return void
		 */
		public function initializeArguments() {
			parent::initializeArguments();
			$this->registerArgument('zodiacSign', 'int', 'the zodiac sign', TRUE);
		}
		
		/**
		 * @return string
		 */
		public function render() {
			$localizationUtility = new \TYPO3\CMS\Extbase\Utility\LocalizationUtility;
			$langKey = 'tx_clubms_domain_model_person.zodiac_sign_' . $this->arguments['zodiacSign'];
			return $localizationUtility->translate($langKey, "clubms");
		}
		
	}