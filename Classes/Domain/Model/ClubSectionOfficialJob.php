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
        protected $isClubSectionHeadJob = false;
        
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
        public function isClubSectionHeadJob(): bool
        {
            return $this->isClubSectionHeadJob;
        }
    
        /**
         * @param bool $isClubSectionHeadJob
         */
        public function setIsClubSectionHeadJob(bool $isClubSectionHeadJob): void
        {
            $this->isClubSectionHeadJob = $isClubSectionHeadJob;
        }
        
    }