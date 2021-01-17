<?php
	
	namespace Balumedien\Sportms\Domain\Model;
	
	/**
	 * GameReport
	 */
	class GameReport extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {
		
		/**
		 * @var \Balumedien\Sportms\Domain\Model\Game
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
		 */
		protected $game;
		
		/**
		 * @var string
		 */
		protected $headline;
		
		/**
		 * @var string
		 */
		protected $text;
		
		/**
		 * @var string
		 */
		protected $author;

        /**
         * @var int
         */
        protected $date;
		
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
		public function getHeadline() {
			return $this->headline;
		}
		
		/**
		 * @param string $headline
		 */
		public function setHeadline($headline) {
			$this->headline = $headline;
		}
		
		/**
		 * @return string
		 */
		public function getText() {
			return $this->text;
		}
		
		/**
		 * @param string $text
		 */
		public function setText($text) {
			$this->text = $text;
		}
		
		/**
		 * @return string
		 */
		public function getAuthor() {
			return $this->author;
		}
		
		/**
		 * @param string $author
		 */
		public function setAuthor($author) {
			$this->author = $author;
		}

        /**
         * @return int
         */
        public function getDate(): int {
            return $this->date;
        }

        /**
         * @param int $date
         */
        public function setDate(int $date): void {
            $this->date = $date;
        }
		
	}