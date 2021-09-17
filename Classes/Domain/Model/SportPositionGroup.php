<?php
    
    declare(strict_types=1);
    
    namespace ChristianKnell\Sportms\Domain\Model;
    
    /**
     * SportPositionGroup
     */
    class SportPositionGroup extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
    {
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Model\Sport
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
         * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ChristianKnell\Sportms\Domain\Model\SportPosition>
         * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
         * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
         */
        protected $sportPositions;
        
        /**
         * @var int
         */
        protected $sorting;
        
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
            $this->setSportPositions(new \TYPO3\CMS\Extbase\Persistence\ObjectStorage());
        }
        
        /**
         * @return \ChristianKnell\Sportms\Domain\Model\Sport
         */
        public function getSport(): \ChristianKnell\Sportms\Domain\Model\Sport
        {
            return $this->sport;
        }
        
        /**
         * @param \ChristianKnell\Sportms\Domain\Model\Sport $sport
         */
        public function setSport(\ChristianKnell\Sportms\Domain\Model\Sport $sport): void
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
        public function getSportPositions(): \TYPO3\CMS\Extbase\Persistence\ObjectStorage
        {
            return $this->sportPositions;
        }
        
        /**
         * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $sportPositions
         */
        public function setSportPositions(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $sportPositions): void
        {
            $this->sportPositions = $sportPositions;
        }
    
        /**
         * @return int
         */
        public function getSorting(): int
        {
            return $this->sorting;
        }
    
        /**
         * @param int $sorting
         */
        public function setSorting(int $sorting): void
        {
            $this->sorting = $sorting;
        }
        
    }