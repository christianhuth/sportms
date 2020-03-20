<?php
	
	namespace Balumedien\Clubms\Controller;
	
	/**
	 * PersonController
	 */
	class PersonController extends ClubMSBaseController {
		
		protected $model = 'person';
		
		/**
		 * @var \Balumedien\Clubms\Domain\Repository\PersonRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $personRepository;
		
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
			$listOfPossibleShowViews = 'index,officials';
			$this->determineShowView($this->model);
			$this->determineShowViews($this->model, $listOfPossibleShowViews);
			$this->determineShowNavigationViews($this->model, $listOfPossibleShowViews);
			$this->view->assign('settings', $this->settings);
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
		 * @param \Balumedien\Clubms\Domain\Model\Person $person
		 */
		public function showAction(\Balumedien\Clubms\Domain\Model\Person $person = NULL): void {
			$this->initializeActions();
			if($person === NULL) {
				$personUid = $this->settings['single']['person'];
				$person = $this->personRepository->findByUid($personUid);
			}
			$this->view->assign('person', $person);
		}
		
	}