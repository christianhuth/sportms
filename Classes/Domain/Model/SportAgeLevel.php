<?php
	
	namespace Balumedien\Sportms\Domain\Model;
	
	/**
	 * SportAgeLevel
	 */
	class SportAgeLevel extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {
		
		/**
		 * @var \Balumedien\Sportms\Domain\Model\SportAgeGroup
		 */
		protected $sportAgeGroup;
		
		/**
		 * @var string
		 */
		protected $label;
		
		/**
		 * @var string
		 */
		protected $abbreviation;
		
		/**
		 * @return \Balumedien\Sportms\Domain\Model\SportAgeGroup
		 */
		public function getSportAgeGroup(): \Balumedien\Sportms\Domain\Model\SportAgeGroup {
			return $this->sportAgeGroup;
		}
		
		/**
		 * @param \Balumedien\Sportms\Domain\Model\SportAgeGroup $sportAgeGroup
		 */
		public function setSportAgeGroup(\Balumedien\Sportms\Domain\Model\SportAgeGroup $sportAgeGroup): void {
			$this->sportAgeGroup = $sportAgeGroup;
		}
		
		/**
		 * Returns the label of the ageLevel
		 * @return string
		 */
		public function getLabel(): string {
			return $this->label;
		}
		
		/**
		 * Sets the label of the ageLevel
		 * @param string
		 */
		public function setLabel($label): void {
			$this->label = $label;
		}
		
		/**
		 * @return string
		 */
		public function getAbbreviation(): string {
			return $this->abbreviation;
		}
		
		/**
		 * @param string $abbreviation
		 */
		public function setAbbreviation($abbreviation): void {
			$this->abbreviation = $abbreviation;
		}
		
	}