<?php
	
	namespace Balumedien\Sportms\Controller;
	
	/**
	 * SportSectionController
	 */
	class SportSectionController extends SportMSBaseController {
		
		protected $model = 'clubSection';
		
		/**
		 * @var \Balumedien\Sportms\Domain\Repository\ClubSectionRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $clubSectionRepository;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Repository\SectionRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $sectionRepository;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Repository\ClubRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $clubRepository;
		
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
		 * @throws \TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException
		 */
		public function listAction(): void {
			$this->initializeActions();
			$clubSections = $this->clubSectionRepository->findAll($this->getSectionsFilter(), $this->getClubsFilter());
			$this->view->assign('clubSections', $clubSections);
			/* FRONTEND FILTERS */
			if($this->settings['club']['clubsSelectbox'] || $this->settings['section']['sectionsSelectbox']) {
				if($this->settings['section']['sectionsSelectbox']) {
					$sectionsSelectbox = $this->sectionRepository->findAll($this->getSectionsFilter(FALSE));
					$this->view->assign('sectionsSelectbox', $sectionsSelectbox);
				}
				if($this->settings['club']['clubsSelectbox']) {
					$clubsSelectbox = $this->clubRepository->findAll($this->getClubsFilter(FALSE));
					$this->view->assign('clubsSelectbox', $clubsSelectbox);
				}
			}
		}
		
		/**
		 * @param \Balumedien\Sportms\Domain\Model\ClubSection $clubSection
		 */
		public function showAction(\Balumedien\Sportms\Domain\Model\ClubSection $clubSection = NULL) {
			$this->initializeActions();
			if($clubSection === NULL) {
				// TODO: CHECK IF SETTINGS IS SET ELSE DIE
				$clubSectionUid = $this->settings['clubSection']['uid'];
				$clubSection = $this->clubSectionRepository->findByUid($clubSectionUid);
			}
			$this->view->assign('clubSection', $clubSection);
		}
		
	}