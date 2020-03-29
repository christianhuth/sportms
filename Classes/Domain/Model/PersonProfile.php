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
		 * @var \Balumedien\Sportms\Domain\Model\Section
		 */
		protected $section;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Model\SportPositionGroup
		 */
		protected $sectionPositionGroup;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Model\SportPosition
		 */
		protected $sectionPosition;
		
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
		 * @return SportPositionGroup
		 */
		public function getSectionPositionGroup() {
			return $this->sectionPositionGroup;
		}
		
		/**
		 * @param SportPositionGroup $sectionPositionGroup
		 */
		public function setSectionPositionGroup($sectionPositionGroup) {
			$this->sectionPositionGroup = $sectionPositionGroup;
		}
		
		/**
		 * @return SportPosition
		 */
		public function getSectionPosition() {
			return $this->sectionPosition;
		}
		
		/**
		 * @param SportPosition $sectionPosition
		 */
		public function setSectionPosition($sectionPosition) {
			$this->sectionPosition = $sectionPosition;
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