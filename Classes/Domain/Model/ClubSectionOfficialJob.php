<?php
    
    namespace Balumedien\Sportms\Domain\Model;
    
    /**
     * ClubSectionOfficialJob
     */
    class ClubSectionOfficialJob extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
    {
        
        /**
         * @var string
         */
        protected $label = '';
    
        /**
         * @var bool
         */
        protected $isClubsectionheadJob = false;
        
        /**
         * @return string
         */
        public function getLabel()
        {
            return $this->label;
        }
        
        /**
         * @param string $label
         */
        public function setLabel($label)
        {
            $this->label = $label;
        }
    
        /**
         * @return bool
         */
        public function isClubsectionheadJob(): bool
        {
            return $this->isClubsectionheadJob;
        }
    
        /**
         * @param bool $isClubsectionheadJob
         */
        public function setIsClubsectionheadJob(bool $isClubsectionheadJob): void
        {
            $this->isClubsectionheadJob = $isClubsectionheadJob;
        }
        
    }