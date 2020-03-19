<?php
	
	namespace Balumedien\Clubms\Controller;
	
	/**
	 * ClubController
	 */
	class ClubController extends ClubMSBaseController {
		
		protected $model = 'club';
		
		/**
		 * @var \Balumedien\Clubms\Domain\Repository\ClubRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $clubRepository = NULL;
		
		/**
		 * Initializes the controller before invoking an action method.
		 * Use this method to solve tasks which all actions have in common.
		 */
		public function initializeAction() {
			$this->mapRequestsToSettings();
		}
		
		/**
		 * Use this method to solve tasks which all actions have in common, when VIEW-Context is needed
		 */
		public function initializeActions() {
			$listOfPossibleShowViews = 'index,officials,sections';
			$this->determineShowView($this->model);
			$this->determineShowViews($this->model, $listOfPossibleShowViews);
			$this->determineShowNavigationViews($this->model, $listOfPossibleShowViews);
			$this->view->assign('settings', $this->settings);
		}
		
		/**
		 * @return void
		 */
		public function listAction() {
			$this->initializeActions();
			$clubs = $this->clubRepository->findAll($this->getClubsFilter());
			$this->view->assign('clubs', $clubs);
		}
		
		/**
		 * @param \Balumedien\Clubms\Domain\Model\Club $club
		 */
		public function showAction(\Balumedien\Clubms\Domain\Model\Club $club = NULL) {
			$this->initializeActions();
			if($club === NULL) {
				// TODO: CHECK IF SETTINGS IS SET ELSE DIE
				$clubUid = $this->settings['club']['uid'];
				$club = $this->clubRepository->findByUid($clubUid);
			}
			$this->view->assign('club', $club);
		}
		
	}