<?php
    
    namespace Balumedien\Sportms\Domain\Model;
    
    /**
     * ClubSection
     */
    class ClubSection extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
    {
        
        /**
         * @var \Balumedien\Sportms\Domain\Model\Club
         * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
         */
        protected $club;
        
        /**
         * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Sportms\Domain\Model\Sport>
         * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
         */
        protected $sports;
        
        /**
         * @var string
         */
        protected $label;
        
        /**
         * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
         * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
         */
        protected $images;
        
        /**
         * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Sportms\Domain\Model\ClubSectionMembers>
         * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
         * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
         */
        protected $clubSectionMembers;
        
        /**
         * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Sportms\Domain\Model\Address>
         * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
         * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
         */
        protected $addresses;
        
        /**
         * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Sportms\Domain\Model\Phone>
         * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
         * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
         */
        protected $phones;
        
        /**
         * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Sportms\Domain\Model\Mail>
         * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
         * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
         */
        protected $mails;
        
        /**
         * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Sportms\Domain\Model\Url>
         * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
         * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
         */
        protected $urls;
        
        /**
         * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Sportms\Domain\Model\ClubSectionOfficial>
         * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
         * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
         */
        protected $clubSectionOfficials;
        
        /**
         * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Sportms\Domain\Model\Team>
         * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
         * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
         */
        protected $teams;
        
        /**
         * @var bool
         */
        protected $detailLink;
        
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
            $this->setSports(new \TYPO3\CMS\Extbase\Persistence\ObjectStorage());
            $this->setImages(new \TYPO3\CMS\Extbase\Persistence\ObjectStorage());
            $this->setClubSectionMembers(new \TYPO3\CMS\Extbase\Persistence\ObjectStorage());
            $this->setAddresses(new \TYPO3\CMS\Extbase\Persistence\ObjectStorage());
            $this->setPhones(new \TYPO3\CMS\Extbase\Persistence\ObjectStorage());
            $this->setMails(new \TYPO3\CMS\Extbase\Persistence\ObjectStorage());
            $this->setUrls(new \TYPO3\CMS\Extbase\Persistence\ObjectStorage());
            $this->setClubSectionOfficials(new \TYPO3\CMS\Extbase\Persistence\ObjectStorage());
            $this->setTeams(new \TYPO3\CMS\Extbase\Persistence\ObjectStorage());
        }
        
        /**
         * @return \Balumedien\Sportms\Domain\Model\Club
         */
        public function getClub(): \Balumedien\Sportms\Domain\Model\Club
        {
            return $this->club;
        }
        
        /**
         * @param \Balumedien\Sportms\Domain\Model\Club $club
         */
        public function setClub(\Balumedien\Sportms\Domain\Model\Club $club): void
        {
            $this->club = $club;
        }
        
        /**
         * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
         */
        public function getSports(): \TYPO3\CMS\Extbase\Persistence\ObjectStorage
        {
            return $this->sports;
        }
        
        /**
         * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $sports
         */
        public function setSports(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $sports): void
        {
            $this->sports = $sports;
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
         * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
         */
        public function getClubSectionMembers()
        {
            return $this->clubSectionMembers;
        }
        
        /**
         * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $clubSectionMembers
         */
        public function setClubSectionMembers($clubSectionMembers)
        {
            $this->clubSectionMembers = $clubSectionMembers;
        }
        
        /**
         * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
         */
        public function getAddresses()
        {
            return $this->addresses;
        }
        
        /**
         * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $addresses
         */
        public function setAddresses($addresses)
        {
            $this->addresses = $addresses;
        }
        
        /**
         * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
         */
        public function getPhones()
        {
            return $this->phones;
        }
        
        /**
         * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $phones
         */
        public function setPhones($phones)
        {
            $this->phones = $phones;
        }
        
        /**
         * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
         */
        public function getMails()
        {
            return $this->mails;
        }
        
        /**
         * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $mails
         */
        public function setMails($mails)
        {
            $this->mails = $mails;
        }
        
        /**
         * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
         */
        public function getUrls()
        {
            return $this->urls;
        }
        
        /**
         * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $urls
         */
        public function setUrls($urls)
        {
            $this->urls = $urls;
        }
        
        /**
         * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
         */
        public function getClubSectionOfficials()
        {
            return $this->clubSectionOfficials;
        }
        
        /**
         * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $clubSectionOfficials
         */
        public function setClubSectionOfficials($clubSectionOfficials)
        {
            $this->clubSectionOfficials = $clubSectionOfficials;
        }
        
        /**
         * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
         */
        public function getTeams()
        {
            return $this->teams;
        }
        
        /**
         * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $teams
         */
        public function setTeams($teams)
        {
            $this->teams = $teams;
        }
        
        /**
         * @return bool
         */
        public function isDetailLink(): bool
        {
            return $this->detailLink;
        }
        
        /**
         * @param bool $detailLink
         */
        public function setDetailLink(bool $detailLink): void
        {
            $this->detailLink = $detailLink;
        }
        
    }