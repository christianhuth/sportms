<?php
	
	namespace Balumedien\Clubms\Controller;
	
	/**
	 * ClubMSController
	 */
	class ClubMSController extends ClubMSBaseController {
		
		/**
		 * @var \Balumedien\Clubms\Domain\Repository\AddressRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $addressRepository = NULL;
		
		/**
		 * @var \Balumedien\Clubms\Domain\Repository\ClubRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $clubRepository = NULL;
		
		/**
		 * @var \Balumedien\Clubms\Domain\Repository\ClubGroundRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $clubGroundRepository = NULL;
		
		/**
		 * @var \Balumedien\Clubms\Domain\Repository\ClubMembersRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $clubMembersRepository = NULL;
		
		/**
		 * @var \Balumedien\Clubms\Domain\Repository\ClubOfficialRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $clubOfficialRepository = NULL;
		
		/**
		 * @var \Balumedien\Clubms\Domain\Repository\ClubOfficialJobRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $clubOfficialJobRepository = NULL;
		
		/**
		 * @var \Balumedien\Clubms\Domain\Repository\ClubSectionRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $clubSectionRepository = NULL;
		
		/**
		 * @var \Balumedien\Clubms\Domain\Repository\ClubSectionMembersRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $clubSectionMembersRepository = NULL;
		
		/**
		 * @var \Balumedien\Clubms\Domain\Repository\ClubSectionOfficialRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $clubSectionOfficialRepository = NULL;
		
		/**
		 * @var \Balumedien\Clubms\Domain\Repository\ClubSectionOfficialJobRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $clubSectionOfficialJobRepository = NULL;
		
		/**
		 * @var \Balumedien\Clubms\Domain\Repository\CompetitionRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $competitionRepository = NULL;
		
		/**
		 * @var \Balumedien\Clubms\Domain\Repository\GameRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $gameRepository = NULL;
		
		/**
		 * @var \Balumedien\Clubms\Domain\Repository\PersonRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $personRepository = NULL;
		
		/**
		 * @var \Balumedien\Clubms\Domain\Repository\TeamRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $teamRepository = NULL;
		
		/**
		 * @return void
		 */
		public function dbStatsAction() {
			
			$dbStats = $this->settings['dbStats'];
			
			/* Domain Model Address */
			if(strpos($dbStats, 'Address') !== FALSE) {
				$this->view->assign('addressCount', $this->addressRepository->findAll()->count());
			}
			/* Domain Model Club */
			if(strpos($dbStats, 'Club') !== FALSE) {
				$this->view->assign('clubCount', $this->clubRepository->findAll()->count());
			}
			/* Domain Model ClubGround */
			if(strpos($dbStats, 'ClubGround') !== FALSE) {
				$this->view->assign('clubGroundCount', $this->clubGroundRepository->findAll()->count());
			}
			/* Domain Model ClubMembers */
			if(strpos($dbStats, 'ClubMembers') !== FALSE) {
				$this->view->assign('clubMembersCount', $this->clubMembersRepository->findAll()->count());
			}
			/* Domain Model ClubOfficial */
			if(strpos($dbStats, 'ClubOfficial') !== FALSE) {
				$this->view->assign('clubOfficialCount', $this->clubOfficialRepository->findAll()->count());
			}
			/* Domain Model ClubOfficialJob */
			if(strpos($dbStats, 'ClubOfficialJob') !== FALSE) {
				$this->view->assign('clubOfficialJobCount', $this->clubOfficialJobRepository->findAll()->count());
			}
			/* Domain Model ClubSection */
			if(strpos($dbStats, 'ClubSection') !== FALSE) {
				$this->view->assign('clubSectionCount', $this->clubSectionRepository->findAll()->count());
			}
			/* Domain Model ClubSectionMembers */
			if(strpos($dbStats, 'ClubSectionMembers') !== FALSE) {
				$this->view->assign('clubSectionMembersCount', $this->clubSectionMembersRepository->findAll()->count());
			}
			/* Domain Model ClubSectionOfficial */
			if(strpos($dbStats, 'ClubSectionOfficial') !== FALSE) {
				$this->view->assign('clubSectionOfficialCount', $this->clubSectionOfficialRepository->findAll()->count());
			}
			/* Domain Model ClubSectionOfficialJob */
			if(strpos($dbStats, 'ClubSectionOfficialJob') !== FALSE) {
				$this->view->assign('clubSectionOfficialJobCount', $this->clubSectionOfficialJobRepository->findAll()->count());
			}
			/* Domain Model Competition */
			if(strpos($dbStats, 'Competition') !== FALSE) {
				$this->view->assign('competitionCount', $this->competitionRepository->findAll()->count());
			}
			/* Domain Model Game */
			if(strpos($dbStats, 'Game') !== FALSE) {
				$this->view->assign('gameCount', $this->gameRepository->findAll()->count());
			}
			/* Domain Model Person */
			if(strpos($dbStats, 'Person') !== FALSE) {
				$this->view->assign('personCount', $this->personRepository->findAll()->count());
			}
			/* Domain Model Team */
			if(strpos($dbStats, 'Team') !== FALSE) {
				$this->view->assign('teamCount', $this->teamRepository->findAll()->count());
			}
			
		}
		
	}