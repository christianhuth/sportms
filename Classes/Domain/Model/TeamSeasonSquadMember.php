<?php
	
	namespace Balumedien\Sportms\Domain\Model;
	
	/**
	 * TeamSeasonSquadMember
	 */
	class TeamSeasonSquadMember extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {
		
		/**
		 * @var \Balumedien\Sportms\Domain\Model\TeamSeason
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
		 */
		protected $teamSeason;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Model\Person
		 */
		protected $person;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Model\SportPositionGroup
		 */
		protected $sectionPositionGroup;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Model\SportPosition
		 */
		protected $sectionPosition;
		
		/**
		 * @var string
		 */
		protected $squadNumber;
		
		/**
		 * @var boolean
		 */
		protected $newSigning;
		
		/**
		 * @var boolean
		 */
		protected $leaving;
		
		/**
		 * @return TeamSeason
		 */
		public function getTeamSeason() {
			return $this->teamSeason;
		}
		
		/**
		 * @param TeamSeason $teamSeason
		 */
		public function setTeamSeason($teamSeason) {
			$this->teamSeason = $teamSeason;
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
		 * @return string
		 */
		public function getSquadNumber() {
			return $this->squadNumber;
		}
		
		/**
		 * @param string $squadNumber
		 */
		public function setSquadNumber($squadNumber) {
			$this->squadNumber = $squadNumber;
		}
		
		/**
		 * @return bool
		 */
		public function isNewSigning() {
			return $this->newSigning;
		}
		
		/**
		 * @param bool $newSigning
		 */
		public function setNewSigning($newSigning) {
			$this->newSigning = $newSigning;
		}
		
		/**
		 * @return bool
		 */
		public function isLeaving() {
			return $this->leaving;
		}
		
		/**
		 * @param bool $leaving
		 */
		public function setLeaving($leaving) {
			$this->leaving = $leaving;
		}
		
	}