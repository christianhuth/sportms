<?php
	
	namespace Balumedien\Sportms\Controller;
	
	/**
	 * VenueController
	 */
	class VenueController extends SportMSBaseController {
		
		protected $model = 'venue';
		
		/**
		 * @var \Balumedien\Sportms\Domain\Repository\ClubRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $clubRepository;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Repository\VenueRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $venueRepository;
		
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
			$venues = $this->venueRepository->findAll($this->getClubsFilter(), $this->getVenuesFilter());
			$this->view->assign('venues', $venues);
			/* FRONTEND FILTERS */
			if($this->settings['club']['clubsSelectbox']) {
				$clubsSelectbox = $this->clubRepository->findAll($this->getClubsFilter(FALSE));
				$this->view->assign('clubsSelectbox', $clubsSelectbox);
			}
		}
		
		/**
		 * @param \Balumedien\Sportms\Domain\Model\Venue $venue
		 */
		public function showAction(\Balumedien\Sportms\Domain\Model\Venue $venue = NULL) {
			$this->initializeActions();
			$this->view->assign('venue', $venue);
		}
		
	}