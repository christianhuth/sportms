<?php
	
	namespace Balumedien\Sportms\ViewHelpers;
	
	class WeekdayViewHelper extends \TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper {
		
		/**
		 * @return void
		 */
		public function initializeArguments() {
			parent::initializeArguments();
			$this->registerArgument('weekyday', 'int', 'the day of the week', TRUE);
		}
		
		/**
		 * @return string
		 */
		public function render() {
			$localizationUtility = new \TYPO3\CMS\Extbase\Utility\LocalizationUtility;
			$langKey = 'tx_sportms_general.day.' . $this->arguments['weekday'];
			return $localizationUtility->translate($langKey, "sportms");
		}
		
	}