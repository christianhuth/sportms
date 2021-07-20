<?php
	
	namespace Balumedien\Sportms\Domain\Model;
	
	/**
	 * GamePunishment
	 */
	class GamePunishment extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {
		
		/**
		 * @var \Balumedien\Sportms\Domain\Model\Game
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
		 */
		protected $game;
		
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
		 * @var \Balumedien\Sportms\Domain\Model\Person
		 */
		protected $punishedPerson;
		
		/**
		 * @var int
		 */
		protected $type;
		
		/**
		 * @var int
		 */
		protected $duration;
		
		/**
		 * @var int
		 */
		protected $reason;
		
		/**
		 * @return \Balumedien\Sportms\Domain\Model\Game
		 */
		public function getGame() {
			return $this->game;
		}
		
		/**
		 * @param \Balumedien\Sportms\Domain\Model\Game $game
		 */
		public function setGame(\Balumedien\Sportms\Domain\Model\Game $game) {
			$this->game = $game;
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
		 * @return Person
		 */
		public function getPunishedPerson(): Person {
			return $this->punishedPerson;
		}
		
		/**
		 * @param Person $punishedPerson
		 */
		public function setPunishedPerson(Person $punishedPerson) {
			$this->punishedPerson = $punishedPerson;
		}
		
		/**
		 * @return int
		 */
		public function getType() {
			return $this->type;
		}
		
		/**
		 * @param int $type
		 */
		public function setType($type) {
			$this->type = $type;
		}
		
		/**
		 * @return int
		 */
		public function getDuration() {
			return $this->duration;
		}
		
		/**
		 * @param int $duration
		 */
		public function setDuration($duration) {
			$this->duration = $duration;
		}
		
		/**
		 * @return int
		 */
		public function getReason() {
			return $this->reason;
		}
		
		/**
		 * @param int $reason
		 */
		public function setReason($reason) {
			$this->reason = $reason;
		}
		
	}