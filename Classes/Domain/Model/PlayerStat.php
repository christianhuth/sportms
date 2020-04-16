<?php
	
	namespace Balumedien\Sportms\Domain\Model;
	
	class PlayerStat {
		
		/**
		 * @var \Balumedien\Sportms\Domain\Model\Person
		 */
		private $person;
		
		/**
		 * @var int
		 */
		private $numberOfGames;
		
		
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
		 * @return int
		 */
		public function getNumberOfGames(): int {
			return $this->numberOfGames;
		}
		
		/**
		 * @param int $numberOfGames
		 */
		public function setNumberOfGames(int $numberOfGames): void {
			$this->numberOfGames = $numberOfGames;
		}
		
	}