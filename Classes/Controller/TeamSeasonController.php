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
 * TeamSeasonController
 */
class TeamSeasonController
{

    // TODO: PROBABLY DELETE THIS CONTROLLER
    // ALL ACTIONS FOR TEAMS SEASON INSTANCES ARE TRIGGERED BY THEIR PARENT TEAM

    /**
     * @var \Balumedien\Clubms\Domain\Repository\TeamSeasonRepository
     * @inject
     */
    protected $teamSeasonRepository;

    /**
     * @return void
     */
    public function listAction() {
        $teamSeasons = $this->teamSeasonRepository->findAll();
        $this->view->assign('teamSeasons', $teamSeasons);
    }

    /**
     * @param \Balumedien\Clubms\Domain\Model\Team $team team item
     * @param \Balumedien\Clubms\Domain\Model\Season $season season item
     */
    public function showAction(\Balumedien\Clubms\Domain\Model\Team $team = null, \Balumedien\Clubms\Domain\Model\Season $season = null) {
        $teamSeason = $this->teamSeasonRepository->findByTeamAndSeason($team, $season);
        $this->view->assign('teamSeason', $teamSeason);
    }

}