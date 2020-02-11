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
 * ClubController
 */
class ClubController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * @var \Balumedien\Clubms\Domain\Repository\ClubRepository
	 * @inject
	 */
	protected $clubRepository = null;
	
	/**
	 * @return void
	 */
	public function listAction() {
		$clubs = $this->clubRepository->findAll();
		$this->view->assign('clubs', $clubs);
	}

	/**
	 * @param \Balumedien\Clubms\Domain\Model\Club $club club item
	 */
	public function showAction(\Balumedien\Clubms\Domain\Model\Club $club = null) {
		if($club === null) {
			// TODO: CHECK IF SETTINGS IS SET ELSE DIE
			$clubUid = $this->settings['single']['club'];
			$club = $this->clubRepository->findByUid($clubUid);
		}
		$this->view->assign('club', $club);
	}
	
	/**
	 * @param \Balumedien\Clubms\Domain\Model\Club $club club item
	 */
	public function sectionsAction(\Balumedien\Clubms\Domain\Model\Club $club = null) {
		if($club === null) {
			$clubUid = $this->settings['single']['club'];
			$club = $this->clubRepository->findByUid($clubUid);
		}
		$this->view->assign('sections', $club->getClubSections());
	}

}