<?php
    
    namespace ChristianKnell\Sportms\Domain\Model;
    
    use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

    /**
     * TeamSeason
     */
    class TeamSeason extends AbstractEntity
    {
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Model\Team
         */
        protected $team;
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Model\Season
         */
        protected $season;
        
        /**
         * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ChristianKnell\Sportms\Domain\Model\TeamSeasonPractice>
         */
        protected $teamSeasonPractices;
        
        /**
         * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
         */
        protected $teamSeasonImages;
        
        /**
         * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ChristianKnell\Sportms\Domain\Model\TeamSeasonOfficial>
         */
        protected $teamSeasonOfficials;
        
        /**
         * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ChristianKnell\Sportms\Domain\Model\TeamSeasonOfficial>
         */
        protected $teamSeasonCheftrainers;
        
        /**
         * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ChristianKnell\Sportms\Domain\Model\TeamSeasonSquadMember>
         */
        protected $teamSeasonSquadMembers;
        
        /**
         * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ChristianKnell\Sportms\Domain\Model\PersonProfile>
         */
        protected $teamSeasonSquadCaptains;
        
        /**
         * @var    boolean
         */
        protected $detailLink;
        
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
            $this->setTeamSeasonPractices(\TYPO3\CMS\Extbase\Persistence\ObjectStorage());
            $this->setTeamSeasonImages(\TYPO3\CMS\Extbase\Persistence\ObjectStorage());
            $this->setTeamSeasonOfficials(\TYPO3\CMS\Extbase\Persistence\ObjectStorage());
            $this->setTeamSeasonCheftrainers(\TYPO3\CMS\Extbase\Persistence\ObjectStorage());
            $this->setTeamSeasonSquadMembers(\TYPO3\CMS\Extbase\Persistence\ObjectStorage());
            $this->setTeamSeasonSquadCaptains(\TYPO3\CMS\Extbase\Persistence\ObjectStorage());
        }
        
        /**
         * @return Team
         */
        public function getTeam()
        {
            return $this->team;
        }
        
        /**
         * @param Team $team
         */
        public function setTeam($team)
        {
            $this->team = $team;
        }
        
        /**
         * @return Season
         */
        public function getSeason()
        {
            return $this->season;
        }
        
        /**
         * @param Season $season
         */
        public function setSeason($season)
        {
            $this->season = $season;
        }
        
        /**
         * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
         */
        public function getTeamSeasonPractices()
        {
            return $this->teamSeasonPractices;
        }
        
        /**
         * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $teamSeasonPractices
         */
        public function setTeamSeasonPractices($teamSeasonPractices)
        {
            $this->teamSeasonPractices = $teamSeasonPractices;
        }
        
        /**
         * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
         */
        public function getTeamSeasonImages()
        {
            return $this->teamSeasonImages;
        }
        
        /**
         * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $teamSeasonImages
         */
        public function setTeamSeasonImages($teamSeasonImages)
        {
            $this->teamSeasonImages = $teamSeasonImages;
        }
        
        /**
         * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
         */
        public function getTeamSeasonCheftrainers(): \TYPO3\CMS\Extbase\Persistence\ObjectStorage
        {
            $teamSeasonOfficials = $this->getTeamSeasonOfficials();
            $teamSeasonCheftrainers = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
            foreach ($teamSeasonOfficials as $teamSeasonOfficial) {
                if ($teamSeasonOfficial->getOfficialJob()->isCheftrainerJob()) {
                    $teamSeasonCheftrainers->attach($teamSeasonOfficial);
                }
            }
            return $teamSeasonCheftrainers;
        }
        
        /**
         * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $teamSeasonCheftrainers
         */
        public function setTeamSeasonCheftrainers(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $teamSeasonCheftrainers
        ): void {
            $this->teamSeasonCheftrainers = $teamSeasonCheftrainers;
        }
        
        /**
         * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
         */
        public function getTeamSeasonOfficials()
        {
            return $this->teamSeasonOfficials;
        }
        
        /**
         * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $teamSeasonOfficials
         */
        public function setTeamSeasonOfficials($teamSeasonOfficials)
        {
            $this->teamSeasonOfficials = $teamSeasonOfficials;
        }
        
        /**
         * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
         */
        public function getTeamSeasonSquadMembers()
        {
            return $this->teamSeasonSquadMembers;
        }
        
        /**
         * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $teamSeasonSquadMembers
         */
        public function setTeamSeasonSquadMembers($teamSeasonSquadMembers)
        {
            $this->teamSeasonSquadMembers = $teamSeasonSquadMembers;
        }
        
        /**
         * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
         */
        public function getTeamSeasonSquadCaptains(): \TYPO3\CMS\Extbase\Persistence\ObjectStorage
        {
            return $this->teamSeasonSquadCaptains;
        }
        
        /**
         * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $teamSeasonSquadCaptains
         */
        public function setTeamSeasonSquadCaptains(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $teamSeasonSquadCaptains
        ): void {
            $this->teamSeasonSquadCaptains = $teamSeasonSquadCaptains;
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