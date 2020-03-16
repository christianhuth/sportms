<?php


namespace Balumedien\Clubms\Domain\Model;

use TYPO3\CMS\Extbase\Annotation\ORM\Lazy;

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
	 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
	 */
	protected $game;

	/**
	 * @var string
	 */
	protected $team;

	/**
	 * @var string
	 */
	protected $type;

	/**
	 * @var string
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
	 * @return \Balumedien\Clubms\Domain\Model\Game
	 */
	public function getGame() {
		return $this->game;
	}

	/**
	 * @param \Balumedien\Clubms\Domain\Model\Game $game
	 */
	public function setGame(\Balumedien\Clubms\Domain\Model\Game $game) {
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
	 * @return string
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 * @param string $type
	 */
	public function setType($type) {
		$this->type = $type;
	}

	/**
	 * @return string
	 */
	public function getJerseyNumber() {
		return $this->jerseyNumber;
	}

	/**
	 * @param string $jerseyNumber
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