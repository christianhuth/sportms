<?php
	
	namespace Balumedien\Sportms\Domain\Model;
	
	/**
	 * GameLineup
	 */
	class GameLineup extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {
		
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
		 * @var string
		 */
		protected $type;
		
		/**
		 * @var string
		 */
		protected $jerseyNumber;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Model\Person
		 */
		protected $person;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Model\SportPosition
		 */
		protected $sportPosition;
		
		/**
		 * @return Game
		 */
		public function getGame(): Game {
			return $this->game;
		}
		
		/**
		 * @param Game $game
		 */
		public function setGame(Game $game): void {
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
		 * @return string
		 */
		public function getType(): string {
			return $this->type;
		}
		
		/**
		 * @param string $type
		 */
		public function setType(string $type): void {
			$this->type = $type;
		}
		
		/**
		 * @return string
		 */
		public function getJerseyNumber(): string {
			return $this->jerseyNumber;
		}
		
		/**
		 * @param string $jerseyNumber
		 */
		public function setJerseyNumber(string $jerseyNumber): void {
			$this->jerseyNumber = $jerseyNumber;
		}
		
		/**
		 * @return Person
		 */
		public function getPerson(): Person {
			return $this->person;
		}
		
		/**
		 * @param Person $person
		 */
		public function setPerson(Person $person): void {
			$this->person = $person;
		}
		
		/**
		 * @return SportPosition
		 */
		public function getSportPosition(): SportPosition {
			return $this->sportPosition;
		}
		
		/**
		 * @param SportPosition $sportPosition
		 */
		public function setSportPosition(SportPosition $sportPosition): void {
			$this->sportPosition = $sportPosition;
		}
		
	}