<?php
	
	namespace Balumedien\Sportms\Domain\Model;
	
	/**
	 * CompetitionType
	 */
	class CompetitionType extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {
		
		/**
		 * @var string
		 */
		protected $label;
		
		/**
		 * @return string $label
		 */
		public function getLabel() {
			return $this->label;
		}
		
		/**
		 * @param string $label
		 * @return void
		 */
		public function setLabel($label) {
			$this->label = $label;
		}
		
	}