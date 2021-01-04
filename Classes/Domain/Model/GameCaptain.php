<?php
	
	namespace Balumedien\Sportms\Domain\Model;
	
	/**
	 * GameCaptain
	 */
	class GameCaptain extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {
		
		/**
		 * @var \Balumedien\Sportms\Domain\Model\Game
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
		 */
		protected $game;
		
		/**
		 * @var string
		 */
		protected $team;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Model\Person
		 */
		protected $person;
		
		/**
		 * @return \Balumedien\Sportms\Domain\Model\Game
		 */
		public function getGame(): \Balumedien\Sportms\Domain\Model\Game {
			return $this->game;
		}
		
		/**
		 * @param \Balumedien\Sportms\Domain\Model\Game $game
		 */
		public function setGame(\Balumedien\Sportms\Domain\Model\Game $game) {
			$this->game = $game;
		}
		
		/**
		 * @return string
		 */
		public function getTeam(): string {
			return $this->team;
		}
		
		/**
		 * @param string $team
		 */
		public function setTeam(string $team): void {
			$this->team = $team;
		}
		
		/**
		 * @return \Balumedien\Sportms\Domain\Model\Person
		 */
		public function getPerson(): \Balumedien\Sportms\Domain\Model\Person {
			return $this->person;
		}
		
		/**
		 * @param \Balumedien\Sportms\Domain\Model\Person $person
		 */
		public function setPerson(Person $person): void {
			$this->person = $person;
		}
		
	}