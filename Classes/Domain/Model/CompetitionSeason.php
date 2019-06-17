<?php

namespace Balumedien\Clubms\Domain\Model;

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
 * CompetitionSeason
 */
class CompetitionSeason extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

    /**
     * @var \Balumedien\Clubms\Domain\Model\Competition
     * @lazy
     */
    protected $competition;

    /**
     * @var \Balumedien\Clubms\Domain\Model\Season
     * @lazy
     */
    protected $season;

    /**
     * @var int
     */
    protected $maxTeams;

    /**
     * @var int
     */
    protected $gamedays;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Clubms\Domain\Model\Game>
     */
    protected $games;

    /**
     * @return Competition
     */
    public function getCompetition()
    {
        return $this->competition;
    }

    /**
     * @param Competition $competition
     */
    public function setCompetition($competition)
    {
        $this->competition = $competition;
    }

    /**
     * @return Season
     */
    public function getSeason()
    {
        return $this->season;
    }

    /**
     * @param Season $season
     */
    public function setSeason($season)
    {
        $this->season = $season;
    }

    /**
     * @return int
     */
    public function getMaxTeams()
    {
        return $this->maxTeams;
    }

    /**
     * @param int $maxTeams
     */
    public function setMaxTeams($maxTeams)
    {
        $this->maxTeams = $maxTeams;
    }

    /**
     * @return int
     */
    public function getGamedays()
    {
        return $this->gamedays;
    }

    /**
     * @param int $gamedays
     */
    public function setGamedays($gamedays)
    {
        $this->gamedays = $gamedays;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getGames()
    {
        return $this->games;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $games
     */
    public function setGames($games)
    {
        $this->games = $games;
    }

}