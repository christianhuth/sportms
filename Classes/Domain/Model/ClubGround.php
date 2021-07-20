<?php
    
    namespace Balumedien\Sportms\Domain\Model;
    
    /**
     * ClubGround
     */
    class ClubGround extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
    {
        
        /**
         * @var \Balumedien\Sportms\Domain\Model\Club
         */
        protected $club;
        
        /**
         * @var string
         */
        protected $name;
        
        /**
         * @var \Balumedien\Sportms\Domain\Model\Address
         */
        protected $address;
        
        /**
         * @var string
         */
        protected $journey;
        
        /**
         * @var string
         */
        protected $description;
        
        /**
         * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
         * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
         */
        protected $images;
        
        /**
         * @var boolean
         */
        protected $clubOwned;
        
        /**
         * @var int
         */
        protected $clubOwnedSince;
        
        /**
         * @var int
         */
        protected $yearOfBuilding;
        
        /**
         * @var int
         */
        protected $dateOfBuilding;
        
        /**
         * @return Club
         */
        public function getClub()
        {
            return $this->club;
        }
        
        /**
         * @param Club $club
         */
        public function setClub($club)
        {
            $this->club = $club;
        }
        
        /**
         * @return string
         */
        public function getName()
        {
            return $this->name;
        }
        
        /**
         * @param string $name
         */
        public function setName($name)
        {
            $this->name = $name;
        }
        
        /**
         * @return Address
         */
        public function getAddress()
        {
            return $this->address;
        }
        
        /**
         * @param Address $address
         */
        public function setAddress($address)
        {
            $this->address = $address;
        }
        
        /**
         * @return string
         */
        public function getJourney()
        {
            return $this->journey;
        }
        
        /**
         * @param string $journey
         */
        public function setJourney($journey)
        {
            $this->journey = $journey;
        }
        
        /**
         * @return string
         */
        public function getDescription()
        {
            return $this->description;
        }
        
        /**
         * @param string $description
         */
        public function setDescription($description)
        {
            $this->description = $description;
        }
        
        /**
         * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
         */
        public function getImages()
        {
            return $this->images;
        }
        
        /**
         * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $images
         */
        public function setImages($images)
        {
            $this->images = $images;
        }
        
        /**
         * @return bool
         */
        public function isClubOwned()
        {
            return $this->clubOwned;
        }
        
        /**
         * @param bool $clubOwned
         */
        public function setClubOwned($clubOwned)
        {
            $this->clubOwned = $clubOwned;
        }
        
        /**
         * @return int
         */
        public function getClubOwnedSince()
        {
            return $this->clubOwnedSince;
        }
        
        /**
         * @param int $clubOwnedSince
         */
        public function setClubOwnedSince($clubOwnedSince)
        {
            $this->clubOwnedSince = $clubOwnedSince;
        }
        
        /**
         * @return int
         */
        public function getYearOfBuilding()
        {
            return $this->yearOfBuilding;
        }
        
        /**
         * @param int $yearOfBuilding
         */
        public function setYearOfBuilding($yearOfBuilding)
        {
            $this->yearOfBuilding = $yearOfBuilding;
        }
        
        /**
         * @return int
         */
        public function getDateOfBuilding()
        {
            return $this->dateOfBuilding;
        }
        
        /**
         * @param int $dateOfBuilding
         */
        public function setDateOfBuilding($dateOfBuilding)
        {
            $this->dateOfBuilding = $dateOfBuilding;
        }
        
    }