<?php
    
    namespace Balumedien\Sportms\Domain\Model;
    
    /**
     * TeamSeasonOfficialJob
     */
    class TeamSeasonOfficialJob extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
    {
        
        /**
         * @var string
         */
        protected $label = '';
    
        /**
         * @var bool
         */
        protected $isCheftrainerJob = false;
        
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
        public function isCheftrainerJob(): bool
        {
            return $this->isCheftrainerJob;
        }
    
        /**
         * @param bool $isCheftrainerJob
         */
        public function setIsCheftrainerJob(bool $isCheftrainerJob): void
        {
            $this->isCheftrainerJob = $isCheftrainerJob;
        }
        
    }