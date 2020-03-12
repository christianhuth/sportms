<?php

namespace Balumedien\Clubms\Controller;

use TYPO3\CMS\Extbase\Annotation\Inject;

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
	 * @TYPO3\CMS\Extbase\Annotation\Inject
	 */
	protected $clubRepository = null;
	
	/**
	 * @var \Balumedien\Clubms\Domain\Repository\ClubOfficialJobRepository
	 * @TYPO3\CMS\Extbase\Annotation\Inject
	 */
	protected $clubOfficialJobRepository = null;
	
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
			$clubUid = $this->settings['club']['uid'];
			$club = $this->clubRepository->findByUid($clubUid);
		}
		$this->view->assign('club', $club);
	}
	
	/**
	 *
	 */
	public function officialsAction() {
		
		$clubs = $this->settings['club']['officials']['clubs'];
		\TYPO3\CMS\Core\Utility\DebugUtility::debug($clubs, 'Debug: ' . __FILE__ . ' in Line: ' . __LINE__);
		
		$clubsSelectbox = $this->settings['club']['officials']['clubsSelectbox'];
		\TYPO3\CMS\Core\Utility\DebugUtility::debug($clubsSelectbox, 'Debug: ' . __FILE__ . ' in Line: ' . __LINE__);
		
		$jobs = $this->settings['club']['officials']['jobs'];
		\TYPO3\CMS\Core\Utility\DebugUtility::debug($jobs, 'Debug: ' . __FILE__ . ' in Line: ' . __LINE__);
		
		$jobsSelectbox = $this->settings['club']['officials']['jobsSelectbox'];
		\TYPO3\CMS\Core\Utility\DebugUtility::debug($jobsSelectbox, 'Debug: ' . __FILE__ . ' in Line: ' . __LINE__);
		
		$currentOfficialsOnly = $this->settings['club']['officials']['currentOfficialsOnly'];
		\TYPO3\CMS\Core\Utility\DebugUtility::debug($currentOfficialsOnly, 'Debug: ' . __FILE__ . ' in Line: ' . __LINE__);
		
		#$this->view->assign('clubOfficials', $club->getClubOfficials());
	}
	
	/**
	 * @param \Balumedien\Clubms\Domain\Model\Club $club club item
	 */
	public function sectionsAction(\Balumedien\Clubms\Domain\Model\Club $club = null) {
		if($club === null) {
			$clubUid = $this->settings['club']['uid'];
			$club = $this->clubRepository->findByUid($clubUid);
		}
		$this->view->assign('club', $club);
	}

}