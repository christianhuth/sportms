<?php
	
	namespace Balumedien\Sportms\Domain\Model;
	
	/**
	 * Team
	 */
	class Team extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {
		
		/**
		 * @var \Balumedien\Sportms\Domain\Model\Club
		 */
		protected $club;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Model\ClubSection
		 */
		protected $clubSection;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Model\SportAgeGroup
		 */
		protected $sectionAgeGroup;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Model\SportAgeLevel
		 */
		protected $sectionAgeLevel;
		
		/**
		 * @var string
		 */
		protected $name;
		
		/**
		 * @var boolean
		 */
		protected $dummy;
		
		/**
		 * @var boolean
		 */
		protected $detailLink;
		
		/**
		 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Sportms\Domain\Model\TeamSeason>
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
		 */
		protected $teamSeasons;
		
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
			$this->teamSeasons = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		}
		
		/**
		 * @return Club
		 */
		public function getClub() {
			return $this->club;
		}
		
		/**
		 * @param Club $club
		 */
		public function setClub($club) {
			$this->club = $club;
		}
		
		/**
		 * @return ClubSection
		 */
		public function getClubSection() {
			return $this->clubSection;
		}
		
		/**
		 * @param ClubSection $clubSection
		 */
		public function setClubSection($clubSection) {
			$this->clubSection = $clubSection;
		}
		
		/**
		 * @return SportAgeGroup
		 */
		public function getSectionAgeGroup() {
			return $this->sectionAgeGroup;
		}
		
		/**
		 * @param SportAgeGroup $sectionAgeGroup
		 */
		public function setSectionAgeGroup($sectionAgeGroup) {
			$this->sectionAgeGroup = $sectionAgeGroup;
		}
		
		/**
		 * @return SportAgeLevel
		 */
		public function getSectionAgeLevel() {
			return $this->sectionAgeLevel;
		}
		
		/**
		 * @param SportAgeLevel $sectionAgeLevel
		 */
		public function setSectionAgeLevel($sectionAgeLevel) {
			$this->sectionAgeLevel = $sectionAgeLevel;
		}
		
		/**
		 * @return string
		 */
		public function getName() {
			return $this->name;
		}
		
		/**
		 * @param string $name
		 */
		public function setName($name) {
			$this->name = $name;
		}
		
		/**
		 * @return bool
		 */
		public function isDummy() {
			return $this->dummy;
		}
		
		/**
		 * @param bool $dummy
		 */
		public function setDummy($dummy) {
			$this->dummy = $dummy;
		}
		
		/**
		 * @return bool
		 */
		public function isDetailLink() {
			return $this->detailLink;
		}
		
		/**
		 * @param bool $detailLink
		 */
		public function setDetailLink($detailLink) {
			$this->detailLink = $detailLink;
		}
		
		/**
		 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
		 */
		public function getTeamSeasons() {
			return $this->teamSeasons;
		}
		
		/**
		 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $teamSeasons
		 */
		public function setTeamSeasons($teamSeasons) {
			$this->teamSeasons = $teamSeasons;
		}
		
	}