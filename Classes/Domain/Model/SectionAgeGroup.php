<?php
	
	namespace Balumedien\Sportms\Domain\Model;
	
	/**
	 * SectionAgeGroup
	 */
	class SectionAgeGroup extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {
		
		/**
		 * @var \Balumedien\Sportms\Domain\Model\Section
		 */
		protected $section = '';
		
		/**
		 * @var string
		 */
		protected $label = '';
		
		/**
		 * @var string
		 */
		protected $short = '';
		
		/**
		 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Sportms\Domain\Model\SectionAgeLevel>
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
		 */
		protected $sectionAgeLevels = '';
		
		/**
		 * @return \Balumedien\Sportms\Domain\Model\Section
		 */
		public function getSection(): \Balumedien\Sportms\Domain\Model\Section {
			return $this->section;
		}
		
		/**
		 * @param \Balumedien\Sportms\Domain\Model\Section $section
		 */
		public function setSection(\Balumedien\Sportms\Domain\Model\Section $section): void {
			$this->section = $section;
		}
		
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
		
		/**
		 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
		 */
		public function getSectionAgeLevels() {
			return $this->sectionAgeLevels;
		}
		
		/**
		 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $sectionAgeLevels
		 */
		public function setSectionAgeLevels($sectionAgeLevels) {
			$this->sectionAgeLevels = $sectionAgeLevels;
		}
		
	}