<?php
	
	namespace Balumedien\Sportms\Controller;
	
	/**
	 * TeamController
	 */
	class TeamController extends SportMSBaseController {
		
		protected $model = 'team';
		
		/**
		 * @var \Balumedien\Sportms\Domain\Repository\TeamRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $teamRepository;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Repository\SportRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $sportRepository;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Repository\SportAgeGroupRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $sportAgeGroupRepository;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Repository\SportAgeLevelRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $sportAgeLevelRepository;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Repository\ClubRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $clubRepository;
		
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
		 * @return void
		 * @throws \TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException
		 */
		public function listAction(): void {
			$this->initializeActions();
			$teams = $this->teamRepository->findAll($this->getSportsFilter(), $this->getSportAgeGroupsFilter(), $this->getSportAgeLevelsFilter(), $this->getClubsFilter(), $this->getTeamsFilter());
			$this->view->assign('teams', $teams);
			/* FRONTEND FILTERS */
			if($this->settings['sport']['sportsSelectbox'] || $this->settings['club']['clubsSelectbox']) {
				if($this->settings['sport']['sportsSelectbox']) {
					$sportsSelectbox = $this->sportRepository->findAll($this->getSportsFilter(FALSE));
					$this->view->assign('sportsSelectbox', $sportsSelectbox);
					if($this->settings['sport']['selected'] && $this->settings['sportAgeGroup']['sportAgeGroupsSelectbox']) {
						$sportAgeGroupsSelectbox = $this->sportAgeGroupRepository->findAll($this->getSportsFilter(), $this->getSportAgeGroupsFilter(FALSE));
						$this->view->assign('sportAgeGroupsSelectbox', $sportAgeGroupsSelectbox);
						if($this->settings['sportAgeGroup']['selected'] && $this->settings['sportAgeLevel']['sportAgeLevelsSelectbox']) {
							$sportAgeLevelsSelectbox = $this->sportAgeLevelRepository->findAll($this->getSportsFilter(), $this->getSportAgeGroupsFilter(), $this->getSportAgeLevelsFilter(FALSE));
							$this->view->assign('sportAgeLevelsSelectbox', $sportAgeLevelsSelectbox);
						}
					}
				}
				if($this->settings['club']['clubsSelectbox']) {
					$clubsSelectbox = $this->clubRepository->findAll($this->getClubsFilter(FALSE));
					$this->view->assign('clubsSelectbox', $clubsSelectbox);
				}
			}
		}
		
		/**
		 * @param \Balumedien\Sportms\Domain\Model\Team $team
		 */
		public function historyRecordGamesAction(\Balumedien\Sportms\Domain\Model\Team $team = NULL) {
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
		
		/**
		 * @param \Balumedien\Sportms\Domain\Model\Team $team
		 * @param \Balumedien\Sportms\Domain\Model\Season $season
		 */
		public function seasonIndexAction(\Balumedien\Sportms\Domain\Model\Team $team = NULL, \Balumedien\Sportms\Domain\Model\Season $season = NULL) {
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