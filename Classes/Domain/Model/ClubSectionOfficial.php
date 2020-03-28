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
 * ClubSectionOfficial
 */
class ClubSectionOfficial extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

    /**
     * @var \Balumedien\Sportms\Domain\Model\ClubSection
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
     */
    protected $clubSection;

	/**
	 * @var \Balumedien\Sportms\Domain\Model\Person
	 */
	protected $person;

	/**
	 * @var \Balumedien\Sportms\Domain\Model\ClubSectionOfficialJob
	 */
	protected $clubSectionOfficialJob;

	/**
	 * @var int
	 */
	protected $startdate;

    /**
     * @var int
     */
    protected $enddate;

	/**
	 * @return ClubSection
	 */
	public function getClubSection() {
		return $this->clubSection;
	}

	/**
	 * @param ClubSection $clubSection
	 */
	public function setClubSection($clubSection) {
		$this->clubSection = $clubSection;
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
	 * @return ClubSectionOfficialJob
	 */
	public function getClubSectionOfficialJob() {
		return $this->clubSectionOfficialJob;
	}

	/**
	 * @param ClubSectionOfficialJob $clubSectionOfficialJob
	 */
	public function setClubSectionOfficialJob($clubSectionOfficialJob) {
		$this->clubSectionOfficialJob = $clubSectionOfficialJob;
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