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
		 * @var \Balumedien\Clubms\Domain\Model\CompetitionSeasonGameday
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
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
			$this->setResultSets(\TYPO3\CMS\Extbase\Persistence\ObjectStorage());
			$this->setGameLineupHomeStarts(\TYPO3\CMS\Extbase\Persistence\ObjectStorage());
			$this->setGameLineupHomeSubstitutes(\TYPO3\CMS\Extbase\Persistence\ObjectStorage());
			$this->setGameLineupGuestStarts(\TYPO3\CMS\Extbase\Persistence\ObjectStorage());
			$this->setGameLineupGuestSubstitutes(\TYPO3\CMS\Extbase\Persistence\ObjectStorage());
			$this->setGameChanges(\TYPO3\CMS\Extbase\Persistence\ObjectStorage());
			$this->setGameGoals(\TYPO3\CMS\Extbase\Persistence\ObjectStorage());
			$this->setGameReferees(\TYPO3\CMS\Extbase\Persistence\ObjectStorage());
			$this->setGameReports(\TYPO3\CMS\Extbase\Persistence\ObjectStorage());
		}
		
		/**
		 * @return \Balumedien\Clubms\Domain\Model\Section
		 */
		public function getSection() {
			return $this->section;
		}
		
		/**
		 * @param \Balumedien\Clubms\Domain\Model\Section $section
		 */
		public function setSection(\Balumedien\Clubms\Domain\Model\Section $section): void {
			$this->section = $section;
		}
		
		/**
		 * @return \Balumedien\Clubms\Domain\Model\Season
		 */
		public function getSeason() {
			return $this->season;
		}
		
		/**
		 * @param \Balumedien\Clubms\Domain\Model\Season $season
		 */
		public function setSeason(\Balumedien\Clubms\Domain\Model\Season $season): void {
			$this->season = $season;
		}
		
		/**
		 * @return \Balumedien\Clubms\Domain\Model\CompetitionSeason
		 */
		public function getCompetitionSeason() {
			return $this->competitionSeason;
		}
		
		/**
		 * @param \Balumedien\Clubms\Domain\Model\CompetitionSeason $competitionSeason
		 */
		public function setCompetitionSeason(\Balumedien\Clubms\Domain\Model\CompetitionSeason $competitionSeason): void {
			$this->competitionSeason = $competitionSeason;
		}
		
		/**
		 * @return \Balumedien\Clubms\Domain\Model\TeamSeason
		 */
		public function getTeamSeasonHome() {
			return $this->teamSeasonHome;
		}
		
		/**
		 * @param \Balumedien\Clubms\Domain\Model\TeamSeason $teamSeasonHome
		 */
		public function setTeamSeasonHome(\Balumedien\Clubms\Domain\Model\TeamSeason $teamSeasonHome): void {
			$this->teamSeasonHome = $teamSeasonHome;
		}
		
		/**
		 * @return \Balumedien\Clubms\Domain\Model\TeamSeason
		 */
		public function getTeamSeasonGuest() {
			return $this->teamSeasonGuest;
		}
		
		/**
		 * @param \Balumedien\Clubms\Domain\Model\TeamSeason $teamSeasonGuest
		 */
		public function setTeamSeasonGuest(\Balumedien\Clubms\Domain\Model\TeamSeason $teamSeasonGuest): void {
			$this->teamSeasonGuest = $teamSeasonGuest;
		}
		
		/**
		 * @return int
		 */
		public function getStatus(): int {
			return $this->status;
		}
		
		/**
		 * @param int $status
		 */
		public function setStatus(int $status): void {
			$this->status = $status;
		}
		
		/**
		 * @return \Balumedien\Clubms\Domain\Model\CompetitionSeasonGameday
		 */
		public function getGameday() {
			return $this->gameday;
		}
		
		/**
		 * @param \Balumedien\Clubms\Domain\Model\CompetitionSeasonGameday $gameday
		 */
		public function setGameday(\Balumedien\Clubms\Domain\Model\CompetitionSeasonGameday $gameday): void {
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
		public function setDate(int $date) {
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
		public function setTime(int $time) {
			$this->time = $time;
		}
		
		/**
		 * @return \Balumedien\Clubms\Domain\Model\Venue
		 */
		public function getVenue() {
			return $this->venue;
		}
		
		/**
		 * @param \Balumedien\Clubms\Domain\Model\Venue $venue
		 */
		public function setVenue(\Balumedien\Clubms\Domain\Model\Venue $venue) {
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
		public function setSpectators(int $spectators) {
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
		public function setPeriodCount(int $periodCount) {
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
		public function setPeriodDuration(int $periodDuration) {
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
		public function setGamePeriods(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $gamePeriods) {
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
		public function setResultEndRegularHome(int $resultEndRegularHome) {
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
		public function setResultEndRegularGuest(int $resultEndRegularGuest) {
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
		public function setResultEndAdditional(int $resultEndAdditional) {
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
		public function setResultEndOvertimeHome(int $resultEndOvertimeHome) {
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
		public function setResultEndOvertimeGuest(int $resultEndOvertimeGuest) {
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
		public function setResultEndPenaltyHome(int $resultEndPenaltyHome) {
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
		public function setResultEndPenaltyGuest(int $resultEndPenaltyGuest) {
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
		public function setResultType(int $resultType) {
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
		public function setResultHalfsFirstHome(int $resultHalfsFirstHome) {
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
		public function setResultHalfsFirstGuest(int $resultHalfsFirstGuest) {
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
		public function setResultHalfsSecondHome(int $resultHalfsSecondHome) {
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
		public function setResultHalfsSecondGuest(int $resultHalfsSecondGuest) {
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
		public function setResultThirdsFirstHome(int $resultThirdsFirstHome) {
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
		public function setResultThirdsFirstGuest(int $resultThirdsFirstGuest) {
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
		public function setResultThirdsSecondHome(int $resultThirdsSecondHome) {
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
		public function setResultThirdsSecondGuest(int $resultThirdsSecondGuest) {
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
		public function setResultThirdsThirdHome(int $resultThirdsThirdHome) {
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
		public function setResultThirdsThirdGuest(int $resultThirdsThirdGuest) {
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
		public function setResultFourthsFirstHome(int $resultFourthsFirstHome) {
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
		public function setResultFourthsFirstGuest(int $resultFourthsFirstGuest) {
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
		public function setResultFourthsSecondHome(int $resultFourthsSecondHome) {
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
		public function setResultFourthsSecondGuest(int $resultFourthsSecondGuest) {
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
		public function setResultFourthsThirdHome(int $resultFourthsThirdHome) {
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
		public function setResultFourthsThirdGuest(int $resultFourthsThirdGuest) {
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
		public function setResultFourthsFourthHome(int $resultFourthsFourthHome) {
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
		public function setResultFourthsFourthGuest(int $resultFourthsFourthGuest) {
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
		public function setResultSets(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $resultSets) {
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
		public function setGameLineupHomeStarts( \TYPO3\CMS\Extbase\Persistence\ObjectStorage$gameLineupHomeStarts) {
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
		public function setGameLineupHomeSubstitutes(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $gameLineupHomeSubstitutes) {
			$this->gameLineupHomeSubstitutes = $gameLineupHomeSubstitutes;
		}
		
		/**
		 * @return TeamSeasonOfficial
		 */
		public function getTrainerHome() {
			return $this->trainerHome;
		}
		
		/**
		 * @param \Balumedien\Clubms\Domain\Model\TeamSeasonOfficial $trainerHome
		 */
		public function setTrainerHome(\Balumedien\Clubms\Domain\Model\TeamSeasonOfficial $trainerHome) {
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
		public function setGameLineupGuestStarts(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $gameLineupGuestStarts) {
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
		public function setGameLineupGuestSubstitutes(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $gameLineupGuestSubstitutes) {
			$this->gameLineupGuestSubstitutes = $gameLineupGuestSubstitutes;
		}
		
		/**
		 * @return TeamSeasonOfficial
		 */
		public function getTrainerGuest() {
			return $this->trainerGuest;
		}
		
		/**
		 * @param \Balumedien\Clubms\Domain\Model\TeamSeasonOfficial $trainerGuest
		 */
		public function setTrainerGuest(\Balumedien\Clubms\Domain\Model\TeamSeasonOfficial $trainerGuest) {
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
		public function setGameChanges(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $gameChanges) {
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
		public function setGameGoals(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $gameGoals) {
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
		public function setGamePunishments(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $gamePunishments) {
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
		public function setGameReferees(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $gameReferees) {
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
		public function setGameReports(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $gameReports) {
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