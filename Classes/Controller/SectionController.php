<?php
	
	namespace Balumedien\Clubms\Controller;
	
	/**
	 * SectionController
	 */
	class SectionController extends ClubMSBaseController {
		
		/**
		 * @var \Balumedien\Clubms\Domain\Repository\SectionRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $sectionRepository;
		
		/**
		 * @return void
		 */
		public function listAction() {
			$sections = $this->sectionRepository->findAll();
			$this->view->assign('sections', $sections);
		}
		
		/**
		 * @param \Balumedien\Clubms\Domain\Model\Section $game
		 */
		public function showAction(\Balumedien\Clubms\Domain\Model\Section $section = NULL) {
			$this->view->assign('section', $section);
		}
		
	}