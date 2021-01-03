<?php
	
	namespace Balumedien\Sportms\Domain\Model;
	
	/**
	 * ClubSectionOfficial
	 */
	class ClubSectionOfficial extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {
		
		/**
		 * @var \Balumedien\Sportms\Domain\Model\ClubSection
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
		 */
		protected $clubSection;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Model\Person
		 */
		protected $person;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Model\ClubSectionOfficialJob
		 */
		protected $clubSectionOfficialJob;
		
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
		protected $sorting;
		
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
		 * @return ClubSectionOfficialJob
		 */
		public function getClubSectionOfficialJob() {
			return $this->clubSectionOfficialJob;
		}
		
		/**
		 * @param ClubSectionOfficialJob $clubSectionOfficialJob
		 */
		public function setClubSectionOfficialJob($clubSectionOfficialJob) {
			$this->clubSectionOfficialJob = $clubSectionOfficialJob;
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
		 * @return int
		 */
		public function getSorting() {
			return $this->sorting;
		}
		
		/**
		 * @param int $sorting
		 */
		public function setSorting($sorting) {
			$this->sorting = $sorting;
		}
		
	}