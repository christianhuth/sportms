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
 * TeamController
 */
class TeamController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

    /**
     * @var \Balumedien\Clubms\Domain\Repository\SeasonRepository
     * @TYPO3\CMS\Extbase\Annotation\Inject
     */
    protected $seasonRepository;

	/**
	 * @var \Balumedien\Clubms\Domain\Repository\TeamRepository
	 * @TYPO3\\CMS\\Extbase\\Annotation\\Inject
	 */
	protected $teamRepository;

	/**
	 * @var \Balumedien\Clubms\Domain\Repository\TeamSeasonRepository
	 * @TYPO3\\CMS\\Extbase\\Annotation\\Inject
	 */
	protected $teamSeasonRepository;
	
	/**
	 * @return void
	 */
	public function listAction() {
		$teams = $this->teamRepository->findAll();
		$this->view->assign('teams', $teams);
	}

    /**
     * @param \Balumedien\Clubms\Domain\Model\Team $team team item
     * @param \Balumedien\Clubms\Domain\Model\Season $season season item
     */
	public function showAction(\Balumedien\Clubms\Domain\Model\Team $team = null, \Balumedien\Clubms\Domain\Model\Season $season = null) {
        if($team === null) {
            if($this->settings['single']['team']) {
                $teamUid = $this->settings['single']['team'];
                $team = $this->teamRepository->findByUid($teamUid);
            } else {
                // TODO: DIE IF NO TEAM IS SELECTED VIA FLEXFORM
            }
        }
        if($season === null) {
            if($this->settings['single']['season']) {
                $seasonUid = $this->settings['single']['season'];
                $season = $this->seasonRepository->findByUid($seasonUid);
            } else {
                $season = $this->teamSeasonRepository->findLatestSeasonOfTeam($team);
            }
        }
        // AT THIS POINT WE DEFINITELY HAVE TEAM AND SEASON OR WE DIED EARLIER
        $teamSeason = $this->teamSeasonRepository->findByTeamAndSeason($team, $season);
        $this->view->assign('teamSeason', $teamSeason);
	}

}