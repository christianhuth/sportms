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
 * ClubGround
 */
class ClubGround extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

    /**
     * @var \Balumedien\Clubms\Domain\Model\Club
     */
    protected $club;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var \Balumedien\Clubms\Domain\Model\Address
     */
    protected $address;

    /**
     * @var string
     */
    protected $journey;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     * @lazy
     */
    protected $images;

    /**
     * @var boolean
     */
    protected $clubOwned;

    /**
     * @var int
     */
    protected $clubOwnedSince;

    /**
     * @var int
     */
    protected $yearOfBuilding;

    /**
     * @var int
     */
    protected $dateOfBuilding;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Clubms\Domain\Model\ClubVenue>
     * @lazy
     * @cascade remove
     */
    protected $clubVenues;

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
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return Address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param Address $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getJourney()
    {
        return $this->journey;
    }

    /**
     * @param string $journey
     */
    public function setJourney($journey)
    {
        $this->journey = $journey;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $images
     */
    public function setImages($images)
    {
        $this->images = $images;
    }

    /**
     * @return bool
     */
    public function isClubOwned()
    {
        return $this->clubOwned;
    }

    /**
     * @param bool $clubOwned
     */
    public function setClubOwned($clubOwned)
    {
        $this->clubOwned = $clubOwned;
    }

    /**
     * @return int
     */
    public function getClubOwnedSince()
    {
        return $this->clubOwnedSince;
    }

    /**
     * @param int $clubOwnedSince
     */
    public function setClubOwnedSince($clubOwnedSince)
    {
        $this->clubOwnedSince = $clubOwnedSince;
    }

    /**
     * @return int
     */
    public function getYearOfBuilding()
    {
        return $this->yearOfBuilding;
    }

    /**
     * @param int $yearOfBuilding
     */
    public function setYearOfBuilding($yearOfBuilding)
    {
        $this->yearOfBuilding = $yearOfBuilding;
    }

    /**
     * @return int
     */
    public function getDateOfBuilding()
    {
        return $this->dateOfBuilding;
    }

    /**
     * @param int $dateOfBuilding
     */
    public function setDateOfBuilding($dateOfBuilding)
    {
        $this->dateOfBuilding = $dateOfBuilding;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getClubVenues()
    {
        return $this->clubVenues;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $clubVenues
     */
    public function setClubVenues($clubVenues)
    {
        $this->clubVenues = $clubVenues;
    }

}