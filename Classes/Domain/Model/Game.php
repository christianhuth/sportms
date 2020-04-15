<?php
	
	namespace Balumedien\Sportms\Domain\Model;
	
	/**
	 * Game
	 */
	class Game extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {
		
		/**
		 * @var \Balumedien\Sportms\Domain\Model\Sport
		 */
		protected $sport;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Model\Season
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
		 * @var int
		 */
		protected $gameAppointment;
		
		/**
		 * @var int
		 */
		protected $gameRating;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Model\CompetitionSeasonGameday
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
		 */
		protected $gameday;
		
		/**
		 * @var int
		 */
		protected $date;
		
		/**
		 * @var int
		 */
		protected $time;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Model\Venue
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
		 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Sportms\Domain\Model\GamePeriod>
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
		 */
		protected $gamePeriods;
		
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
		 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Sportms\Domain\Model\GameResultSet>
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
		 */
		protected $resultSets;
		
		/**
		 * @var int
		 */
		protected $resultSpecialHome;
		
		/**
		 * @var int
		 */
		protected $resultSpecialGuest;
		
		/**
		 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Sportms\Domain\Model\GameLineup>
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
		 */
		protected $gameLineupHomeStarts;
		
		/**
		 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Sportms\Domain\Model\GameLineup>
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
		 */
		protected $gameLineupHomeSubstitutes;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Model\TeamSeasonOfficial
		 */
		protected $trainerHome;
		
		/**
		 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Sportms\Domain\Model\GameLineup>
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
		 */
		protected $gameLineupGuestStarts;
		
		/**
		 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Sportms\Domain\Model\GameLineup>
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
		 */
		protected $gameLineupGuestSubstitutes;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Model\TeamSeasonOfficial
		 */
		protected $trainerGuest;
		
		/**
		 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Sportms\Domain\Model\GameChange>
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
		 */
		protected $gameChanges;
		
		/**
		 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Sportms\Domain\Model\GameGoal>
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
		 */
		protected $gameGoals;
		
		/**
		 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Sportms\Domain\Model\GamePunishment>
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
		 */
		protected $gamePunishments;
		
		/**
		 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Sportms\Domain\Model\GameReferee>
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
		 */
		protected $gameReferees;
		
		/**
		 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Sportms\Domain\Model\GameReport>
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
		 * @return Sport
		 */
		public function getSport(): Sport {
			return $this->sport;
		}
		
		/**
		 * @param Sport $sport
		 */
		public function setSport(Sport $sport): void {
			$this->sport = $sport;
		}
		
		/**
		 * @return Season
		 */
		public function getSeason(): Season {
			return $this->season;
		}
		
		/**
		 * @param Season $season
		 */
		public function setSeason(Season $season): void {
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
		 * @return int
		 */
		public function getGameAppointment(): int {
			return $this->gameAppointment;
		}
		
		/**
		 * @param int $gameAppointment
		 */
		public function setGameAppointment(int $gameAppointment): void {
			$this->gameAppointment = $gameAppointment;
		}
		
		/**
		 * @return int
		 */
		public function getGameRating(): int {
			return $this->gameRating;
		}
		
		/**
		 * @param int $gameRating
		 */
		public function setGameRating(int $gameRating): void {
			$this->gameRating = $gameRating;
		}
		
		/**
		 * @return CompetitionSeasonGameday
		 */
		public function getGameday(): CompetitionSeasonGameday {
			return $this->gameday;
		}
		
		/**
		 * @param CompetitionSeasonGameday $gameday
		 */
		public function setGameday(CompetitionSeasonGameday $gameday): void {
			$this->gameday = $gameday;
		}
		
		/**
		 * @return int
		 */
		public function getDate(): int {
			return $this->date;
		}
		
		/**
		 * @param int $date
		 */
		public function setDate(int $date): void {
			$this->date = $date;
		}
		
		/**
		 * @return int
		 */
		public function getTime(): int {
			return $this->time;
		}
		
		/**
		 * @param int $time
		 */
		public function setTime(int $time): void {
			$this->time = $time;
		}
		
		/**
		 * @return Venue
		 */
		public function getVenue(): Venue {
			return $this->venue;
		}
		
		/**
		 * @param Venue $venue
		 */
		public function setVenue(Venue $venue): void {
			$this->venue = $venue;
		}
		
		/**
		 * @return int
		 */
		public function getSpectators(): int {
			return $this->spectators;
		}
		
		/**
		 * @param int $spectators
		 */
		public function setSpectators(int $spectators): void {
			$this->spectators = $spectators;
		}
		
		/**
		 * @return int
		 */
		public function getPeriodCount(): int {
			return $this->periodCount;
		}
		
		/**
		 * @param int $periodCount
		 */
		public function setPeriodCount(int $periodCount): void {
			$this->periodCount = $periodCount;
		}
		
		/**
		 * @return int
		 */
		public function getPeriodDuration(): int {
			return $this->periodDuration;
		}
		
		/**
		 * @param int $periodDuration
		 */
		public function setPeriodDuration(int $periodDuration): void {
			$this->periodDuration = $periodDuration;
		}
		
		/**
		 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
		 */
		public function getGamePeriods(): \TYPO3\CMS\Extbase\Persistence\ObjectStorage {
			return $this->gamePeriods;
		}
		
		/**
		 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $gamePeriods
		 */
		public function setGamePeriods(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $gamePeriods): void {
			$this->gamePeriods = $gamePeriods;
		}
		
		/**
		 * @return int
		 */
		public function getResultEndRegularHome(): int {
			return $this->resultEndRegularHome;
		}
		
		/**
		 * @param int $resultEndRegularHome
		 */
		public function setResultEndRegularHome(int $resultEndRegularHome): void {
			$this->resultEndRegularHome = $resultEndRegularHome;
		}
		
		/**
		 * @return int
		 */
		public function getResultEndRegularGuest(): int {
			return $this->resultEndRegularGuest;
		}
		
		/**
		 * @param int $resultEndRegularGuest
		 */
		public function setResultEndRegularGuest(int $resultEndRegularGuest): void {
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
		 * @return int
		 */
		public function getResultEndOvertimeHome(): int {
			return $this->resultEndOvertimeHome;
		}
		
		/**
		 * @param int $resultEndOvertimeHome
		 */
		public function setResultEndOvertimeHome(int $resultEndOvertimeHome): void {
			$this->resultEndOvertimeHome = $resultEndOvertimeHome;
		}
		
		/**
		 * @return int
		 */
		public function getResultEndOvertimeGuest(): int {
			return $this->resultEndOvertimeGuest;
		}
		
		/**
		 * @param int $resultEndOvertimeGuest
		 */
		public function setResultEndOvertimeGuest(int $resultEndOvertimeGuest): void {
			$this->resultEndOvertimeGuest = $resultEndOvertimeGuest;
		}
		
		/**
		 * @return int
		 */
		public function getResultEndPenaltyHome(): int {
			return $this->resultEndPenaltyHome;
		}
		
		/**
		 * @param int $resultEndPenaltyHome
		 */
		public function setResultEndPenaltyHome(int $resultEndPenaltyHome): void {
			$this->resultEndPenaltyHome = $resultEndPenaltyHome;
		}
		
		/**
		 * @return int
		 */
		public function getResultEndPenaltyGuest(): int {
			return $this->resultEndPenaltyGuest;
		}
		
		/**
		 * @param int $resultEndPenaltyGuest
		 */
		public function setResultEndPenaltyGuest(int $resultEndPenaltyGuest): void {
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
		 * @return int
		 */
		public function getResultHalfsFirstHome(): int {
			return $this->resultHalfsFirstHome;
		}
		
		/**
		 * @param int $resultHalfsFirstHome
		 */
		public function setResultHalfsFirstHome(int $resultHalfsFirstHome): void {
			$this->resultHalfsFirstHome = $resultHalfsFirstHome;
		}
		
		/**
		 * @return int
		 */
		public function getResultHalfsFirstGuest(): int {
			return $this->resultHalfsFirstGuest;
		}
		
		/**
		 * @param int $resultHalfsFirstGuest
		 */
		public function setResultHalfsFirstGuest(int $resultHalfsFirstGuest): void {
			$this->resultHalfsFirstGuest = $resultHalfsFirstGuest;
		}
		
		/**
		 * @return int
		 */
		public function getResultHalfsSecondHome(): int {
			return $this->resultHalfsSecondHome;
		}
		
		/**
		 * @param int $resultHalfsSecondHome
		 */
		public function setResultHalfsSecondHome(int $resultHalfsSecondHome): void {
			$this->resultHalfsSecondHome = $resultHalfsSecondHome;
		}
		
		/**
		 * @return int
		 */
		public function getResultHalfsSecondGuest(): int {
			return $this->resultHalfsSecondGuest;
		}
		
		/**
		 * @param int $resultHalfsSecondGuest
		 */
		public function setResultHalfsSecondGuest(int $resultHalfsSecondGuest): void {
			$this->resultHalfsSecondGuest = $resultHalfsSecondGuest;
		}
		
		/**
		 * @return int
		 */
		public function getResultThirdsFirstHome(): int {
			return $this->resultThirdsFirstHome;
		}
		
		/**
		 * @param int $resultThirdsFirstHome
		 */
		public function setResultThirdsFirstHome(int $resultThirdsFirstHome): void {
			$this->resultThirdsFirstHome = $resultThirdsFirstHome;
		}
		
		/**
		 * @return int
		 */
		public function getResultThirdsFirstGuest(): int {
			return $this->resultThirdsFirstGuest;
		}
		
		/**
		 * @param int $resultThirdsFirstGuest
		 */
		public function setResultThirdsFirstGuest(int $resultThirdsFirstGuest): void {
			$this->resultThirdsFirstGuest = $resultThirdsFirstGuest;
		}
		
		/**
		 * @return int
		 */
		public function getResultThirdsSecondHome(): int {
			return $this->resultThirdsSecondHome;
		}
		
		/**
		 * @param int $resultThirdsSecondHome
		 */
		public function setResultThirdsSecondHome(int $resultThirdsSecondHome): void {
			$this->resultThirdsSecondHome = $resultThirdsSecondHome;
		}
		
		/**
		 * @return int
		 */
		public function getResultThirdsSecondGuest(): int {
			return $this->resultThirdsSecondGuest;
		}
		
		/**
		 * @param int $resultThirdsSecondGuest
		 */
		public function setResultThirdsSecondGuest(int $resultThirdsSecondGuest): void {
			$this->resultThirdsSecondGuest = $resultThirdsSecondGuest;
		}
		
		/**
		 * @return int
		 */
		public function getResultThirdsThirdHome(): int {
			return $this->resultThirdsThirdHome;
		}
		
		/**
		 * @param int $resultThirdsThirdHome
		 */
		public function setResultThirdsThirdHome(int $resultThirdsThirdHome): void {
			$this->resultThirdsThirdHome = $resultThirdsThirdHome;
		}
		
		/**
		 * @return int
		 */
		public function getResultThirdsThirdGuest(): int {
			return $this->resultThirdsThirdGuest;
		}
		
		/**
		 * @param int $resultThirdsThirdGuest
		 */
		public function setResultThirdsThirdGuest(int $resultThirdsThirdGuest): void {
			$this->resultThirdsThirdGuest = $resultThirdsThirdGuest;
		}
		
		/**
		 * @return int
		 */
		public function getResultFourthsFirstHome(): int {
			return $this->resultFourthsFirstHome;
		}
		
		/**
		 * @param int $resultFourthsFirstHome
		 */
		public function setResultFourthsFirstHome(int $resultFourthsFirstHome): void {
			$this->resultFourthsFirstHome = $resultFourthsFirstHome;
		}
		
		/**
		 * @return int
		 */
		public function getResultFourthsFirstGuest(): int {
			return $this->resultFourthsFirstGuest;
		}
		
		/**
		 * @param int $resultFourthsFirstGuest
		 */
		public function setResultFourthsFirstGuest(int $resultFourthsFirstGuest): void {
			$this->resultFourthsFirstGuest = $resultFourthsFirstGuest;
		}
		
		/**
		 * @return int
		 */
		public function getResultFourthsSecondHome(): int {
			return $this->resultFourthsSecondHome;
		}
		
		/**
		 * @param int $resultFourthsSecondHome
		 */
		public function setResultFourthsSecondHome(int $resultFourthsSecondHome): void {
			$this->resultFourthsSecondHome = $resultFourthsSecondHome;
		}
		
		/**
		 * @return int
		 */
		public function getResultFourthsSecondGuest(): int {
			return $this->resultFourthsSecondGuest;
		}
		
		/**
		 * @param int $resultFourthsSecondGuest
		 */
		public function setResultFourthsSecondGuest(int $resultFourthsSecondGuest): void {
			$this->resultFourthsSecondGuest = $resultFourthsSecondGuest;
		}
		
		/**
		 * @return int
		 */
		public function getResultFourthsThirdHome(): int {
			return $this->resultFourthsThirdHome;
		}
		
		/**
		 * @param int $resultFourthsThirdHome
		 */
		public function setResultFourthsThirdHome(int $resultFourthsThirdHome): void {
			$this->resultFourthsThirdHome = $resultFourthsThirdHome;
		}
		
		/**
		 * @return int
		 */
		public function getResultFourthsThirdGuest(): int {
			return $this->resultFourthsThirdGuest;
		}
		
		/**
		 * @param int $resultFourthsThirdGuest
		 */
		public function setResultFourthsThirdGuest(int $resultFourthsThirdGuest): void {
			$this->resultFourthsThirdGuest = $resultFourthsThirdGuest;
		}
		
		/**
		 * @return int
		 */
		public function getResultFourthsFourthHome(): int {
			return $this->resultFourthsFourthHome;
		}
		
		/**
		 * @param int $resultFourthsFourthHome
		 */
		public function setResultFourthsFourthHome(int $resultFourthsFourthHome): void {
			$this->resultFourthsFourthHome = $resultFourthsFourthHome;
		}
		
		/**
		 * @return int
		 */
		public function getResultFourthsFourthGuest(): int {
			return $this->resultFourthsFourthGuest;
		}
		
		/**
		 * @param int $resultFourthsFourthGuest
		 */
		public function setResultFourthsFourthGuest(int $resultFourthsFourthGuest): void {
			$this->resultFourthsFourthGuest = $resultFourthsFourthGuest;
		}
		
		/**
		 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
		 */
		public function getResultSets(): \TYPO3\CMS\Extbase\Persistence\ObjectStorage {
			return $this->resultSets;
		}
		
		/**
		 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $resultSets
		 */
		public function setResultSets(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $resultSets): void {
			$this->resultSets = $resultSets;
		}
		
		/**
		 * @return int
		 */
		public function getResultSpecialHome(): int {
			return $this->resultSpecialHome;
		}
		
		/**
		 * @param int $resultSpecialHome
		 */
		public function setResultSpecialHome(int $resultSpecialHome): void {
			$this->resultSpecialHome = $resultSpecialHome;
		}
		
		/**
		 * @return int
		 */
		public function getResultSpecialGuest(): int {
			return $this->resultSpecialGuest;
		}
		
		/**
		 * @param int $resultSpecialGuest
		 */
		public function setResultSpecialGuest(int $resultSpecialGuest): void {
			$this->resultSpecialGuest = $resultSpecialGuest;
		}
		
		/**
		 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
		 */
		public function getGameLineupHomeStarts(): \TYPO3\CMS\Extbase\Persistence\ObjectStorage {
			return $this->gameLineupHomeStarts;
		}
		
		/**
		 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $gameLineupHomeStarts
		 */
		public function setGameLineupHomeStarts(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $gameLineupHomeStarts): void {
			$this->gameLineupHomeStarts = $gameLineupHomeStarts;
		}
		
		/**
		 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
		 */
		public function getGameLineupHomeSubstitutes(): \TYPO3\CMS\Extbase\Persistence\ObjectStorage {
			return $this->gameLineupHomeSubstitutes;
		}
		
		/**
		 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $gameLineupHomeSubstitutes
		 */
		public function setGameLineupHomeSubstitutes(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $gameLineupHomeSubstitutes): void {
			$this->gameLineupHomeSubstitutes = $gameLineupHomeSubstitutes;
		}
		
		/**
		 * @return TeamSeasonOfficial
		 */
		public function getTrainerHome(): TeamSeasonOfficial {
			return $this->trainerHome;
		}
		
		/**
		 * @param TeamSeasonOfficial $trainerHome
		 */
		public function setTrainerHome(TeamSeasonOfficial $trainerHome): void {
			$this->trainerHome = $trainerHome;
		}
		
		/**
		 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
		 */
		public function getGameLineupGuestStarts(): \TYPO3\CMS\Extbase\Persistence\ObjectStorage {
			return $this->gameLineupGuestStarts;
		}
		
		/**
		 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $gameLineupGuestStarts
		 */
		public function setGameLineupGuestStarts(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $gameLineupGuestStarts): void {
			$this->gameLineupGuestStarts = $gameLineupGuestStarts;
		}
		
		/**
		 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
		 */
		public function getGameLineupGuestSubstitutes(): \TYPO3\CMS\Extbase\Persistence\ObjectStorage {
			return $this->gameLineupGuestSubstitutes;
		}
		
		/**
		 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $gameLineupGuestSubstitutes
		 */
		public function setGameLineupGuestSubstitutes(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $gameLineupGuestSubstitutes): void {
			$this->gameLineupGuestSubstitutes = $gameLineupGuestSubstitutes;
		}
		
		/**
		 * @return TeamSeasonOfficial
		 */
		public function getTrainerGuest(): TeamSeasonOfficial {
			return $this->trainerGuest;
		}
		
		/**
		 * @param TeamSeasonOfficial $trainerGuest
		 */
		public function setTrainerGuest(TeamSeasonOfficial $trainerGuest): void {
			$this->trainerGuest = $trainerGuest;
		}
		
		/**
		 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
		 */
		public function getGameChanges(): \TYPO3\CMS\Extbase\Persistence\ObjectStorage {
			return $this->gameChanges;
		}
		
		/**
		 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $gameChanges
		 */
		public function setGameChanges(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $gameChanges): void {
			$this->gameChanges = $gameChanges;
		}
		
		/**
		 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
		 */
		public function getGameGoals(): \TYPO3\CMS\Extbase\Persistence\ObjectStorage {
			return $this->gameGoals;
		}
		
		/**
		 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $gameGoals
		 */
		public function setGameGoals(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $gameGoals): void {
			$this->gameGoals = $gameGoals;
		}
		
		/**
		 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
		 */
		public function getGamePunishments(): \TYPO3\CMS\Extbase\Persistence\ObjectStorage {
			return $this->gamePunishments;
		}
		
		/**
		 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $gamePunishments
		 */
		public function setGamePunishments(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $gamePunishments): void {
			$this->gamePunishments = $gamePunishments;
		}
		
		/**
		 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
		 */
		public function getGameReferees(): \TYPO3\CMS\Extbase\Persistence\ObjectStorage {
			return $this->gameReferees;
		}
		
		/**
		 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $gameReferees
		 */
		public function setGameReferees(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $gameReferees): void {
			$this->gameReferees = $gameReferees;
		}
		
		/**
		 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
		 */
		public function getGameReports(): \TYPO3\CMS\Extbase\Persistence\ObjectStorage {
			return $this->gameReports;
		}
		
		/**
		 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $gameReports
		 */
		public function setGameReports(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $gameReports): void {
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