<?php
	
	namespace Balumedien\Clubms\Domain\Model;
	
	/**
	 * SectionAgeLevel
	 */
	class SectionAgeLevel extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {
		
		/**
		 * @var \Balumedien\Clubms\Domain\Model\SectionAgeGroup
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
		 * @return \Balumedien\Clubms\Domain\Model\SectionAgeGroup
		 */
		public function getSectionAgeGroup(): \Balumedien\Clubms\Domain\Model\SectionAgeGroup {
			return $this->sectionAgeGroup;
		}
		
		/**
		 * @param \Balumedien\Clubms\Domain\Model\SectionAgeGroup $sectionAgeGroup
		 */
		public function setSectionAgeGroup(\Balumedien\Clubms\Domain\Model\SectionAgeGroup $sectionAgeGroup): void {
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