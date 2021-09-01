<?php
    
    declare(strict_types=1);
    
    namespace ChristianKnell\Sportms\Domain\Model;
    
    /**
     * GameResultSet
     */
    class GameResultSet extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
    {
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Model\Game
         * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
         */
        protected $game;
        
        /**
         * @var int
         */
        protected $setNumber;
        
        /**
         * @var int
         */
        protected $resultHome;
        
        /**
         * @var int
         */
        protected $resultGuest;
        
        /**
         * @return \ChristianKnell\Sportms\Domain\Model\Game
         */
        public function getGame()
        {
            return $this->game;
        }
        
        /**
         * @param \ChristianKnell\Sportms\Domain\Model\Game $game
         */
        public function setGame(\ChristianKnell\Sportms\Domain\Model\Game $game)
        {
            $this->game = $game;
        }
        
        /**
         * @return int
         */
        public function getSetNumber()
        {
            return $this->setNumber;
        }
        
        /**
         * @param int $setNumber
         */
        public function setSetNumber($setNumber)
        {
            $this->setNumber = $setNumber;
        }
        
        /**
         * @return int
         */
        public function getResultHome()
        {
            return $this->resultHome;
        }
        
        /**
         * @param int $resultHome
         */
        public function setResultHome($resultHome)
        {
            $this->resultHome = $resultHome;
        }
        
        /**
         * @return int
         */
        public function getResultGuest()
        {
            return $this->resultGuest;
        }
        
        /**
         * @param int $resultGuest
         */
        public function setResultGuest($resultGuest)
        {
            $this->resultGuest = $resultGuest;
        }
        
    }