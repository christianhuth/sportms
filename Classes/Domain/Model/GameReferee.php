<?php
	
	namespace Balumedien\Sportms\Domain\Model;
	
	/**
	 * GameReferee
	 */
	class GameReferee extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {
		
		/**
		 * @var \Balumedien\Sportms\Domain\Model\Game
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
		 */
		protected $game;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Model\Person
		 */
		protected $person;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Model\RefereeJob
		 */
		protected $refereeJob;
		
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
		 * @return Person
		 */
		public function getPerson() {
			return $this->person;
		}
		
		/**
		 * @param Person $person
		 */
		public function setPerson($person) {
			$this->person = $person;
		}
		
		/**
		 * @return RefereeJob
		 */
		public function getRefereeJob() {
			return $this->refereeJob;
		}
		
		/**
		 * @param RefereeJob $refereeJob
		 */
		public function setRefereeJob($refereeJob) {
			$this->refereeJob = $refereeJob;
		}
		
	}