<?php
	
	namespace Balumedien\Clubms\Controller;
	
	/**
	 * SeasonController
	 */
	class SeasonController extends ClubMSBaseController {
		
		protected $model = 'season';
		
		/**
		 * @var \Balumedien\Clubms\Domain\Repository\SeasonRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $seasonRepository;
		
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
			$seasons = $this->seasonRepository->findAll($this->getSeasonsFilter());
			$this->view->assign('seasons', $seasons);
		}
		
		/**
		 * @param \Balumedien\Clubms\Domain\Model\Season $season
		 */
		public function showAction(\Balumedien\Clubms\Domain\Model\Season $season = NULL) {
			$this->initializeActions();
			$this->view->assign('season', $season);
		}
		
	}