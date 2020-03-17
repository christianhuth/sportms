<?php
	
	namespace Balumedien\Clubms\ViewHelpers\Club;
	
	class SelectViewHelper extends \TYPO3\CMS\Fluid\ViewHelpers\Form\SelectViewHelper {
		
		/**
		 * @return void
		 */
		public function initializeArguments() {
			parent::initializeArguments();
			$this->registerTagAttribute('clubs', 'array', 'The Clubs to be shown in the select form', FALSE);
			$this->registerTagAttribute('clubSections', 'array', 'The ClubsSections from which the clubs should be shown in the select form', FALSE);
		}
		
		/**
		 */
		public function render() {
			$this->arguments['options'] = $this->arguments['clubs'];
			parent::render();
		}
		
	}