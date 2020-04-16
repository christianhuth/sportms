<?php
	
	namespace Balumedien\Sportms\Controller;
	
	/**
	 * TeamSeasonController
	 */
	class TeamSeasonController extends SportMSBaseController {
		
		/**
		 * @var \Balumedien\Sportms\Domain\Repository\TeamSeasonRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $teamSeasonRepository;
		
		/**
		 * Initializes the controller before invoking an action method.
		 * Use this method to solve tasks which all actions have in common.
		 */
		public function initializeAction(): void {
			$this->mapRequestsToSettings();
		}
		
		/**
		 * @param \Balumedien\Sportms\Domain\Model\TeamSeason $teamSeason
		 */
		public function indexAction(\Balumedien\Sportms\Domain\Model\TeamSeason $teamSeason = NULL) {
			if($teamSeason === NULL) {
				$teamSeason = $this->determineTeamSeasonFromFlexform();
			}
			$this->view->assign('teamSeason', $teamSeason);
		}
		
	}