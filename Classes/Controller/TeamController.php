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
		 * @var \Balumedien\Clubms\Domain\Repository\ClubRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $clubRepository;
		
		/**
		 * @var \Balumedien\Clubms\Domain\Repository\SectionRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $sectionRepository;
		
		/**
		 * @var \Balumedien\Clubms\Domain\Repository\SectionAgeGroupRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $sectionAgeGroupRepository;
		
		/**
		 * @var \Balumedien\Clubms\Domain\Repository\SectionAgeLevelRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $sectionAgeLevelRepository;
		
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
			/* FRONTEND FILTERS */
			if($this->settings['section']['sectionsSelectbox'] || $this->settings['club']['clubsSelectbox']) {
				if($this->settings['section']['sectionsSelectbox']) {
					$sectionsSelectbox = $this->sectionRepository->findAll($this->getSectionsFilter(FALSE));
					$this->view->assign('sectionsSelectbox', $sectionsSelectbox);
					if($this->settings['section']['selected']) {
						$sectionAgeGroupsSelectbox = $this->sectionAgeGroupRepository->findAll($this->getSectionAgeGroupsFilter(FALSE), $this->getSectionsFilter());
						$this->view->assign('sectionAgeGroupsSelectbox', $sectionAgeGroupsSelectbox);
						if($this->settings['sectionAgeGroup']['selected']) {
							$sectionAgeLevelsSelectbox = $this->sectionAgeLevelRepository->findAll($this->getSectionAgeLevelsFilter(FALSE), $this->getSectionAgeGroupsFilter(), $this->getSectionsFilter());
							$this->view->assign('sectionAgeLevelsSelectbox', $sectionAgeLevelsSelectbox);
						}
					}
				}
				if($this->settings['club']['clubsSelectbox']) {
					$clubsSelectbox = $this->competitionTypeRepository->findAll($this->getCompetitionTypesFilter(FALSE));
					$this->view->assign('clubsSelectbox', $clubsSelectbox);
				}
			}
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