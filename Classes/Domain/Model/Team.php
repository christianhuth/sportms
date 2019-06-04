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
 * Team
 */
class Team extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * @var string
	 */
	protected $name = '';

	/**
	 * @var \Balumedien\Clubms\Domain\Model\Club
	 */
	protected $club = '';

	/**
	 * @var \Balumedien\Clubms\Domain\Model\Section
	 */
	protected $section = '';

	/**
	 * @var \Balumedien\Clubms\Domain\Model\AgeLevel
	 */
	protected $ageLevel = '';

	/**
	 * @var int
	 */
	protected $dummy = '';

    /**
	 * @var int
     */
    protected $detailLink = '';

	/**
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Clubms\Domain\Model\TeamSeason>
	 */
	protected $team_season = '';
	
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
    protected function initStorageObjects(){
        $this->team_season = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

	/**
	 * Returns the name
	 * @return string $name
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * Sets the name
	 * @param string $name
	 * @return void
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * Returns the club
	 * @return \Balumedien\Clubms\Domain\Model\Club
	 */
	public function getClub() {
		return $this->club;
	}

	/**
	 * Sets the club
	 * @param \Balumedien\Clubms\Domain\Model\Club $club
	 * @return void
	 */
	public function setClub(\Balumedien\Clubms\Domain\Model\Club $club) {
		$this->club = $club;
	}

	/**
	 * Returns the section
	 * @return \Balumedien\Clubms\Domain\Model\Section
	 */
	public function getSection() {
		return $this->section;
	}

	/**
	 * Sets the section
	 * @param \Balumedien\Clubms\Domain\Model\Section $section
	 * @return void
	 */
	public function setSection(\Balumedien\Clubms\Domain\Model\Section $section) {
		$this->section = $section;
	}

	/**
	 * Returns the ageLevel
	 * @return \Balumedien\Clubms\Domain\Model\Section
	 */
	public function getAgeLevel() {
		return $this->ageLevel;
	}

	/**
	 * Sets the ageLevel
	 * @param \Balumedien\Clubms\Domain\Model\AgeLevel $ageLevel
	 * @return void
	 */
	public function setAgeLevel(\Balumedien\Clubms\Domain\Model\AgeLevel $ageLevel) {
		$this->ageLevel = $ageLevel;
	}

	/**
	 * Returns the teamSeason
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Clubms\Domain\Model\TeamSeason>
	 */
	public function getTeamSeason() {
		return $this->team_season;
	}

	/**
	 * Sets the teamSeasons
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Clubms\Domain\Model\TeamSeason> $team_season
	 */
	public function setTeamSeason(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $team_season) {
		$this->team_season = $team_season;
	}

	/**
	 * Adds a teamSeason to the teamSeasons
	 * @param \Balumedien\Clubms\Domain\Model\TeamSeason $teamSeason
	 */
	public function addTeamSeason(\Balumedien\Clubms\Domain\Model\TeamSeason $team_season) {
		$this->team_season->attach($team_season);
	}

	/**
	 * Removes a teamSeason from the teamSeasons
	 * @param \Balumedien\Clubms\Domain\Model\TeamSeason $teamSeason
	 * @return void
	 */
	public function removeTeamSeason(\Balumedien\Clubms\Domain\Model\TeamSeason $team_season) {
		$this->team_season->detach($team_season);
	}
	
	/**
	 * Returns the detailLink
	 * @return int $detailLink
	 */
	public function getDetailLink() {
		return $this->detailLink;
	}
	
	/**
	 * Sets the detailLink
	 * @param int $detailLink
	 * @return void
	 */
	public function setDetailLink($detailLink) {
		$this->detailLink = $detailLink;
	}

}