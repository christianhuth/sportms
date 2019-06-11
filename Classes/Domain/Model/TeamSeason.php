<?php

namespace Balumedien\Clubms\Domain\Model;

use \TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use \TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

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
class TeamSeason extends AbstractEntity {

	/**
	 * @var \Balumedien\Clubms\Domain\Model\Team
	 */
	protected $team = '';

	/**
	 * @var \Balumedien\Clubms\Domain\Model\Season
	 */
	protected $season = '';

	/**
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Clubms\Domain\Model\TeamSeasonPractice>
	 */
	protected $teamSeasonPractices = NULL;

	/**
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Clubms\Domain\Model\TeamSeasonOfficialJob>
	 */
	protected $teamSeasonOfficialJobs = NULL;

	/**
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Clubms\Domain\Model\TeamSeasonSquadMember>
	 */
	protected $teamSeasonSquadMembers = NULL;

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
		$this->teamSeasonPractices = new ObjectStorage();
		$this->teamSeasonOfficialJobs = new ObjectStorage();
		$this->teamSeasonSquadMembers = new ObjectStorage();
	}

	/**
	 * Returns the team
	 * @return \Balumedien\Clubms\Domain\Model\Team $team
	 */
	public function getTeam() {
		return $this->team;
	}

	/**
	 * Sets the team
	 *
	 * @param \Balumedien\Clubms\Domain\Model\Team $team
	 */
	public function setTeam($team) {
		$this->team = $team;
	}

	/**
	 * Returns the season
	 * @return \Balumedien\Clubms\Domain\Model\Season $season
	 */
	public function getSeason() {
		return $this->season;
	}

	/**
	 * Sets the season
	 *
	 * @param \Balumedien\Clubms\Domain\Model\Season $season
	 */
	public function setSeason($season) {
		$this->season = $season;
	}

	/**
	 * Adds a teamSeasonPratice to the teamSeasonPractices
	 * @param \Balumedien\Clubms\Domain\Model\TeamSeasonPractice $teamSeasonPractice
	 */
	public function addTeamSeasonPractice(TeamSeasonPractice $teamSeasonPractice) {
		$this->teamSeasonPractices->attach($teamSeasonPractice);
	}

	/**
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
	 */
	public function getTeamSeasonPractices() {
		return $this->teamSeasonPractices;
	}

	/**
	 * Removes a teamSeason from the teamSeasons
	 * @param \Balumedien\Clubms\Domain\Model\TeamSeasonPractice $teamSeasonPractice
	 */
	public function removeTeamSeasonPractice(TeamSeasonPractice $teamSeasonPractice) {
		$this->teamSeasonPractices->detach($teamSeasonPractice);
	}

	/**
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $teamSeasonPractices
	 */
	public function setTeamSeasonPractices(ObjectStorage $teamSeasonPractices) {
		$this->teamSeasonPractices = $teamSeasonPractices;
	}

	/**
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
	 */
	public function getTeamSeasonOfficialJobs() {
		return $this->teamSeasonOfficialJobs;
	}

	/**
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $teamSeasonOfficialJobs
	 */
	public function setTeamSeasonOfficialJobs(ObjectStorage $teamSeasonOfficialJobs) {
		$this->teamSeasonOfficialJobs = $teamSeasonOfficialJobs;
	}

	/**
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
	 */
	public function getTeamSeasonSquadMembers() {
		return $this->teamSeasonSquadMembers;
	}

	/**
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $teamSeasonSquadMembers
	 */
	public function setTeamSeasonSquadMembers(ObjectStorage $teamSeasonSquadMembers) {
		$this->teamSeasonSquadMembers = $teamSeasonSquadMembers;
	}

	/**
	 * @return bool
	 */
	public function isDetailLink() {
		return $this->detailLink;
	}

	/**
	 * @param bool $detailLink
	 */
	public function setDetailLink(bool $detailLink) {
		$this->detailLink = $detailLink;
	}

}