<?php



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

namespace Balumedien\Clubms\Domain\Model;


class TeamSeasonPractice extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * @var string
	 */
	protected $day;

	/**
	 * @var	int
	 */
	protected $timeStart;

	/**
	 * @var int
	 */
	protected $timeEnd;

	/**
	 * @var	\Balumedien\Clubms\Domain\Model\ClubVenue
	 */
	protected $clubVenue;

	/**
	 * @var	string
	 */
	protected $annotation;

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
     * @return int
     */
    public function getTimeStart()
    {
        return $this->timeStart;
    }

    /**
     * @param int $timeStart
     */
    public function setTimeStart($timeStart)
    {
        $this->timeStart = $timeStart;
    }

    /**
     * @return int
     */
    public function getTimeEnd()
    {
        return $this->timeEnd;
    }

    /**
     * @param int $timeEnd
     */
    public function setTimeEnd($timeEnd)
    {
        $this->timeEnd = $timeEnd;
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