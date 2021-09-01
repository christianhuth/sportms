<?php
    
    namespace ChristianKnell\Sportms\Domain\Model;
    
    /**
     * GameGoal
     */
    class GameGoal extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
    {
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Model\Game
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
         * @var int|null
         */
        protected $minuteAdditional;
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Model\PersonProfile|null
         */
        protected $scorer;
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Model\PersonProfile|null
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
         * @return int|null
         */
        public function getMinuteAdditional(): ?int
        {
            return $this->minuteAdditional;
        }
    
        /**
         * @param int|null $minuteAdditional
         */
        public function setMinuteAdditional(?int $minuteAdditional): void
        {
            $this->minuteAdditional = $minuteAdditional;
        }
    
        /**
         * @return PersonProfile|null
         */
        public function getScorer(): ?PersonProfile
        {
            return $this->scorer;
        }
    
        /**
         * @param PersonProfile|null $scorer
         */
        public function setScorer(?PersonProfile $scorer): void
        {
            $this->scorer = $scorer;
        }
    
        /**
         * @return PersonProfile|null
         */
        public function getAssist(): ?PersonProfile
        {
            return $this->assist;
        }
    
        /**
         * @param PersonProfile|null $assist
         */
        public function setAssist(?PersonProfile $assist): void
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