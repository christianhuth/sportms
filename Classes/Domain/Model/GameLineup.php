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
		 * @var \Balumedien\Sportms\Domain\Model\TeamSeasonSquadMember
		 */
		protected $teamSeasonSquadMember;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Model\SportPosition
		 */
		protected $sectionPosition;
		
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
		 * @return string
		 */
		public function getTeam() {
			return $this->team;
		}
		
		/**
		 * @param string $team
		 */
		public function setTeam($team) {
			$this->team = $team;
		}
		
		/**
		 * @return string
		 */
		public function getType() {
			return $this->type;
		}
		
		/**
		 * @param string $type
		 */
		public function setType($type) {
			$this->type = $type;
		}
		
		/**
		 * @return string
		 */
		public function getJerseyNumber() {
			return $this->jerseyNumber;
		}
		
		/**
		 * @param string $jerseyNumber
		 */
		public function setJerseyNumber($jerseyNumber) {
			$this->jerseyNumber = $jerseyNumber;
		}
		
		/**
		 * @return TeamSeasonSquadMember
		 */
		public function getTeamSeasonSquadMember() {
			return $this->teamSeasonSquadMember;
		}
		
		/**
		 * @param TeamSeasonSquadMember $teamSeasonSquadMember
		 */
		public function setTeamSeasonSquadMember($teamSeasonSquadMember) {
			$this->teamSeasonSquadMember = $teamSeasonSquadMember;
		}
		
		/**
		 * @return SportPosition
		 */
		public function getSectionPosition() {
			return $this->sectionPosition;
		}
		
		/**
		 * @param SportPosition $sectionPosition
		 */
		public function setSectionPosition($sectionPosition) {
			$this->sectionPosition = $sectionPosition;
		}
		
	}