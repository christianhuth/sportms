<?php
	
	namespace Balumedien\Sportms\Controller;
	
	use Balumedien\Sportms\Domain\Model\TeamSeason;
    use TYPO3\CMS\Extbase\Persistence\QueryInterface;

    /**
	 * TeamSeasonController
	 */
	class TeamSeasonController extends SportMSBaseController {

        /**
         * @var \Balumedien\Sportms\Domain\Repository\GameRepository
         * @TYPO3\CMS\Extbase\Annotation\Inject
         */
        protected $gameRepository;
		
		/**
		 * @var \Balumedien\Sportms\Domain\Repository\TeamSeasonRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $teamSeasonRepository;
		
		/**
		 * Initializes the controller before invoking an action method.
		 * Use this method to solve tasks which all actions have in common.
		 */
		public function initializeAction(): void {
			$this->mapRequestsToSettings();
		}

        /**
         * @param TeamSeason|null $teamSeason
         */
        public function gamesByCompetitionAction(TeamSeason $teamSeason = NULL) {
            if($teamSeason === NULL) {
                $teamSeason = $this->determineTeamSeason();
            }
            $this->view->assign('teamSeason', $teamSeason);
            $orderings = [
                'competitionSeason.competition.competitionType.sorting' => QueryInterface::ORDER_ASCENDING,
                'competitionSeason.competition.label' => QueryInterface::ORDER_ASCENDING,
                'date' => QueryInterface::ORDER_ASCENDING,
                'time' => QueryInterface::ORDER_ASCENDING,
            ];
            $games = $this->gameRepository->findGamesByTeamSeason($teamSeason, $orderings);
            $this->view->assign('games', $games);
        }

        /**
         * @param TeamSeason|null $teamSeason
         */
        public function gamesByDateAction(TeamSeason $teamSeason = NULL): void {
            if($teamSeason === NULL) {
                $teamSeason = $this->determineTeamSeason();
            }
            $this->view->assign('teamSeason', $teamSeason);
            $orderings = [
                'date' => QueryInterface::ORDER_ASCENDING,
                'time' => QueryInterface::ORDER_ASCENDING,
            ];
            $games = $this->gameRepository->findGamesByTeamSeason($teamSeason, $orderings);
            $this->view->assign('games', $games);
        }

        /**
         * @param TeamSeason|null $teamSeason
         */
		public function goalsAction(TeamSeason $teamSeason = NULL) {
            if($teamSeason === NULL) {
                $teamSeason = $this->determineTeamSeason();
            }
            $this->view->assign('teamSeason', $teamSeason);
        }

        /**
         * @param TeamSeason $teamSeason
         */
        public function indexAction(TeamSeason $teamSeason = NULL) {
            if($teamSeason === NULL) {
                $teamSeason = $this->determineTeamSeason();
            }
            $this->view->assign('teamSeason', $teamSeason);
        }
		
	}