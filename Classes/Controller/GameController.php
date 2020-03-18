<?php
	
	namespace Balumedien\Clubms\Controller;
	
	/**
	 * GameController
	 */
	class GameController extends ClubMSBaseController {
		
		/**
		 * @var \Balumedien\Clubms\Domain\Repository\GameRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $gameRepository;
		
		/**
		 * @return void
		 */
		public function listAction() {
			$sectionsFilter = $this->settings['section']['sections'];
			$sectionAgeGroupsFilter = $this->settings['section']['sectionAgeGroups'];
			$sectionAgeLevelsFilter = $this->settings['section']['sectionAgeLevels'];
			$competitionsFilter = $this->settings['competition']['competitions'];
			$competitionTypesFilter = $this->settings['competition']['competitionTypes'];
			$seasonsFilter = $this->settings['season']['seasons'];
			$competitionSeasonGamedaysFilter = $this->settings['competitionseason']['competitionSeasonGameDays'];
			$clubsFilter = $this->settings['club']['clubs'];
			$teamsFilter = $this->settings['team']['teams'];
			$games = $this->gameRepository->findAll($sectionsFilter, $sectionAgeGroupsFilter, $sectionAgeLevelsFilter, $competitionsFilter, $competitionTypesFilter, $seasonsFilter, $competitionSeasonGamedaysFilter, $clubsFilter, $teamsFilter);
			$this->view->assign('games', $games);
		}
		
		/**
		 * @param \Balumedien\Clubms\Domain\Model\Game $game
		 */
		public function showAction(\Balumedien\Clubms\Domain\Model\Game $game = NULL) {
			$this->view->assign('game', $game);
		}
		
	}