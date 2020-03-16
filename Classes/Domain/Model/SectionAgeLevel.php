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
		 * @return SectionAgeGroup
		 */
		public function getSectionAgeGroup() {
			return $this->sectionAgeGroup;
		}
		
		/**
		 * @param SectionAgeGroup $sectionAgeGroup
		 */
		public function setSectionAgeGroup($sectionAgeGroup) {
			$this->sectionAgeGroup = $sectionAgeGroup;
		}
		
		/**
		 * Returns the label of the ageLevel
		 * @return string
		 */
		public function getLabel() {
			return $this->label;
		}
		
		/**
		 * Sets the label of the ageLevel
		 * @param string
		 */
		public function setLabel($label) {
			$this->label = $label;
		}
		
		/**
		 * @return string
		 */
		public function getShort() {
			return $this->short;
		}
		
		/**
		 * @param string $short
		 */
		public function setShort($short) {
			$this->short = $short;
		}
		
	}