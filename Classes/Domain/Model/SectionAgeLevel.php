<?php
	
	namespace Balumedien\Sportms\Domain\Model;
	
	/**
	 * SectionAgeLevel
	 */
	class SectionAgeLevel extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {
		
		/**
		 * @var \Balumedien\Sportms\Domain\Model\SectionAgeGroup
		 */
		protected $sectionAgeGroup;
		
		/**
		 * @var string
		 */
		protected $label;
		
		/**
		 * @var string
		 */
		protected $short;
		
		/**
		 * @return \Balumedien\Sportms\Domain\Model\SectionAgeGroup
		 */
		public function getSectionAgeGroup(): \Balumedien\Sportms\Domain\Model\SectionAgeGroup {
			return $this->sectionAgeGroup;
		}
		
		/**
		 * @param \Balumedien\Sportms\Domain\Model\SectionAgeGroup $sectionAgeGroup
		 */
		public function setSectionAgeGroup(\Balumedien\Sportms\Domain\Model\SectionAgeGroup $sectionAgeGroup): void {
			$this->sectionAgeGroup = $sectionAgeGroup;
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
		public function getShort(): string {
			return $this->short;
		}
		
		/**
		 * @param string $short
		 */
		public function setShort($short): void {
			$this->short = $short;
		}
		
	}