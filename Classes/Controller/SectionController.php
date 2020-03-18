<?php
	
	namespace Balumedien\Clubms\Controller;
	
	/**
	 * SectionController
	 */
	class SectionController extends ClubMSBaseController {
		
		protected $model = 'section';
		
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
			$listOfPossibleShowViews = 'index';
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
			$sections = $this->sectionRepository->findAll($this->getSectionsFilter());
			$this->view->assign('sections', $sections);
		}
		
		/**
		 * @param \Balumedien\Clubms\Domain\Model\Section $game
		 */
		public function showAction(\Balumedien\Clubms\Domain\Model\Section $section = NULL) {
			$this->initializeActions();
			$this->view->assign('section', $section);
		}
		
	}