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
		 * @var int
		 */
		protected $dateDifference = 0;
		
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
			$this->updateDateDifference();
		}
		
		/**
		 *
		 */
		private function updateDateDifference(): void {
			if(!empty($this->getStartdate()) && !empty($this->getEnddate())) {
				$this->setDateDifference(($this->calculateDateDifference($this->getStartdate(), $this->getEnddate())));
			} else {
				if(empty($this->getStartdate())) {
					$this->setDateDifference(0);
				} else {
					if(empty($this->getEnddate())) {
						$this->setDateDifference(0);
					} else {
						$this->setDateDifference($this->calculateDateDifference($this->getStartdate(), (int)new \DateTime(now)));
					}
				}
			}
		}
		
		/**
		 * @return int
		 */
		public function getEnddate(): int {
			return $this->enddate;
		}
		
		/**
		 * @param int $enddate
		 */
		public function setEnddate($enddate): void {
			$this->enddate = $enddate;
			$this->updateDateDifference();
		}
		
		/**
		 * @param int $startdate
		 * @param int $enddate
		 */
		private function calculateDateDifference(int $startdate, int $enddate): int {
			return ($enddate - $startdate) / 60 / 60 / 24;
		}
		
		/**
		 * @return int
		 */
		public function getDateDifference(): int {
			return $this->dateDifference;
		}
		
		/**
		 * @param int $dateDifference
		 */
		public function setDateDifference(int $dateDifference): void {
			$this->dateDifference = $dateDifference;
		}
		
	}