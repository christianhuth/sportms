<?php

	namespace Balumedien\Clubms\Domain\Model;

	use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
	use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

	/***************************************************************
	 *
	 *  Copyright notice
	 *
	 *  (c) 2015
	 *
	 *  All rights reserved
	 *
	 *  This script is part of the TYPO3 project. The TYPO3 project is
	 *  free software; you can redistribute it and/or modify
	 *  it under the terms of the GNU General Public License as published by
	 *  the Free Software Foundation; either version 3 of the License, or
	 *  (at your option) any later version.
	 *
	 *  The GNU General Public License can be found at
	 *  http://www.gnu.org/copyleft/gpl.html.
	 *
	 *  This script is distributed in the hope that it will be useful,
	 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
	 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	 *  GNU General Public License for more details.
	 *
	 *  This copyright notice MUST APPEAR in all copies of the script!
	 ***************************************************************/

	/**
	 * CompetitionSeason
	 */
	class CompetitionSeason extends AbstractEntity {

		/**
		 * @var \Balumedien\Clubms\Domain\Model\Competition
		 * @lazy
		 */
		protected $competition;

		/**
		 * @var Season
		 * @lazy
		 */
		protected $season;

		/**		 *
		 * @var ObjectStorage<\Balumedien\Clubms\Domain\Model\CompetitionSeasonGameday>
		 */
		protected $competitionSeasonGamedays;

		/**		 *
		 * @var ObjectStorage<\Balumedien\Clubms\Domain\Model\TeamSeason>
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
			$this->competitionSeasonGamedays = new ObjectStorage();
			$this->competitionSeasonTeams = new ObjectStorage();
		}

		/**
		 * @return Competition
		 */
		public function getCompetition() {
			return $this->competition;
		}

		/**
		 * @param Competition $competition
		 */
		public function setCompetition($competition) {
			$this->competition = $competition;
		}

		/**
		 * @return Season
		 */
		public function getSeason() {
			return $this->season;
		}

		/**
		 * @param Season $season
		 */
		public function setSeason($season) {
			$this->season = $season;
		}

		/**
		 * @return ObjectStorage
		 */
		public function getCompetitionSeasonGamedays() {
			return $this->competitionSeasonGamedays;
		}

		/**
		 * @param ObjectStorage $competitionSeasonGamedays
		 */
		public function setCompetitionSeasonGamedays($competitionSeasonGamedays) {
			$this->competitionSeasonGamedays = $competitionSeasonGamedays;
		}

		/**
		 * @return ObjectStorage
		 */
		public function getCompetitionSeasonTeams() {
			return $this->competitionSeasonTeams;
		}

		/**
		 * @param ObjectStorage $competitionSeasonTeams
		 */
		public function setCompetitionSeasonTeams($competitionSeasonTeams) {
			$this->competitionSeasonTeams = $competitionSeasonTeams;
		}

	}