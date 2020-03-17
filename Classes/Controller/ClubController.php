<?php
	
	namespace Balumedien\Clubms\Controller;
	
	/**
	 * ClubController
	 */
	class ClubController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {
		
		/**
		 * @var \Balumedien\Clubms\Domain\Repository\ClubRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $clubRepository = NULL;
		
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
		 * @return void
		 */
		public function listAction() {
			$clubsFilter = $this->settings['club']['clubs'];
			$clubs = $this->clubRepository->findAll($clubsFilter);
			$this->view->assign('clubs', $clubs);
		}
		
		/**
		 * @param string $showView
		 * @param \Balumedien\Clubms\Domain\Model\Club $club club item
		 */
		public function showAction(\Balumedien\Clubms\Domain\Model\Club $club = NULL) {
			
			($this->request->getArgument('showView')) ? $this->settings['club']['showView'] = $this->request->getArgument('showView') : $this->settings['club']['showView'];
			$this->view->assign('settings', $this->settings);
			
			\TYPO3\CMS\Core\Utility\DebugUtility::debug($this->settings['club']['showView'], 'Debug: ' . __FILE__ . ' in Line: ' . __LINE__);
			\TYPO3\CMS\Core\Utility\DebugUtility::debug($this->request->getArgument('showView'), 'Debug: ' . __FILE__ . ' in Line: ' . __LINE__);
			
			if($club === NULL) {
				// TODO: CHECK IF SETTINGS IS SET ELSE DIE
				$clubUid = $this->settings['club']['uid'];
				$club = $this->clubRepository->findByUid($clubUid);
			}
			$this->view->assign('club', $club);
		}
		
		/**
		 * @param \Balumedien\Clubms\Domain\Model\Club|null $club
		 */
		public function officialsAction(\Balumedien\Clubms\Domain\Model\Club $club = NULL) {
			
			$clubs = $this->settings['club']['clubs'];
			$jobs = $this->settings['club']['officials']['jobs'];
			$currentOfficialsOnly = $this->settings['club']['officials']['currentOfficialsOnly'];
			
			$clubOfficials = $this->clubOfficialRepository->findAll($clubs, $jobs, $currentOfficialsOnly);
			
			$this->view->assign('clubOfficials', $clubOfficials);
			
		}
		
		/**
		 * @param \Balumedien\Clubms\Domain\Model\Club $club club item
		 */
		public function sectionsAction(\Balumedien\Clubms\Domain\Model\Club $club = NULL) {
			if($club === NULL) {
				$clubUid = $this->settings['club']['uid'];
				$club = $this->clubRepository->findByUid($clubUid);
			}
			$this->view->assign('club', $club);
		}
		
	}