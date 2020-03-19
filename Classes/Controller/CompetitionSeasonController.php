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
		 * @var \Balumedien\Clubms\Domain\Repository\SeasonRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $seasonRepository;
		
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
			$competitionSeasons = $this->competitionSeasonRepository->findAll($this->getCompetitionsFilter(), $this->getCompetitionTypesFilter(), $this->getSectionsFilter(), $this->getSectionAgeGroupsFilter(), $this->getSectionAgeLevelsFilter(), $this->getSeasonsFilter());
			$this->view->assign('competitionSeasons', $competitionSeasons);
			/* FRONTEND FILTERS */
			if($this->settings['section']['sectionsSelectbox'] || $this->settings['competition']['competitionTypesSelectbox'] || $this->settings['season']['seasonsSelectbox']) {
				if($this->settings['section']['sectionsSelectbox']) {
					$sectionsSelectbox = $this->sectionRepository->findAllByUids($this->getSectionsFilter(FALSE));
					$this->view->assign('sectionsSelectbox', $sectionsSelectbox);
					if($this->settings['section']['selected']) {
						$sectionAgeGroupsSelectbox = $this->sectionAgeGroupRepository->findAll($this->getSectionAgeGroupsFilter(), $this->getSectionsFilter());
						$this->view->assign('sectionAgeGroupsSelectbox', $sectionAgeGroupsSelectbox);
						if($this->settings['sectionAgeGroup']['selected']) {
							$sectionAgeLevelsSelectbox = $this->sectionAgeLevelRepository->findAll($this->getSectionAgeLevelsFilter(), $this->getSectionsFilter());
							$this->view->assign('sectionAgeLevelsSelectbox', $sectionAgeLevelsSelectbox);
						}
					}
				}
				if($this->settings['competitionType']['competitionTypesSelectbox']) {
					$competitionTypesSelectbox = $this->competitionTypeRepository->findAll($this->getCompetitionTypesFilter(FALSE));
					$this->view->assign('competitionTypesSelectbox', $competitionTypesSelectbox);
				}
				if($this->settings['competition']['competitionsSelectbox']) {
					$competitionsSelectbox = $this->competitionRepository->findAll($this->getCompetitionsFilter(FALSE), $this->getCompetitionTypesFilter(), $this->getSectionsFilter(FALSE), $this->getSectionAgeGroupsFilter(FALSE), $this->getSectionAgeLevelsFilter(FALSE));
					$this->view->assign('competitionsSelectbox', $competitionsSelectbox);
				}
				if($this->settings['season']['seasonsSelectbox']) {
					$seasonsSelectbox = $this->seasonRepository->findAll($this->getSeasonsFilter(FALSE));
					$this->view->assign('seasonsSelectbox', $seasonsSelectbox);
				}
			}
		}
		
		/**
		 * @param \Balumedien\Clubms\Domain\Model\CompetitionSeason $competitionSeason
		 */
		public function showAction(\Balumedien\Clubms\Domain\Model\CompetitionSeason $competitionSeason = NULL): void {
			$this->initializeActions();
			if($competitionSeason === NULL) {
				$competitionSeasonUid = $this->settings['competitionSeason']['uid'];
				$competitionSeason = $this->competitionSeasonRepository->findByUid($competitionSeasonUid);
			}
			$this->view->assign('competitionSeason', $competitionSeason);
		}
		
	}