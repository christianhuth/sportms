<?php
    
    namespace Balumedien\Sportms\Domain\Model;
    
    /**
     * GameChange
     */
    class GameChange extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
    {
        
        /**
         * @var \Balumedien\Sportms\Domain\Model\Game
         * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
         */
        protected $game;
        
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
         * @var \Balumedien\Sportms\Domain\Model\PersonProfile
         */
        protected $personIn;
        
        /**
         * @var \Balumedien\Sportms\Domain\Model\PersonProfile
         */
        protected $personOut;
        
        /**
         * @var int
         */
        protected $reason;
        
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
         * @return PersonProfile
         */
        public function getPersonIn(): PersonProfile
        {
            return $this->personIn;
        }
        
        /**
         * @param PersonProfile $personIn
         */
        public function setPersonIn(PersonProfile $personIn): void
        {
            $this->personIn = $personIn;
        }
        
        /**
         * @return PersonProfile
         */
        public function getPersonOut(): PersonProfile
        {
            return $this->personOut;
        }
        
        /**
         * @param PersonProfile $personOut
         */
        public function setPersonOut(PersonProfile $personOut): void
        {
            $this->personOut = $personOut;
        }
        
        /**
         * @return int
         */
        public function getReason()
        {
            return $this->reason;
        }
        
        /**
         * @param int $reason
         */
        public function setReason($reason)
        {
            $this->reason = $reason;
        }
        
    }