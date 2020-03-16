<?php
	
	namespace Balumedien\Clubms\Controller;
	
	/**
	 * VenueController
	 */
	class VenueController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {
		
		/**
		 * @var \Balumedien\Clubms\Domain\Repository\VenueRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $venueRepository;
		
		/**
		 * @return void
		 */
		public function listAction() {
			$clubsFilter = $this->settings['club']['clubs'];
			$withClubOnly = $this->settings['vanue']['withClubOnly'];
			$venues = $this->venueRepository->findAll($clubsFilter, $withClubOnly);
			$this->view->assign('venues', $venues);
		}
		
		/**
		 * @param \Balumedien\Clubms\Domain\Model\Venue $venue
		 */
		public function showAction(\Balumedien\Clubms\Domain\Model\Venue $venue = NULL) {
			$this->view->assign('venue', $venue);
		}
		
	}