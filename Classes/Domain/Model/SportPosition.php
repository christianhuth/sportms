<?php
    
    declare(strict_types=1);
    
    namespace ChristianKnell\Sportms\Domain\Model;
    
    /**
     * SportPosition
     */
    class SportPosition extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
    {
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Model\SportPositionGroup
         * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
         */
        protected $sportPositionGroup;
        
        /**
         * @var string
         */
        protected $label;
        
        /**
         * @var string
         */
        protected $abbreviation;
        
        /**
         * @var int
         */
        protected $xPosition;
        
        /**
         * @var int
         */
        protected $yPosition;
    
        /**
         * @var int
         */
        protected $sorting;
        
        /**
         * @return \ChristianKnell\Sportms\Domain\Model\SportPositionGroup
         */
        public function getSportPositionGroup(): \ChristianKnell\Sportms\Domain\Model\SportPositionGroup
        {
            return $this->sportPositionGroup;
        }
        
        /**
         * @param \ChristianKnell\Sportms\Domain\Model\SportPositionGroup $sportPositionGroup
         */
        public function setSportPositionGroup(
            \ChristianKnell\Sportms\Domain\Model\SportPositionGroup $sportPositionGroup
        ): void {
            $this->sportPositionGroup = $sportPositionGroup;
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
         * @return int
         */
        public function getXPosition(): int
        {
            return $this->xPosition;
        }
        
        /**
         * @param int $xPosition
         */
        public function setXPosition(int $xPosition): void
        {
            $this->xPosition = $xPosition;
        }
        
        /**
         * @return int
         */
        public function getYPosition(): int
        {
            return $this->yPosition;
        }
        
        /**
         * @param int $yPosition
         */
        public function setYPosition(int $yPosition): void
        {
            $this->yPosition = $yPosition;
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