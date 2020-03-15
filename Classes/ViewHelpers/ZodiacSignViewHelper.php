<?php
	
	namespace Balumedien\Clubms\ViewHelpers\Link;
	
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
			$zodiacSign = $this->arguments['zodiacSign'];
			return $zodiacSign;
		}
		
	}