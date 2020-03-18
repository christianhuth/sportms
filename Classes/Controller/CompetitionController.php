<?php
	
	namespace Balumedien\Clubms\Controller;
	
	/**
	 * CompetitionController
	 */
	class CompetitionController extends ClubMSBaseController {
		
		/**
		 * @var \Balumedien\Clubms\Domain\Repository\CompetitionRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $competitionRepository;
		
		/**
		 * @return void
		 */
		public function listAction() {
			$competitionsFilter = $this->settings['competition']['competitions'];
			$competitionTypesFilter = $this->settings['competition']['competitionTypes'];
			$sectionsFilter = $this->settings['section']['sections'];
			$sectionAgeGroupsFilter = $this->settings['section']['sectionAgeGroups'];
			$sectionAgeLevelsFilter = $this->settings['section']['sectionAgeLevels'];
			$competitions = $this->competitionRepository->findAll($competitionsFilter, $competitionTypesFilter, $sectionsFilter, $sectionAgeGroupsFilter, $sectionAgeLevelsFilter);
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