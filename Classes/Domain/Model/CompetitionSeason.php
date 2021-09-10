<?php
    
    declare(strict_types=1);
    
    namespace ChristianKnell\Sportms\Domain\Model;
    
    use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

    /**
     * Competition
     */
    class CompetitionSeason extends AbstractEntity
    {
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Model\Competition
         */
        public $competition;
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Model\Season
         */
        protected $season;
        
        /**
         * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ChristianKnell\Sportms\Domain\Model\CompetitionSeasonGameday>
         * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
         */
        public $competitionSeasonGamedays;
        
        /**
         * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\ChristianKnell\Sportms\Domain\Model\TeamSeason>
         * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
         */
        public $competitionSeasonTeams;
        
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
        
        private static function compareTeamSeasons($a, $b): int
        {
            return strcasecmp($a->getTeam()->getLabel(), $b->getTeam()->getLabel());
        }
        
        /**
         * @return Competition
         */
        public function getCompetition(): Competition
        {
            return $this->competition;
        }
        
        /**
         * @param Competition $competition
         */
        public function setCompetition(Competition $competition)
        {
            $this->competition = $competition;
        }
        
        /**
         * @return \ChristianKnell\Sportms\Domain\Model\Season
         */
        public function getSeason(): \ChristianKnell\Sportms\Domain\Model\Season
        {
            return $this->season;
        }
        
        /**
         * @param \ChristianKnell\Sportms\Domain\Model\Season $season
         */
        public function setSeason(\ChristianKnell\Sportms\Domain\Model\Season $season)
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
        
        /**
         * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $competitionSeasonTeams
         */
        public function setCompetitionSeasonTeams($competitionSeasonTeams)
        {
            $this->competitionSeasonTeams = $competitionSeasonTeams;
        }
        
        private function orderCompetitionSeasonTeams($competitionSeasonTeams)
        {
            // write TeamSeason-Objects to a temporary array
            $temporaryArray = [];
            foreach ($competitionSeasonTeams as $competitionSeasonTeam) {
                $temporaryArray[] = $competitionSeasonTeam;
            }
            
            // Sort Objects in Array
            usort($temporaryArray,
                ["\\ChristianKnell\\Sportms\\Domain\\Model\\CompetitionSeason", "compareTeamSeasons"]);
            
            // create new ObjectStorage and add ordered TeamSeason-Objects
            $competitionSeasonTeamsOrdered = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
            foreach ($temporaryArray as $competitionSeasonTeam) {
                $competitionSeasonTeamsOrdered->attach($competitionSeasonTeam);
            }
            $this->setCompetitionSeasonTeams($competitionSeasonTeamsOrdered);
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