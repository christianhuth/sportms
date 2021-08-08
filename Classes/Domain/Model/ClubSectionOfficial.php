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
         * @var \Balumedien\Sportms\Domain\Model\Person
         */
        protected $person;
        
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
         * @return Person
         */
        public function getPerson()
        {
            return $this->person;
        }
        
        /**
         * @param Person $person
         */
        public function setPerson($person)
        {
            $this->person = $person;
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
        
    }