<?php
	
	namespace Balumedien\Clubms\Controller;
	
	/**
	 * TeamSeasonController
	 */
	class TeamSeasonController extends ClubMSBaseController {
		
		protected $model = 'teamSeason';
		
		/**
		 * @var \Balumedien\Clubms\Domain\Repository\TeamSeasonRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $teamSeasonRepository;
		
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
			$teamSeasons = $this->teamSeasonRepository->findAll($this->getTeamsFilter(), $this->getClubsFilter(), $this->getSectionsFilter(), $this->getSectionAgeGroupsFilter(), $this->getSectionAgeLevelsFilter(), $this->getSeasonsFilter());
			$this->view->assign('teamSeasons', $teamSeasons);
		}
		
		/**
		 * @param \Balumedien\Clubms\Domain\Model\TeamSeason|null $teamSeason
		 * @throws \TYPO3\CMS\Extbase\Mvc\Exception\NoSuchArgumentException
		 */
		public function showAction(\Balumedien\Clubms\Domain\Model\TeamSeason $teamSeason = NULL): void {
			$this->initializeActions();
			if($teamSeason === NULL) {
				$listOfArguments = 'season,team';
				foreach(explode(',', $listOfArguments) as $argument) {
					if($this->request->hasArgument($argument)) {
						$this->request->getArgument($argument) ? $this->settings[$argument]['uid'] = $this->request->getArgument($argument) : $this->settings[$argument]['uid'];
					}
				}
				$this->view->assign('settings', $this->settings);
				$teamSeason = $this->teamSeasonRepository->findByTeamUidAndSeasonUid($this->settings['team']['uid'], $this->settings['season']['uid']);
			}
			$this->view->assign('teamSeason', $teamSeason[0]);
		}
		
	}