<?php
	
	namespace Balumedien\Sportms\Controller;
	
	/**
	 * SportController
	 */
	class SportController extends SportMSBaseController {
		
		protected $model = 'sport';
		
		/**
		 * @var \Balumedien\Sportms\Domain\Repository\SportRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $sportRepository;
		
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
			$listOfPossibleShowViews = 'index';
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
			$sports = $this->sportRepository->findAll($this->getSportsFilter());
			$this->view->assign('sports', $sports);
		}
		
		/**
		 * @param \Balumedien\Sportms\Domain\Model\Sport $sport
		 */
		public function showAction(\Balumedien\Sportms\Domain\Model\Sport $sport = NULL) {
			$this->initializeActions();
			$this->view->assign('sport', $sport);
		}
		
	}