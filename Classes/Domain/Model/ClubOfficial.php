<?php
	
	namespace Balumedien\Sportms\Domain\Model;
	
	/**
	 * ClubOfficial
	 */
	class ClubOfficial extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {
		
		/**
		 * @var \Balumedien\Sportms\Domain\Model\Club
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
		 */
		protected $club;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Model\Person
		 */
		protected $person;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Model\ClubOfficialJob
		 */
		protected $clubOfficialJob;
		
		/**
		 * @var int
		 */
		protected $startdate;
		
		/**
		 * @var int
		 */
		protected $enddate;
		
		/**
		 * @var boolean
		 */
		protected $untilToday;
		
		/**
		 * @return \Balumedien\Sportms\Domain\Model\Club
		 */
		public function getClub() {
			return $this->club;
		}
		
		/**
		 * @param \Balumedien\Sportms\Domain\Model\Club $club
		 */
		public function setClub(\Balumedien\Sportms\Domain\Model\Club $club) {
			$this->club = $club;
		}
		
		/**
		 * @return Person
		 */
		public function getPerson() {
			return $this->person;
		}
		
		/**
		 * @param Person $person
		 * @return void
		 */
		public function setPerson($person) {
			$this->person = $person;
		}
		
		/**
		 * @return \Balumedien\Sportms\Domain\Model\ClubOfficialJob ClubOfficialJob
		 */
		public function getClubOfficialJob() {
			return $this->clubOfficialJob;
		}
		
		/**
		 * @param \Balumedien\Sportms\Domain\Model\ClubOfficialJob $clubOfficialJob
		 * @return void
		 */
		public function setClubOfficialJob(\Balumedien\Sportms\Domain\Model\ClubOfficialJob $clubOfficialJob) {
			$this->clubOfficialJob = $clubOfficialJob;
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
		
		/**
		 * @return bool
		 */
		public function isUntilToday(): bool {
			return $this->untilToday;
		}
		
		/**
		 * @param bool $untilToday
		 */
		public function setUntilToday(bool $untilToday): void {
			$this->untilToday = $untilToday;
		}
		
	}