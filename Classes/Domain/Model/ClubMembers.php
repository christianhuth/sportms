<?php
	
	namespace Balumedien\Sportms\Domain\Model;
	
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