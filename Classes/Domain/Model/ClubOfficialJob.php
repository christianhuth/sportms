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
        protected $isClubHeadJob = false;
        
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
        public function isClubHeadJob(): bool
        {
            return $this->isClubHeadJob;
        }
    
        /**
         * @param bool $isClubHeadJob
         */
        public function setIsClubHeadJob(bool $isClubHeadJob): void
        {
            $this->isClubHeadJob = $isClubHeadJob;
        }
        
    }