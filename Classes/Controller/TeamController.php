<?php
	
	namespace Balumedien\Clubms\Controller;
	
	/**
	 * TeamController
	 */
	class TeamController extends ClubMSBaseController {
		
		protected $model = 'team';
		
		/**
		 * @var \Balumedien\Clubms\Domain\Repository\TeamRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $teamRepository;
		
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
			$listOfPossibleShowViews = 'index,competitions,games,stats';
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
			$teams = $this->teamRepository->findAll($this->getTeamsFilter(), $this->getClubsFilter(), $this->getSectionsFilter(), $this->getSectionAgeGroupsFilter(), $this->getSectionAgeLevelsFilter());
			$this->view->assign('teams', $teams);
		}
		
		/**
		 * @param \Balumedien\Clubms\Domain\Model\Team $team
		 */
		public function showAction(\Balumedien\Clubms\Domain\Model\Team $team = NULL) {
			$this->initializeActions();
			if($team === NULL) {
				if($this->settings['team']['uid']) {
					$teamUid = $this->settings['team']['uid'];
					$team = $this->teamRepository->findByUid($teamUid);
				} else {
					// TODO: DIE IF NO TEAM IS SELECTED VIA FLEXFORM
				}
			}
			$this->view->assign('team', $team);
		}
		
	}