<?php
	
	namespace Balumedien\Sportms\Controller;
	
	/**
	 * TeamSeasonController
	 */
	class TeamSeasonController extends SportMSBaseController {
		
		protected $model = 'teamSeason';
		
		/**
		 * @var \Balumedien\Sportms\Domain\Repository\TeamSeasonRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $teamSeasonRepository;
		
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
		 * @var \Balumedien\Sportms\Domain\Repository\TeamRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $teamRepository;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Repository\SeasonRepository
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
			$teamSeasons = $this->teamSeasonRepository->findAll($this->getSectionsFilter(), $this->getSectionAgeGroupsFilter(), $this->getSectionAgeLevelsFilter(), $this->getClubsFilter(), $this->getTeamsFilter(), $this->getSeasonsFilter());
			$this->view->assign('teamSeasons', $teamSeasons);
			/* FRONTEND FILTERS */
			if($this->settings['section']['sectionsSelectbox'] || $this->settings['club']['clubsSelectbox'] || $this->settings['team']['teamsSelectbox'] || $this->settings['season']['seasonsSelectbox']) {
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
				if($this->settings['team']['teamsSelectbox']) {
					$teamsSelectbox = $this->teamRepository->findAll($this->getSectionsFilter(), $this->getSectionAgeGroupsFilter(), $this->getSectionAgeLevelsFilter(), $this->getClubsFilter(), $this->getTeamsFilter(FALSE));
					$this->view->assign('teamsSelectbox', $teamsSelectbox);
				}
				if($this->settings['season']['seasonsSelectbox']) {
					$seasonsSelectbox = $this->seasonRepository->findAll($this->getSeasonsFilter(FALSE));
					$this->view->assign('seasonsSelectbox', $seasonsSelectbox);
				}
			}
		}
		
		/**
		 * @param \Balumedien\Sportms\Domain\Model\TeamSeason|null $teamSeason
		 * @throws \TYPO3\CMS\Extbase\Mvc\Exception\NoSuchArgumentException
		 */
		public function showAction(\Balumedien\Sportms\Domain\Model\TeamSeason $teamSeason = NULL): void {
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