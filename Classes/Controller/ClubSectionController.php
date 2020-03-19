<?php
	
	namespace Balumedien\Clubms\Controller;
	
	/**
	 * ClubSectionController
	 */
	class ClubSectionController extends ClubMSBaseController {
		
		protected $model = 'clubSection';
		
		/**
		 * @var \Balumedien\Clubms\Domain\Repository\ClubSectionRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $clubSectionRepository;
		
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
			$listOfPossibleShowViews = 'index,officials,teams';
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
			$clubSections = $this->clubSectionRepository->findAll($this->getClubsFilter(), $this->getSectionsFilter());
			$this->view->assign('clubSections', $clubSections);
			/* FRONTEND FILTERS */
			if($this->settings['club']['clubsSelectbox'] || $this->settings['section']['sectionsSelectbox']) {
				$clubSections = $this->clubSectionRepository->findAll($this->getClubsFilter(FALSE), $this->getSectionsFilter(FALSE));
				if($this->settings['club']['clubsSelectbox']) {
					$clubsSelectbox = $this->clubRepository->findAllByUids($this->getClubsFilter(FALSE));
					$this->view->assign('clubsSelectbox', $clubsSelectbox);
				}
				if($this->settings['section']['sectionsSelectbox']) {
					$sectionsSelectbox = $this->sectionRepository->findAllByClubSections($clubSections);
					$this->view->assign('sectionsSelectbox', $sectionsSelectbox);
				}
			}
		}
		
		/**
		 * @param \Balumedien\Clubms\Domain\Model\ClubSection $clubSection
		 */
		public function showAction(\Balumedien\Clubms\Domain\Model\ClubSection $clubSection = NULL) {
			$this->initializeActions();
			if($clubSection === NULL) {
				// TODO: CHECK IF SETTINGS IS SET ELSE DIE
				$clubSectionUid = $this->settings['clubSection']['uid'];
				$clubSection = $this->clubSectionRepository->findByUid($clubSectionUid);
			}
			$this->view->assign('clubSection', $clubSection);
		}
		
	}