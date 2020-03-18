<?php
	
	namespace Balumedien\Clubms\Controller;
	
	/**
	 * CompetitionSeasonController
	 */
	class CompetitionSeasonController extends ClubMSBaseController {
		
		/**
		 * @var \Balumedien\Clubms\Domain\Repository\CompetitionSeasonRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $competitionSeasonRepository;
		
		/**
		 * @return void
		 */
		public function listAction() {
			$competitionsFilter = $this->settings['competition']['competitions'];
			$competitionTypesFilter = $this->settings['competition']['competitionTypes'];
			$sectionsFilter = $this->settings['section']['sections'];
			$sectionAgeGroupsFilter = $this->settings['section']['sectionAgeGroups'];
			$sectionAgeLevelsFilter = $this->settings['section']['sectionAgeLevels'];
			$seasonsFilter = $this->settings['season']['seasons'];
			$competitionSeasons = $this->competitionSeasonRepository->findAll($competitionsFilter, $competitionTypesFilter, $sectionsFilter, $sectionAgeGroupsFilter, $sectionAgeLevelsFilter, $seasonsFilter);
			$this->view->assign('competitionSeasons', $competitionSeasons);
		}
		
		/**
		 * @param \Balumedien\Clubms\Domain\Model\CompetitionSeason $competitionSeason
		 */
		public function showAction(\Balumedien\Clubms\Domain\Model\CompetitionSeason $competitionSeason = NULL) {
			if($competitionSeason === NULL) {
				$competitionSeasonUid = $this->settings['competitionSeason']['uid'];
				$competitionSeason = $this->competitionSeasonRepository->findByUid($competitionSeasonUid);
			}
			$this->view->assign('competitionSeason', $competitionSeason);
		}
		
	}