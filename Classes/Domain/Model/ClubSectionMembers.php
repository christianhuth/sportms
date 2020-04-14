<?php
	
	namespace Balumedien\Sportms\Domain\Model;
	
	/**
	 * ClubSectionMembers
	 */
	class ClubSectionMembers extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {
		
		/**
		 * @var int
		 */
		protected $members;
		
		/**
		 * @var int
		 */
		protected $date;
		
		/**
		 * @return int
		 */
		public function getMembers() {
			return $this->members;
		}
		
		/**
		 * @param int $members
		 */
		public function setMembers($members) {
			$this->members = $members;
		}
		
		/**
		 * @return int
		 */
		public function getDate() {
			return $this->date;
		}
		
		/**
		 * @param int $date
		 */
		public function setDate($date) {
			$this->date = $date;
		}
		
	}