<?php
	
	namespace Balumedien\Clubms\Controller;
	
	/**
	 * TeamSeasonController
	 */
	class TeamSeasonController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {
		
		/**
		 * @var \Balumedien\Clubms\Domain\Repository\TeamSeasonRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $teamSeasonRepository;
		
		/**
		 * @return void
		 */
		public function listAction() {
			$teamsFilter = $this->settings['team']['teams'];
			$clubsFilter = $this->settings['club']['clubs'];
			$sectionsFilter = $this->settings['section']['sections'];
			$sectionAgeGroupsFilter = $this->settings['section']['sectionAgeGroups'];
			$sectionAgeLevelsFilter = $this->settings['section']['sectionAgeLevels'];
			$seasonsFilter = $this->settings['season']['seasons'];
			$teamSeasons = $this->teamSeasonRepository->findAll($teamsFilter, $clubsFilter, $sectionsFilter, $sectionAgeGroupsFilter, $sectionAgeLevelsFilter, $seasonsFilter);
			$this->view->assign('teamSeasons', $teamSeasons);
		}
		
		/**
		 * @param \Balumedien\Clubms\Domain\Model\Team $team team item
		 * @param \Balumedien\Clubms\Domain\Model\Season $season season item
		 */
		public function showAction(\Balumedien\Clubms\Domain\Model\TeamSeason $teamSeason = NULL) {
			if($teamSeason === NULL) {
				if($this->settings['single']['teamseason']) {
					$teamSeasonUid = $this->settings['single']['teamseason'];
					$teamSeason = $this->teamSeasonRepository->findByUid($teamSeasonUid);
				}
			}
			if($teamSeason != NULL) {
				$this->view->assign('teamSeason', $teamSeason);
			} else {
				// TODO: ERROR HANDLING
			}
		}
		
	}