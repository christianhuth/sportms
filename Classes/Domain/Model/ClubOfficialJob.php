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
 * ClubOfficialJob
 */
class ClubOfficialJob extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

    /**
     * @var \Balumedien\Clubms\Domain\Model\Club
     */
    protected $club;

    /**
     * @var \Balumedien\Clubms\Domain\Model\OfficialJob
     */
    protected $officialJob;
	
	/**
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Clubms\Domain\Model\ClubOfficial>
	 * @lazy
	 * @cascade remove
	 */
	protected $clubOfficials;

    /**
     * @return Club
     */
    public function getClub()
    {
        return $this->club;
    }

    /**
     * @param Club $club
     */
    public function setClub($club)
    {
        $this->club = $club;
    }

    /**
     * @return OfficialJob
     */
    public function getOfficialJob()
    {
        return $this->officialJob;
    }

    /**
     * @param OfficialJob $officialJob
     */
    public function setOfficialJob($officialJob)
    {
        $this->officialJob = $officialJob;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getClubOfficials()
    {
        return $this->clubOfficials;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $clubOfficials
     */
    public function setClubOfficials($clubOfficials)
    {
        $this->clubOfficials = $clubOfficials;
    }

}