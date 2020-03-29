<?php
	
	namespace Balumedien\Sportms\Domain\Model;
	
	/**
	 * SportPositionGroup
	 */
	class SportPositionGroup extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {
		
		/**
		 * @var \Balumedien\Sportms\Domain\Model\Sport
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
		 */
		protected $sport;
		
		/**
		 * @var string
		 */
		protected $label;
		
		/**
		 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Sportms\Domain\Model\SportPosition>
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
		 */
		protected $sportPositions;
		
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
			$this->sportPositions = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		}
		
		/**
		 * @return \Balumedien\Sportms\Domain\Model\Sport
		 */
		public function getSport(): \Balumedien\Sportms\Domain\Model\Sport {
			return $this->sport;
		}
		
		/**
		 * @param \Balumedien\Sportms\Domain\Model\Sport $sport
		 */
		public function setSport(\Balumedien\Sportms\Domain\Model\Sport $sport): void {
			$this->sport = $sport;
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
		public function getSportPositions(): \TYPO3\CMS\Extbase\Persistence\ObjectStorage {
			return $this->sportPositions;
		}
		
		/**
		 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $sportPositions
		 */
		public function setSportPositions(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $sportPositions): void {
			$this->sportPositions = $sportPositions;
		}
		
	}