<?php
    
    declare(strict_types=1);
    
    namespace ChristianKnell\Sportms\Domain\Model;
    
    /**
     * TeamSeasonPractice
     */
    class TeamSeasonPractice extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
    {
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Model\TeamSeason
         * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
         */
        protected $teamSeason;
        
        /**
         * @var integer
         */
        protected $day;
        
        /**
         * @var string
         */
        protected $timeStart;
        
        /**
         * @var string
         */
        protected $timeEnd;
        
        /**
         * @var    \ChristianKnell\Sportms\Domain\Model\Venue
         */
        protected $venue;
        
        /**
         * @var    string
         */
        protected $annotation;
        
        /**
         * @return TeamSeason
         */
        public function getTeamSeason()
        {
            return $this->teamSeason;
        }
        
        /**
         * @param TeamSeason $teamSeason
         */
        public function setTeamSeason($teamSeason)
        {
            $this->teamSeason = $teamSeason;
        }
        
        /**
         * @return integer
         */
        public function getDay()
        {
            return $this->day;
        }
        
        /**
         * @param integer $day
         */
        public function setDay($day)
        {
            $this->day = $day;
        }
        
        /**
         * @return string
         */
        public function getTimeStart()
        {
            return $this->timeStart;
        }
        
        /**
         * @param string $timeStart
         */
        public function setTimeStart($timeStart)
        {
            $this->timeStart = $timeStart;
        }
        
        /**
         * @return string
         */
        public function getTimeEnd()
        {
            return $this->timeEnd;
        }
        
        /**
         * @param string $timeEnd
         */
        public function setTimeEnd($timeEnd)
        {
            $this->timeEnd = $timeEnd;
        }
        
        /**
         * @return Venue
         */
        public function getVenue()
        {
            return $this->venue;
        }
        
        /**
         * @param Venue $venue
         */
        public function setVenue($venue)
        {
            $this->venue = $venue;
        }
        
        /**
         * @return string
         */
        public function getAnnotation()
        {
            return $this->annotation;
        }
        
        /**
         * @param string $annotation
         */
        public function setAnnotation($annotation)
        {
            $this->annotation = $annotation;
        }
        
    }