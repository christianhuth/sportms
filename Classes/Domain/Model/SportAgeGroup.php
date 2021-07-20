<?php
    
    namespace Balumedien\Sportms\Domain\Model;
    
    /**
     * SportAgeGroup
     */
    class SportAgeGroup extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
    {
        
        /**
         * @var \Balumedien\Sportms\Domain\Model\Sport
         */
        protected $sport;
        
        /**
         * @var string
         */
        protected $label;
        
        /**
         * @var string
         */
        protected $abbreviation;
        
        /**
         * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Sportms\Domain\Model\SportAgeLevel>
         * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
         * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
         */
        protected $sportAgeLevels;
        
        /**
         * __construct
         */
        public function __construct()
        {
            //Do not remove the next line: It would break the functionality
            $this->initStorageObjects();
        }
        
        /**
         * Initializes all ObjectStorage properties
         * Do not modify this method!
         * It will be rewritten on each save in the extension builder
         * You may modify the constructor of this class instead
         *
         * @return void
         */
        protected function initStorageObjects(): void
        {
            $this->setSportAgeLevels(new \TYPO3\CMS\Extbase\Persistence\ObjectStorage());
        }
        
        /**
         * @return \Balumedien\Sportms\Domain\Model\Sport
         */
        public function getSport(): \Balumedien\Sportms\Domain\Model\Sport
        {
            return $this->sport;
        }
        
        /**
         * @param \Balumedien\Sportms\Domain\Model\Sport $sport
         */
        public function setSport(\Balumedien\Sportms\Domain\Model\Sport $sport): void
        {
            $this->sport = $sport;
        }
        
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
         * @return string
         */
        public function getAbbreviation(): string
        {
            return $this->abbreviation;
        }
        
        /**
         * @param string $abbreviation
         */
        public function setAbbreviation(string $abbreviation): void
        {
            $this->abbreviation = $abbreviation;
        }
        
        /**
         * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
         */
        public function getSportAgeLevels(): \TYPO3\CMS\Extbase\Persistence\ObjectStorage
        {
            return $this->sportAgeLevels;
        }
        
        /**
         * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $sportAgeLevels
         */
        public function setSportAgeLevels(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $sportAgeLevels): void
        {
            $this->sportAgeLevels = $sportAgeLevels;
        }
        
    }