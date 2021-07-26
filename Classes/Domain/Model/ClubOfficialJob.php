<?php
    
    namespace Balumedien\Sportms\Domain\Model;
    
    /**
     * ClubOfficialJob
     */
    class ClubOfficialJob extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
    {
        
        /**
         * @var string
         */
        protected $label = '';
    
        /**
         * @var bool
         */
        protected $isClubheadJob = false;
        
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
        public function isClubheadJob(): bool
        {
            return $this->isClubheadJob;
        }
    
        /**
         * @param bool $isClubheadJob
         */
        public function setIsClubheadJob(bool $isClubheadJob): void
        {
            $this->isClubheadJob = $isClubheadJob;
        }
        
    }