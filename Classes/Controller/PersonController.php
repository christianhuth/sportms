<?php
    
    namespace Balumedien\Sportms\Controller;
    
    use Balumedien\Sportms\Domain\Model\Person;
    use TYPO3\CMS\Extbase\Utility\LocalizationUtility;
    
    /**
     * PersonController
     */
    class PersonController extends SportMSBaseController
    {
        
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
         * @return void
         * @throws \TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException
         */
        public function listAction(): void
        {
            $persons = $this->personRepository->findAll($this->getPersonsFilter());
            $this->view->assign('persons', $persons);
            $this->pagetitle("Personen", "Liste");
        }
        
        /**
         * @param Person|null $person
         */
        public function officialProfileAction(Person $person = null): void
        {
            if ($person === null) {
                $personUid = $this->settings['single']['person'];
                $person = $this->personRepository->findByUid($personUid);
            }
            $this->view->assign('person', $person);
            $this->pagetitleForPerson($person,
                LocalizationUtility::translate('tx_sportms_pagetitle.person.officialProfile', $this->extensionsKey));
        }
        
        /**
         * @param Person $person
         * @param string $actionLabel
         */
        private function pagetitleForPerson(Person $person, string $actionLabel)
        {
            $personLabel = $person->getFirstname() . " " . $person->getLastname();
            $this->pagetitle($personLabel, $actionLabel);
        }
        
        /**
         * @param Person|null $person
         */
        public function playerProfileAction(Person $person = null): void
        {
            if ($person === null) {
                $person = $this->determinePerson();
            }
            $this->view->assign('person', $person);
            $this->pagetitleForPerson($person,
                LocalizationUtility::translate('tx_sportms_pagetitle.person.playerProfile', $this->extensionsKey));
        }
        
        /**
         * @param Person|null $person
         */
        public function playerJerseysAction(Person $person = null): void
        {
            if ($person === null) {
                $person = $this->determinePerson();
            }
            $this->view->assign('person', $person);
            $jerseysByTeamSeason = $this->teamSeasonSquadMemberRepository->findPlayerJerseys($person);
            $this->view->assign('jerseysByTeamSeason', $jerseysByTeamSeason);
            $this->pagetitleForPerson($person,
                LocalizationUtility::translate('tx_sportms_pagetitle.person.playerJerseys', $this->extensionsKey));
        }
        
        /**
         * @param Person|null $person
         */
        public function refereeProfileAction(Person $person = null): void
        {
            if ($person === null) {
                $personUid = $this->settings['single']['person'];
                $person = $this->personRepository->findByUid($personUid);
            }
            $this->view->assign('person', $person);
            $this->pagetitleForPerson($person,
                LocalizationUtility::translate('tx_sportms_pagetitle.person.refereeProfile', $this->extensionsKey));
        }
        
    }