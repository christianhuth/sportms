<?php
	
	namespace Balumedien\Sportms\Domain\Model;
	
	/**
	 * TeamSeasonOfficial
	 */
	class TeamSeasonOfficial extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {
		
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
		 * @var \Balumedien\Sportms\Domain\Model\TeamSeasonOfficialJob
		 */
		protected $teamSeasonOfficialJob;
		
		/**
		 * @var int
		 */
		protected $startdate;
		
		/**
		 * @var int
		 */
		protected $enddate;
		
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
		 * @return TeamSeasonOfficialJob
		 */
		public function getTeamSeasonOfficialJob() {
			return $this->teamSeasonOfficialJob;
		}
		
		/**
		 * @param TeamSeasonOfficialJob $teamSeasonOfficialJob
		 */
		public function setTeamSeasonOfficialJob($teamSeasonOfficialJob) {
			$this->teamSeasonOfficialJob = $teamSeasonOfficialJob;
		}
		
		/**
		 * @return int
		 */
		public function getStartdate() {
			return $this->startdate;
		}
		
		/**
		 * @param int $startdate
		 */
		public function setStartdate($startdate) {
			$this->startdate = $startdate;
		}
		
		/**
		 * @return int
		 */
		public function getEnddate() {
			return $this->enddate;
		}
		
		/**
		 * @param int $enddate
		 */
		public function setEnddate($enddate) {
			$this->enddate = $enddate;
		}
		
	}