<?php
	
	
	namespace Balumedien\Clubms\Domain\Model;
	
	/**
	 * GamePeriod
	 */
	class GamePeriod extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {
		
		/**
		 * @var \Balumedien\Clubms\Domain\Model\Game
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
		 */
		protected $game;
		
		/**
		 * @var string
		 */
		protected $label;
		
		/**
		 * @var int
		 */
		protected $duration;
		
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
		public function getDuration() {
			return $this->duration;
		}
		
		/**
		 * @param int $duration
		 */
		public function setDuration($duration) {
			$this->duration = $duration;
		}
		
	}