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
		protected $sectionRepository;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Repository\SportAgeGroupRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $sectionAgeGroupRepository;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Repository\SportAgeLevelRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $sectionAgeLevelRepository;
		
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
			$teams = $this->teamRepository->findAll($this->getSectionsFilter(), $this->getSectionAgeGroupsFilter(), $this->getSectionAgeLevelsFilter(), $this->getClubsFilter(), $this->getTeamsFilter());
			$this->view->assign('teams', $teams);
			/* FRONTEND FILTERS */
			if($this->settings['section']['sectionsSelectbox'] || $this->settings['club']['clubsSelectbox']) {
				if($this->settings['section']['sectionsSelectbox']) {
					$sectionsSelectbox = $this->sectionRepository->findAll($this->getSectionsFilter(FALSE));
					$this->view->assign('sectionsSelectbox', $sectionsSelectbox);
					if($this->settings['section']['selected'] && $this->settings['sectionAgeGroup']['sectionAgeGroupsSelectbox']) {
						$sectionAgeGroupsSelectbox = $this->sectionAgeGroupRepository->findAll($this->getSectionsFilter(), $this->getSectionAgeGroupsFilter(FALSE));
						$this->view->assign('sectionAgeGroupsSelectbox', $sectionAgeGroupsSelectbox);
						if($this->settings['sectionAgeGroup']['selected'] && $this->settings['sectionAgeLevel']['sectionAgeLevelsSelectbox']) {
							$sectionAgeLevelsSelectbox = $this->sectionAgeLevelRepository->findAll($this->getSectionsFilter(), $this->getSectionAgeGroupsFilter(), $this->getSectionAgeLevelsFilter(FALSE));
							$this->view->assign('sectionAgeLevelsSelectbox', $sectionAgeLevelsSelectbox);
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
		public function showAction(\Balumedien\Sportms\Domain\Model\Team $team = NULL) {
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