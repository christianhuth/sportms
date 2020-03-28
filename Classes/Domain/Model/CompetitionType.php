<?php
	
	namespace Balumedien\Sportms\Domain\Model;
	
	/**
	 * CompetitionType
	 */
	class CompetitionType extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {
		
		/**
		 * @var string
		 */
		protected $label = '';
		
		/**
		 * Returns the label of the competition
		 * @return string $label
		 */
		public function getLabel() {
			return $this->label;
		}
		
		/**
		 * Sets the label of the competition
		 * @param string $label
		 * @return void
		 */
		public function setLabel($label) {
			$this->label = $label;
		}
		
	}