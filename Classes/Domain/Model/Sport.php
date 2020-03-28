<?php
	
	namespace Balumedien\Sportms\Domain\Model;
	
	/**
	 * Sport
	 */
	class Sport extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {
		
		/**
		 * @var string
		 */
		protected $label;
		
		/**
		 * @var bool
		 */
		protected $isTeamSport;
		
		/**
		 * @var bool
		 */
		protected $isIndividualSport;
		
		/**
		 * sportTypes
		 *
		 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Sportms\Domain\Model\SportType>
		 */
		protected $sportTypes;
		
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
			$this->sportTypes = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
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
		 * @return bool
		 */
		public function isTeamSport(): bool {
			return $this->isTeamSport;
		}
		
		/**
		 * @param bool $isTeamSport
		 */
		public function setIsTeamSport(bool $isTeamSport): void {
			$this->isTeamSport = $isTeamSport;
		}
		
		/**
		 * @return bool
		 */
		public function isIndividualSport(): bool {
			return $this->isIndividualSport;
		}
		
		/**
		 * @param bool $isIndividualSport
		 */
		public function setIsIndividualSport(bool $isIndividualSport): void {
			$this->isIndividualSport = $isIndividualSport;
		}
		
		/**
		 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
		 */
		public function getSportTypes(): \TYPO3\CMS\Extbase\Persistence\ObjectStorage {
			return $this->sportTypes;
		}
		
		/**
		 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $sportTypes
		 */
		public function setSportTypes(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $sportTypes): void {
			$this->sportTypes = $sportTypes;
		}
		
	}