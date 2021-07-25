<?php
    
    namespace Balumedien\Sportms\Domain\Model;
    
    /**
     * Competition
     */
    class CompetitionSeason extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
    {
        
        /**
         * @var \Balumedien\Sportms\Domain\Model\Competition
         */
        protected $competition;
        
        /**
         * @var \Balumedien\Sportms\Domain\Model\Season
         */
        protected $season;
        
        /**
         * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Sportms\Domain\Model\CompetitionSeasonGameday>
         * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
         */
        protected $competitionSeasonGamedays;
        
        /**
         * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Sportms\Domain\Model\TeamSeason>
         * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
         */
        protected $competitionSeasonTeams;
        
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
            $this->setCompetitionSeasonGamedays(new \TYPO3\CMS\Extbase\Persistence\ObjectStorage());
            $this->setCompetitionSeasonTeams(new \TYPO3\CMS\Extbase\Persistence\ObjectStorage());
        }
        
        /**
         * @return \Balumedien\Sportms\Domain\Model\Competition
         */
        public function getCompetition()
        {
            return $this->competition;
        }
        
        /**
         * @param \Balumedien\Sportms\Domain\Model\Competition $competition
         */
        public function setCompetition(\Balumedien\Sportms\Domain\Model\Competition $competition)
        {
            $this->competition = $competition;
        }
        
        /**
         * @return \Balumedien\Sportms\Domain\Model\Season
         */
        public function getSeason(): \Balumedien\Sportms\Domain\Model\Season
        {
            return $this->season;
        }
        
        /**
         * @param \Balumedien\Sportms\Domain\Model\Season $season
         */
        public function setSeason(\Balumedien\Sportms\Domain\Model\Season $season)
        {
            $this->season = $season;
        }
        
        /**
         * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
         */
        public function getCompetitionSeasonGamedays()
        {
            return $this->competitionSeasonGamedays;
        }
        
        /**
         * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $competitionSeasonGamedays
         */
        public function setCompetitionSeasonGamedays($competitionSeasonGamedays)
        {
            $this->competitionSeasonGamedays = $competitionSeasonGamedays;
        }
        
        /**
         * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
         */
        public function getCompetitionSeasonTeams()
        {
            $this->orderCompetitionSeasonTeams($this->competitionSeasonTeams);
            return $this->competitionSeasonTeams;
        }
    
        private function orderCompetitionSeasonTeams($competitionSeasonTeams)
        {
            // write TeamSeason-Objects to a temporary array
            $temporaryArray = [];
            foreach ($competitionSeasonTeams as $competitionSeasonTeam) {
                $temporaryArray[] = $competitionSeasonTeam;
            }
        
            // Sort Objects in Array
            usort($temporaryArray, ["\\Balumedien\\Sportms\\Domain\\Model\\CompetitionSeason", "compareTeamSeasons"]);
        
            // create new ObjectStorage and add ordered TeamSeason-Objects
            $competitionSeasonTeamsOrdered = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
            foreach ($temporaryArray as $competitionSeasonTeam) {
                $competitionSeasonTeamsOrdered->attach($competitionSeasonTeam);
            }
            $this->setCompetitionSeasonTeams($competitionSeasonTeamsOrdered);
        }
    
        private static function compareTeamSeasons($a, $b): int
        {
            return strcasecmp($a->getTeam()->getLabel(), $b->getTeam()->getLabel());
        }
        
        /**
         * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $competitionSeasonTeams
         */
        public function setCompetitionSeasonTeams($competitionSeasonTeams)
        {
            $this->competitionSeasonTeams = $competitionSeasonTeams;
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