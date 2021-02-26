<?php
	
	namespace Balumedien\Sportms\Controller;

    use Balumedien\Sportms\Domain\Model\Person;
    use Balumedien\Sportms\Domain\Repository\PersonRepository;
    use Balumedien\Sportms\Domain\Repository\TeamSeasonSquadMemberRepository;

    /**
	 * PersonController
	 */
	class PersonController extends SportMSBaseController {
		
		protected $model = 'person';
		
		/**
		 * @var PersonRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $personRepository;

        /**
         * @var TeamSeasonSquadMemberRepository
         * @TYPO3\CMS\Extbase\Annotation\Inject
         */
        protected $teamSeasonSquadMemberRepository;
		
		/**
		 * Initializes the controller before invoking an action method.
		 * Use this method to solve tasks which all actions have in common.
		 */
		public function initializeAction(): void {
			$this->mapRequestsToSettings();
		}
		
		/**
		 * Use this method to solve tasks which all actions have in common, when VIEW-Context is needed
		 */
		public function initializeActions(): void {
			$listOfPossibleShowViews = 'profile,officials';
			$this->determineShowView($this->model);
			$this->determineShowViews($this->model, $listOfPossibleShowViews);
			$this->determineShowNavigationViews($this->model, $listOfPossibleShowViews);
		}
		
		/**
		 * @return void
		 * @throws \TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException
		 */
		public function listAction(): void {
			$this->initializeActions();
			$persons = $this->personRepository->findAll($this->getPersonsFilter());
			$this->view->assign('persons', $persons);
		}
		
		/**
		 * @param Person $person
		 */
		public function officialIndexAction(Person $person = NULL): void {
			$this->initializeActions();
			if($person === NULL) {
				$personUid = $this->settings['single']['person'];
				$person = $this->personRepository->findByUid($personUid);
			}
			$this->view->assign('person', $person);
		}

        /**
         * @param Person|null $person
         */
        public function playerProfileAction(Person $person = NULL): void {
            if($person === NULL) {
                $person = $this->determinePerson();
            }
            $this->view->assign('person', $person);
        }

        /**
         * @param Person|null $person
         */
        public function playerJerseysAction(Person $person = NULL): void {
            if($person === NULL) {
                $person = $this->determinePerson();
            }
            $this->view->assign('person', $person);
            $jerseysByTeamSeason = $this->teamSeasonSquadMemberRepository->findPlayerJerseys($person);
            $this->view->assign('jerseysByTeamSeason', $jerseysByTeamSeason);
        }
		
		/**
		 * @param Person $person
		 */
		public function refereeIndexAction(Person $person = NULL): void {
			$this->initializeActions();
			if($person === NULL) {
				$personUid = $this->settings['single']['person'];
				$person = $this->personRepository->findByUid($personUid);
			}
			$this->view->assign('person', $person);
		}
		
	}