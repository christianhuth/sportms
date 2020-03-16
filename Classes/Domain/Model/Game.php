<?php
	
	namespace Balumedien\Clubms\Domain\Model;
	
	/**
	 * Game
	 */
	class Game extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {
		
		/**
		 * @var \Balumedien\Clubms\Domain\Model\Section
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
		 */
		protected $section;
		
		/**
		 * @var \Balumedien\Clubms\Domain\Model\Season
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
		 */
		protected $season;
		
		/**
		 * @var \Balumedien\Clubms\Domain\Model\CompetitionSeason
		 */
		protected $competitionSeason;
		
		/**
		 * @var \Balumedien\Clubms\Domain\Model\TeamSeason
		 */
		protected $teamSeasonHome;
		
		/**
		 * @var \Balumedien\Clubms\Domain\Model\TeamSeason
		 */
		protected $teamSeasonGuest;
		
		/**
		 * @var int
		 */
		protected $status;
		
		/**
		 * @var int
		 */
		protected $date;
		
		/**
		 * @var int
		 */
		protected $time;
		
		/**
		 * @var \Balumedien\Clubms\Domain\Model\Venue
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
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
		protected function initStorageObjects() {
			$this->resultSets = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
			$this->gameLineupHomeStarts = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
			$this->gameLineupHomeSubstitutes = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
			$this->gameLineupGuestStarts = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
			$this->gameLineupGuestSubstitutes = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
			$this->gameChanges = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
			$this->gameGoals = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
			$this->gameReferees = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
			$this->gameReports = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		}
		
		/**
		 * @return Section
		 */
		public function getSection(): Section {
			return $this->section;
		}
		
		/**
		 * @param Section $section
		 */
		public function setSection(Section $section): void {
			$this->section = $section;
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
		public function getStatus() {
			return $this->status;
		}
		
		/**
		 * @param int $status
		 */
		public function setStatus($status) {
			$this->status = $status;
		}
		
		/**
		 * @return CompetitionSeasonGameday
		 */
		public function getGameday() {
			return $this->gameday;
		}
		
		/**
		 * @param CompetitionSeasonGameday $gameday
		 */
		public function setGameday($gameday) {
			$this->gameday = $gameday;
		}
		
		/**
		 * @return int
		 */
		public function getDate() {
			return $this->date;
		}
		
		/**
		 * @param int $date
		 */
		public function setDate($date) {
			$this->date = $date;
		}
		
		/**
		 * @return int
		 */
		public function getTime() {
			return $this->time;
		}
		
		/**
		 * @param int $time
		 */
		public function setTime($time) {
			$this->time = $time;
		}
		
		/**
		 * @return Venue
		 */
		public function getVenue() {
			return $this->venue;
		}
		
		/**
		 * @param Venue $venue
		 */
		public function setVenue($venue) {
			$this->venue = $venue;
		}
		
		/**
		 * @return int
		 */
		public function getSpectators() {
			return $this->spectators;
		}
		
		/**
		 * @param int $spectators
		 */
		public function setSpectators($spectators) {
			$this->spectators = $spectators;
		}
		
		/**
		 * @return int
		 */
		public function getPeriodCount() {
			return $this->periodCount;
		}
		
		/**
		 * @param int $periodCount
		 */
		public function setPeriodCount($periodCount) {
			$this->periodCount = $periodCount;
		}
		
		/**
		 * @return int
		 */
		public function getPeriodDuration() {
			return $this->periodDuration;
		}
		
		/**
		 * @param int $periodDuration
		 */
		public function setPeriodDuration($periodDuration) {
			$this->periodDuration = $periodDuration;
		}
		
		/**
		 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
		 */
		public function getGamePeriods() {
			return $this->gamePeriods;
		}
		
		/**
		 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $gamePeriods
		 */
		public function setGamePeriods($gamePeriods) {
			$this->gamePeriods = $gamePeriods;
		}
		
		/**
		 * @return int
		 */
		public function getResultEndRegularHome() {
			return $this->resultEndRegularHome;
		}
		
		/**
		 * @param int $resultEndRegularHome
		 */
		public function setResultEndRegularHome($resultEndRegularHome) {
			$this->resultEndRegularHome = $resultEndRegularHome;
		}
		
		/**
		 * @return int
		 */
		public function getResultEndRegularGuest() {
			return $this->resultEndRegularGuest;
		}
		
		/**
		 * @param int $resultEndRegularGuest
		 */
		public function setResultEndRegularGuest($resultEndRegularGuest) {
			$this->resultEndRegularGuest = $resultEndRegularGuest;
		}
		
		/**
		 * @return bool
		 */
		public function isResultEndAdditional() {
			return $this->resultEndAdditional;
		}
		
		/**
		 * @param bool $resultEndAdditional
		 */
		public function setResultEndAdditional($resultEndAdditional) {
			$this->resultEndAdditional = $resultEndAdditional;
		}
		
		/**
		 * @return int
		 */
		public function getResultEndOvertimeHome() {
			return $this->resultEndOvertimeHome;
		}
		
		/**
		 * @param int $resultEndOvertimeHome
		 */
		public function setResultEndOvertimeHome($resultEndOvertimeHome) {
			$this->resultEndOvertimeHome = $resultEndOvertimeHome;
		}
		
		/**
		 * @return int
		 */
		public function getResultEndOvertimeGuest() {
			return $this->resultEndOvertimeGuest;
		}
		
		/**
		 * @param int $resultEndOvertimeGuest
		 */
		public function setResultEndOvertimeGuest($resultEndOvertimeGuest) {
			$this->resultEndOvertimeGuest = $resultEndOvertimeGuest;
		}
		
		/**
		 * @return int
		 */
		public function getResultEndPenaltyHome() {
			return $this->resultEndPenaltyHome;
		}
		
		/**
		 * @param int $resultEndPenaltyHome
		 */
		public function setResultEndPenaltyHome($resultEndPenaltyHome) {
			$this->resultEndPenaltyHome = $resultEndPenaltyHome;
		}
		
		/**
		 * @return int
		 */
		public function getResultEndPenaltyGuest() {
			return $this->resultEndPenaltyGuest;
		}
		
		/**
		 * @param int $resultEndPenaltyGuest
		 */
		public function setResultEndPenaltyGuest($resultEndPenaltyGuest) {
			$this->resultEndPenaltyGuest = $resultEndPenaltyGuest;
		}
		
		/**
		 * @return int
		 */
		public function getResultType() {
			return $this->resultType;
		}
		
		/**
		 * @param int $resultType
		 */
		public function setResultType($resultType) {
			$this->resultType = $resultType;
		}
		
		/**
		 * @return int
		 */
		public function getResultHalfsFirstHome() {
			return $this->resultHalfsFirstHome;
		}
		
		/**
		 * @param int $resultHalfsFirstHome
		 */
		public function setResultHalfsFirstHome($resultHalfsFirstHome) {
			$this->resultHalfsFirstHome = $resultHalfsFirstHome;
		}
		
		/**
		 * @return int
		 */
		public function getResultHalfsFirstGuest() {
			return $this->resultHalfsFirstGuest;
		}
		
		/**
		 * @param int $resultHalfsFirstGuest
		 */
		public function setResultHalfsFirstGuest($resultHalfsFirstGuest) {
			$this->resultHalfsFirstGuest = $resultHalfsFirstGuest;
		}
		
		/**
		 * @return int
		 */
		public function getResultHalfsSecondHome() {
			return $this->resultHalfsSecondHome;
		}
		
		/**
		 * @param int $resultHalfsSecondHome
		 */
		public function setResultHalfsSecondHome($resultHalfsSecondHome) {
			$this->resultHalfsSecondHome = $resultHalfsSecondHome;
		}
		
		/**
		 * @return int
		 */
		public function getResultHalfsSecondGuest() {
			return $this->resultHalfsSecondGuest;
		}
		
		/**
		 * @param int $resultHalfsSecondGuest
		 */
		public function setResultHalfsSecondGuest($resultHalfsSecondGuest) {
			$this->resultHalfsSecondGuest = $resultHalfsSecondGuest;
		}
		
		/**
		 * @return int
		 */
		public function getResultThirdsFirstHome() {
			return $this->resultThirdsFirstHome;
		}
		
		/**
		 * @param int $resultThirdsFirstHome
		 */
		public function setResultThirdsFirstHome($resultThirdsFirstHome) {
			$this->resultThirdsFirstHome = $resultThirdsFirstHome;
		}
		
		/**
		 * @return int
		 */
		public function getResultThirdsFirstGuest() {
			return $this->resultThirdsFirstGuest;
		}
		
		/**
		 * @param int $resultThirdsFirstGuest
		 */
		public function setResultThirdsFirstGuest($resultThirdsFirstGuest) {
			$this->resultThirdsFirstGuest = $resultThirdsFirstGuest;
		}
		
		/**
		 * @return int
		 */
		public function getResultThirdsSecondHome() {
			return $this->resultThirdsSecondHome;
		}
		
		/**
		 * @param int $resultThirdsSecondHome
		 */
		public function setResultThirdsSecondHome($resultThirdsSecondHome) {
			$this->resultThirdsSecondHome = $resultThirdsSecondHome;
		}
		
		/**
		 * @return int
		 */
		public function getResultThirdsSecondGuest() {
			return $this->resultThirdsSecondGuest;
		}
		
		/**
		 * @param int $resultThirdsSecondGuest
		 */
		public function setResultThirdsSecondGuest($resultThirdsSecondGuest) {
			$this->resultThirdsSecondGuest = $resultThirdsSecondGuest;
		}
		
		/**
		 * @return int
		 */
		public function getResultThirdsThirdHome() {
			return $this->resultThirdsThirdHome;
		}
		
		/**
		 * @param int $resultThirdsThirdHome
		 */
		public function setResultThirdsThirdHome($resultThirdsThirdHome) {
			$this->resultThirdsThirdHome = $resultThirdsThirdHome;
		}
		
		/**
		 * @return int
		 */
		public function getResultThirdsThirdGuest() {
			return $this->resultThirdsThirdGuest;
		}
		
		/**
		 * @param int $resultThirdsThirdGuest
		 */
		public function setResultThirdsThirdGuest($resultThirdsThirdGuest) {
			$this->resultThirdsThirdGuest = $resultThirdsThirdGuest;
		}
		
		/**
		 * @return int
		 */
		public function getResultFourthsFirstHome() {
			return $this->resultFourthsFirstHome;
		}
		
		/**
		 * @param int $resultFourthsFirstHome
		 */
		public function setResultFourthsFirstHome($resultFourthsFirstHome) {
			$this->resultFourthsFirstHome = $resultFourthsFirstHome;
		}
		
		/**
		 * @return int
		 */
		public function getResultFourthsFirstGuest() {
			return $this->resultFourthsFirstGuest;
		}
		
		/**
		 * @param int $resultFourthsFirstGuest
		 */
		public function setResultFourthsFirstGuest($resultFourthsFirstGuest) {
			$this->resultFourthsFirstGuest = $resultFourthsFirstGuest;
		}
		
		/**
		 * @return int
		 */
		public function getResultFourthsSecondHome() {
			return $this->resultFourthsSecondHome;
		}
		
		/**
		 * @param int $resultFourthsSecondHome
		 */
		public function setResultFourthsSecondHome($resultFourthsSecondHome) {
			$this->resultFourthsSecondHome = $resultFourthsSecondHome;
		}
		
		/**
		 * @return int
		 */
		public function getResultFourthsSecondGuest() {
			return $this->resultFourthsSecondGuest;
		}
		
		/**
		 * @param int $resultFourthsSecondGuest
		 */
		public function setResultFourthsSecondGuest($resultFourthsSecondGuest) {
			$this->resultFourthsSecondGuest = $resultFourthsSecondGuest;
		}
		
		/**
		 * @return int
		 */
		public function getResultFourthsThirdHome() {
			return $this->resultFourthsThirdHome;
		}
		
		/**
		 * @param int $resultFourthsThirdHome
		 */
		public function setResultFourthsThirdHome($resultFourthsThirdHome) {
			$this->resultFourthsThirdHome = $resultFourthsThirdHome;
		}
		
		/**
		 * @return int
		 */
		public function getResultFourthsThirdGuest() {
			return $this->resultFourthsThirdGuest;
		}
		
		/**
		 * @param int $resultFourthsThirdGuest
		 */
		public function setResultFourthsThirdGuest($resultFourthsThirdGuest) {
			$this->resultFourthsThirdGuest = $resultFourthsThirdGuest;
		}
		
		/**
		 * @return int
		 */
		public function getResultFourthsFourthHome() {
			return $this->resultFourthsFourthHome;
		}
		
		/**
		 * @param int $resultFourthsFourthHome
		 */
		public function setResultFourthsFourthHome($resultFourthsFourthHome) {
			$this->resultFourthsFourthHome = $resultFourthsFourthHome;
		}
		
		/**
		 * @return int
		 */
		public function getResultFourthsFourthGuest() {
			return $this->resultFourthsFourthGuest;
		}
		
		/**
		 * @param int $resultFourthsFourthGuest
		 */
		public function setResultFourthsFourthGuest($resultFourthsFourthGuest) {
			$this->resultFourthsFourthGuest = $resultFourthsFourthGuest;
		}
		
		/**
		 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
		 */
		public function getResultSets() {
			return $this->resultSets;
		}
		
		/**
		 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $resultSets
		 */
		public function setResultSets($resultSets) {
			$this->resultSets = $resultSets;
		}
		
		/**
		 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
		 */
		public function getGameLineupHomeStarts() {
			return $this->gameLineupHomeStarts;
		}
		
		/**
		 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $gameLineupHomeStarts
		 */
		public function setGameLineupHomeStarts($gameLineupHomeStarts) {
			$this->gameLineupHomeStarts = $gameLineupHomeStarts;
		}
		
		/**
		 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
		 */
		public function getGameLineupHomeSubstitutes() {
			return $this->gameLineupHomeSubstitutes;
		}
		
		/**
		 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $gameLineupHomeSubstitutes
		 */
		public function setGameLineupHomeSubstitutes($gameLineupHomeSubstitutes) {
			$this->gameLineupHomeSubstitutes = $gameLineupHomeSubstitutes;
		}
		
		/**
		 * @return TeamSeasonOfficial
		 */
		public function getTrainerHome() {
			return $this->trainerHome;
		}
		
		/**
		 * @param TeamSeasonOfficial $trainerHome
		 */
		public function setTrainerHome($trainerHome) {
			$this->trainerHome = $trainerHome;
		}
		
		/**
		 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
		 */
		public function getGameLineupGuestStarts() {
			return $this->gameLineupGuestStarts;
		}
		
		/**
		 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $gameLineupGuestStarts
		 */
		public function setGameLineupGuestStarts($gameLineupGuestStarts) {
			$this->gameLineupGuestStarts = $gameLineupGuestStarts;
		}
		
		/**
		 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
		 */
		public function getGameLineupGuestSubstitutes() {
			return $this->gameLineupGuestSubstitutes;
		}
		
		/**
		 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $gameLineupGuestSubstitutes
		 */
		public function setGameLineupGuestSubstitutes($gameLineupGuestSubstitutes) {
			$this->gameLineupGuestSubstitutes = $gameLineupGuestSubstitutes;
		}
		
		/**
		 * @return TeamSeasonOfficial
		 */
		public function getTrainerGuest() {
			return $this->trainerGuest;
		}
		
		/**
		 * @param TeamSeasonOfficial $trainerGuest
		 */
		public function setTrainerGuest($trainerGuest) {
			$this->trainerGuest = $trainerGuest;
		}
		
		/**
		 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
		 */
		public function getGameChanges() {
			return $this->gameChanges;
		}
		
		/**
		 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $gameChanges
		 */
		public function setGameChanges($gameChanges) {
			$this->gameChanges = $gameChanges;
		}
		
		/**
		 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
		 */
		public function getGameGoals() {
			return $this->gameGoals;
		}
		
		/**
		 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $gameGoals
		 */
		public function setGameGoals($gameGoals) {
			$this->gameGoals = $gameGoals;
		}
		
		/**
		 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
		 */
		public function getGamePunishments() {
			return $this->gamePunishments;
		}
		
		/**
		 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $gamePunishments
		 */
		public function setGamePunishments($gamePunishments) {
			$this->gamePunishments = $gamePunishments;
		}
		
		/**
		 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
		 */
		public function getGameReferees() {
			return $this->gameReferees;
		}
		
		/**
		 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $gameReferees
		 */
		public function setGameReferees($gameReferees) {
			$this->gameReferees = $gameReferees;
		}
		
		/**
		 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
		 */
		public function getGameReports() {
			return $this->gameReports;
		}
		
		/**
		 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $gameReports
		 */
		public function setGameReports($gameReports) {
			$this->gameReports = $gameReports;
		}
		
		/**
		 * @return bool
		 */
		public function isDetailLink() {
			return $this->detailLink;
		}
		
		/**
		 * @param bool $detailLink
		 */
		public function setDetailLink($detailLink) {
			$this->detailLink = $detailLink;
		}
		
	}