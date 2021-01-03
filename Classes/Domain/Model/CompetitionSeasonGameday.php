<?php
	
	namespace Balumedien\Sportms\Domain\Model;
	
	use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
	
	/**
	 * CompetitionSeasonGameday
	 */
	class CompetitionSeasonGameday extends AbstractEntity {
		
		/**
		 * @var \Balumedien\Sportms\Domain\Model\CompetitionSeason
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
		 */
		protected $competitionSeason;
		
		/**
		 * @var string
		 */
		protected $label;
		
		/**
		 * @var int
		 */
		protected $startdate;
		
		/**
		 * @var int
		 */
		protected $enddate;
		
		/**
		 * @return \Balumedien\Sportms\Domain\Model\CompetitionSeason
		 */
		public function getCompetitionSeason() {
			return $this->competitionSeason;
		}
		
		/**
		 * @param \Balumedien\Sportms\Domain\Model\CompetitionSeason $competitionSeason
		 */
		public function setCompetitionSeason($competitionSeason) {
			$this->competitionSeason = $competitionSeason;
		}
		
		/**
		 * @return string
		 */
		public function getLabel() {
			return $this->label;
		}
		
		/**
		 * @param string $label
		 */
		public function setLabel($label) {
			$this->label = $label;
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