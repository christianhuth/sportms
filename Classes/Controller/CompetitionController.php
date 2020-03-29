<?php
	
	namespace Balumedien\Sportms\Controller;
	
	/**
	 * CompetitionController
	 */
	class CompetitionController extends SportMSBaseController {
		
		protected $model = 'competition';
		
		/**
		 * @var \Balumedien\Sportms\Domain\Repository\CompetitionRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $competitionRepository;
		
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
			$competitions = $this->competitionRepository->findAll($this->getSportsFilter(), $this->getSportAgeGroupsFilter(), $this->getSportAgeLevelsFilter(), $this->getCompetitionTypesFilter(), $this->getCompetitionsFilter());
			$this->view->assign('competitions', $competitions);
			/* FRONTEND FILTERS */
			if($this->settings['sport']['sportsSelectbox'] || $this->settings['competition']['competitionTypesSelectbox']) {
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
				if($this->settings['competitionType']['competitionTypesSelectbox']) {
					$competitionTypesSelectbox = $this->competitionTypeRepository->findAll($this->getCompetitionTypesFilter(FALSE));
					$this->view->assign('competitionTypesSelectbox', $competitionTypesSelectbox);
				}
			}
		}
		
		/**
		 * @param \Balumedien\Sportms\Domain\Model\Competition $competition
		 */
		public function showAction(\Balumedien\Sportms\Domain\Model\Competition $competition = NULL): void {
			$this->initializeActions();
			if($competition === NULL) {
				$competitionUid = $this->settings['competition']['uid'];
				$competition = $this->competitionRepository->findByUid($competitionUid);
			}
			$this->view->assign('competition', $competition);
		}
		
	}