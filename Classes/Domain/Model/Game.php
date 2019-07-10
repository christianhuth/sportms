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
 * Game
 */
class Game extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

	/**
	 * @var \Balumedien\Clubms\Domain\Model\Section
	 */
	protected $section;

    /**
     * @var \Balumedien\Clubms\Domain\Model\Season
     */
    protected $season;

    /**
     * @var \Balumedien\Clubms\Domain\Model\CompetitionSeason
     */
    protected $competitionSeason;

    /**
     * @var \Balumedien\Clubms\Domain\Model\TeamSeason
     */
    protected $teamSeasonHome;

    /**
     * @var \Balumedien\Clubms\Domain\Model\TeamSeason
     */
    protected $teamSeasonGuest;

    /**
     * @var int
     */
    protected $status;

    /**
     * @var int
     */
    protected $date;

    /**
     * @var int
     */
    protected $time;

    /**
     * @var \Balumedien\Clubms\Domain\Model\ClubVenue
     */
    protected $venue;

    /**
     * @var int
     */
    protected $spectators;

    /**
     * @var int
     */
    protected $resultType;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Clubms\Domain\Model\GameLineup>
     * @cascade remove
     */
    protected $gameLineupHomes;

    /**
     * @var \Balumedien\Clubms\Domain\Model\TeamSeasonOfficial
     */
    protected $trainerHome;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Clubms\Domain\Model\GameLineup>
     * @cascade remove
     */
    protected $gameLineupGuests;

    /**
     * @var \Balumedien\Clubms\Domain\Model\TeamSeasonOfficial
     */
    protected $trainerGuest;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Clubms\Domain\Model\GameReferee>
     * @cascade remove
     */
    protected $gameReferees;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Clubms\Domain\Model\GameReport>
     * @cascade remove
     */
    protected $gameReports;

    /**
     * @var boolean
     */
    protected $detailLink;

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
        $this->gameLineupHomes = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->gameLineupGuests = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->gameReferees = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->gameReports = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

	/**
	 * @return Section
	 */
	public function getSection() {
		return $this->section;
	}

	/**
	 * @param Section $section
	 */
	public function setSection($section) {
		$this->section = $section;
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
     * @return CompetitionSeason
     */
    public function getCompetitionSeason()
    {
        return $this->competitionSeason;
    }

    /**
     * @param CompetitionSeason $competitionSeason
     */
    public function setCompetitionSeason($competitionSeason)
    {
        $this->competitionSeason = $competitionSeason;
    }

    /**
     * @return TeamSeason
     */
    public function getTeamSeasonHome()
    {
        return $this->teamSeasonHome;
    }

    /**
     * @param TeamSeason $teamSeasonHome
     */
    public function setTeamSeasonHome($teamSeasonHome)
    {
        $this->teamSeasonHome = $teamSeasonHome;
    }

    /**
     * @return TeamSeason
     */
    public function getTeamSeasonGuest()
    {
        return $this->teamSeasonGuest;
    }

    /**
     * @param TeamSeason $teamSeasonGuest
     */
    public function setTeamSeasonGuest($teamSeasonGuest)
    {
        $this->teamSeasonGuest = $teamSeasonGuest;
    }

    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param int $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return int
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param int $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return int
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param int $time
     */
    public function setTime($time)
    {
        $this->time = $time;
    }

    /**
     * @return ClubVenue
     */
    public function getVenue()
    {
        return $this->venue;
    }

    /**
     * @param ClubVenue $venue
     */
    public function setVenue($venue)
    {
        $this->venue = $venue;
    }

    /**
     * @return int
     */
    public function getSpectators()
    {
        return $this->spectators;
    }

    /**
     * @param int $spectators
     */
    public function setSpectators($spectators)
    {
        $this->spectators = $spectators;
    }

    /**
     * @return int
     */
    public function getResultType()
    {
        return $this->resultType;
    }

    /**
     * @param int $resultType
     */
    public function setResultType($resultType)
    {
        $this->resultType = $resultType;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getGameLineupHomes()
    {
        return $this->gameLineupHomes;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $gameLineupHomes
     */
    public function setGameLineupHomes($gameLineupHomes)
    {
        $this->gameLineupHomes = $gameLineupHomes;
    }

    /**
     * @return TeamSeasonOfficial
     */
    public function getTrainerHome()
    {
        return $this->trainerHome;
    }

    /**
     * @param TeamSeasonOfficial $trainerHome
     */
    public function setTrainerHome($trainerHome)
    {
        $this->trainerHome = $trainerHome;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getGameLineupGuests()
    {
        return $this->gameLineupGuests;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $gameLineupGuests
     */
    public function setGameLineupGuests($gameLineupGuests)
    {
        $this->gameLineupGuests = $gameLineupGuests;
    }

    /**
     * @return TeamSeasonOfficial
     */
    public function getTrainerGuest()
    {
        return $this->trainerGuest;
    }

    /**
     * @param TeamSeasonOfficial $trainerGuest
     */
    public function setTrainerGuest($trainerGuest)
    {
        $this->trainerGuest = $trainerGuest;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getGameReferees()
    {
        return $this->gameReferees;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $gameReferees
     */
    public function setGameReferees($gameReferees)
    {
        $this->gameReferees = $gameReferees;
    }

    /**
     * @return bool
     */
    public function isDetailLink()
    {
        return $this->detailLink;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getGameReports()
    {
        return $this->gameReports;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $gameReports
     */
    public function setGameReports($gameReports)
    {
        $this->gameReports = $gameReports;
    }

    /**
     * @param bool $detailLink
     */
    public function setDetailLink($detailLink)
    {
        $this->detailLink = $detailLink;
    }

}