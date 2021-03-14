<?php
	
	namespace Balumedien\Sportms\Controller;

    use Balumedien\Sportms\Domain\Model\CompetitionSeason;
    use Balumedien\Sportms\Domain\Model\Person;
    use TYPO3\CMS\Core\Utility\GeneralUtility;
    use TYPO3\CMS\Extbase\Utility\LocalizationUtility;

    /**
	 * PersonController
	 */
	class PersonController extends SportMSBaseController {

	    protected $extensionsKey = 'sportms';
		
		/**
		 * @var \Balumedien\Sportms\Domain\Repository\PersonRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $personRepository;

        /**
         * @var \Balumedien\Sportms\Domain\Repository\TeamSeasonSquadMemberRepository
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
         * @param Person|null $person
         */
		public function officialProfileAction(Person $person = NULL): void {
			$this->initializeActions();
			if($person === NULL) {
				$personUid = $this->settings['single']['person'];
				$person = $this->personRepository->findByUid($personUid);
			}
			$this->view->assign('person', $person);
            $this->pagetitleForPerson($person, LocalizationUtility::translate('tx_sportms_pagetitle.person.officialProfile', $this->extensionsKey));
		}

        /**
         * @param Person|null $person
         */
        public function playerProfileAction(Person $person = NULL): void {
            if($person === NULL) {
                $person = $this->determinePerson();
            }
            $this->view->assign('person', $person);
            $this->pagetitleForPerson($person, LocalizationUtility::translate('tx_sportms_pagetitle.person.playerProfile', $this->extensionsKey));
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
            $this->pagetitleForPerson($person, LocalizationUtility::translate('tx_sportms_pagetitle.person.playerJerseys', $this->extensionsKey));
        }

        /**
         * @param Person|null $person
         */
		public function refereeProfileAction(Person $person = NULL): void {
			$this->initializeActions();
			if($person === NULL) {
				$personUid = $this->settings['single']['person'];
				$person = $this->personRepository->findByUid($personUid);
			}
			$this->view->assign('person', $person);
            $this->pagetitleForPerson($person, LocalizationUtility::translate('tx_sportms_pagetitle.person.refereeProfile', $this->extensionsKey));
		}

        /**
         * @param Person $person
         * @param string $actionLabel
         */
        private function pagetitleForPerson(Person $person, string $actionLabel) {
            $personLabel = $person->getFirstname() . " " . $person->getLastname();
            $this->pagetitle($personLabel, $actionLabel);
        }
		
	}