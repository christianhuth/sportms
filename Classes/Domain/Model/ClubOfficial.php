<?php
    
    namespace Balumedien\Sportms\Domain\Model;
    
    /**
     * ClubOfficial
     */
    class ClubOfficial extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
    {
        
        /**
         * @var \Balumedien\Sportms\Domain\Model\Club
         * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
         */
        protected $club;
        
        /**
         * @var \Balumedien\Sportms\Domain\Model\PersonProfile
         */
        protected $personProfile;
        
        /**
         * @var \Balumedien\Sportms\Domain\Model\OfficialJob
         */
        protected $officialJob;
        
        /**
         * @var int
         */
        protected $startdate;
        
        /**
         * @var int
         */
        protected $enddate;
        
        /**
         * @var boolean
         */
        protected $untilToday;
        
        /**
         * @return \Balumedien\Sportms\Domain\Model\Club
         */
        public function getClub()
        {
            return $this->club;
        }
        
        /**
         * @param \Balumedien\Sportms\Domain\Model\Club $club
         */
        public function setClub(\Balumedien\Sportms\Domain\Model\Club $club)
        {
            $this->club = $club;
        }
        
        /**
         * @return \Balumedien\Sportms\Domain\Model\PersonProfile
         */
        public function getPersonProfile(): \Balumedien\Sportms\Domain\Model\PersonProfile
        {
            return $this->personProfile;
        }
        
        /**
         * @param \Balumedien\Sportms\Domain\Model\PersonProfile $personProfile
         */
        public function setPersonProfile(\Balumedien\Sportms\Domain\Model\PersonProfile $personProfile): void
        {
            $this->personProfile = $personProfile;
        }
        
        /**
         * @return OfficialJob
         */
        public function getOfficialJob(): OfficialJob
        {
            return $this->officialJob;
        }
        
        /**
         * @param OfficialJob $officialJob
         */
        public function setOfficialJob(OfficialJob $officialJob): void
        {
            $this->officialJob = $officialJob;
        }
        
        /**
         * @return int
         */
        public function getStartdate()
        {
            return $this->startdate;
        }
        
        /**
         * @param int $startdate
         */
        public function setStartdate($startdate)
        {
            $this->startdate = $startdate;
        }
        
        /**
         * @return int
         */
        public function getEnddate()
        {
            return $this->enddate;
        }
        
        /**
         * @param int $enddate
         */
        public function setEnddate($enddate)
        {
            $this->enddate = $enddate;
        }
        
        /**
         * @return bool
         */
        public function isUntilToday(): bool
        {
            return $this->untilToday;
        }
        
        /**
         * @param bool $untilToday
         */
        public function setUntilToday(bool $untilToday): void
        {
            $this->untilToday = $untilToday;
        }
        
    }