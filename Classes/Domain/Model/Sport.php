<?php
    
    declare(strict_types=1);
    
    namespace ChristianKnell\Sportms\Domain\Model;
    
    /**
     * Sport
     */
    class Sport extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
    {
        
        /**
         * @var string
         */
        protected $label;
        
        /**
         * @var bool
         */
        protected $isTeamSport;
        
        /**
         * @var bool
         */
        protected $isIndividualSport;
        
        /**
         * sportTypes
         *
         * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ChristianKnell\Sportms\Domain\Model\SportType>
         */
        protected $sportTypes;
        
        /**
         * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ChristianKnell\Sportms\Domain\Model\SportAgeGroup>
         * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
         * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
         */
        protected $sportAgeGroups = '';
        
        /**
         * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ChristianKnell\Sportms\Domain\Model\SportPositionGroup>
         * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
         * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
         */
        protected $sportPositionGroups;
        
        /**
         * @var int|null
         */
        protected $competitionDetailPid;
        
        /**
         * @var int|null
         */
        protected $competitionListPid;
        
        /**
         * @var int|null
         */
        protected $gameDetailPid;
        
        /**
         * @var int|null
         */
        protected $gameListPid;
        
        /**
         * @var int|null
         */
        protected $teamDetailPid;
        
        /**
         * @var int|null
         */
        protected $teamListPid;
        
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
            $this->setSportTypes(new \TYPO3\CMS\Extbase\Persistence\ObjectStorage());
            $this->setSportAgeGroups(new \TYPO3\CMS\Extbase\Persistence\ObjectStorage());
            $this->setSportPositionGroups(new \TYPO3\CMS\Extbase\Persistence\ObjectStorage());
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
        public function isTeamSport(): bool
        {
            return $this->isTeamSport;
        }
        
        /**
         * @param bool $isTeamSport
         */
        public function setIsTeamSport(bool $isTeamSport): void
        {
            $this->isTeamSport = $isTeamSport;
        }
        
        /**
         * @return bool
         */
        public function isIndividualSport(): bool
        {
            return $this->isIndividualSport;
        }
        
        /**
         * @param bool $isIndividualSport
         */
        public function setIsIndividualSport(bool $isIndividualSport): void
        {
            $this->isIndividualSport = $isIndividualSport;
        }
        
        /**
         * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
         */
        public function getSportTypes(): \TYPO3\CMS\Extbase\Persistence\ObjectStorage
        {
            return $this->sportTypes;
        }
        
        /**
         * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $sportTypes
         */
        public function setSportTypes(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $sportTypes): void
        {
            $this->sportTypes = $sportTypes;
        }
        
        /**
         * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
         */
        public function getSportAgeGroups(): \TYPO3\CMS\Extbase\Persistence\ObjectStorage
        {
            return $this->sportAgeGroups;
        }
        
        /**
         * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $sportAgeGroups
         */
        public function setSportAgeGroups(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $sportAgeGroups): void
        {
            $this->sportAgeGroups = $sportAgeGroups;
        }
        
        /**
         * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
         */
        public function getSportPositionGroups(): \TYPO3\CMS\Extbase\Persistence\ObjectStorage
        {
            return $this->sportPositionGroups;
        }
        
        /**
         * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $sportPositionGroups
         */
        public function setSportPositionGroups(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $sportPositionGroups): void
        {
            $this->sportPositionGroups = $sportPositionGroups;
        }
        
        /**
         * @return int|null
         */
        public function getCompetitionDetailPid(): ?int
        {
            return $this->competitionDetailPid;
        }
        
        /**
         * @param int|null $competitionDetailPid
         */
        public function setCompetitionDetailPid(?int $competitionDetailPid): void
        {
            $this->competitionDetailPid = $competitionDetailPid;
        }
        
        /**
         * @return int|null
         */
        public function getCompetitionListPid(): ?int
        {
            return $this->competitionListPid;
        }
        
        /**
         * @param int|null $competitionListPid
         */
        public function setCompetitionListPid(?int $competitionListPid): void
        {
            $this->competitionListPid = $competitionListPid;
        }
        
        /**
         * @return int|null
         */
        public function getGameDetailPid(): ?int
        {
            return $this->gameDetailPid;
        }
        
        /**
         * @param int|null $gameDetailPid
         */
        public function setGameDetailPid(?int $gameDetailPid): void
        {
            $this->gameDetailPid = $gameDetailPid;
        }
        
        /**
         * @return int|null
         */
        public function getGameListPid(): ?int
        {
            return $this->gameListPid;
        }
        
        /**
         * @param int|null $gameListPid
         */
        public function setGameListPid(?int $gameListPid): void
        {
            $this->gameListPid = $gameListPid;
        }
        
        /**
         * @return int|null
         */
        public function getTeamDetailPid(): ?int
        {
            return $this->teamDetailPid;
        }
        
        /**
         * @param int|null $teamDetailPid
         */
        public function setTeamDetailPid(?int $teamDetailPid): void
        {
            $this->teamDetailPid = $teamDetailPid;
        }
        
        /**
         * @return int|null
         */
        public function getTeamListPid(): ?int
        {
            return $this->teamListPid;
        }
        
        /**
         * @param int|null $teamListPid
         */
        public function setTeamListPid(?int $teamListPid): void
        {
            $this->teamListPid = $teamListPid;
        }
        
    }