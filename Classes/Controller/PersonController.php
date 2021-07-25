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
            /* MAIN CONTENT */
            $persons = $this->personRepository->findAll($this->getPersonsFilter());
            $this->view->assign('persons', $persons);
            
            /* PAGETITLE */
            $this->pagetitle(
                LocalizationUtility::translate('tx_sportms_domain_model_person.plural', "sportms"),
                LocalizationUtility::translate('tx_sportms_action.person.list', "sportms")
            );
        }
        
        /**
         * @param Person|null $person
         */
        public function officialProfileAction(Person $person = null): void
        {
            /* MAIN CONTENT */
            if ($person === null) {
                $personUid = $this->settings['single']['person'];
                $person = $this->personRepository->findByUid($personUid);
            }
            $this->view->assign('person', $person);
            
            /* PAGETITLE */
            $this->pagetitleForPerson(
                $person,
                LocalizationUtility::translate('tx_sportms_pagetitle.person.officialProfile', "sportms")
            );
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
            /* MAIN CONTENT */
            if ($person === null) {
                $person = $this->determinePerson();
            }
            $this->view->assign('person', $person);
    
            /* PAGETITLE */
            $this->pagetitleForPerson(
                $person,
                LocalizationUtility::translate('tx_sportms_pagetitle.person.playerProfile', "sportms")
            );
        }
        
        /**
         * @param Person|null $person
         */
        public function playerJerseysAction(Person $person = null): void
        {
            /* MAIN CONTENT */
            if ($person === null) {
                $person = $this->determinePerson();
            }
            $this->view->assign('person', $person);
            $jerseysByTeamSeason = $this->teamSeasonSquadMemberRepository->findPlayerJerseys($person);
            $this->view->assign('jerseysByTeamSeason', $jerseysByTeamSeason);
            
            /* PAGETITLE */
            $this->pagetitleForPerson(
                $person,
                LocalizationUtility::translate('tx_sportms_pagetitle.person.playerJerseys', "sportms")
            );
        }
        
        /**
         * @param Person|null $person
         */
        public function refereeProfileAction(Person $person = null): void
        {
            /* MAIN CONTENT */
            if ($person === null) {
                $personUid = $this->settings['single']['person'];
                $person = $this->personRepository->findByUid($personUid);
            }
            $this->view->assign('person', $person);
            
            /* PAGETITLE */
            $this->pagetitleForPerson(
                $person,
                LocalizationUtility::translate('tx_sportms_pagetitle.person.refereeProfile', "sportms")
            );
        }
        
    }