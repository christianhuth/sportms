<?php
	
	namespace Balumedien\Clubms\Controller;
	
	/**
	 * TeamController
	 */
	class TeamController extends ClubMSBaseController {
		
		/**
		 * @var \Balumedien\Clubms\Domain\Repository\TeamRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $teamRepository;
		
		/**
		 * @return void
		 */
		public function listAction() {
			$teamsFilter = $this->settings['team']['teams'];
			$clubsFilter = $this->settings['club']['clubs'];
			$sectionsFilter = $this->settings['section']['sections'];
			$sectionAgeGroupsFilter = $this->settings['section']['sectionAgeGroups'];
			$sectionAgeLevelsFilter = $this->settings['section']['sectionAgeLevels'];
			$teams = $this->teamRepository->findAll($teamsFilter, $clubsFilter, $sectionsFilter, $sectionAgeGroupsFilter, $sectionAgeLevelsFilter);
			$this->view->assign('teams', $teams);
		}
		
		/**
		 * @param \Balumedien\Clubms\Domain\Model\Team $team
		 */
		public function showAction(\Balumedien\Clubms\Domain\Model\Team $team = NULL) {
			if($team === NULL) {
				if($this->settings['team']['uid']) {
					$teamUid = $this->settings['team']['uid'];
					$team = $this->teamRepository->findByUid($teamUid);
				} else {
					// TODO: DIE IF NO TEAM IS SELECTED VIA FLEXFORM
				}
			}
			$this->view->assign('team', $team);
		}
		
	}