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
			
			($this->request->getArgument('team')) ? $this->settings['team']['uid'] = $this->request->getArgument('team') : $this->settings['team']['uid'];
			($this->request->getArgument('season')) ? $this->settings['season']['uid'] = $this->request->getArgument('season') : $this->settings['season']['uid'];
			$this->view->assign('settings', $this->settings);
			
			\TYPO3\CMS\Core\Utility\DebugUtility::debug($this->settings, 'Debug: ' . __FILE__ . ' in Line: ' . __LINE__);
			
			if($teamSeason === NULL) {
				$teamSeason = $this->teamSeasonRepository->findByTeamAndSeason($this->settings['team']['uid'], $this->settings['season']['uid']);
			}
			if($teamSeason != NULL) {
				$this->view->assign('teamSeason', $teamSeason);
			} else {
				// TODO: ERROR HANDLING
			}
		}
		
	}