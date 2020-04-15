<?php
	
	namespace Balumedien\Sportms\Domain\Model;
	
	/**
	 * SportType
	 */
	class SportType extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {
		
		/**
		 * @var string
		 */
		protected $label;
		
		/**
		 * sportTypes
		 *
		 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Sportms\Domain\Model\Sport>
		 */
		protected $sports;
		
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
			$this->setSports(new \TYPO3\CMS\Extbase\Persistence\ObjectStorage());
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
		public function getSports(): \TYPO3\CMS\Extbase\Persistence\ObjectStorage {
			return $this->sports;
		}
		
		/**
		 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $sports
		 */
		public function setSports(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $sports): void {
			$this->sports = $sports;
		}
		
	}