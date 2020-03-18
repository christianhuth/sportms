<?php
	
	namespace Balumedien\Clubms\Controller;
	
	/**
	 * ClubSectionController
	 */
	class ClubSectionController extends ClubMSBaseController {
		
		protected $model = 'clubSection';
		
		/**
		 * @var \Balumedien\Clubms\Domain\Repository\ClubSectionRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $clubSectionRepository;
		
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
			$listOfPossibleShowViews = 'index,officials,teams';
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
			$clubSections = $this->clubSectionRepository->findAll($this->getClubsFilter(), $this->getSectionsFilter());
			$this->view->assign('clubSections', $clubSections);
		}
		
		/**
		 * @param \Balumedien\Clubms\Domain\Model\ClubSection $clubSection
		 */
		public function showAction(\Balumedien\Clubms\Domain\Model\ClubSection $clubSection = NULL) {
			$this->initializeActions();
			if($clubSection === NULL) {
				// TODO: CHECK IF SETTINGS IS SET ELSE DIE
				$clubSectionUid = $this->settings['clubSection']['uid'];
				$clubSection = $this->clubSectionRepository->findByUid($clubSectionUid);
			}
			$this->view->assign('clubSection', $clubSection);
		}
		
	}