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
	 * GameResultSet
	 */
	class GameResultSet extends AbstractEntity {

		/**
		 * @var Game
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
		 */
		protected $game;

		/**
		 * @var int
		 */
		protected $setNumber;

		/**
		 * @var int
		 */
		protected $resultHome;

		/**
		 * @var int
		 */
		protected $resultGuest;

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
		public function getSetNumber() {
			return $this->setNumber;
		}
		
		/**
		 * @param int $setNumber
		 */
		public function setSetNumber($setNumber) {
			$this->setNumber = $setNumber;
		}

		/**
		 * @return int
		 */
		public function getResultHome() {
			return $this->resultHome;
		}

		/**
		 * @param int $resultHome
		 */
		public function setResultHome($resultHome) {
			$this->resultHome = $resultHome;
		}

		/**
		 * @return int
		 */
		public function getResultGuest() {
			return $this->resultGuest;
		}

		/**
		 * @param int $resultGuest
		 */
		public function setResultGuest($resultGuest) {
			$this->resultGuest = $resultGuest;
		}

	}