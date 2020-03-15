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
			\TYPO3\CMS\Core\Utility\DebugUtility::debug($langKey, 'Debug: ' . __FILE__ . ' in Line: ' . __LINE__);
			$translatedZodiacSign = $localizationUtility->translate($langKey, "clubms");
			\TYPO3\CMS\Core\Utility\DebugUtility::debug($translatedZodiacSign, 'Debug: ' . __FILE__ . ' in Line: ' . __LINE__);
			return $translatedZodiacSign;

			
			
			switch($this->arguments['zodiacSign']) {
				case 1: return "Wassermann";
				case 2: return "Fische";
				case 3: return "Widder";
				case 4: return "Stier";
				case 5: return "Zwillinge";
				case 6: return "Krebs";
				case 7: return "Löwe";
				case 8: return "Jungfrau";
				case 9: return "Waage";
				case 10: return "Skorpion";
				case 11: return "Schütze";
				case 12: return "Steinbock";
				default: return "";
			}
		}
		
	}