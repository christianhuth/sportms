<?php

namespace Balumedien\Clubms\Controller;


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
 * TeamController
 */
class TeamController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * @var \Balumedien\Clubms\Domain\Repository\TeamRepository
	 * @inject
	 */
	protected $teamRepository;
	
	/**
	 * @return void
	 */
	public function initializeAction() {
		
	}
	
	/**
	 * @return void
	 */
	public function listAction() {
		$teams = $this->teamRepository->findAll();
		$this->view->assign('teams', $teams);
	}

	/**
	 * @param int $uid
	 * @return void
	 */
	public function showAction($uid) {
		$team = $this->teamRepository->findByUid($uid);
		$this->view->assign('team', $team);
	}

}