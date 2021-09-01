<?php
    
    namespace ChristianKnell\Sportms\Domain\Model;
    
    /**
     * ClubSectionMembers
     */
    class ClubSectionMembers extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
    {
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Model\ClubSection
         * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
         */
        protected $clubSection;
        
        /**
         * @var int
         */
        protected $members;
        
        /**
         * @var int
         */
        protected $date;
        
        /**
         * @return \ChristianKnell\Sportms\Domain\Model\ClubSection
         */
        public function getClubSection()
        {
            return $this->clubSection;
        }
        
        /**
         * @param \ChristianKnell\Sportms\Domain\Model\ClubSection $clubSection
         */
        public function setClubSection($clubSection)
        {
            $this->clubSection = $clubSection;
        }
        
        /**
         * @return int
         */
        public function getMembers()
        {
            return $this->members;
        }
        
        /**
         * @param int $members
         */
        public function setMembers($members)
        {
            $this->members = $members;
        }
        
        /**
         * @return int
         */
        public function getDate()
        {
            return $this->date;
        }
        
        /**
         * @param int $date
         */
        public function setDate($date)
        {
            $this->date = $date;
        }
        
    }