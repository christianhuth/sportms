<?php
	
	namespace Balumedien\Sportms\Controller;
	
	/**
	 * SeasonController
	 */
	class SeasonController extends SportMSBaseController {
		
		protected $model = 'season';
		
		/**
		 * @var \Balumedien\Sportms\Domain\Repository\SeasonRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $seasonRepository;
		
		/**
		 * Initializes the controller before invoking an action method.
		 * Use this method to solve tasks which all actions have in common.
		 */
		public function initializeAction(): void {
			$this->mapRequestsToSettings();
		}
		
		/**
		 * Use this method to solve tasks which all actions have in common, when VIEW-Context is needed
		 */
		public function initializeActions(): void {
			$listOfPossibleShowViews = 'index';
			$this->determineShowView($this->model);
			$this->determineShowViews($this->model, $listOfPossibleShowViews);
			$this->determineShowNavigationViews($this->model, $listOfPossibleShowViews);
			$this->view->assign('settings', $this->settings);
		}
		
		/**
		 * @return void
		 * @throws \TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException
		 */
		public function listAction(): void {
			$this->initializeActions();
			$seasons = $this->seasonRepository->findAll($this->getSeasonsFilter());
			$this->view->assign('seasons', $seasons);
		}
		
		/**
		 * @param \Balumedien\Sportms\Domain\Model\Season $season
		 */
		public function showAction(\Balumedien\Sportms\Domain\Model\Season $season = NULL): void {
			$this->initializeActions();
			$this->view->assign('season', $season);
		}
		
	}