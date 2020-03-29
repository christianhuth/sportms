<?php
	
	namespace Balumedien\Sportms\Domain\Model;
	
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
		 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Sportms\Domain\Model\SectionPositionGroup>
		 */
		protected $sectionPositionGroups;
		
		/**
		 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Sportms\Domain\Model\SportAgeGroup>
		 */
		protected $sectionAgeGroups;
		
		/**
		 * @var bool
		 */
		protected $detailLink;
		
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
		protected function initStorageObjects(): void {
			$this->images = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
			$this->sectionPositionGroups = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
			$this->sectionAgeGroups = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		}
		
		/**
		 * @return string
		 */
		public function getLabel(): string {
			return $this->label;
		}
		
		/**
		 * @param string $label
		 */
		public function setLabel(string $label): void {
			$this->label = $label;
		}
		
		/**
		 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
		 */
		public function getImages(): \TYPO3\CMS\Extbase\Persistence\ObjectStorage {
			return $this->images;
		}
		
		/**
		 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $images
		 */
		public function setImages(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $images): void {
			$this->images = $images;
		}
		
		/**
		 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
		 */
		public function getSectionPositionGroups(): \TYPO3\CMS\Extbase\Persistence\ObjectStorage {
			return $this->sectionPositionGroups;
		}
		
		/**
		 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $sectionPositionGroups
		 */
		public function setSectionPositionGroups(\TYPO3\CMS\Extbase\Persistence\ObjectStorage$sectionPositionGroups): void {
			$this->sectionPositionGroups = $sectionPositionGroups;
		}
		
		/**
		 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
		 */
		public function getSectionAgeGroups(): \TYPO3\CMS\Extbase\Persistence\ObjectStorage {
			return $this->sectionAgeGroups;
		}
		
		/**
		 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $sectionAgeGroups
		 */
		public function setSectionAgeGroups(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $sectionAgeGroups): void {
			$this->sectionAgeGroups = $sectionAgeGroups;
		}
		
		/**
		 * @return bool
		 */
		public function isDetailLink(): bool {
			return $this->detailLink;
		}
		
		/**
		 * @param bool $detailLink
		 */
		public function setDetailLink(bool $detailLink): void {
			$this->detailLink = $detailLink;
		}
		
	}