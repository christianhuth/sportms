<?php
	
	namespace Balumedien\Clubms\Controller;
	
	/**
	 * ClubMSController
	 */
	class ClubMSController extends ClubMSBaseController {
		
		/**
		 * @var \Balumedien\Clubms\Domain\Repository\ClubRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $clubRepository = null;
		
		/**
		 * @var \Balumedien\Clubms\Domain\Repository\CompetitionRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $competitionRepository = null;
		
		/**
		 * @var \Balumedien\Clubms\Domain\Repository\GameRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $gameRepository = null;
		
		/**
		 * @var \Balumedien\Clubms\Domain\Repository\PersonRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $personRepository = null;
		
		/**
		 * @var \Balumedien\Clubms\Domain\Repository\TeamRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $teamRepository = null;
		
		/**
		 * @return void
		 */
		public function dbStatsAction() {
			
			\TYPO3\CMS\Core\Utility\DebugUtility::debug($this->settings, 'Debug: ' . __FILE__ . ' in Line: ' . __LINE__);
			
			/* Domain Model Club */
			$clubCount = $this->clubRepository->findAll()->count();
			$this->view->assign('clubCount', $clubCount);
			
			/* Domain Model Competition */
			$competitionCount = $this->competitionRepository->findAll()->count();
			$this->view->assign('competitionCount', $competitionCount);
			
			/* Domain Model Game */
			$gameCount = $this->gameRepository->findAll()->count();
			$this->view->assign('gameCount', $gameCount);
			
			/* Domain Model Person */
			$personCount = $this->personRepository->findAll()->count();
			$this->view->assign('personCount', $personCount);
			
			/* Domain Model Team */
			$teamCount = $this->teamRepository->findAll()->count();
			$this->view->assign('teamCount', $teamCount);
			
		}
		
	}