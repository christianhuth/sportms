<?php
	
	namespace Balumedien\Sportms\Controller;
	
	/**
	 * CompetitionSeasonController
	 */
	class CompetitionSeasonController extends SportMSBaseController {
		
		protected $model = 'competitionSeason';
		
		/**
		 * @var \Balumedien\Sportms\Domain\Repository\CompetitionSeasonRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $competitionSeasonRepository;
		
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
		 * @var \Balumedien\Sportms\Domain\Repository\CompetitionTypeRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $competitionTypeRepository;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Repository\CompetitionRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $competitionRepository;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Repository\SeasonRepository
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
			$competitionSeasons = $this->competitionSeasonRepository->findAll($this->getSectionsFilter(), $this->getSectionAgeGroupsFilter(), $this->getSectionAgeLevelsFilter(), $this->getCompetitionTypesFilter(), $this->getCompetitionsFilter(), $this->getSeasonsFilter());
			$this->view->assign('competitionSeasons', $competitionSeasons);
			/* FRONTEND FILTERS */
			if($this->settings['section']['sectionsSelectbox'] || $this->settings['competitionType']['competitionTypesSelectbox'] || $this->settings['competition']['competitionsSelectbox'] || $this->settings['season']['seasonsSelectbox']) {
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
				if($this->settings['competitionType']['competitionTypesSelectbox']) {
					$competitionTypesSelectbox = $this->competitionTypeRepository->findAll($this->getCompetitionTypesFilter(FALSE));
					$this->view->assign('competitionTypesSelectbox', $competitionTypesSelectbox);
				}
				if($this->settings['competition']['competitionsSelectbox']) {
					$competitionsSelectbox = $this->competitionRepository->findAll($this->getSectionsFilter(), $this->getSectionAgeGroupsFilter(), $this->getSectionAgeLevelsFilter(), $this->getCompetitionTypesFilter(), $this->getCompetitionsFilter(FALSE));
					$this->view->assign('competitionsSelectbox', $competitionsSelectbox);
				}
				if($this->settings['season']['seasonsSelectbox']) {
					$seasonsSelectbox = $this->seasonRepository->findAll($this->getSeasonsFilter(FALSE));
					$this->view->assign('seasonsSelectbox', $seasonsSelectbox);
				}
			}
		}
		
		/**
		 * @param \Balumedien\Sportms\Domain\Model\CompetitionSeason $competitionSeason
		 */
		public function showAction(\Balumedien\Sportms\Domain\Model\CompetitionSeason $competitionSeason = NULL): void {
			$this->initializeActions();
			if($competitionSeason === NULL) {
				$competitionSeasonUid = $this->settings['competitionSeason']['uid'];
				$competitionSeason = $this->competitionSeasonRepository->findByUid($competitionSeasonUid);
			}
			$this->view->assign('competitionSeason', $competitionSeason);
		}
		
	}