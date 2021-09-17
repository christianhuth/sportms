<?php
    
    declare(strict_types=1);
    
    namespace ChristianKnell\Sportms\Domain\Model;
    
    /**
     * Team
     */
    class Team extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
    {
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Model\Club
         */
        protected $club;
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Model\Sport
         */
        protected $sport;
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Model\SportAgeGroup
         */
        protected $sportAgeGroup;
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Model\SportAgeLevel
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
         * @var int|null
         */
        protected $detailPid;
        
        /**
         * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ChristianKnell\Sportms\Domain\Model\TeamSeason>
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
         * @return \ChristianKnell\Sportms\Domain\Model\Club
         */
        public function getClub(): \ChristianKnell\Sportms\Domain\Model\Club
        {
            return $this->club;
        }
        
        /**
         * @param \ChristianKnell\Sportms\Domain\Model\Club $club
         */
        public function setClub(\ChristianKnell\Sportms\Domain\Model\Club $club): void
        {
            $this->club = $club;
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
         * @return \ChristianKnell\Sportms\Domain\Model\SportAgeGroup
         */
        public function getSportAgeGroup(): \ChristianKnell\Sportms\Domain\Model\SportAgeGroup
        {
            return $this->sportAgeGroup;
        }
        
        /**
         * @param \ChristianKnell\Sportms\Domain\Model\SportAgeGroup $sportAgeGroup
         */
        public function setSportAgeGroup(\ChristianKnell\Sportms\Domain\Model\SportAgeGroup $sportAgeGroup): void
        {
            $this->sportAgeGroup = $sportAgeGroup;
        }
        
        /**
         * @return \ChristianKnell\Sportms\Domain\Model\SportAgeLevel
         */
        public function getSportAgeLevel(): \ChristianKnell\Sportms\Domain\Model\SportAgeLevel
        {
            return $this->sportAgeLevel;
        }
        
        /**
         * @param \ChristianKnell\Sportms\Domain\Model\SportAgeLevel $sportAgeLevel
         */
        public function setSportAgeLevel(\ChristianKnell\Sportms\Domain\Model\SportAgeLevel $sportAgeLevel): void
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
         * @return int|null
         */
        public function getDetailPid(): ?int
        {
            return $this->detailPid;
        }
        
        /**
         * @param int|null $detailPid
         */
        public function setDetailPid(?int $detailPid): void
        {
            $this->detailPid = $detailPid;
        }
        
        /**
         * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
         */
        public function getTeamSeasons(): \TYPO3\CMS\Extbase\Persistence\ObjectStorage
        {
            $teamSeasons = $this->teamSeasons;
            $objectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
            foreach ($teamSeasons as $teamSeason) {
                if (!$teamSeason->isHidden()) {
                    $objectStorage->attach($teamSeason);
                }
            }
            return $objectStorage;
        }
        
        /**
         * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $teamSeasons
         */
        public function setTeamSeasons(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $teamSeasons): void
        {
            $this->teamSeasons = $teamSeasons;
        }
        
    }