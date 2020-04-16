<?php
	
	namespace Balumedien\Sportms\Controller;
	
	/**
	 * TeamSeasonController
	 */
	class TeamSeasonController extends SportMSBaseController {
		
		/**
		 * @var \Balumedien\Sportms\Domain\Repository\TeamSeasonRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $teamSeasonRepository;
		
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
			$listOfPossibleShowViews = 'index,competitions,games,stats';
			$this->determineShowView($this->model);
			$this->determineShowViews($this->model, $listOfPossibleShowViews);
			$this->determineShowNavigationViews($this->model, $listOfPossibleShowViews);
			$this->view->assign('settings', $this->settings);
		}
		
		/**
		 * @param \Balumedien\Sportms\Domain\Model\TeamSeason $teamSeason
		 */
		public function indexAction(\Balumedien\Sportms\Domain\Model\TeamSeason $teamSeason = NULL) {
			$this->initializeActions();
			if($teamSeason === NULL) {
				if($this->settings['teamseason']['uid']) {
					$teamSeasonUid = $this->settings['teamseason']['uid'];
					$teamSeason = $this->teamSeasonRepository->findByUid($teamSeasonUid);
				} else {
					// TODO: DIE IF NO TEAM IS SELECTED VIA FLEXFORM
				}
			}
			$this->view->assign('teamSeason', $teamSeason);
		}
		
	}