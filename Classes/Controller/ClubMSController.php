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
		protected $clubRepository = NULL;
		
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
			
			/* Domain Model Club */
			if(strpos($dbStats, 'Club') !== FALSE) {
				$this->view->assign('clubCount', $this->clubRepository->findAll()->count());
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