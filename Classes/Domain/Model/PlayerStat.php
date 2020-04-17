<?php
	
	namespace Balumedien\Sportms\Domain\Model;
	
	class PlayerStat extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {
		
		/**
		 * @var \Balumedien\Sportms\Domain\Model\Person
		 */
		protected $person;
		
		/**
		 * @var int
		 */
		protected $numberOfGames;
		
		/**
		 * @var int
		 */
		protected $numberOfStartingFormation;
		
		/**
		 * @var int
		 */
		protected $numberOfGoals;
		
		/**
		 * @var int
		 */
		protected $numberOfAssists;
		
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
		
		/**
		 * @return int
		 */
		public function getNumberOfStartingFormation(): int {
			return $this->numberOfStartingFormation;
		}
		
		/**
		 * @param int $numberOfStartingFormation
		 */
		public function setNumberOfStartingFormation(int $numberOfStartingFormation): void {
			$this->numberOfStartingFormation = $numberOfStartingFormation;
		}
		
		/**
		 * @return int
		 */
		public function getNumberOfGoals(): int {
			return $this->numberOfGoals;
		}
		
		/**
		 * @param int $numberOfGoals
		 */
		public function setNumberOfGoals(int $numberOfGoals): void {
			$this->numberOfGoals = $numberOfGoals;
		}
		
		/**
		 * @return int
		 */
		public function getNumberOfAssists(): int {
			return $this->numberOfAssists;
		}
		
		/**
		 * @param int $numberOfAssists
		 */
		public function setNumberOfAssists(int $numberOfAssists): void {
			$this->numberOfAssists = $numberOfAssists;
		}
		
	}