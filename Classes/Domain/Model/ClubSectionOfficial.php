<?php
    
    namespace Balumedien\Sportms\Domain\Model;
    
    /**
     * ClubSectionOfficial
     */
    class ClubSectionOfficial extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
    {
        
        /**
         * @var \Balumedien\Sportms\Domain\Model\ClubSection
         * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
         */
        protected $clubSection;
        
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
         * @return ClubSection
         */
        public function getClubSection()
        {
            return $this->clubSection;
        }
        
        /**
         * @param ClubSection $clubSection
         */
        public function setClubSection($clubSection)
        {
            $this->clubSection = $clubSection;
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
        
    }