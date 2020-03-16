<?php
	
	namespace Balumedien\Clubms\Domain\Model;
	
	/**
	 * Section
	 */
	class Section extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {
		
		/**
		 * @var string
		 */
		protected $label;
		
		/**
		 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
		 */
		protected $images;
		
		/**
		 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Clubms\Domain\Model\SectionPositionGroup>
		 */
		protected $sectionPositionGroups;
		
		/**
		 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Clubms\Domain\Model\SectionAgeGroup>
		 */
		protected $sectionAgeGroups;
		
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
			$this->images = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
			$this->sectionPositionGroups = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
			$this->sectionAgeGroups = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
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
		public function getImages() {
			return $this->images;
		}
		
		/**
		 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $images
		 */
		public function setImages($images) {
			$this->images = $images;
		}
		
		/**
		 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
		 */
		public function getSectionPositionGroups() {
			return $this->sectionPositionGroups;
		}
		
		/**
		 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $sectionPositionGroups
		 */
		public function setSectionPositionGroups($sectionPositionGroups) {
			$this->sectionPositionGroups = $sectionPositionGroups;
		}
		
		/**
		 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
		 */
		public function getSectionAgeGroups() {
			return $this->sectionAgeGroups;
		}
		
		/**
		 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $sectionAgeGroups
		 */
		public function setSectionAgeGroups($sectionAgeGroups) {
			$this->sectionAgeGroups = $sectionAgeGroups;
		}
		
	}