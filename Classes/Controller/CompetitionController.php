<?php
	
	namespace Balumedien\Clubms\Controller;
	
	/**
	 * CompetitionController
	 */
	class CompetitionController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {
		
		/**
		 * @var \Balumedien\Clubms\Domain\Repository\CompetitionRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $competitionRepository;
		
		/**
		 * @return void
		 */
		public function listAction() {
			$competitions = $this->competitionRepository->findAll();
			$this->view->assign('competitions', $competitions);
		}
		
		/**
		 * @param \Balumedien\Clubms\Domain\Model\Competition $competition
		 */
		public function showAction(\Balumedien\Clubms\Domain\Model\Competition $competition = NULL) {
			if($competition === NULL) {
				$competitionUid = $this->settings['competition']['uid'];
				$competition = $this->competitionRepository->findByUid($competitionUid);
			}
			$this->view->assign('competition', $competition);
		}
		
	}