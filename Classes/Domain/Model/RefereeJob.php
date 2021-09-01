<?php
    
    namespace ChristianKnell\Sportms\Domain\Model;
    
    /**
     * RefereeJob
     */
    class RefereeJob extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
    {
        
        /**
         * @var string
         */
        protected $label = '';
        
        /**
         * @var bool
         */
        protected $isMainrefereeJob = false;
        
        /**
         * @return string
         */
        public function getLabel(): string
        {
            return $this->label;
        }
        
        /**
         * @param string $label
         */
        public function setLabel(string $label): void
        {
            $this->label = $label;
        }
        
        /**
         * @return bool
         */
        public function isMainrefereeJob(): bool
        {
            return $this->isMainrefereeJob;
        }
        
        /**
         * @param bool $isMainrefereeJob
         */
        public function setIsMainrefereeJob(bool $isMainrefereeJob): void
        {
            $this->isMainrefereeJob = $isMainrefereeJob;
        }
        
    }