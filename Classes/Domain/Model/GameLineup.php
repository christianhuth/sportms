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
 * GameLineup
 */
class GameLineup extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

	/**
	 * @var \Balumedien\Clubms\Domain\Model\Game
	 * @lazy
	 */
	protected $game;

    /**
     * @var string
     */
	protected $team;

	/**
	 * @var String
	 */
	protected $jerseyNumber;

	/**
	 * @var \Balumedien\Clubms\Domain\Model\TeamSeasonSquadMember
	 */
	protected $teamSeasonSquadMember;

	/**
	 * @var \Balumedien\Clubms\Domain\Model\SectionPosition
	 */
	protected $sectionPosition;

	/**
	 * @return Game
	 */
	public function getGame() {
		return $this->game;
	}

	/**
	 * @param Game $game
	 */
	public function setGame($game) {
		$this->game = $game;
	}

	/**
	 * @return string
	 */
	public function getTeam() {
		return $this->team;
	}

	/**
	 * @param string $team
	 */
	public function setTeam($team) {
		$this->team = $team;
	}

	/**
	 * @return String
	 */
	public function getJerseyNumber() {
		return $this->jerseyNumber;
	}

	/**
	 * @param String $jerseyNumber
	 */
	public function setJerseyNumber($jerseyNumber) {
		$this->jerseyNumber = $jerseyNumber;
	}

    /**
     * @return TeamSeasonSquadMember
     */
    public function getTeamSeasonSquadMember()
    {
        return $this->teamSeasonSquadMember;
    }

    /**
     * @param TeamSeasonSquadMember $teamSeasonSquadMember
     */
    public function setTeamSeasonSquadMember($teamSeasonSquadMember)
    {
        $this->teamSeasonSquadMember = $teamSeasonSquadMember;
    }

	/**
	 * @return SectionPosition
	 */
	public function getSectionPosition() {
		return $this->sectionPosition;
	}

	/**
	 * @param SectionPosition $sectionPosition
	 */
	public function setSectionPosition($sectionPosition) {
		$this->sectionPosition = $sectionPosition;
	}

}