<?php
    
    namespace Balumedien\Sportms\Domain\Model;
    
    /**
     * Team
     */
    class Team extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
    {
        
        /**
         * @var \Balumedien\Sportms\Domain\Model\Club
         */
        protected $club;
        
        /**
         * @var \Balumedien\Sportms\Domain\Model\Sport
         */
        protected $sport;
        
        /**
         * @var \Balumedien\Sportms\Domain\Model\SportAgeGroup
         */
        protected $sportAgeGroup;
        
        /**
         * @var \Balumedien\Sportms\Domain\Model\SportAgeLevel
         */
        protected $sportAgeLevel;
        
        /**
         * @var string
         */
        protected $label;
        
        /**
         * @var boolean
         */
        protected $dummy;
        
        /**
         * @var boolean
         */
        protected $detailLink;
        
        /**
         * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Sportms\Domain\Model\TeamSeason>
         * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
         */
        protected $teamSeasons;
        
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
            $this->setTeamSeasons(new \TYPO3\CMS\Extbase\Persistence\ObjectStorage());
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
         * @return \Balumedien\Sportms\Domain\Model\SportAgeGroup
         */
        public function getSportAgeGroup(): \Balumedien\Sportms\Domain\Model\SportAgeGroup
        {
            return $this->sportAgeGroup;
        }
        
        /**
         * @param \Balumedien\Sportms\Domain\Model\SportAgeGroup $sportAgeGroup
         */
        public function setSportAgeGroup(\Balumedien\Sportms\Domain\Model\SportAgeGroup $sportAgeGroup): void
        {
            $this->sportAgeGroup = $sportAgeGroup;
        }
        
        /**
         * @return \Balumedien\Sportms\Domain\Model\SportAgeLevel
         */
        public function getSportAgeLevel(): \Balumedien\Sportms\Domain\Model\SportAgeLevel
        {
            return $this->sportAgeLevel;
        }
        
        /**
         * @param \Balumedien\Sportms\Domain\Model\SportAgeLevel $sportAgeLevel
         */
        public function setSportAgeLevel(\Balumedien\Sportms\Domain\Model\SportAgeLevel $sportAgeLevel): void
        {
            $this->sportAgeLevel = $sportAgeLevel;
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
         * @return bool
         */
        public function isDummy(): bool
        {
            return $this->dummy;
        }
        
        /**
         * @param bool $dummy
         */
        public function setDummy(bool $dummy): void
        {
            $this->dummy = $dummy;
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
        
        /**
         * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
         */
        public function getTeamSeasons(): \TYPO3\CMS\Extbase\Persistence\ObjectStorage
        {
            return $this->teamSeasons;
        }
        
        /**
         * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $teamSeasons
         */
        public function setTeamSeasons(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $teamSeasons): void
        {
            $this->teamSeasons = $teamSeasons;
        }
        
    }