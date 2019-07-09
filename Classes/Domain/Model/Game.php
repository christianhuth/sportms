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
     * @var \Balumedien\Clubms\Domain\Model\Team
     */
    protected $teamHome;

    /**
     * @var \Balumedien\Clubms\Domain\Model\Team
     */
    protected $teamGuest;

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
    protected $clubVenue;

    /**
     * @var int
     */
    protected $gameSpectators;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Clubms\Domain\Model\GameLineup>
     * @cascade remove
     */
    protected $gameLineupHomes;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Clubms\Domain\Model\GameLineup>
     * @cascade remove
     */
    protected $gameLineupGuests;

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
     * @return Team
     */
    public function getTeamHome()
    {
        return $this->teamHome;
    }

    /**
     * @param Team $teamHome
     */
    public function setTeamHome($teamHome)
    {
        $this->teamHome = $teamHome;
    }

    /**
     * @return Team
     */
    public function getTeamGuest()
    {
        return $this->teamGuest;
    }

    /**
     * @param Team $teamGuest
     */
    public function setTeamGuest($teamGuest)
    {
        $this->teamGuest = $teamGuest;
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
    public function getClubVenue()
    {
        return $this->clubVenue;
    }

    /**
     * @param ClubVenue $clubVenue
     */
    public function setClubVenue($clubVenue)
    {
        $this->clubVenue = $clubVenue;
    }

    /**
     * @return int
     */
    public function getGameSpectators()
    {
        return $this->gameSpectators;
    }

    /**
     * @param int $gameSpectators
     */
    public function setGameSpectators($gameSpectators)
    {
        $this->gameSpectators = $gameSpectators;
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