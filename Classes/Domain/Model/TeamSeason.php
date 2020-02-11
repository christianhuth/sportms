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
 * TeamSeason
 */
class TeamSeason extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * @var \Balumedien\Clubms\Domain\Model\Team
	 */
	protected $team;

	/**
	 * @var \Balumedien\Clubms\Domain\Model\Season
	 */
	protected $season;

	/**
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Clubms\Domain\Model\TeamSeasonPractice>
	 */
	protected $teamSeasonPractices;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     * @TYPO3\\CMS\\Extbase\\Annotation\\ORM\\Lazy
     */
    protected $teamSeasonImages;

	/**
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Clubms\Domain\Model\TeamSeasonOfficial>
	 */
	protected $teamSeasonOfficials;

	/**
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Clubms\Domain\Model\TeamSeasonSquadMember>
	 */
	protected $teamSeasonSquadMembers;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Clubms\Domain\Model\TeamSeasonSquadMember>
     */
    protected $teamSeasonSquadCaptains;

	/**
	 * @var	boolean
	 */
	protected $detailLink;

	/**
	 * TeamSeason constructor.
	 */
	public function __construct() {
		//Do not remove the next line: It would break the functionality
		$this->initStorageObjects();
	}

	/**
	 * Initializes all ObjectStorage properties
	 * Do not modify this method!
	 * It will be rewritten on each save in the extension builder
	 * You may modify the constructor of this class instead
	 *
	 * @return void
	 */
	protected function initStorageObjects() {
		$this->teamSeasonPractices = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->images = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->teamSeasonOfficials = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->teamSeasonSquadMembers = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->teamSeasonSquadCaptains = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

    /**
     * @return Team
     */
    public function getTeam()
    {
        return $this->team;
    }

    /**
     * @param Team $team
     */
    public function setTeam($team)
    {
        $this->team = $team;
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
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getTeamSeasonPractices()
    {
        return $this->teamSeasonPractices;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $teamSeasonPractices
     */
    public function setTeamSeasonPractices($teamSeasonPractices)
    {
        $this->teamSeasonPractices = $teamSeasonPractices;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getTeamSeasonImages()
    {
        return $this->teamSeasonImages;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $teamSeasonImages
     */
    public function setTeamSeasonImages($teamSeasonImages)
    {
        $this->teamSeasonImages = $teamSeasonImages;
    }

	/**
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
	 */
	public function getTeamSeasonOfficials() {
		return $this->teamSeasonOfficials;
	}

	/**
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $teamSeasonOfficials
	 */
	public function setTeamSeasonOfficials($teamSeasonOfficials) {
		$this->teamSeasonOfficials = $teamSeasonOfficials;
	}

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getTeamSeasonSquadMembers()
    {
        return $this->teamSeasonSquadMembers;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $teamSeasonSquadMembers
     */
    public function setTeamSeasonSquadMembers($teamSeasonSquadMembers)
    {
        $this->teamSeasonSquadMembers = $teamSeasonSquadMembers;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getTeamSeasonSquadCaptains()
    {
        return $this->teamSeasonSquadCaptains;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $teamSeasonSquadCaptains
     */
    public function setTeamSeasonSquadCaptains($teamSeasonSquadCaptains)
    {
        $this->teamSeasonSquadCaptains = $teamSeasonSquadCaptains;
    }

    /**
     * @return bool
     */
    public function isDetailLink()
    {
        return $this->detailLink;
    }

    /**
     * @param bool $detailLink
     */
    public function setDetailLink($detailLink)
    {
        $this->detailLink = $detailLink;
    }

}