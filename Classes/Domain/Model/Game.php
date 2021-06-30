<?php
	
	namespace Balumedien\Sportms\Domain\Model;
	
	/**
	 * Game
	 */
	class Game extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {
		
		/**
		 * @var \Balumedien\Sportms\Domain\Model\Sport|\TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
		 */
		protected $sport;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Model\Season|\TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
		 */
		protected $season;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Model\CompetitionSeason
		 */
		protected $competitionSeason;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Model\TeamSeason
		 */
		protected $teamSeasonHome;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Model\TeamSeason
		 */
		protected $teamSeasonGuest;
		
		/**
		 * @var int|null
		 */
		protected $gameAppointment;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Model\CompetitionSeasonGameday|null
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
		 * @var \Balumedien\Sportms\Domain\Model\Venue|\TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy|null
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
		 */
		protected $venue;
		
		/**
		 * @var int|null
		 */
		protected $spectators;
		
		/**
		 * @var int|null
		 */
		protected $periodCount;
		
		/**
		 * @var int|null
		 */
		protected $periodDuration;
		
		/**
		 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Sportms\Domain\Model\GamePeriod>|\TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy|null
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
		 */
		protected $gamePeriods;
		
		/**
		 * @var int|null
		 */
		protected $resultEndRegularHome;
		
		/**
		 * @var int|null
		 */
		protected $resultEndRegularGuest;
		
		/**
		 * @var boolean
		 */
		protected $resultEndAdditional;
		
		/**
		 * @var int|null
		 */
		protected $resultEndOvertimeHome;
		
		/**
		 * @var int|null
		 */
		protected $resultEndOvertimeGuest;
		
		/**
		 * @var int|null
		 */
		protected $resultEndPenaltyHome;
		
		/**
		 * @var int|null
		 */
		protected $resultEndPenaltyGuest;
		
		/**
		 * @var int
		 */
		protected $resultType;
		
		/**
		 * @var int|null
		 */
		protected $resultHalfsFirstHome;
		
		/**
		 * @var int|null
		 */
		protected $resultHalfsFirstGuest;
		
		/**
		 * @var int|null
		 */
		protected $resultHalfsSecondHome;
		
		/**
		 * @var int|null
		 */
		protected $resultHalfsSecondGuest;
		
		/**
		 * @var int|null
		 */
		protected $resultThirdsFirstHome;
		
		/**
		 * @var int|null
		 */
		protected $resultThirdsFirstGuest;
		
		/**
		 * @var int|null
		 */
		protected $resultThirdsSecondHome;
		
		/**
		 * @var int|null
		 */
		protected $resultThirdsSecondGuest;
		
		/**
		 * @var int|null
		 */
		protected $resultThirdsThirdHome;
		
		/**
		 * @var int|null
		 */
		protected $resultThirdsThirdGuest;
		
		/**
		 * @var int|null
		 */
		protected $resultFourthsFirstHome;
		
		/**
		 * @var int|null
		 */
		protected $resultFourthsFirstGuest;
		
		/**
		 * @var int|null
		 */
		protected $resultFourthsSecondHome;
		
		/**
		 * @var int|null
		 */
		protected $resultFourthsSecondGuest;
		
		/**
		 * @var int|null
		 */
		protected $resultFourthsThirdHome;
		
		/**
		 * @var int|null
		 */
		protected $resultFourthsThirdGuest;
		
		/**
		 * @var int|null
		 */
		protected $resultFourthsFourthHome;
		
		/**
		 * @var int|null
		 */
		protected $resultFourthsFourthGuest;
		
		/**
		 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Sportms\Domain\Model\GameResultSet>|\TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy|null
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
		 */
		protected $resultSets;
		
		/**
		 * @var int|null
		 */
		protected $gameRating;
		
		/**
		 * @var int|null
		 */
		protected $resultSpecialHome;
		
		/**
		 * @var int|null
		 */
		protected $resultSpecialGuest;
		
		/**
		 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Sportms\Domain\Model\GameLineup>|\TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy|null
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
		 */
		protected $gameLineupHomeStarts;
		
		/**
		 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Sportms\Domain\Model\GameLineup>|\TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy|null
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
		 */
		protected $gameLineupHomeSubstitutes;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Model\Person|null
		 */
		protected $captainHome;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Model\Person|null
		 */
		protected $trainerHome;
		
		/**
		 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Sportms\Domain\Model\GameLineup>|\TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy|null
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
		 */
		protected $gameLineupGuestStarts;
		
		/**
		 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Sportms\Domain\Model\GameLineup>|\TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy|null
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
		 */
		protected $gameLineupGuestSubstitutes;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Model\Person|null
		 */
		protected $captainGuest;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Model\Person|null
		 */
		protected $trainerGuest;
		
		/**
		 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Sportms\Domain\Model\GameChange>|\TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy|null
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
		 */
		protected $gameChanges;
		
		/**
		 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Sportms\Domain\Model\GameGoal>|\TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy|null
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
		 */
		protected $gameGoals;
		
		/**
		 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Sportms\Domain\Model\GamePunishment>|\TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy|null
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
		 */
		protected $gamePunishments;
		
		/**
		 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Sportms\Domain\Model\GameReferee>|\TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy|null
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
		 */
		protected $gameReferees;
		
		/**
		 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Sportms\Domain\Model\GameReport>|\TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy|null
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
		 */
		protected $gameReports;
		
		/**
		 * @var boolean
		 */
		protected $detailLink;
		
		public function __construct() {
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
		protected function initStorageObjects(): void {
			$this->setResultSets(new \TYPO3\CMS\Extbase\Persistence\ObjectStorage());
			$this->setGameLineupHomeStarts(new \TYPO3\CMS\Extbase\Persistence\ObjectStorage());
			$this->setGameLineupHomeSubstitutes(new \TYPO3\CMS\Extbase\Persistence\ObjectStorage());
			$this->setGameLineupGuestStarts(new \TYPO3\CMS\Extbase\Persistence\ObjectStorage());
			$this->setGameLineupGuestSubstitutes(new \TYPO3\CMS\Extbase\Persistence\ObjectStorage());
			$this->setGameChanges(new \TYPO3\CMS\Extbase\Persistence\ObjectStorage());
			$this->setGameGoals(new \TYPO3\CMS\Extbase\Persistence\ObjectStorage());
			$this->setGameReferees(new \TYPO3\CMS\Extbase\Persistence\ObjectStorage());
			$this->setGameReports(new \TYPO3\CMS\Extbase\Persistence\ObjectStorage());
		}
		
		/**
		 * @return Sport|\TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy
		 */
		public function getSport() {
			return $this->sport;
		}
		
		/**
		 * @param Sport|\TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy $sport
		 */
		public function setSport($sport): void {
			$this->sport = $sport;
		}
		
		/**
		 * @return Season|\TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy
		 */
		public function getSeason() {
			return $this->season;
		}
		
		/**
		 * @param Season|\TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy $season
		 */
		public function setSeason($season): void {
			$this->season = $season;
		}
		
		/**
		 * @return CompetitionSeason
		 */
		public function getCompetitionSeason(): CompetitionSeason {
			return $this->competitionSeason;
		}
		
		/**
		 * @param CompetitionSeason $competitionSeason
		 */
		public function setCompetitionSeason(CompetitionSeason $competitionSeason): void {
			$this->competitionSeason = $competitionSeason;
		}
		
		/**
		 * @return TeamSeason
		 */
		public function getTeamSeasonHome(): TeamSeason {
			return $this->teamSeasonHome;
		}
		
		/**
		 * @param TeamSeason $teamSeasonHome
		 */
		public function setTeamSeasonHome(TeamSeason $teamSeasonHome): void {
			$this->teamSeasonHome = $teamSeasonHome;
		}
		
		/**
		 * @return TeamSeason
		 */
		public function getTeamSeasonGuest(): TeamSeason {
			return $this->teamSeasonGuest;
		}
		
		/**
		 * @param TeamSeason $teamSeasonGuest
		 */
		public function setTeamSeasonGuest(TeamSeason $teamSeasonGuest): void {
			$this->teamSeasonGuest = $teamSeasonGuest;
		}
		
		/**
		 * @return int|null
		 */
		public function getGameAppointment(): ?int {
			return $this->gameAppointment;
		}
		
		/**
		 * @param int|null $gameAppointment
		 */
		public function setGameAppointment(?int $gameAppointment): void {
			$this->gameAppointment = $gameAppointment;
		}
		
		/**
		 * @return CompetitionSeasonGameday|null
		 */
		public function getGameday() {
			return $this->gameday;
		}
		
		/**
		 * @param CompetitionSeasonGameday|null $gameday
		 */
		public function setGameday(?CompetitionSeasonGameday $gameday): void {
			$this->gameday = $gameday;
		}
		
		/**
		 * @return int|null
		 */
		public function getDate(): ?int {
			return $this->date;
		}
		
		/**
		 * @param int|null $date
		 */
		public function setDate(?int $date): void {
			$this->date = $date;
		}

        /**
         * @return string
         */
        public function getTime(): string {
            return $this->time;
        }

        /**
         * @param string $time
         */
        public function setTime(string $time): void {
            $this->time = $time;
        }
		
		/**
		 * @return Venue|\TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy|null
		 */
		public function getVenue() {
			return $this->venue;
		}
		
		/**
		 * @param Venue|\TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy|null $venue
		 */
		public function setVenue($venue): void {
			$this->venue = $venue;
		}
		
		/**
		 * @return int|null
		 */
		public function getSpectators(): ?int {
			return $this->spectators;
		}
		
		/**
		 * @param int|null $spectators
		 */
		public function setSpectators(?int $spectators): void {
			$this->spectators = $spectators;
		}
		
		/**
		 * @return int|null
		 */
		public function getPeriodCount(): ?int {
			return $this->periodCount;
		}
		
		/**
		 * @param int|null $periodCount
		 */
		public function setPeriodCount(?int $periodCount): void {
			$this->periodCount = $periodCount;
		}
		
		/**
		 * @return int|null
		 */
		public function getPeriodDuration(): ?int {
			return $this->periodDuration;
		}
		
		/**
		 * @param int|null $periodDuration
		 */
		public function setPeriodDuration(?int $periodDuration): void {
			$this->periodDuration = $periodDuration;
		}
		
		/**
		 * @return \TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy|\TYPO3\CMS\Extbase\Persistence\ObjectStorage|null
		 */
		public function getGamePeriods() {
			return $this->gamePeriods;
		}
		
		/**
		 * @param \TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy|\TYPO3\CMS\Extbase\Persistence\ObjectStorage|null $gamePeriods
		 */
		public function setGamePeriods($gamePeriods): void {
			$this->gamePeriods = $gamePeriods;
		}
		
		/**
		 * @return int|null
		 */
		public function getResultEndRegularHome(): ?int {
			return $this->resultEndRegularHome;
		}
		
		/**
		 * @param int|null $resultEndRegularHome
		 */
		public function setResultEndRegularHome(?int $resultEndRegularHome): void {
			$this->resultEndRegularHome = $resultEndRegularHome;
		}
		
		/**
		 * @return int|null
		 */
		public function getResultEndRegularGuest(): ?int {
			return $this->resultEndRegularGuest;
		}
		
		/**
		 * @param int|null $resultEndRegularGuest
		 */
		public function setResultEndRegularGuest(?int $resultEndRegularGuest): void {
			$this->resultEndRegularGuest = $resultEndRegularGuest;
		}
		
		/**
		 * @return bool
		 */
		public function isResultEndAdditional(): bool {
			return $this->resultEndAdditional;
		}
		
		/**
		 * @param bool $resultEndAdditional
		 */
		public function setResultEndAdditional(bool $resultEndAdditional): void {
			$this->resultEndAdditional = $resultEndAdditional;
		}
		
		/**
		 * @return int|null
		 */
		public function getResultEndOvertimeHome(): ?int {
			return $this->resultEndOvertimeHome;
		}
		
		/**
		 * @param int|null $resultEndOvertimeHome
		 */
		public function setResultEndOvertimeHome(?int $resultEndOvertimeHome): void {
			$this->resultEndOvertimeHome = $resultEndOvertimeHome;
		}
		
		/**
		 * @return int|null
		 */
		public function getResultEndOvertimeGuest(): ?int {
			return $this->resultEndOvertimeGuest;
		}
		
		/**
		 * @param int|null $resultEndOvertimeGuest
		 */
		public function setResultEndOvertimeGuest(?int $resultEndOvertimeGuest): void {
			$this->resultEndOvertimeGuest = $resultEndOvertimeGuest;
		}
		
		/**
		 * @return int|null
		 */
		public function getResultEndPenaltyHome(): ?int {
			return $this->resultEndPenaltyHome;
		}
		
		/**
		 * @param int|null $resultEndPenaltyHome
		 */
		public function setResultEndPenaltyHome(?int $resultEndPenaltyHome): void {
			$this->resultEndPenaltyHome = $resultEndPenaltyHome;
		}
		
		/**
		 * @return int|null
		 */
		public function getResultEndPenaltyGuest(): ?int {
			return $this->resultEndPenaltyGuest;
		}
		
		/**
		 * @param int|null $resultEndPenaltyGuest
		 */
		public function setResultEndPenaltyGuest(?int $resultEndPenaltyGuest): void {
			$this->resultEndPenaltyGuest = $resultEndPenaltyGuest;
		}
		
		/**
		 * @return int
		 */
		public function getResultType(): int {
			return $this->resultType;
		}
		
		/**
		 * @param int $resultType
		 */
		public function setResultType(int $resultType): void {
			$this->resultType = $resultType;
		}
		
		/**
		 * @return int|null
		 */
		public function getResultHalfsFirstHome(): ?int {
			return $this->resultHalfsFirstHome;
		}
		
		/**
		 * @param int|null $resultHalfsFirstHome
		 */
		public function setResultHalfsFirstHome(?int $resultHalfsFirstHome): void {
			$this->resultHalfsFirstHome = $resultHalfsFirstHome;
		}
		
		/**
		 * @return int|null
		 */
		public function getResultHalfsFirstGuest(): ?int {
			return $this->resultHalfsFirstGuest;
		}
		
		/**
		 * @param int|null $resultHalfsFirstGuest
		 */
		public function setResultHalfsFirstGuest(?int $resultHalfsFirstGuest): void {
			$this->resultHalfsFirstGuest = $resultHalfsFirstGuest;
		}
		
		/**
		 * @return int|null
		 */
		public function getResultHalfsSecondHome(): ?int {
			return $this->resultHalfsSecondHome;
		}
		
		/**
		 * @param int|null $resultHalfsSecondHome
		 */
		public function setResultHalfsSecondHome(?int $resultHalfsSecondHome): void {
			$this->resultHalfsSecondHome = $resultHalfsSecondHome;
		}
		
		/**
		 * @return int|null
		 */
		public function getResultHalfsSecondGuest(): ?int {
			return $this->resultHalfsSecondGuest;
		}
		
		/**
		 * @param int|null $resultHalfsSecondGuest
		 */
		public function setResultHalfsSecondGuest(?int $resultHalfsSecondGuest): void {
			$this->resultHalfsSecondGuest = $resultHalfsSecondGuest;
		}
		
		/**
		 * @return int|null
		 */
		public function getResultThirdsFirstHome(): ?int {
			return $this->resultThirdsFirstHome;
		}
		
		/**
		 * @param int|null $resultThirdsFirstHome
		 */
		public function setResultThirdsFirstHome(?int $resultThirdsFirstHome): void {
			$this->resultThirdsFirstHome = $resultThirdsFirstHome;
		}
		
		/**
		 * @return int|null
		 */
		public function getResultThirdsFirstGuest(): ?int {
			return $this->resultThirdsFirstGuest;
		}
		
		/**
		 * @param int|null $resultThirdsFirstGuest
		 */
		public function setResultThirdsFirstGuest(?int $resultThirdsFirstGuest): void {
			$this->resultThirdsFirstGuest = $resultThirdsFirstGuest;
		}
		
		/**
		 * @return int|null
		 */
		public function getResultThirdsSecondHome(): ?int {
			return $this->resultThirdsSecondHome;
		}
		
		/**
		 * @param int|null $resultThirdsSecondHome
		 */
		public function setResultThirdsSecondHome(?int $resultThirdsSecondHome): void {
			$this->resultThirdsSecondHome = $resultThirdsSecondHome;
		}
		
		/**
		 * @return int|null
		 */
		public function getResultThirdsSecondGuest(): ?int {
			return $this->resultThirdsSecondGuest;
		}
		
		/**
		 * @param int|null $resultThirdsSecondGuest
		 */
		public function setResultThirdsSecondGuest(?int $resultThirdsSecondGuest): void {
			$this->resultThirdsSecondGuest = $resultThirdsSecondGuest;
		}
		
		/**
		 * @return int|null
		 */
		public function getResultThirdsThirdHome(): ?int {
			return $this->resultThirdsThirdHome;
		}
		
		/**
		 * @param int|null $resultThirdsThirdHome
		 */
		public function setResultThirdsThirdHome(?int $resultThirdsThirdHome): void {
			$this->resultThirdsThirdHome = $resultThirdsThirdHome;
		}
		
		/**
		 * @return int|null
		 */
		public function getResultThirdsThirdGuest(): ?int {
			return $this->resultThirdsThirdGuest;
		}
		
		/**
		 * @param int|null $resultThirdsThirdGuest
		 */
		public function setResultThirdsThirdGuest(?int $resultThirdsThirdGuest): void {
			$this->resultThirdsThirdGuest = $resultThirdsThirdGuest;
		}
		
		/**
		 * @return int|null
		 */
		public function getResultFourthsFirstHome(): ?int {
			return $this->resultFourthsFirstHome;
		}
		
		/**
		 * @param int|null $resultFourthsFirstHome
		 */
		public function setResultFourthsFirstHome(?int $resultFourthsFirstHome): void {
			$this->resultFourthsFirstHome = $resultFourthsFirstHome;
		}
		
		/**
		 * @return int|null
		 */
		public function getResultFourthsFirstGuest(): ?int {
			return $this->resultFourthsFirstGuest;
		}
		
		/**
		 * @param int|null $resultFourthsFirstGuest
		 */
		public function setResultFourthsFirstGuest(?int $resultFourthsFirstGuest): void {
			$this->resultFourthsFirstGuest = $resultFourthsFirstGuest;
		}
		
		/**
		 * @return int|null
		 */
		public function getResultFourthsSecondHome(): ?int {
			return $this->resultFourthsSecondHome;
		}
		
		/**
		 * @param int|null $resultFourthsSecondHome
		 */
		public function setResultFourthsSecondHome(?int $resultFourthsSecondHome): void {
			$this->resultFourthsSecondHome = $resultFourthsSecondHome;
		}
		
		/**
		 * @return int|null
		 */
		public function getResultFourthsSecondGuest(): ?int {
			return $this->resultFourthsSecondGuest;
		}
		
		/**
		 * @param int|null $resultFourthsSecondGuest
		 */
		public function setResultFourthsSecondGuest(?int $resultFourthsSecondGuest): void {
			$this->resultFourthsSecondGuest = $resultFourthsSecondGuest;
		}
		
		/**
		 * @return int|null
		 */
		public function getResultFourthsThirdHome(): ?int {
			return $this->resultFourthsThirdHome;
		}
		
		/**
		 * @param int|null $resultFourthsThirdHome
		 */
		public function setResultFourthsThirdHome(?int $resultFourthsThirdHome): void {
			$this->resultFourthsThirdHome = $resultFourthsThirdHome;
		}
		
		/**
		 * @return int|null
		 */
		public function getResultFourthsThirdGuest(): ?int {
			return $this->resultFourthsThirdGuest;
		}
		
		/**
		 * @param int|null $resultFourthsThirdGuest
		 */
		public function setResultFourthsThirdGuest(?int $resultFourthsThirdGuest): void {
			$this->resultFourthsThirdGuest = $resultFourthsThirdGuest;
		}
		
		/**
		 * @return int|null
		 */
		public function getResultFourthsFourthHome(): ?int {
			return $this->resultFourthsFourthHome;
		}
		
		/**
		 * @param int|null $resultFourthsFourthHome
		 */
		public function setResultFourthsFourthHome(?int $resultFourthsFourthHome): void {
			$this->resultFourthsFourthHome = $resultFourthsFourthHome;
		}
		
		/**
		 * @return int|null
		 */
		public function getResultFourthsFourthGuest(): ?int {
			return $this->resultFourthsFourthGuest;
		}
		
		/**
		 * @param int|null $resultFourthsFourthGuest
		 */
		public function setResultFourthsFourthGuest(?int $resultFourthsFourthGuest): void {
			$this->resultFourthsFourthGuest = $resultFourthsFourthGuest;
		}
		
		/**
		 * @return \TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy|\TYPO3\CMS\Extbase\Persistence\ObjectStorage|null
		 */
		public function getResultSets() {
			return $this->resultSets;
		}
		
		/**
		 * @param \TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy|\TYPO3\CMS\Extbase\Persistence\ObjectStorage|null $resultSets
		 */
		public function setResultSets($resultSets): void {
			$this->resultSets = $resultSets;
		}
		
		/**
		 * @return int|null
		 */
		public function getGameRating(): ?int {
			return $this->gameRating;
		}
		
		/**
		 * @param int|null $gameRating
		 */
		public function setGameRating(?int $gameRating): void {
			$this->gameRating = $gameRating;
		}
		
		/**
		 * @return int|null
		 */
		public function getResultSpecialHome(): ?int {
			return $this->resultSpecialHome;
		}
		
		/**
		 * @param int|null $resultSpecialHome
		 */
		public function setResultSpecialHome(?int $resultSpecialHome): void {
			$this->resultSpecialHome = $resultSpecialHome;
		}
		
		/**
		 * @return int|null
		 */
		public function getResultSpecialGuest(): ?int {
			return $this->resultSpecialGuest;
		}
		
		/**
		 * @param int|null $resultSpecialGuest
		 */
		public function setResultSpecialGuest(?int $resultSpecialGuest): void {
			$this->resultSpecialGuest = $resultSpecialGuest;
		}
		
		/**
		 * @return \TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy|\TYPO3\CMS\Extbase\Persistence\ObjectStorage|null
		 */
		public function getGameLineupHomeStarts() {
			return $this->gameLineupHomeStarts;
		}
		
		/**
		 * @param \TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy|\TYPO3\CMS\Extbase\Persistence\ObjectStorage|null $gameLineupHomeStarts
		 */
		public function setGameLineupHomeStarts($gameLineupHomeStarts): void {
			$this->gameLineupHomeStarts = $gameLineupHomeStarts;
		}
		
		/**
		 * @return \TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy|\TYPO3\CMS\Extbase\Persistence\ObjectStorage|null
		 */
		public function getGameLineupHomeSubstitutes() {
			return $this->gameLineupHomeSubstitutes;
		}
		
		/**
		 * @param \TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy|\TYPO3\CMS\Extbase\Persistence\ObjectStorage|null $gameLineupHomeSubstitutes
		 */
		public function setGameLineupHomeSubstitutes($gameLineupHomeSubstitutes): void {
			$this->gameLineupHomeSubstitutes = $gameLineupHomeSubstitutes;
		}
		
		/**
		 * @return Person|null
		 */
		public function getCaptainHome(): ?Person {
			return $this->captainHome;
		}
		
		/**
		 * @param Person|null $captainHome
		 */
		public function setCaptainHome(?Person $captainHome): void {
			$this->captainHome = $captainHome;
		}
		
		/**
		 * @return Person|null
		 */
		public function getTrainerHome(): ?Person {
			return $this->trainerHome;
		}
		
		/**
		 * @param Person|null $trainerHome
		 */
		public function setTrainerHome(?Person $trainerHome): void {
			$this->trainerHome = $trainerHome;
		}
		
		/**
		 * @return \TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy|\TYPO3\CMS\Extbase\Persistence\ObjectStorage|null
		 */
		public function getGameLineupGuestStarts() {
			return $this->gameLineupGuestStarts;
		}
		
		/**
		 * @param \TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy|\TYPO3\CMS\Extbase\Persistence\ObjectStorage|null $gameLineupGuestStarts
		 */
		public function setGameLineupGuestStarts($gameLineupGuestStarts): void {
			$this->gameLineupGuestStarts = $gameLineupGuestStarts;
		}
		
		/**
		 * @return \TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy|\TYPO3\CMS\Extbase\Persistence\ObjectStorage|null
		 */
		public function getGameLineupGuestSubstitutes() {
			return $this->gameLineupGuestSubstitutes;
		}
		
		/**
		 * @param \TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy|\TYPO3\CMS\Extbase\Persistence\ObjectStorage|null $gameLineupGuestSubstitutes
		 */
		public function setGameLineupGuestSubstitutes($gameLineupGuestSubstitutes): void {
			$this->gameLineupGuestSubstitutes = $gameLineupGuestSubstitutes;
		}
		
		/**
		 * @return Person|null
		 */
		public function getCaptainGuest(): ?Person {
			return $this->captainGuest;
		}
		
		/**
		 * @param Person|null $captainGuest
		 */
		public function setCaptainGuest(?Person $captainGuest): void {
			$this->captainGuest = $captainGuest;
		}
		
		/**
		 * @return Person|null
		 */
		public function getTrainerGuest(): ?Person {
			return $this->trainerGuest;
		}
		
		/**
		 * @param Person|null $trainerGuest
		 */
		public function setTrainerGuest(?Person $trainerGuest): void {
			$this->trainerGuest = $trainerGuest;
		}
		
		/**
		 * @return \TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy|\TYPO3\CMS\Extbase\Persistence\ObjectStorage|null
		 */
		public function getGameChanges() {
			return $this->gameChanges;
		}
		
		/**
		 * @param \TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy|\TYPO3\CMS\Extbase\Persistence\ObjectStorage|null $gameChanges
		 */
		public function setGameChanges($gameChanges): void {
			$this->gameChanges = $gameChanges;
		}
		
		/**
		 * @return \TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy|\TYPO3\CMS\Extbase\Persistence\ObjectStorage|null
		 */
		public function getGameGoals() {
			return $this->gameGoals;
		}
		
		/**
		 * @param \TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy|\TYPO3\CMS\Extbase\Persistence\ObjectStorage|null $gameGoals
		 */
		public function setGameGoals($gameGoals): void {
			$this->gameGoals = $gameGoals;
		}
		
		/**
		 * @return \TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy|\TYPO3\CMS\Extbase\Persistence\ObjectStorage|null
		 */
		public function getGamePunishments() {
			return $this->gamePunishments;
		}
		
		/**
		 * @param \TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy|\TYPO3\CMS\Extbase\Persistence\ObjectStorage|null $gamePunishments
		 */
		public function setGamePunishments($gamePunishments): void {
			$this->gamePunishments = $gamePunishments;
		}
		
		/**
		 * @return \TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy|\TYPO3\CMS\Extbase\Persistence\ObjectStorage|null
		 */
		public function getGameReferees() {
			return $this->gameReferees;
		}
		
		/**
		 * @param \TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy|\TYPO3\CMS\Extbase\Persistence\ObjectStorage|null $gameReferees
		 */
		public function setGameReferees($gameReferees): void {
			$this->gameReferees = $gameReferees;
		}
		
		/**
		 * @return \TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy|\TYPO3\CMS\Extbase\Persistence\ObjectStorage|null
		 */
		public function getGameReports() {
			return $this->gameReports;
		}
		
		/**
		 * @param \TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy|\TYPO3\CMS\Extbase\Persistence\ObjectStorage|null $gameReports
		 */
		public function setGameReports($gameReports): void {
			$this->gameReports = $gameReports;
		}
		
		/**
		 * @return bool
		 */
		public function isDetailLink(): bool {
			return $this->detailLink;
		}
		
		/**
		 * @param bool $detailLink
		 */
		public function setDetailLink(bool $detailLink): void {
			$this->detailLink = $detailLink;
		}
		
	}