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
 * ClubOfficial
 */
class ClubOfficial extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

    /**
     * @var \Balumedien\Clubms\Domain\Model\Club
     * @TYPO3\\CMS\\Extbase\\Annotation\\ORM\\Lazy
     */
    protected $club;

	/**
	 * @var \Balumedien\Clubms\Domain\Model\Person
	 */
	protected $person;

	/**
	 * @var \Balumedien\Clubms\Domain\Model\ClubOfficialJob
	 */
	protected $clubOfficialJob;

	/**
	 * @var int
	 */
	protected $startdate;

    /**
     * @var int
     */
    protected $enddate;

	/**
	 * @return Club
	 */
	public function getClub() {
		return $this->club;
	}

	/**
	 * @param Club $club
	 */
	public function setClub($club) {
		$this->club = $club;
	}

    /**
     * @return Person
     */
    public function getPerson()
    {
        return $this->person;
    }

    /**
     * @param Person $person
     */
    public function setPerson($person)
    {
        $this->person = $person;
    }

	/**
	 * @return ClubOfficialJob
	 */
	public function getClubOfficialJob() {
		return $this->clubOfficialJob;
	}

	/**
	 * @param ClubOfficialJob $clubOfficialJob
	 */
	public function setClubOfficialJob($clubOfficialJob) {
		$this->clubOfficialJob = $clubOfficialJob;
	}

    /**
     * @return int
     */
    public function getStartdate()
    {
        return $this->startdate;
    }

    /**
     * @param int $startdate
     */
    public function setStartdate($startdate)
    {
        $this->startdate = $startdate;
    }

    /**
     * @return int
     */
    public function getEnddate()
    {
        return $this->enddate;
    }

    /**
     * @param int $enddate
     */
    public function setEnddate($enddate)
    {
        $this->enddate = $enddate;
    }

}