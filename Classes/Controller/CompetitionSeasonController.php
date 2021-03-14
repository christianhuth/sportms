<?php
	
	namespace Balumedien\Sportms\Controller;

	use Balumedien\Sportms\Domain\Model\CompetitionSeason;
    use Balumedien\Sportms\Domain\Model\CompetitionSeasonGameday;

    /**
	 * CompetitionSeasonController
	 */
	class CompetitionSeasonController extends SportMSBaseController {

        /**
         * @var \Balumedien\Sportms\Domain\Repository\CompetitionSeasonRepository
         * @TYPO3\CMS\Extbase\Annotation\Inject
         */
        protected $competitionSeasonRepository;

        /**
         * @var \Balumedien\Sportms\Domain\Repository\CompetitionSeasonGamedayRepository
         * @TYPO3\CMS\Extbase\Annotation\Inject
         */
        protected $competitionSeasonGamedayRepository;

        /**
         * @var \Balumedien\Sportms\Domain\Repository\GameRepository
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
         * @param CompetitionSeason $competitionSeason
         * @param CompetitionSeasonGameday|null $competitionSeasonGameday
         */
        public function gamedayAction(CompetitionSeason $competitionSeason = NULL, CompetitionSeasonGameday $competitionSeasonGameday = NULL): void {
            if($competitionSeason === NULL) {
                $competitionSeason = $this->determineCompetitionSeason();
            }
            $this->view->assign('competitionSeason', $competitionSeason);
            $competitionSeasons = $this->competitionSeasonRepository->findByCompetition($competitionSeason->getCompetition());
            $this->view->assign('competitionSeasons', $competitionSeasons);
            if($competitionSeasonGameday === NULL) {
                if($this->settings['competitionSeasonGameday']['selected'] === NULL) {
                    $competitionSeasonGameday = $competitionSeason->getCompetitionSeasonGamedays()[0];
                } else {
                    $competitionSeasonGamedayUid = $this->settings['competitionSeasonGameday']['selected'];
                    $competitionSeasonGameday = $this->competitionSeasonGamedayRepository->findByUid($competitionSeasonGamedayUid);
                }
            }
            $this->view->assign('competitionSeasonGameday', $competitionSeasonGameday);
            $competitionSeasonGamedays = $this->competitionSeasonGamedayRepository->findByCompetitionSeason($competitionSeason);
            $this->view->assign('competitionSeasonGamedays', $competitionSeasonGamedays);
            $games = $this->gameRepository->findGamesbyCompetitionSeason($competitionSeason, $competitionSeasonGameday);
            $this->view->assign('games', $games);
        }
		
	}