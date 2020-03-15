<?php
	
	namespace Balumedien\Clubms\Domain\Model;
	
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
	 * ClubMembers
	 */
	class ClubMembers extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {
		
		/**
		 * @var int
		 */
		protected $date = '';
		
		/**
		 * @var int
		 */
		protected $members = '';
		
		/**
		 * Returns the date
		 * @return int $date
		 */
		public function getDate() {
			return $this->date;
		}
		
		/**
		 * Sets the date
		 * @param int $date
		 * @return void
		 */
		public function setDate($date) {
			$this->date = $date;
		}
		
		/**
		 * Returns the members
		 * @return int $members
		 */
		public function getMembers() {
			return $this->members;
		}
		
		/**
		 * Sets the members
		 * @param int $members
		 * @return void
		 */
		public function setMembers($members) {
			$this->members = $members;
		}
		
	}