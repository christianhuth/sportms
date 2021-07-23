<?php
    
    namespace Balumedien\Sportms\Domain\Model;
    
    /**
     * GameGoal
     */
    class GameGoal extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
    {
        
        /**
         * @var \Balumedien\Sportms\Domain\Model\Game
         * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
         */
        protected $game;
        
        /**
         * @var int
         */
        protected $goalHome;
        
        /**
         * @var int
         */
        protected $goalGuest;
        
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
        protected $scorer;
        
        /**
         * @var \Balumedien\Sportms\Domain\Model\Person
         */
        protected $assist;
        
        /**
         * @var boolean
         */
        protected $ownGoal;
        
        /**
         * @var int
         */
        protected $goalType;
    
        /**
         * @var string
         */
        protected $type;
        
        /**
         * @return \Balumedien\Sportms\Domain\Model\Game
         */
        public function getGame()
        {
            return $this->game;
        }
        
        /**
         * @param \Balumedien\Sportms\Domain\Model\Game $game
         */
        public function setGame(\Balumedien\Sportms\Domain\Model\Game $game)
        {
            $this->game = $game;
        }
        
        /**
         * @return int
         */
        public function getGoalHome()
        {
            return $this->goalHome;
        }
        
        /**
         * @param int $goalHome
         */
        public function setGoalHome($goalHome)
        {
            $this->goalHome = $goalHome;
        }
        
        /**
         * @return int
         */
        public function getGoalGuest()
        {
            return $this->goalGuest;
        }
        
        /**
         * @param int $goalGuest
         */
        public function setGoalGuest($goalGuest)
        {
            $this->goalGuest = $goalGuest;
        }
        
        /**
         * @return int
         */
        public function getPeriod()
        {
            return $this->period;
        }
        
        /**
         * @param int $period
         */
        public function setPeriod($period)
        {
            $this->period = $period;
        }
        
        /**
         * @return int
         */
        public function getMinute()
        {
            return $this->minute;
        }
        
        /**
         * @param int $minute
         */
        public function setMinute($minute)
        {
            $this->minute = $minute;
        }
        
        /**
         * @return int
         */
        public function getMinuteAdditional()
        {
            return $this->minuteAdditional;
        }
        
        /**
         * @param int $minuteAdditional
         */
        public function setMinuteAdditional($minuteAdditional)
        {
            $this->minuteAdditional = $minuteAdditional;
        }
        
        /**
         * @return Person
         */
        public function getScorer()
        {
            return $this->scorer;
        }
        
        /**
         * @param Person $scorer
         */
        public function setScorer($scorer)
        {
            $this->scorer = $scorer;
        }
        
        /**
         * @return Person
         */
        public function getAssist()
        {
            return $this->assist;
        }
        
        /**
         * @param Person $assist
         */
        public function setAssist($assist)
        {
            $this->assist = $assist;
        }
        
        /**
         * @return bool
         */
        public function isOwnGoal()
        {
            return $this->ownGoal;
        }
        
        /**
         * @param bool $ownGoal
         */
        public function setOwnGoal($ownGoal)
        {
            $this->ownGoal = $ownGoal;
        }
        
        /**
         * @return int
         */
        public function getGoalType()
        {
            return $this->goalType;
        }
        
        /**
         * @param int $goalType
         */
        public function setGoalType($goalType)
        {
            $this->goalType = $goalType;
        }
    
        /**
         * @return string
         */
        public function getType(): string
        {
            return $this->type;
        }
    
        /**
         * @param string $type
         */
        public function setType(string $type): void
        {
            $this->type = $type;
        }
        
    }