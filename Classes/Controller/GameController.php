<?php
	
	namespace Balumedien\Clubms\Controller;
	
	/**
	 * GameController
	 */
	class GameController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {
		
		/**
		 * @var \Balumedien\Clubms\Domain\Repository\GameRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $gameRepository;
		
		/**
		 * @return void
		 */
		public function listAction() {
			$games = $this->gameRepository->findAll();
			$this->view->assign('games', $games);
		}
		
		/**
		 * @param \Balumedien\Clubms\Domain\Model\Game $game
		 */
		public function showAction(\Balumedien\Clubms\Domain\Model\Game $game = NULL) {
			$this->view->assign('game', $game);
		}
		
	}