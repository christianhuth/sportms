<?php
	
	namespace Balumedien\Sportms\Domain\Model;
	
	/**
	 * PersonProfile
	 */
	class PersonProfile extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {
		
		/**
		 * @var \Balumedien\Sportms\Domain\Model\Person
		 */
		protected $person;
		
		/**
		 * @var string
		 */
		protected $profileType;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Model\Sport
		 */
		protected $sport;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Model\SportPositionGroup
		 */
		protected $sportPositionGroup;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Model\SportPosition
		 */
		protected $sportPosition;
		
		/**
		 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
		 */
		protected $profileImages;
		
		/**
		 * TeamSeason constructor.
		 */
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
			$this->profileImages = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		}
		
		/**
		 * @return Person
		 */
		public function getPerson() {
			return $this->person;
		}
		
		/**
		 * @param Person $person
		 */
		public function setPerson($person) {
			$this->person = $person;
		}
		
		/**
		 * @return string
		 */
		public function getProfileType() {
			return $this->profileType;
		}
		
		/**
		 * @param string $profileType
		 */
		public function setProfileType($profileType) {
			$this->profileType = $profileType;
		}
		
		/**
		 * @return Sport
		 */
		public function getSport(): Sport {
			return $this->sport;
		}
		
		/**
		 * @param Sport $sport
		 */
		public function setSport(Sport $sport): void {
			$this->sport = $sport;
		}
		
		/**
		 * @return SportPositionGroup
		 */
		public function getSportPositionGroup(): SportPositionGroup {
			return $this->sportPositionGroup;
		}
		
		/**
		 * @param SportPositionGroup $sportPositionGroup
		 */
		public function setSportPositionGroup(SportPositionGroup $sportPositionGroup): void {
			$this->sportPositionGroup = $sportPositionGroup;
		}
		
		/**
		 * @return SportPosition
		 */
		public function getSportPosition(): SportPosition {
			return $this->sportPosition;
		}
		
		/**
		 * @param SportPosition $sportPosition
		 */
		public function setSportPosition(SportPosition $sportPosition): void {
			$this->sportPosition = $sportPosition;
		}
		
		/**
		 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
		 */
		public function getProfileImages() {
			return $this->profileImages;
		}
		
		/**
		 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $profileImages
		 */
		public function setProfileImages($profileImages) {
			$this->profileImages = $profileImages;
		}
		
	}