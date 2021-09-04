<?php
    
    declare(strict_types=1);
    
    namespace ChristianKnell\Sportms\Domain\Model;
    
    /**
     * Club
     */
    class Club extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
    {
        
        /**
         * @var string
         */
        protected $name;
        
        /**
         * @var string
         */
        protected $colours;
        
        /**
         * @var int
         */
        protected $dateOfFounding;
        
        /**
         * @var int
         */
        protected $yearOfFounding;
        
        /**
         * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ChristianKnell\Sportms\Domain\Model\ClubMembers>
         * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
         * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
         */
        protected $clubMembers;
        
        /**
         * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
         * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
         */
        protected $logos;
        
        /**
         * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ChristianKnell\Sportms\Domain\Model\Address>
         * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
         * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
         */
        protected $addresses;
        
        /**
         * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ChristianKnell\Sportms\Domain\Model\Phone>
         * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
         * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
         */
        protected $phones;
        
        /**
         * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ChristianKnell\Sportms\Domain\Model\Mail>
         * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
         * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
         */
        protected $mails;
        
        /**
         * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ChristianKnell\Sportms\Domain\Model\Url>
         * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
         * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
         */
        protected $urls;
        
        /**
         * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ChristianKnell\Sportms\Domain\Model\ClubGround>
         * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
         * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
         */
        protected $clubGrounds;
        
        /**
         * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ChristianKnell\Sportms\Domain\Model\Venue>
         * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
         */
        protected $homeVenues;
        
        /**
         * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ChristianKnell\Sportms\Domain\Model\ClubSection>
         * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
         * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
         */
        protected $clubSections;
        
        /**
         * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ChristianKnell\Sportms\Domain\Model\ClubOfficial>
         * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
         * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
         */
        protected $clubOfficials;
        
        /**
         * @var boolean
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
            $this->setClubMembers(new \TYPO3\CMS\Extbase\Persistence\ObjectStorage());
            $this->setLogos(new \TYPO3\CMS\Extbase\Persistence\ObjectStorage());
            $this->setAddresses(new \TYPO3\CMS\Extbase\Persistence\ObjectStorage());
            $this->setPhones(new \TYPO3\CMS\Extbase\Persistence\ObjectStorage());
            $this->setMails(new \TYPO3\CMS\Extbase\Persistence\ObjectStorage());
            $this->setUrls(new \TYPO3\CMS\Extbase\Persistence\ObjectStorage());
            $this->setClubGrounds(new \TYPO3\CMS\Extbase\Persistence\ObjectStorage());
            $this->setHomeVenues(new \TYPO3\CMS\Extbase\Persistence\ObjectStorage());
            $this->setClubSections(new \TYPO3\CMS\Extbase\Persistence\ObjectStorage());
            $this->setClubOfficials(new \TYPO3\CMS\Extbase\Persistence\ObjectStorage());
        }
        
        /**
         * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $homeVenues
         */
        public function setHomeVenues($homeVenues)
        {
            $this->homeVenues = $homeVenues;
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
         * @return string
         */
        public function getColours()
        {
            return $this->colours;
        }
        
        /**
         * @param string $colours
         */
        public function setColours($colours)
        {
            $this->colours = $colours;
        }
        
        /**
         * @return int
         */
        public function getDateOfFounding()
        {
            return $this->dateOfFounding;
        }
        
        /**
         * @param int $dateOfFounding
         */
        public function setDateOfFounding($dateOfFounding)
        {
            $this->dateOfFounding = $dateOfFounding;
        }
        
        /**
         * @return int
         */
        public function getYearOfFounding()
        {
            return $this->yearOfFounding;
        }
        
        /**
         * @param int $yearOfFounding
         */
        public function setYearOfFounding($yearOfFounding)
        {
            $this->yearOfFounding = $yearOfFounding;
        }
        
        /**
         * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
         */
        public function getClubMembers()
        {
            return $this->clubMembers;
        }
        
        /**
         * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $clubMembers
         */
        public function setClubMembers($clubMembers)
        {
            $this->clubMembers = $clubMembers;
        }
        
        /**
         * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
         */
        public function getLogos()
        {
            return $this->logos;
        }
        
        /**
         * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $logos
         */
        public function setLogos($logos)
        {
            $this->logos = $logos;
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
        public function getClubGrounds()
        {
            return $this->clubGrounds;
        }
        
        /**
         * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $clubGrounds
         */
        public function setClubGrounds($clubGrounds)
        {
            $this->clubGrounds = $clubGrounds;
        }
        
        /**
         * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
         */
        public function getHomeVenues()
        {
            return $this->homeVenues;
        }
        
        /**
         * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
         */
        public function getClubSections()
        {
            return $this->clubSections;
        }
        
        /**
         * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $clubSections
         */
        public function setClubSections($clubSections)
        {
            $this->clubSections = $clubSections;
        }
        
        /**
         * Adds a ClubOfficial
         *
         * @param \ChristianKnell\Sportms\Domain\Model\ClubOfficial $clubOfficial
         * @return void
         */
        public function addClubOfficial(\ChristianKnell\Sportms\Domain\Model\ClubOfficial $clubOfficial)
        {
            $this->clubOfficials->attach($clubOfficial);
        }
        
        /**
         * Removes a ClubOfficial
         *
         * @param \ChristianKnell\Sportms\Domain\Model\ClubOfficial $clubOfficialToRemove The ClubOfficial to be removed
         * @return void
         */
        public function removeClubOfficial(\ChristianKnell\Sportms\Domain\Model\ClubOfficial $clubOfficialToRemove)
        {
            $this->clubOfficials->detach($clubOfficialToRemove);
        }
        
        /**
         * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ChristianKnell\Sportms\Domain\Model\ClubOfficial>
         */
        public function getClubOfficials()
        {
            return $this->clubOfficials;
        }
        
        /**
         * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ChristianKnell\Sportms\Domain\Model\ClubOfficial>
         */
        public function setClubOfficials(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $clubOfficials)
        {
            $this->clubOfficials = $clubOfficials;
        }
        
        /**
         * @return bool
         */
        public function isDetailLink()
        {
            return $this->detailLink;
        }
        
        /**
         * @param bool $detailLink
         */
        public function setDetailLink($detailLink)
        {
            $this->detailLink = $detailLink;
        }
        
    }