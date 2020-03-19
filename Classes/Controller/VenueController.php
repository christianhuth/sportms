<?php
	
	namespace Balumedien\Clubms\Controller;
	
	/**
	 * VenueController
	 */
	class VenueController extends ClubMSBaseController {
		
		protected $model = 'venue';
		
		/**
		 * @var \Balumedien\Clubms\Domain\Repository\VenueRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $venueRepository;
		
		/**
		 * @var \Balumedien\Clubms\Domain\Repository\ClubRepository
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
			$venues = $this->venueRepository->findAll($this->getVenuesFilter(), $this->getClubsFilter(), $this->getVenuesWithClubOnlyFilter());
			$this->view->assign('venues', $venues);
			/* FRONTEND FILTERS */
			if($this->settings['club']['clubsSelectbox']) {
				$clubsSelectbox = $this->clubRepository->findAllByUids($this->getClubsFilter(FALSE));
				$this->view->assign('clubsSelectbox', $clubsSelectbox);
			}
		}
		
		/**
		 * @param \Balumedien\Clubms\Domain\Model\Venue $venue
		 */
		public function showAction(\Balumedien\Clubms\Domain\Model\Venue $venue = NULL) {
			$this->initializeActions();
			$this->view->assign('venue', $venue);
		}
		
	}