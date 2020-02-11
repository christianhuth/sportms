<?php


	namespace Balumedien\Clubms\Domain\Model;
	
	use TYPO3\CMS\Extbase\Annotation\ORM\Lazy;
	use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

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
	 * GameGoal
	 */
	class GameGoal extends AbstractEntity {

		/**
		 * @var Game
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
		 */
		protected $game;

		/**
		 * @var int
		 */
		protected $goalHome;

		/**
		 * @var int
		 */
		protected $goalGuest;

		/**
		 * @var int
		 */
		protected $period;

		/**
		 * @var int
		 */
		protected $minute;

		/**
		 * @var int
		 */
		protected $minuteAdditional;

		/**
		 * @var \Balumedien\Clubms\Domain\Model\TeamSeasonSquadMember
		 */
		protected $scorer;

		/**
		 * @var \Balumedien\Clubms\Domain\Model\TeamSeasonSquadMember
		 */
		protected $assist;

		/**
		 * @var boolean
		 */
		protected $ownGoal;

		/**
		 * @var int
		 */
		protected $goalType;

		/**
		 * @return Game
		 */
		public function getGame() {
			return $this->game;
		}

		/**
		 * @param Game $game
		 */
		public function setGame($game) {
			$this->game = $game;
		}

		/**
		 * @return int
		 */
		public function getGoalHome() {
			return $this->goalHome;
		}

		/**
		 * @param int $goalHome
		 */
		public function setGoalHome($goalHome) {
			$this->goalHome = $goalHome;
		}

		/**
		 * @return int
		 */
		public function getGoalGuest() {
			return $this->goalGuest;
		}

		/**
		 * @param int $goalGuest
		 */
		public function setGoalGuest($goalGuest) {
			$this->goalGuest = $goalGuest;
		}

		/**
		 * @return int
		 */
		public function getPeriod() {
			return $this->period;
		}

		/**
		 * @param int $period
		 */
		public function setPeriod($period) {
			$this->period = $period;
		}

		/**
		 * @return int
		 */
		public function getMinute() {
			return $this->minute;
		}

		/**
		 * @param int $minute
		 */
		public function setMinute($minute) {
			$this->minute = $minute;
		}

		/**
		 * @return int
		 */
		public function getMinuteAdditional() {
			return $this->minuteAdditional;
		}

		/**
		 * @param int $minuteAdditional
		 */
		public function setMinuteAdditional($minuteAdditional) {
			$this->minuteAdditional = $minuteAdditional;
		}

		/**
		 * @return TeamSeasonSquadMember
		 */
		public function getScorer() {
			return $this->scorer;
		}

		/**
		 * @param TeamSeasonSquadMember $scorer
		 */
		public function setScorer($scorer) {
			$this->scorer = $scorer;
		}

		/**
		 * @return TeamSeasonSquadMember
		 */
		public function getAssist() {
			return $this->assist;
		}

		/**
		 * @param TeamSeasonSquadMember $assist
		 */
		public function setAssist($assist) {
			$this->assist = $assist;
		}

		/**
		 * @return bool
		 */
		public function isOwnGoal() {
			return $this->ownGoal;
		}

		/**
		 * @param bool $ownGoal
		 */
		public function setOwnGoal($ownGoal) {
			$this->ownGoal = $ownGoal;
		}

		/**
		 * @return int
		 */
		public function getGoalType() {
			return $this->goalType;
		}

		/**
		 * @param int $goalType
		 */
		public function setGoalType($goalType) {
			$this->goalType = $goalType;
		}

	}