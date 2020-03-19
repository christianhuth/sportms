<?php

	namespace Balumedien\Clubms\Domain\Model;

	/**
	 * CompetitionSeason
	 */
	class CompetitionSeason extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

		/**
		 * @var \Balumedien\Clubms\Domain\Model\Competition
		 */
		protected $competition;

		/**
		 * @var \Balumedien\Clubms\Domain\Model\Season
		 */
		protected $season;

		/**
		 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Clubms\Domain\Model\CompetitionSeasonGameday>
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
		 */
		protected $competitionSeasonGamedays;

		/**
		 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Clubms\Domain\Model\TeamSeason>
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
		 */
		protected $competitionSeasonTeams;

		/**
		 * __construct
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
			$this->competitionSeasonGamedays = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
			$this->competitionSeasonTeams = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		}

		/**
		 * @return \Balumedien\Clubms\Domain\Model\Competition
		 */
		public function getCompetition() {
			return $this->competition;
		}

		/**
		 * @param \Balumedien\Clubms\Domain\Model\Competition $competition
		 */
		public function setCompetition(\Balumedien\Clubms\Domain\Model\Competition $competition) {
			$this->competition = $competition;
		}

		/**
		 * @return \Balumedien\Clubms\Domain\Model\Season
		 */
		public function getSeason(): \Balumedien\Clubms\Domain\Model\Season {
			return $this->season;
		}

		/**
		 * @param \Balumedien\Clubms\Domain\Model\Season $season
		 */
		public function setSeason(\Balumedien\Clubms\Domain\Model\Season $season) {
			$this->season = $season;
		}

		/**
		 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
		 */
		public function getCompetitionSeasonGamedays() {
			return $this->competitionSeasonGamedays;
		}

		/**
		 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $competitionSeasonGamedays
		 */
		public function setCompetitionSeasonGamedays($competitionSeasonGamedays) {
			$this->competitionSeasonGamedays = $competitionSeasonGamedays;
		}

		/**
		 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
		 */
		public function getCompetitionSeasonTeams() {
			return $this->competitionSeasonTeams;
		}

		/**
		 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $competitionSeasonTeams
		 */
		public function setCompetitionSeasonTeams($competitionSeasonTeams) {
			$this->competitionSeasonTeams = $competitionSeasonTeams;
		}

	}