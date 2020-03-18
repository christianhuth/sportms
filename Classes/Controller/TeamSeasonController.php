<?php
	
	namespace Balumedien\Clubms\Controller;
	
	/**
	 * TeamSeasonController
	 */
	class TeamSeasonController extends ClubMSBaseController {
		
		protected $model = 'teamSeason';
		
		/**
		 * @var \Balumedien\Clubms\Domain\Repository\TeamSeasonRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $teamSeasonRepository;
		
		/**
		 * @return void
		 */
		public function listAction() {
			$teamSeasons = $this->teamSeasonRepository->findAll($this->getTeamsFilter(), $this->getClubsFilter(), $this->getSectionsFilter(), $this->getSectionAgeGroupsFilter(), $this->getSectionAgeLevelsFilter(), $this->getSeasonsFilter());
			$this->view->assign('teamSeasons', $teamSeasons);
		}
		
		/**
		 * @param \Balumedien\Clubms\Domain\Model\Team $team team item
		 * @param \Balumedien\Clubms\Domain\Model\Season $season season item
		 * @throws \TYPO3\CMS\Extbase\Mvc\Exception\NoSuchArgumentException
		 */
		public function showAction(\Balumedien\Clubms\Domain\Model\Team $team = NULL, \Balumedien\Clubms\Domain\Model\Season $season = NULL): void {
			
			$listOfArguments = 'season,team';
			foreach(explode(',', $listOfArguments) as $argument) {
				if($this->request->hasArgument($argument)) {
					$this->request->getArgument($argument) ? $this->settings[$argument]['uid'] = $this->request->getArgument($argument) : $this->settings[$argument]['uid'];
				}
			}
			$this->view->assign('settings', $this->settings);
			
			$teamSeason = $this->teamSeasonRepository->findByTeamUidAndSeasonUid($this->settings['team']['uid'], $this->settings['season']['uid']);
			$this->view->assign('teamSeason', $teamSeason[0]);
			
		}
		
	}