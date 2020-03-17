<?php
	
	namespace Balumedien\Clubms\ViewHelpers;
	
	class SelectViewHelper extends \TYPO3\CMS\Fluid\ViewHelpers\Form\SelectViewHelper {
		
		/**
		 * @return void
		 */
		public function initializeArguments() {
			parent::initializeArguments();
			$this->registerTagAttribute('clubs', 'string', 'The Clubs to be shown in the select form', FALSE);
			$this->registerTagAttribute('clubSections', 'string', 'The ClubsSections from which the clubs should be shown in the select form', FALSE);
		}
		
		/**
		 */
		public function render() {
			
			parent::render();
		}
		
	}