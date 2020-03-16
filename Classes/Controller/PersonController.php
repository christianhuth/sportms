<?php
	
	namespace Balumedien\Clubms\Controller;
	
	/**
	 * PersonController
	 */
	class PersonController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {
		
		/**
		 * @var \Balumedien\Clubms\Domain\Repository\PersonRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $personRepository;
		
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