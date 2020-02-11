<?php

namespace Balumedien\Clubms\Controller;

use TYPO3\CMS\Extbase\Annotation\Inject as inject;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2015
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * PersonController
 */
class PersonController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * @var \Balumedien\Clubms\Domain\Repository\PersonRepository
	 * @inject
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
    public function showAction(\Balumedien\Clubms\Domain\Model\Person $person = null) {
        if($person === null) {
            $personUid = $this->settings['single']['person'];
            $person = $this->personRepository->findByUid($personUid);
        }
        $this->view->assign('person', $person);
    }

}