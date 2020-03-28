<?php
	
	namespace Balumedien\Sportms\Domain\Model;
	
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
 * TeamSeasonPractice
 */
class TeamSeasonPractice extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

    /**
     * @var \Balumedien\Sportms\Domain\Model\TeamSeason
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
     */
    protected $teamSeason;

	/**
	 * @var string
	 */
	protected $day;

	/**
	 * @var	string
	 */
	protected $timeStart;

	/**
	 * @var string
	 */
	protected $timeEnd;

	/**
	 * @var	\Balumedien\Sportms\Domain\Model\Venue
	 */
	protected $venue;

	/**
	 * @var	string
	 */
	protected $annotation;

    /**
     * @return TeamSeason
     */
    public function getTeamSeason()
    {
        return $this->teamSeason;
    }

    /**
     * @param TeamSeason $teamSeason
     */
    public function setTeamSeason($teamSeason)
    {
        $this->teamSeason = $teamSeason;
    }

    /**
     * @return string
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * @param string $day
     */
    public function setDay($day)
    {
        $this->day = $day;
    }
	
	/**
	 * @return string
	 */
	public function getTimeStart() {
		return $this->timeStart;
	}
	
	/**
	 * @param string $timeStart
	 */
	public function setTimeStart($timeStart) {
		$this->timeStart = $timeStart;
	}
	
	/**
	 * @return string
	 */
	public function getTimeEnd() {
		return $this->timeEnd;
	}
	
	/**
	 * @param string $timeEnd
	 */
	public function setTimeEnd($timeEnd) {
		$this->timeEnd = $timeEnd;
	}

    /**
     * @return Venue
     */
    public function getVenue()
    {
        return $this->venue;
    }

    /**
     * @param Venue $venue
     */
    public function setVenue($venue)
    {
        $this->venue = $venue;
    }

    /**
     * @return string
     */
    public function getAnnotation()
    {
        return $this->annotation;
    }

    /**
     * @param string $annotation
     */
    public function setAnnotation($annotation)
    {
        $this->annotation = $annotation;
    }

}