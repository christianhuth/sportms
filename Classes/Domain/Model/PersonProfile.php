<?php
    
    namespace Balumedien\Sportms\Domain\Model;
    
    class PersonProfile extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
    {
        
        /**
         * @var \Balumedien\Sportms\Domain\Model\Person
         */
        protected $person;
        
        /**
         * @var string
         */
        protected $profileType;
        
        /**
         * @var \Balumedien\Sportms\Domain\Model\Sport
         */
        protected $sport;
        
        /**
         * @var \Balumedien\Sportms\Domain\Model\SportPositionGroup|null
         */
        protected $mainSportPositionGroup;
        
        /**
         * @var \Balumedien\Sportms\Domain\Model\SportPosition|null
         */
        protected $mainSportPosition;
        
        /**
         * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Sportms\Domain\Model\SportPositionGroup>
         * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
         */
        protected $sideSportPositionGroups;
        
        /**
         * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Sportms\Domain\Model\SportPosition>
         * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
         */
        protected $sideSportPositions;
        
        /**
         * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
         * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
         */
        protected $profileImages;
        
        /**
         * TeamSeason constructor.
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
            $this->setProfileImages(new \TYPO3\CMS\Extbase\Persistence\ObjectStorage());
            $this->setSideSportPositionGroups(new \TYPO3\CMS\Extbase\Persistence\ObjectStorage());
            $this->setSideSportPositions(new \TYPO3\CMS\Extbase\Persistence\ObjectStorage());
        }
        
        /**
         * @return Person
         */
        public function getPerson()
        {
            return $this->person;
        }
        
        /**
         * @param Person $person
         */
        public function setPerson($person)
        {
            $this->person = $person;
        }
        
        /**
         * @return string
         */
        public function getProfileType()
        {
            return $this->profileType;
        }
        
        /**
         * @param string $profileType
         */
        public function setProfileType($profileType)
        {
            $this->profileType = $profileType;
        }
        
        /**
         * @return Sport
         */
        public function getSport(): Sport
        {
            return $this->sport;
        }
        
        /**
         * @param Sport $sport
         */
        public function setSport(Sport $sport): void
        {
            $this->sport = $sport;
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
         * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
         */
        public function getSideSportPositionGroups(): \TYPO3\CMS\Extbase\Persistence\ObjectStorage
        {
            return $this->sideSportPositionGroups;
        }
        
        /**
         * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $sideSportPositionGroups
         */
        public function setSideSportPositionGroups(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $sideSportPositionGroups
        ): void {
            $this->sideSportPositionGroups = $sideSportPositionGroups;
        }
        
        /**
         * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
         */
        public function getSideSportPositions(): \TYPO3\CMS\Extbase\Persistence\ObjectStorage
        {
            return $this->sideSportPositions;
        }
        
        /**
         * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $sideSportPositions
         */
        public function setSideSportPositions(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $sideSportPositions): void
        {
            $this->sideSportPositions = $sideSportPositions;
        }
        
        /**
         * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
         */
        public function getProfileImages()
        {
            return $this->profileImages;
        }
        
        /**
         * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $profileImages
         */
        public function setProfileImages($profileImages)
        {
            $this->profileImages = $profileImages;
        }
        
    }