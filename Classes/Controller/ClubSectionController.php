<?php
	
	namespace Balumedien\Clubms\Controller;
	
	/**
	 * ClubSectionController
	 */
	class ClubSectionController extends ClubMSBaseController {
		
		/**
		 * @var \Balumedien\Clubms\Domain\Repository\ClubSectionRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $clubSectionRepository;
		
		/**
		 * @return void
		 */
		public function listAction() {
			$clubSections = $this->clubSectionRepository->findAll();
			$this->view->assign('clubSections', $clubSections);
		}
		
		/**
		 * @param \Balumedien\Clubms\Domain\Model\ClubSection $clubSection
		 */
		public function showAction(\Balumedien\Clubms\Domain\Model\ClubSection $clubSection = NULL) {
			if($clubSection === NULL) {
				// TODO: CHECK IF SETTINGS IS SET ELSE DIE
				$clubSectionUid = $this->settings['clubSection']['uid'];
				$clubSection = $this->clubSectionRepository->findByUid($clubSectionUid);
			}
			$this->view->assign('clubSection', $clubSection);
		}
		
	}