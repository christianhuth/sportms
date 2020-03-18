<?php
	
	namespace Balumedien\Clubms\Controller;
	
	/**
	 * CompetitionSeasonController
	 */
	class CompetitionSeasonController extends ClubMSBaseController {
		
		protected $model = 'competitionSeason';
		
		/**
		 * @var \Balumedien\Clubms\Domain\Repository\CompetitionSeasonRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $competitionSeasonRepository;
		
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
			$competitionsFilter = $this->settings['competition']['competitions'];
			$competitionTypesFilter = $this->settings['competition']['competitionTypes'];
			$sectionsFilter = $this->settings['section']['sections'];
			$sectionAgeGroupsFilter = $this->settings['section']['sectionAgeGroups'];
			$sectionAgeLevelsFilter = $this->settings['section']['sectionAgeLevels'];
			$seasonsFilter = $this->settings['season']['seasons'];
			$competitionSeasons = $this->competitionSeasonRepository->findAll($competitionsFilter, $competitionTypesFilter, $sectionsFilter, $sectionAgeGroupsFilter, $sectionAgeLevelsFilter, $seasonsFilter);
			$this->view->assign('competitionSeasons', $competitionSeasons);
		}
		
		/**
		 * @param \Balumedien\Clubms\Domain\Model\CompetitionSeason $competitionSeason
		 */
		public function showAction(\Balumedien\Clubms\Domain\Model\CompetitionSeason $competitionSeason = NULL) {
			$this->initializeActions();
			if($competitionSeason === NULL) {
				$competitionSeasonUid = $this->settings['competitionSeason']['uid'];
				$competitionSeason = $this->competitionSeasonRepository->findByUid($competitionSeasonUid);
			}
			$this->view->assign('competitionSeason', $competitionSeason);
		}
		
	}