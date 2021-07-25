<?php
    
    namespace Balumedien\Sportms\Controller;
    
    use Balumedien\Sportms\Domain\Model\CompetitionSeason;
    use Balumedien\Sportms\Domain\Model\CompetitionSeasonGameday;

    /**
     * CompetitionSeasonController
     */
    class CompetitionSeasonController extends SportMSBaseController
    {
        
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
         * @param CompetitionSeason $competitionSeason
         * @param CompetitionSeasonGameday|null $competitionSeasonGameday
         */
        public function gamesAction(
            CompetitionSeason $competitionSeason = null,
            CompetitionSeasonGameday $competitionSeasonGameday = null
        ): void {
            if ($competitionSeason === null) {
                $competitionSeason = $this->determineCompetitionSeason();
            }
            $this->view->assign('competitionSeason', $competitionSeason);
            $competitionSeasons = $this->competitionSeasonRepository->findByCompetition($competitionSeason->getCompetition());
            $this->view->assign('competitionSeasons', $competitionSeasons);
            if ($competitionSeasonGameday === null) {
                if ($this->settings['competitionSeasonGameday']['selected'] === null) {
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
            $this->pagetitleForCompetitionSeason($competitionSeason, $competitionSeasonGameday->getLabel());
        }
        
        /**
         * @param CompetitionSeason $competitionSeason
         * @param string $actionLabel
         */
        private function pagetitleForCompetitionSeason(CompetitionSeason $competitionSeason, string $actionLabel)
        {
            $competitionLabel = $competitionSeason->getCompetition()->getLabel();
            $seasonLabel = $competitionSeason->getSeason()->getLabel();
            $competitionSeasonLabel = $competitionLabel . " " . $seasonLabel;
            $this->pagetitle($competitionSeasonLabel, $actionLabel);
        }
        
        protected function clubsAction(CompetitionSeason $competitionSeason = null)
        {
            if ($competitionSeason === null) {
                $competitionSeason = $this->determineCompetitionSeason();
            }
            $this->view->assign('competitionSeason', $competitionSeason);
            $competitionSeasons = $this->competitionSeasonRepository->findByCompetition($competitionSeason->getCompetition());
            $this->view->assign('competitionSeasons', $competitionSeasons);
            # TODO: USE LOCALIZATION
            $this->pagetitleForCompetitionSeason($competitionSeason, "Vereine");
        }
        
        protected function teamsAction(CompetitionSeason $competitionSeason = null): void
        {
            if ($competitionSeason === null) {
                $competitionSeason = $this->determineCompetitionSeason();
            }
            $this->view->assign('competitionSeason', $competitionSeason);
            $competitionSeasons = $this->competitionSeasonRepository->findByCompetition($competitionSeason->getCompetition());
            $this->view->assign('competitionSeasons', $competitionSeasons);
            # TODO: USE LOCALIZATION
            $this->pagetitleForCompetitionSeason($competitionSeason, "Mannschaften");
        }
        
    }