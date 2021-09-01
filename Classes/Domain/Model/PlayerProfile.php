<?php
    
    declare(strict_types=1);
    
    namespace ChristianKnell\Sportms\Domain\Model;
    
    class PlayerProfile extends PersonProfile
    {
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Model\SportPositionGroup|null
         */
        protected $mainSportPositionGroup;
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Model\SportPosition|null
         */
        protected $mainSportPosition;
        
        /**
         * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ChristianKnell\Sportms\Domain\Model\SportPositionGroup>|null
         * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
         */
        protected $sideSportPositionGroups;
        
        /**
         * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ChristianKnell\Sportms\Domain\Model\SportPosition>|null
         * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
         */
        protected $sideSportPositions;
        
        /**
         * PlayerProfile constructor.
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
            $this->setSideSportPositionGroups(new \TYPO3\CMS\Extbase\Persistence\ObjectStorage());
            $this->setSideSportPositions(new \TYPO3\CMS\Extbase\Persistence\ObjectStorage());
        }
        
        /**
         * @return SportPositionGroup|null
         */
        public function getMainSportPositionGroup(): ?SportPositionGroup
        {
            return $this->mainSportPositionGroup;
        }
        
        /**
         * @param SportPositionGroup|null $mainSportPositionGroup
         */
        public function setMainSportPositionGroup(?SportPositionGroup $mainSportPositionGroup): void
        {
            $this->mainSportPositionGroup = $mainSportPositionGroup;
        }
        
        /**
         * @return SportPosition|null
         */
        public function getMainSportPosition(): ?SportPosition
        {
            return $this->mainSportPosition;
        }
        
        /**
         * @param SportPosition|null $mainSportPosition
         */
        public function setMainSportPosition(?SportPosition $mainSportPosition): void
        {
            $this->mainSportPosition = $mainSportPosition;
        }
        
        /**
         * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null
         */
        public function getSideSportPositionGroups(): ?\TYPO3\CMS\Extbase\Persistence\ObjectStorage
        {
            return $this->sideSportPositionGroups;
        }
        
        /**
         * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null $sideSportPositionGroups
         */
        public function setSideSportPositionGroups(
            ?\TYPO3\CMS\Extbase\Persistence\ObjectStorage $sideSportPositionGroups
        ): void {
            $this->sideSportPositionGroups = $sideSportPositionGroups;
        }
        
        /**
         * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null
         */
        public function getSideSportPositions(): ?\TYPO3\CMS\Extbase\Persistence\ObjectStorage
        {
            return $this->sideSportPositions;
        }
        
        /**
         * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage|null $sideSportPositions
         */
        public function setSideSportPositions(?\TYPO3\CMS\Extbase\Persistence\ObjectStorage $sideSportPositions): void
        {
            $this->sideSportPositions = $sideSportPositions;
        }
        
    }