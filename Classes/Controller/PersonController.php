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
		public function initializeAction() {
			$this->mapRequestsToSettings();
		}
		
		/**
		 * Use this method to solve tasks which all actions have in common, when VIEW-Context is needed
		 */
		public function initializeActions() {
			$listOfPossibleShowViews = 'index,officials,sections';
			$this->determineShowView($this->model);
			$this->determineShowViews($this->model, $listOfPossibleShowViews);
			$this->determineShowNavigationViews($this->model, $listOfPossibleShowViews);
			$this->view->assign('settings', $this->settings);
		}
		
		/**
		 * @return void
		 */
		public function listAction() {
			$persons = $this->personRepository->findAll();
			$this->view->assign('persons', $persons);
		}
		
		/**
		 * @param \Balumedien\Clubms\Domain\Model\Person $person person item
		 */
		public function showAction(\Balumedien\Clubms\Domain\Model\Person $person = NULL) {
			if($person === NULL) {
				$personUid = $this->settings['single']['person'];
				$person = $this->personRepository->findByUid($personUid);
			}
			$this->view->assign('person', $person);
		}
		
	}