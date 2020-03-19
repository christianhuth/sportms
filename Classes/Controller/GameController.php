<?php
	
	namespace Balumedien\Clubms\Controller;
	
	/**
	 * GameController
	 */
	class GameController extends ClubMSBaseController {
		
		protected $model = 'game';
		
		/**
		 * @var \Balumedien\Clubms\Domain\Repository\GameRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $gameRepository;
		
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
			$listOfPossibleShowViews = 'index,history,report,stats,ticket';
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
			$games = $this->gameRepository->findAll($this->getSeasonsFilter(), $this->getSectionAgeGroupsFilter(), $this->getSectionAgeLevelsFilter(), $this->getCompetitionsFilter(), $this->getCompetitionTypesFilter(), $this->getSeasonsFilter(), $this->getCompetitionSeasonGamedaysFilter(), $this->getClubsFilter(), $this->getTeamsFilter());
			$this->view->assign('games', $games);
		}
		
		/**
		 * @param \Balumedien\Clubms\Domain\Model\Game $game
		 */
		public function showAction(\Balumedien\Clubms\Domain\Model\Game $game = NULL) {
			$this->initializeActions();
			$this->view->assign('game', $game);
		}
		
	}