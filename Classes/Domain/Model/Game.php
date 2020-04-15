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
		 * @var int
		 */
		protected $gameAppointment;
		
		/**
		 * @var int
		 */
		protected $gameRating;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Model\CompetitionSeasonGameday|\TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy
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
		 * @var \Balumedien\Sportms\Domain\Model\Venue|\TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy
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
		 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Sportms\Domain\Model\GamePeriod>|\TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy
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
		 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Sportms\Domain\Model\GameResultSet>|\TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy
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
		 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Sportms\Domain\Model\GameLineup>|\TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
		 */
		protected $gameLineupHomeStarts;
		
		/**
		 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Sportms\Domain\Model\GameLineup>|\TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
		 */
		protected $gameLineupHomeSubstitutes;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Model\TeamSeasonOfficial
		 */
		protected $trainerHome;
		
		/**
		 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Sportms\Domain\Model\GameLineup>|\TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
		 */
		protected $gameLineupGuestStarts;
		
		/**
		 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Sportms\Domain\Model\GameLineup>|\TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
		 */
		protected $gameLineupGuestSubstitutes;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Model\TeamSeasonOfficial
		 */
		protected $trainerGuest;
		
		/**
		 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Sportms\Domain\Model\GameChange>|\TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
		 */
		protected $gameChanges;
		
		/**
		 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Sportms\Domain\Model\GameGoal>|\TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
		 */
		protected $gameGoals;
		
		/**
		 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Sportms\Domain\Model\GamePunishment>|\TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
		 */
		protected $gamePunishments;
		
		/**
		 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Sportms\Domain\Model\GameReferee>|\TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
		 * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
		 */
		protected $gameReferees;
		
		/**
		 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Sportms\Domain\Model\GameReport>|\TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy
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
		
	}