<?php
	
	namespace Balumedien\Sportms\Controller;
	
	use Balumedien\Sportms\Domain\Model\Club;

    /**
	 * ClubController
	 */
	class ClubController extends SportMSBaseController {
		
		/**
		 * @var \Balumedien\Sportms\Domain\Repository\ClubRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $clubRepository;
		
		/**
		 * Initializes the controller before invoking an action method.
		 * Use this method to solve tasks which all actions have in common.
		 */
		public function initializeAction(): void {
			\TYPO3\CMS\Core\Utility\DebugUtility::debug("test2", 'Debug: ' . __FILE__ . ' in Line: ' . __LINE__);
			
			$this->mapRequestsToSettings();
		}
		
		/**
		 * Use this method to solve tasks which all actions have in common, when VIEW-Context is needed
		 */
		public function initializeActions(): void {
			#$listOfPossibleShowViews = 'index,officials,sections';
			#$this->determineShowView($this->model);
			#$this->determineShowViews($this->model, $listOfPossibleShowViews);
			#$this->determineShowNavigationViews($this->model, $listOfPossibleShowViews);
			#$this->view->assign('settings', $this->settings);
		}
		
		/**
		 * @return void
		 * @throws \TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException
		 */
		public function listAction(): void {
			$this->initializeActions();
			$clubs = $this->clubRepository->findAll($this->getClubsFilter());
			$this->view->assign('clubs', $clubs);
            $this->pagetitle("Vereine", "Liste");
		}
		
		/**
		 * @param Club $club
		 */
		public function sectionsAction(Club $club = NULL): void {
			\TYPO3\CMS\Core\Utility\DebugUtility::debug($club, 'Debug: ' . __FILE__ . ' in Line: ' . __LINE__);
			if($club === NULL) {
				$clubUid = $this->settings['club']['uid'];
				$club = $this->clubRepository->findByUid($clubUid);
			}
			$this->view->assign('club', $club);
			$this->pagetitleForClub($club, "Abteilungen");
		}

        /**
         * @param Club $club
         * @param string $actionLabel
         */
        private function pagetitleForClub(Club $club, string $actionLabel) {
            $clubName = $club->getName();
            $this->pagetitle($clubName, $actionLabel);
        }
		
	}