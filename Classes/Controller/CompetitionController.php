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
		 */
		public function listAction() {
			$this->initializeActions();
			\TYPO3\CMS\Core\Utility\DebugUtility::debug($this->settings, 'Debug: ' . __FILE__ . ' in Line: ' . __LINE__);
			\TYPO3\CMS\Core\Utility\DebugUtility::debug($this->getCompetitionsFilter(), 'Debug: ' . __FILE__ . ' in Line: ' . __LINE__);
			$competitionTypesFilter = $this->settings['competition']['competitionTypes'];
			$sectionsFilter = $this->settings['section']['sections'];
			$sectionAgeGroupsFilter = $this->settings['section']['sectionAgeGroups'];
			$sectionAgeLevelsFilter = $this->settings['section']['sectionAgeLevels'];
			$competitions = $this->competitionRepository->findAll($this->getCompetitionsFilter(), $competitionTypesFilter, $sectionsFilter, $sectionAgeGroupsFilter, $sectionAgeLevelsFilter);
			$this->view->assign('competitions', $competitions);
		}
		
		/**
		 * @param \Balumedien\Clubms\Domain\Model\Competition $competition
		 */
		public function showAction(\Balumedien\Clubms\Domain\Model\Competition $competition = NULL) {
			$this->initializeActions();
			if($competition === NULL) {
				$competitionUid = $this->settings['competition']['uid'];
				$competition = $this->competitionRepository->findByUid($competitionUid);
			}
			$this->view->assign('competition', $competition);
		}
		
	}