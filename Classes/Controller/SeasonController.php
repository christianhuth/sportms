<?php
	
	namespace Balumedien\Clubms\Controller;
	
	/**
	 * SeasonController
	 */
	class SeasonController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {
		
		/**
		 * @var \Balumedien\Clubms\Domain\Repository\SeasonRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $seasonRepository;
		
		/**
		 * @var \Balumedien\Clubms\Domain\Repository\TeamSeasonRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $teamSeasonRepository;
		
		/**
		 * @return void
		 */
		public function listAction() {
			$seasons = $this->seasonRepository->findAll();
			$this->view->assign('seasons', $seasons);
		}
		
		/**
		 * @param \Balumedien\Clubms\Domain\Model\Season $season
		 */
		public function showAction(\Balumedien\Clubms\Domain\Model\Season $season = NULL) {
			$this->view->assign('season', $season);
		}
		
	}