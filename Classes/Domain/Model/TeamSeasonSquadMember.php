<?php
    
    namespace ChristianKnell\Sportms\Domain\Model;
    
    /**
     * TeamSeasonSquadMember
     */
    class TeamSeasonSquadMember extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
    {
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Model\TeamSeason
         */
        protected $teamSeason;
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Model\PersonProfile
         */
        protected $personProfile;
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Model\SportPositionGroup
         */
        protected $sportPositionGroup;
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Model\SportPosition
         */
        protected $sportPosition;
        
        /**
         * @var string
         */
        protected $squadNumber;
        
        /**
         * @var bool
         */
        protected $newSigning;
        
        /**
         * @var bool
         */
        protected $leaving;
        
        /**
         * @var bool
         */
        protected $hiddenInSquadList;
        
        /**
         * @return \ChristianKnell\Sportms\Domain\Model\TeamSeason
         */
        public function getTeamSeason()
        {
            return $this->teamSeason;
        }
        
        /**
         * @param \ChristianKnell\Sportms\Domain\Model\TeamSeason $teamSeason
         */
        public function setTeamSeason(\ChristianKnell\Sportms\Domain\Model\TeamSeason $teamSeason)
        {
            $this->teamSeason = $teamSeason;
        }
        
        /**
         * @return PersonProfile
         */
        public function getPersonProfile(): PersonProfile
        {
            return $this->personProfile;
        }
        
        /**
         * @param PersonProfile $personProfile
         */
        public function setPersonProfile(PersonProfile $personProfile): void
        {
            $this->personProfile = $personProfile;
        }
        
        /**
         * @return SportPositionGroup
         */
        public function getSportPositionGroup()
        {
            return $this->sportPositionGroup;
        }
        
        /**
         * @param SportPositionGroup $sportPositionGroup
         */
        public function setSportPositionGroup($sportPositionGroup)
        {
            $this->sportPositionGroup = $sportPositionGroup;
        }
        
        /**
         * @return SportPosition
         */
        public function getSportPosition()
        {
            return $this->sportPosition;
        }
        
        /**
         * @param SportPosition $sportPosition
         */
        public function setSportPosition($sportPosition)
        {
            $this->sportPosition = $sportPosition;
        }
        
        /**
         * @return string
         */
        public function getSquadNumber()
        {
            return $this->squadNumber;
        }
        
        /**
         * @param string $squadNumber
         */
        public function setSquadNumber($squadNumber)
        {
            $this->squadNumber = $squadNumber;
        }
        
        /**
         * @return bool
         */
        public function isNewSigning()
        {
            return $this->newSigning;
        }
        
        /**
         * @param bool $newSigning
         */
        public function setNewSigning($newSigning)
        {
            $this->newSigning = $newSigning;
        }
        
        /**
         * @return bool
         */
        public function isLeaving()
        {
            return $this->leaving;
        }
        
        /**
         * @param bool $leaving
         */
        public function setLeaving($leaving)
        {
            $this->leaving = $leaving;
        }
        
        /**
         * @return bool
         */
        public function isHiddenInSquadList(): bool
        {
            return $this->hiddenInSquadList;
        }
        
        /**
         * @param bool $hiddenInSquadList
         */
        public function setHiddenInSquadList(bool $hiddenInSquadList): void
        {
            $this->hiddenInSquadList = $hiddenInSquadList;
        }
        
    }