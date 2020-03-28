<?php
	
	namespace Balumedien\Sportms\Domain\Model;
	
	/**
	 * SectionPositionGroup
	 */
	class SectionPositionGroup extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {
		
		/**
		 * @var \Balumedien\Sportms\Domain\Model\Section
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
		 */
		protected $section;
		
		/**
		 * @var string
		 */
		protected $label;
		
		/**
		 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Sportms\Domain\Model\SectionPosition>
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
		 */
		protected $sectionPositions;
		
		public function __construct() {
			//Do not remove the next line: It would break the functionality
			$this->initStorageObjects();
		}
		
		/**
		 * Initializes all ObjectStorage properties
		 * Do not modify this method!
		 * It will be rewritten on each save in the extension builder
		 * You may modify the constructor of this class instead
		 *
		 * @return void
		 */
		protected function initStorageObjects() {
			$this->sectionPositions = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		}
		
		/**
		 * @return Section
		 */
		public function getSection() {
			return $this->section;
		}
		
		/**
		 * @param Section $section
		 */
		public function setSection($section) {
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
		 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
		 */
		public function getSectionPositions() {
			return $this->sectionPositions;
		}
		
		/**
		 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $sectionPositions
		 */
		public function setSectionPositions($sectionPositions) {
			$this->sectionPositions = $sectionPositions;
		}
		
	}