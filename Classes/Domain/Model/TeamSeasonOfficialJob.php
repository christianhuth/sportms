<?php
	
	namespace Balumedien\Sportms\Domain\Model;
	
	/**
	 * TeamSeasonOfficialJob
	 */
	class TeamSeasonOfficialJob extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {
		
		/**
		 * @var string
		 */
		protected $label = '';
		
		/**
		 * @return string
		 */
		public function getLabel() {
			return $this->label;
		}
		
		/**
		 * @param string $label
		 */
		public function setLabel($label) {
			$this->label = $label;
		}
		
	}