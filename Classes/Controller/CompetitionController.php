<?php
	
	namespace Balumedien\Clubms\Controller;
	
	/**
	 * CompetitionController
	 */
	class CompetitionController extends ClubMSBaseController {
		
		protected $model = 'competition';
		
		/**
		 * @var \Balumedien\Clubms\Domain\Repository\CompetitionRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $competitionRepository;
		
		/**
		 * @var \Balumedien\Clubms\Domain\Repository\CompetitionTypeRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $competitionTypeRepository;
		
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
			$listOfPossibleShowViews = 'index,games,teams';
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
			$competitions = $this->competitionRepository->findAll($this->getCompetitionsFilter(), $this->getCompetitionTypesFilter(), $this->getSectionsFilter(), $this->getSectionAgeGroupsFilter(), $this->getSectionAgeLevelsFilter());
			$this->view->assign('competitions', $competitions);
			/* FRONTEND FILTERS */
			if($this->settings['section']['sectionsSelectbox'] || $this->settings['competition']['competitionTypesSelectbox']) {
				if($this->settings['section']['sectionsSelectbox']) {
					$sectionsSelectbox = $this->sectionRepository->findAllByUids($this->getSectionsFilter(FALSE));
					$this->view->assign('sectionsSelectbox', $sectionsSelectbox);
					if($this->settings['section']['selected']) {
						$sectionAgeGroupsSelectbox = $this->sectionAgeGroupRepository->findAllByUids($this->getSectionAgeGroupsFilter(FALSE));
						$this->view->assign('sectionAgeGroupsSelectbox', $sectionAgeGroupsSelectbox);
					}
				}
				if($this->settings['competition']['competitionTypesSelectbox']) {
					$competitionTypesSelectbox = $this->competitionTypeRepository->findAllByUids($this->getCompetitionTypesFilter(FALSE));
					$this->view->assign('competitionTypesSelectbox', $competitionTypesSelectbox);
				}
			}
		}
		
		/**
		 * @param \Balumedien\Clubms\Domain\Model\Competition $competition
		 */
		public function showAction(\Balumedien\Clubms\Domain\Model\Competition $competition = NULL): void {
			$this->initializeActions();
			if($competition === NULL) {
				$competitionUid = $this->settings['competition']['uid'];
				$competition = $this->competitionRepository->findByUid($competitionUid);
			}
			$this->view->assign('competition', $competition);
		}
		
	}