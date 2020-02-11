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
	 * CompetitionSeasonGameday
	 */
	class CompetitionSeasonGameday extends AbstractEntity {

		/**
		 * @var \Balumedien\Clubms\Domain\Model\CompetitionSeason
		 * @TYPO3\\CMS\\Extbase\\Annotation\\ORM\\Lazy
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
		 * @return CompetitionSeason
		 */
		public function getCompetitionSeason() {
			return $this->competitionSeason;
		}

		/**
		 * @param CompetitionSeason $competitionSeason
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