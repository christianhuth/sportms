<?php
	
	namespace Balumedien\Clubms\Controller;
	
	use TYPO3\CMS\Extbase\Mvc\View\ViewInterface;
	
	/**
	 * ClubController
	 */
	class ClubController extends ClubMSBaseController {
		
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
		
		public function initializeAction() {
			\TYPO3\CMS\Core\Utility\DebugUtility::debug($this->view, 'Debug: ' . __FILE__ . ' in Line: ' . __LINE__);
			$this->mergeRequestWithSettings();
		}
		
		public function initializeActions() {
		}
		
		/**
		 * @return void
		 */
		public function listAction() {
			
			$this->view->assign('settings', $this->settings);
			\TYPO3\CMS\Core\Utility\DebugUtility::debug($this->settings, 'Debug: ' . __FILE__ . ' in Line: ' . __LINE__);
			
			if($this->settings['club']['clubsSelectbox']) {
				$clubsSelectbox = $this->clubRepository->findAll($this->getClubsFilter(FALSE));
				$this->view->assign('clubsSelectbox', $clubsSelectbox);
			}
			
			$clubs = $this->clubRepository->findAll($this->getClubsFilter());
			$this->view->assign('clubs', $clubs);
			
		}
		
		/**
		 * @param \Balumedien\Clubms\Domain\Model\Club $club
		 */
		public function showAction(\Balumedien\Clubms\Domain\Model\Club $club = NULL) {
			
			#$this->determineShowView('club', $this->settings, $this->view);
			$this->settings['club']['showView'] = ($this->settings['club']['showView']) ? : 'index';
			$this->view->assign('settings', $this->settings);
			
			\TYPO3\CMS\Core\Utility\DebugUtility::debug($this->settings, 'Debug: ' . __FILE__ . ' in Line: ' . __LINE__);
			
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