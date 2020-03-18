<?php
	
	namespace Balumedien\Clubms\Controller;
	
	/**
	 * VenueController
	 */
	class VenueController extends ClubMSBaseController {
		
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
			$venuesFilter = $this->settings['venue']['venues'];
			$withClubOnly = $this->settings['venue']['withClubOnly'];
			$venues = $this->venueRepository->findAll($venuesFilter, $clubsFilter, $withClubOnly);
			$this->view->assign('venues', $venues);
		}
		
		/**
		 * @param \Balumedien\Clubms\Domain\Model\Venue $venue
		 */
		public function showAction(\Balumedien\Clubms\Domain\Model\Venue $venue = NULL) {
			$this->view->assign('venue', $venue);
		}
		
	}