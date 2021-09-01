<?php
    
    declare(strict_types=1);
    
    namespace ChristianKnell\Sportms\Domain\Model;
    
    /**
     * ClubOfficial
     */
    class ClubOfficial extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
    {
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Model\Club
         * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
         */
        protected $club;
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Model\PersonProfile
         */
        protected $personProfile;
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Model\OfficialJob
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
         * @return \ChristianKnell\Sportms\Domain\Model\Club
         */
        public function getClub()
        {
            return $this->club;
        }
        
        /**
         * @param \ChristianKnell\Sportms\Domain\Model\Club $club
         */
        public function setClub(\ChristianKnell\Sportms\Domain\Model\Club $club)
        {
            $this->club = $club;
        }
        
        /**
         * @return \ChristianKnell\Sportms\Domain\Model\PersonProfile
         */
        public function getPersonProfile(): \ChristianKnell\Sportms\Domain\Model\PersonProfile
        {
            return $this->personProfile;
        }
        
        /**
         * @param \ChristianKnell\Sportms\Domain\Model\PersonProfile $personProfile
         */
        public function setPersonProfile(\ChristianKnell\Sportms\Domain\Model\PersonProfile $personProfile): void
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