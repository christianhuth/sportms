<?php
    
    namespace ChristianKnell\Sportms\Domain\Model;
    
    class PersonProfile extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
    {
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Model\Person
         */
        protected $person;
        
        /**
         * @var string
         */
        protected $profileType;
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Model\Sport
         */
        protected $sport;
        
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