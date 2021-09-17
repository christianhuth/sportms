<?php
    
    declare(strict_types=1);
    
    namespace ChristianKnell\Sportms\Domain\Model;
    
    use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
    use TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy;
    use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
    
    /**
     * Game
     */
    class Game extends AbstractEntity
    {
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Model\Sport
         */
        protected $sport;
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Model\Season
         */
        protected $season;
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Model\CompetitionSeason
         */
        protected $competitionSeason;
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Model\TeamSeason
         */
        protected $teamSeasonHome;
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Model\TeamSeason
         */
        protected $teamSeasonGuest;
        
        /**
         * @var int|null
         */
        protected $gameAppointment;
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Model\CompetitionSeasonGameday|null
         */
        protected $gameday;
        
        /**
         * @var int|null
         */
        protected $date;
        
        /**
         * @var string
         */
        protected $time;
        
        /**
         * @var Venue
         */
        protected $venue;
        
        /**
         * @var int
         */
        protected $spectators;
        
        /**
         * @var int
         */
        protected $periodCount;
        
        /**
         * @var int
         */
        protected $periodDuration;
        
        /**
         * @var ObjectStorage<\ChristianKnell\Sportms\Domain\Model\GamePeriod>
         * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
         * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
         */
        protected $gamePeriods;
        
        /**
         * @var int
         */
        protected $gameRating;
        
        /**
         * @var int
         */
        protected $resultSpecialHome;
        
        /**
         * @var int
         */
        protected $resultSpecialGuest;
        
        /**
         * @var int
         */
        protected $resultSpecialReason;
        
        /**
         * @var int
         */
        protected $resultEndRegularHome;
        
        /**
         * @var int
         */
        protected $resultEndRegularGuest;
        
        /**
         * @var boolean
         */
        protected $resultEndAdditional;
        
        /**
         * @var int
         */
        protected $resultEndOvertimeHome;
        
        /**
         * @var int
         */
        protected $resultEndOvertimeGuest;
        
        /**
         * @var int
         */
        protected $resultEndPenaltyHome;
        
        /**
         * @var int
         */
        protected $resultEndPenaltyGuest;
        
        /**
         * @var int
         */
        protected $resultType;
        
        /**
         * @var int
         */
        protected $resultHalfsFirstHome;
        
        /**
         * @var int
         */
        protected $resultHalfsFirstGuest;
        
        /**
         * @var int
         */
        protected $resultHalfsSecondHome;
        
        /**
         * @var int
         */
        protected $resultHalfsSecondGuest;
        
        /**
         * @var int
         */
        protected $resultThirdsFirstHome;
        
        /**
         * @var int
         */
        protected $resultThirdsFirstGuest;
        
        /**
         * @var int
         */
        protected $resultThirdsSecondHome;
        
        /**
         * @var int
         */
        protected $resultThirdsSecondGuest;
        
        /**
         * @var int
         */
        protected $resultThirdsThirdHome;
        
        /**
         * @var int
         */
        protected $resultThirdsThirdGuest;
        
        /**
         * @var int
         */
        protected $resultFourthsFirstHome;
        
        /**
         * @var int
         */
        protected $resultFourthsFirstGuest;
        
        /**
         * @var int
         */
        protected $resultFourthsSecondHome;
        
        /**
         * @var int
         */
        protected $resultFourthsSecondGuest;
        
        /**
         * @var int
         */
        protected $resultFourthsThirdHome;
        
        /**
         * @var int
         */
        protected $resultFourthsThirdGuest;
        
        /**
         * @var int
         */
        protected $resultFourthsFourthHome;
        
        /**
         * @var int
         */
        protected $resultFourthsFourthGuest;
        
        /**
         * @var ObjectStorage<\ChristianKnell\Sportms\Domain\Model\GameResultSet>
         * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
         * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
         */
        protected $resultSets;
        
        /**
         * @var ObjectStorage<\ChristianKnell\Sportms\Domain\Model\GameLineup>
         * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
         * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
         */
        protected $gameLineupHomeStarts;
        
        /**
         * @var ObjectStorage<\ChristianKnell\Sportms\Domain\Model\GameLineup>
         * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
         * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
         */
        protected $gameLineupHomeSubstitutes;
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Model\Person
         */
        protected $captainHome;
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Model\TeamSeasonOfficial
         */
        protected $trainerHome;
        
        /**
         * @var ObjectStorage<\ChristianKnell\Sportms\Domain\Model\TeamSeasonOfficial>
         */
        protected $trainerHomeInGame;
        
        /**
         * @var ObjectStorage<\ChristianKnell\Sportms\Domain\Model\GameLineup>
         * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
         * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
         */
        protected $gameLineupGuestStarts;
        
        /**
         * @var ObjectStorage<\ChristianKnell\Sportms\Domain\Model\GameLineup>
         * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
         * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
         */
        protected $gameLineupGuestSubstitutes;
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Model\Person
         */
        protected $captainGuest;
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Model\TeamSeasonOfficial
         */
        protected $trainerGuest;
        
        /**
         * @var ObjectStorage<\ChristianKnell\Sportms\Domain\Model\TeamSeasonOfficial>
         */
        protected $trainerGuestInGame;
        
        /**
         * @var ObjectStorage<\ChristianKnell\Sportms\Domain\Model\GameChange>
         * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
         * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
         */
        protected $gameChanges;
        
        /**
         * @var ObjectStorage<\ChristianKnell\Sportms\Domain\Model\GameGoal>
         * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
         * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
         */
        protected $gameGoals;
        
        /**
         * @var ObjectStorage<\ChristianKnell\Sportms\Domain\Model\GamePunishment>
         * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
         * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
         */
        protected $gamePunishments;
        
        /**
         * @var ObjectStorage<\ChristianKnell\Sportms\Domain\Model\GameReferee>
         * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
         * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
         */
        protected $gameReferees;
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Model\GameReport
         * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
         * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
         */
        protected $gameReport;
        
        /**
         * @var boolean
         */
        protected $detailLink;
        
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
            $this->setResultSets(new ObjectStorage());
            $this->setGameLineupHomeStarts(new ObjectStorage());
            $this->setGameLineupHomeSubstitutes(new ObjectStorage());
            $this->setGameLineupGuestStarts(new ObjectStorage());
            $this->setGameLineupGuestSubstitutes(new ObjectStorage());
            $this->setGameChanges(new ObjectStorage());
            $this->setGameGoals(new ObjectStorage());
            $this->setGameReferees(new ObjectStorage());
        }
        
        private static function compareGameGoals($a, $b): int
        {
            if ($a->getMinute() < $b->getMinute()) {
                $retVal = -1;
            } else {
                if ($a->getMinute() == $b->getMinute()) {
                    $retVal = 0;
                } else {
                    $retVal = 1;
                }
            }
            return $retVal;
        }
        
        /**
         * @return Sport
         */
        public function getSport()
        {
            return $this->sport;
        }
        
        /**
         * @param Sport $sport
         */
        public function setSport($sport): void
        {
            $this->sport = $sport;
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
        public function setSeason($season): void
        {
            $this->season = $season;
        }
        
        /**
         * @return CompetitionSeason
         */
        public function getCompetitionSeason(): CompetitionSeason
        {
            return $this->competitionSeason;
        }
        
        /**
         * @param CompetitionSeason $competitionSeason
         */
        public function setCompetitionSeason(CompetitionSeason $competitionSeason): void
        {
            $this->competitionSeason = $competitionSeason;
        }
        
        /**
         * @return int|null
         */
        public function getGameAppointment(): ?int
        {
            return $this->gameAppointment;
        }
        
        /**
         * @param int|null $gameAppointment
         */
        public function setGameAppointment(?int $gameAppointment): void
        {
            $this->gameAppointment = $gameAppointment;
        }
        
        /**
         * @return CompetitionSeasonGameday|null
         */
        public function getGameday()
        {
            return $this->gameday;
        }
        
        /**
         * @param CompetitionSeasonGameday|null $gameday
         */
        public function setGameday(?CompetitionSeasonGameday $gameday): void
        {
            $this->gameday = $gameday;
        }
        
        /**
         * @return string
         */
        public function getTime(): string
        {
            return $this->time;
        }
        
        /**
         * @param string $time
         */
        public function setTime(string $time): void
        {
            $this->time = $time;
        }
        
        /**
         * @return Venue|LazyLoadingProxy|null
         */
        public function getVenue()
        {
            return $this->venue;
        }
        
        /**
         * @param Venue|LazyLoadingProxy|null $venue
         */
        public function setVenue($venue): void
        {
            $this->venue = $venue;
        }
        
        /**
         * @return int|null
         */
        public function getSpectators(): ?int
        {
            return $this->spectators;
        }
        
        /**
         * @param int|null $spectators
         */
        public function setSpectators(?int $spectators): void
        {
            $this->spectators = $spectators;
        }
        
        /**
         * @return int|null
         */
        public function getPeriodCount(): ?int
        {
            return $this->periodCount;
        }
        
        /**
         * @param int|null $periodCount
         */
        public function setPeriodCount(?int $periodCount): void
        {
            $this->periodCount = $periodCount;
        }
        
        /**
         * @return int|null
         */
        public function getPeriodDuration(): ?int
        {
            return $this->periodDuration;
        }
        
        /**
         * @param int|null $periodDuration
         */
        public function setPeriodDuration(?int $periodDuration): void
        {
            $this->periodDuration = $periodDuration;
        }
        
        /**
         * @return LazyLoadingProxy|ObjectStorage|null
         */
        public function getGamePeriods()
        {
            return $this->gamePeriods;
        }
        
        /**
         * @param LazyLoadingProxy|ObjectStorage|null $gamePeriods
         */
        public function setGamePeriods($gamePeriods): void
        {
            $this->gamePeriods = $gamePeriods;
        }
        
        /**
         * @return int|null
         */
        public function getGameRating(): ?int
        {
            return $this->gameRating;
        }
        
        /**
         * @param int|null $gameRating
         */
        public function setGameRating(?int $gameRating): void
        {
            $this->gameRating = $gameRating;
        }
        
        /**
         * @return int|null
         */
        public function getResultSpecialHome(): ?int
        {
            return $this->resultSpecialHome;
        }
        
        /**
         * @param int|null $resultSpecialHome
         */
        public function setResultSpecialHome(?int $resultSpecialHome): void
        {
            $this->resultSpecialHome = $resultSpecialHome;
        }
        
        /**
         * @return int|null
         */
        public function getResultSpecialGuest(): ?int
        {
            return $this->resultSpecialGuest;
        }
        
        /**
         * @param int|null $resultSpecialGuest
         */
        public function setResultSpecialGuest(?int $resultSpecialGuest): void
        {
            $this->resultSpecialGuest = $resultSpecialGuest;
        }
        
        /**
         * @return int|null
         */
        public function getResultSpecialReason(): ?int
        {
            return $this->resultSpecialReason;
        }
        
        /**
         * @param int|null $resultSpecialReason
         */
        public function setResultSpecialReason(?int $resultSpecialReason): void
        {
            $this->resultSpecialReason = $resultSpecialReason;
        }
        
        /**
         * @return int|null
         */
        public function getResultEndRegularHome(): ?int
        {
            return $this->resultEndRegularHome;
        }
        
        /**
         * @param int|null $resultEndRegularHome
         */
        public function setResultEndRegularHome(?int $resultEndRegularHome): void
        {
            $this->resultEndRegularHome = $resultEndRegularHome;
        }
        
        /**
         * @return int|null
         */
        public function getResultEndRegularGuest(): ?int
        {
            return $this->resultEndRegularGuest;
        }
        
        /**
         * @param int|null $resultEndRegularGuest
         */
        public function setResultEndRegularGuest(?int $resultEndRegularGuest): void
        {
            $this->resultEndRegularGuest = $resultEndRegularGuest;
        }
        
        /**
         * @return bool
         */
        public function isResultEndAdditional(): bool
        {
            return $this->resultEndAdditional;
        }
        
        /**
         * @param bool $resultEndAdditional
         */
        public function setResultEndAdditional(bool $resultEndAdditional): void
        {
            $this->resultEndAdditional = $resultEndAdditional;
        }
        
        /**
         * @return int|null
         */
        public function getResultEndOvertimeHome(): ?int
        {
            return $this->resultEndOvertimeHome;
        }
        
        /**
         * @param int|null $resultEndOvertimeHome
         */
        public function setResultEndOvertimeHome(?int $resultEndOvertimeHome): void
        {
            $this->resultEndOvertimeHome = $resultEndOvertimeHome;
        }
        
        /**
         * @return int|null
         */
        public function getResultEndOvertimeGuest(): ?int
        {
            return $this->resultEndOvertimeGuest;
        }
        
        /**
         * @param int|null $resultEndOvertimeGuest
         */
        public function setResultEndOvertimeGuest(?int $resultEndOvertimeGuest): void
        {
            $this->resultEndOvertimeGuest = $resultEndOvertimeGuest;
        }
        
        /**
         * @return int|null
         */
        public function getResultEndPenaltyHome(): ?int
        {
            return $this->resultEndPenaltyHome;
        }
        
        /**
         * @param int|null $resultEndPenaltyHome
         */
        public function setResultEndPenaltyHome(?int $resultEndPenaltyHome): void
        {
            $this->resultEndPenaltyHome = $resultEndPenaltyHome;
        }
        
        /**
         * @return int|null
         */
        public function getResultEndPenaltyGuest(): ?int
        {
            return $this->resultEndPenaltyGuest;
        }
        
        /**
         * @param int|null $resultEndPenaltyGuest
         */
        public function setResultEndPenaltyGuest(?int $resultEndPenaltyGuest): void
        {
            $this->resultEndPenaltyGuest = $resultEndPenaltyGuest;
        }
        
        /**
         * @return int
         */
        public function getResultType(): int
        {
            return $this->resultType;
        }
        
        /**
         * @param int $resultType
         */
        public function setResultType(int $resultType): void
        {
            $this->resultType = $resultType;
        }
        
        /**
         * @return int|null
         */
        public function getResultHalfsFirstHome(): ?int
        {
            return $this->resultHalfsFirstHome;
        }
        
        /**
         * @param int|null $resultHalfsFirstHome
         */
        public function setResultHalfsFirstHome(?int $resultHalfsFirstHome): void
        {
            $this->resultHalfsFirstHome = $resultHalfsFirstHome;
        }
        
        /**
         * @return int|null
         */
        public function getResultHalfsFirstGuest(): ?int
        {
            return $this->resultHalfsFirstGuest;
        }
        
        /**
         * @param int|null $resultHalfsFirstGuest
         */
        public function setResultHalfsFirstGuest(?int $resultHalfsFirstGuest): void
        {
            $this->resultHalfsFirstGuest = $resultHalfsFirstGuest;
        }
        
        /**
         * @return int|null
         */
        public function getResultHalfsSecondHome(): ?int
        {
            return $this->resultHalfsSecondHome;
        }
        
        /**
         * @param int|null $resultHalfsSecondHome
         */
        public function setResultHalfsSecondHome(?int $resultHalfsSecondHome): void
        {
            $this->resultHalfsSecondHome = $resultHalfsSecondHome;
        }
        
        /**
         * @return int|null
         */
        public function getResultHalfsSecondGuest(): ?int
        {
            return $this->resultHalfsSecondGuest;
        }
        
        /**
         * @param int|null $resultHalfsSecondGuest
         */
        public function setResultHalfsSecondGuest(?int $resultHalfsSecondGuest): void
        {
            $this->resultHalfsSecondGuest = $resultHalfsSecondGuest;
        }
        
        /**
         * @return int|null
         */
        public function getResultThirdsFirstHome(): ?int
        {
            return $this->resultThirdsFirstHome;
        }
        
        /**
         * @param int|null $resultThirdsFirstHome
         */
        public function setResultThirdsFirstHome(?int $resultThirdsFirstHome): void
        {
            $this->resultThirdsFirstHome = $resultThirdsFirstHome;
        }
        
        /**
         * @return int|null
         */
        public function getResultThirdsFirstGuest(): ?int
        {
            return $this->resultThirdsFirstGuest;
        }
        
        /**
         * @param int|null $resultThirdsFirstGuest
         */
        public function setResultThirdsFirstGuest(?int $resultThirdsFirstGuest): void
        {
            $this->resultThirdsFirstGuest = $resultThirdsFirstGuest;
        }
        
        /**
         * @return int|null
         */
        public function getResultThirdsSecondHome(): ?int
        {
            return $this->resultThirdsSecondHome;
        }
        
        /**
         * @param int|null $resultThirdsSecondHome
         */
        public function setResultThirdsSecondHome(?int $resultThirdsSecondHome): void
        {
            $this->resultThirdsSecondHome = $resultThirdsSecondHome;
        }
        
        /**
         * @return int|null
         */
        public function getResultThirdsSecondGuest(): ?int
        {
            return $this->resultThirdsSecondGuest;
        }
        
        /**
         * @param int|null $resultThirdsSecondGuest
         */
        public function setResultThirdsSecondGuest(?int $resultThirdsSecondGuest): void
        {
            $this->resultThirdsSecondGuest = $resultThirdsSecondGuest;
        }
        
        /**
         * @return int|null
         */
        public function getResultThirdsThirdHome(): ?int
        {
            return $this->resultThirdsThirdHome;
        }
        
        /**
         * @param int|null $resultThirdsThirdHome
         */
        public function setResultThirdsThirdHome(?int $resultThirdsThirdHome): void
        {
            $this->resultThirdsThirdHome = $resultThirdsThirdHome;
        }
        
        /**
         * @return int|null
         */
        public function getResultThirdsThirdGuest(): ?int
        {
            return $this->resultThirdsThirdGuest;
        }
        
        /**
         * @param int|null $resultThirdsThirdGuest
         */
        public function setResultThirdsThirdGuest(?int $resultThirdsThirdGuest): void
        {
            $this->resultThirdsThirdGuest = $resultThirdsThirdGuest;
        }
        
        /**
         * @return int|null
         */
        public function getResultFourthsFirstHome(): ?int
        {
            return $this->resultFourthsFirstHome;
        }
        
        /**
         * @param int|null $resultFourthsFirstHome
         */
        public function setResultFourthsFirstHome(?int $resultFourthsFirstHome): void
        {
            $this->resultFourthsFirstHome = $resultFourthsFirstHome;
        }
        
        /**
         * @return int|null
         */
        public function getResultFourthsFirstGuest(): ?int
        {
            return $this->resultFourthsFirstGuest;
        }
        
        /**
         * @param int|null $resultFourthsFirstGuest
         */
        public function setResultFourthsFirstGuest(?int $resultFourthsFirstGuest): void
        {
            $this->resultFourthsFirstGuest = $resultFourthsFirstGuest;
        }
        
        /**
         * @return int|null
         */
        public function getResultFourthsSecondHome(): ?int
        {
            return $this->resultFourthsSecondHome;
        }
        
        /**
         * @param int|null $resultFourthsSecondHome
         */
        public function setResultFourthsSecondHome(?int $resultFourthsSecondHome): void
        {
            $this->resultFourthsSecondHome = $resultFourthsSecondHome;
        }
        
        /**
         * @return int|null
         */
        public function getResultFourthsSecondGuest(): ?int
        {
            return $this->resultFourthsSecondGuest;
        }
        
        /**
         * @param int|null $resultFourthsSecondGuest
         */
        public function setResultFourthsSecondGuest(?int $resultFourthsSecondGuest): void
        {
            $this->resultFourthsSecondGuest = $resultFourthsSecondGuest;
        }
        
        /**
         * @return int|null
         */
        public function getResultFourthsThirdHome(): ?int
        {
            return $this->resultFourthsThirdHome;
        }
        
        /**
         * @param int|null $resultFourthsThirdHome
         */
        public function setResultFourthsThirdHome(?int $resultFourthsThirdHome): void
        {
            $this->resultFourthsThirdHome = $resultFourthsThirdHome;
        }
        
        /**
         * @return int|null
         */
        public function getResultFourthsThirdGuest(): ?int
        {
            return $this->resultFourthsThirdGuest;
        }
        
        /**
         * @param int|null $resultFourthsThirdGuest
         */
        public function setResultFourthsThirdGuest(?int $resultFourthsThirdGuest): void
        {
            $this->resultFourthsThirdGuest = $resultFourthsThirdGuest;
        }
        
        /**
         * @return int|null
         */
        public function getResultFourthsFourthHome(): ?int
        {
            return $this->resultFourthsFourthHome;
        }
        
        /**
         * @param int|null $resultFourthsFourthHome
         */
        public function setResultFourthsFourthHome(?int $resultFourthsFourthHome): void
        {
            $this->resultFourthsFourthHome = $resultFourthsFourthHome;
        }
        
        /**
         * @return int|null
         */
        public function getResultFourthsFourthGuest(): ?int
        {
            return $this->resultFourthsFourthGuest;
        }
        
        /**
         * @param int|null $resultFourthsFourthGuest
         */
        public function setResultFourthsFourthGuest(?int $resultFourthsFourthGuest): void
        {
            $this->resultFourthsFourthGuest = $resultFourthsFourthGuest;
        }
        
        /**
         * @return LazyLoadingProxy|ObjectStorage|null
         */
        public function getResultSets()
        {
            return $this->resultSets;
        }
        
        /**
         * @param LazyLoadingProxy|ObjectStorage|null $resultSets
         */
        public function setResultSets($resultSets): void
        {
            $this->resultSets = $resultSets;
        }
        
        /**
         * @return LazyLoadingProxy|ObjectStorage|null
         */
        public function getGameLineupHomeStarts()
        {
            return $this->gameLineupHomeStarts;
        }
        
        /**
         * @param LazyLoadingProxy|ObjectStorage|null $gameLineupHomeStarts
         */
        public function setGameLineupHomeStarts($gameLineupHomeStarts): void
        {
            $this->gameLineupHomeStarts = $gameLineupHomeStarts;
        }
        
        /**
         * @return LazyLoadingProxy|ObjectStorage|null
         */
        public function getGameLineupHomeSubstitutes()
        {
            return $this->gameLineupHomeSubstitutes;
        }
        
        /**
         * @param LazyLoadingProxy|ObjectStorage|null $gameLineupHomeSubstitutes
         */
        public function setGameLineupHomeSubstitutes($gameLineupHomeSubstitutes): void
        {
            $this->gameLineupHomeSubstitutes = $gameLineupHomeSubstitutes;
        }
        
        /**
         * @return Person|null
         */
        public function getCaptainHome(): ?Person
        {
            return $this->captainHome;
        }
        
        /**
         * @param Person|null $captainHome
         */
        public function setCaptainHome(?Person $captainHome): void
        {
            $this->captainHome = $captainHome;
        }
        
        /**
         * @return ObjectStorage|null
         */
        public function getTrainerHomeInGame(): ?ObjectStorage
        {
            if ($this->getTrainerHome() > 0) {
                $objectStorage = new ObjectStorage();
                $objectStorage->attach($this->getTrainerHome());
                return $objectStorage;
            } else {
                $teamSeasonHome = $this->getTeamSeasonHome();
                return $teamSeasonHome->getTeamSeasonCheftrainerByDate($this->getDate());
            }
        }
        
        /**
         * @param Person $trainerHomeInGame
         */
        public function setTrainerHomeInGame(Person $trainerHomeInGame): void
        {
            $this->trainerHomeInGame = $trainerHomeInGame;
        }
        
        /**
         * @return TeamSeasonOfficial
         */
        public function getTrainerHome(): ?TeamSeasonOfficial
        {
            return $this->trainerHome;
        }
        
        /**
         * @param TeamSeasonOfficial $trainerHome
         */
        public function setTrainerHome(TeamSeasonOfficial $trainerHome): void
        {
            $this->trainerHome = $trainerHome;
        }
        
        /**
         * @return TeamSeason
         */
        public function getTeamSeasonHome(): TeamSeason
        {
            return $this->teamSeasonHome;
        }
        
        /**
         * @param TeamSeason $teamSeasonHome
         */
        public function setTeamSeasonHome(TeamSeason $teamSeasonHome): void
        {
            $this->teamSeasonHome = $teamSeasonHome;
        }
        
        /**
         * @return int|null
         */
        public function getDate(): ?int
        {
            return $this->date;
        }
        
        /**
         * @param int|null $date
         */
        public function setDate(?int $date): void
        {
            $this->date = $date;
        }
        
        /**
         * @return LazyLoadingProxy|ObjectStorage|null
         */
        public function getGameLineupGuestStarts()
        {
            return $this->gameLineupGuestStarts;
        }
        
        /**
         * @param LazyLoadingProxy|ObjectStorage|null $gameLineupGuestStarts
         */
        public function setGameLineupGuestStarts($gameLineupGuestStarts): void
        {
            $this->gameLineupGuestStarts = $gameLineupGuestStarts;
        }
        
        /**
         * @return LazyLoadingProxy|ObjectStorage|null
         */
        public function getGameLineupGuestSubstitutes()
        {
            return $this->gameLineupGuestSubstitutes;
        }
        
        /**
         * @param LazyLoadingProxy|ObjectStorage|null $gameLineupGuestSubstitutes
         */
        public function setGameLineupGuestSubstitutes($gameLineupGuestSubstitutes): void
        {
            $this->gameLineupGuestSubstitutes = $gameLineupGuestSubstitutes;
        }
        
        /**
         * @return Person|null
         */
        public function getCaptainGuest(): ?Person
        {
            return $this->captainGuest;
        }
        
        /**
         * @param Person|null $captainGuest
         */
        public function setCaptainGuest(?Person $captainGuest): void
        {
            $this->captainGuest = $captainGuest;
        }
        
        /**
         * @return ObjectStorage|null
         */
        public function getTrainerGuestInGame(): ?ObjectStorage
        {
            if ($this->getTrainerGuest() > 0) {
                $objectStorage = new ObjectStorage();
                $objectStorage->attach($this->getTrainerGuest());
                return $objectStorage;
            } else {
                $teamSeasonGuest = $this->getTeamSeasonGuest();
                return $teamSeasonGuest->getTeamSeasonCheftrainerByDate($this->getDate());
            }
        }
        
        /**
         * @param Person $trainerGuestInGame
         */
        public function setTrainerGuestInGame(Person $trainerGuestInGame): void
        {
            $this->trainerGuestInGame = $trainerGuestInGame;
        }
        
        /**
         * @return TeamSeasonOfficial
         */
        public function getTrainerGuest(): ?TeamSeasonOfficial
        {
            return $this->trainerGuest;
        }
        
        /**
         * @param TeamSeasonOfficial $trainerGuest
         */
        public function setTrainerGuest(TeamSeasonOfficial $trainerGuest): void
        {
            $this->trainerGuest = $trainerGuest;
        }
        
        /**
         * @return TeamSeason
         */
        public function getTeamSeasonGuest(): TeamSeason
        {
            return $this->teamSeasonGuest;
        }
        
        /**
         * @param TeamSeason $teamSeasonGuest
         */
        public function setTeamSeasonGuest(TeamSeason $teamSeasonGuest): void
        {
            $this->teamSeasonGuest = $teamSeasonGuest;
        }
        
        /**
         * @return LazyLoadingProxy|ObjectStorage|null
         */
        public function getGameChanges(): ?ObjectStorage
        {
            return $this->orderGameChanges($this->gameChanges);
        }
        
        /**
         * @param ObjectStorage|null $gameChanges
         */
        private function orderGameChanges(?ObjectStorage $gameChanges): ?ObjectStorage
        {
            // convert ObjectStorage to array
            if(!is_null($gameChanges)) {
                $gameChangesAsArray = $gameChanges->toArray();
                // new ObjectStorage, where we will append the ordered GameChanges
                $orderedGameChanges = new ObjectStorage();
    
                // sort the array with the game changes
                # a - b = ASC
                # b - a = DESC
                usort($gameChangesAsArray, static function ($a, $b) {
                    if($a->getMinute() > $b->getMinute()) {
                        return 1;
                    } else {
                        return -1;
                    }
                });
    
                // convert ordered array to ObjectStorage
                foreach($gameChangesAsArray AS $gameChangeAsArray) {
                    $orderedGameChanges->attach($gameChangeAsArray);
                }
                return $orderedGameChanges;
            } else {
                return $gameChanges;
            }
        }
        
        /**
         * @param LazyLoadingProxy|ObjectStorage|null $gameChanges
         */
        public function setGameChanges($gameChanges): void
        {
            $this->gameChanges = $gameChanges;
        }
        
        /**
         * Adds a GameGoal
         *
         * @param \ChristianKnell\Sportms\Domain\Model\GameGoal $gameGoal
         * @return void
         */
        public function addGameGoal(\ChristianKnell\Sportms\Domain\Model\GameGoal $gameGoal)
        {
            $this->gameGoals->attach($gameGoal);
        }
        
        /**
         * @return LazyLoadingProxy|ObjectStorage|null
         */
        public function getGameGoals()
        {
            $this->orderGameGoals($this->gameGoals);
            return $this->gameGoals;
        }
        
        /**
         * @param LazyLoadingProxy|ObjectStorage|null $gameGoals
         */
        public function setGameGoals($gameGoals): void
        {
            $this->gameGoals = $gameGoals;
        }
        
        private function orderGameGoals($gameGoals)
        {
            // write GameGoal-Objects to a temporary array
            $temporaryArray = [];
            foreach ($gameGoals as $gameGoal) {
                $temporaryArray[] = $gameGoal;
            }
            
            // Sort Objects in Array
            usort($temporaryArray, ["\\ChristianKnell\\Sportms\\Domain\\Model\\Game", "compareGameGoals"]);
            
            // create new ObjectStorage and add ordered GameGoal-Objects
            $gameGoalsOrdered = new ObjectStorage();
            foreach ($temporaryArray as $gameGoal) {
                $gameGoalsOrdered->attach($gameGoal);
            }
            $this->setGameGoals($gameGoalsOrdered);
        }
        
        /**
         * @return LazyLoadingProxy|ObjectStorage|null
         */
        public function getGamePunishments()
        {
            return $this->gamePunishments;
        }
        
        /**
         * @param LazyLoadingProxy|ObjectStorage|null $gamePunishments
         */
        public function setGamePunishments($gamePunishments): void
        {
            $this->gamePunishments = $gamePunishments;
        }
        
        /**
         * @return LazyLoadingProxy|ObjectStorage|null
         */
        public function getGameReferees()
        {
            return $this->gameReferees;
        }
        
        /**
         * @param LazyLoadingProxy|ObjectStorage|null $gameReferees
         */
        public function setGameReferees($gameReferees): void
        {
            $this->gameReferees = $gameReferees;
        }
        
        /**
         * @return GameReport|LazyLoadingProxy|null
         */
        public function getGameReport()
        {
            if ($this->gameReport instanceof LazyLoadingProxy) {
                $this->gameReport->_loadRealInstance();
            }
            return $this->gameReport;
        }
        
        /**
         * @param GameReport|LazyLoadingProxy|null $gameReport
         */
        public function setGameReport($gameReport): void
        {
            $this->gameReport = $gameReport;
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
