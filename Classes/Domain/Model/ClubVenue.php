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
 * ClubVenue
 */
class ClubVenue extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

    /**
     * @var \Balumedien\Clubms\Domain\Model\ClubGround
     */
    protected $clubGround;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $description;
	
	/**
	 * @var \Balumedien\Clubms\Domain\Model\Address
	 */
	protected $address;

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
     * @var string
     */
    protected $dimensions;

    /**
     * @var string
     */
    protected $surface;

    /**
     * @var int
     */
    protected $spectatorCapacity;

    /**
     * @return ClubGround
     */
    public function getClubGround()
    {
        return $this->clubGround;
    }

    /**
     * @param ClubGround $clubGround
     */
    public function setClubGround($clubGround)
    {
        $this->clubGround = $clubGround;
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
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
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
     * @return string
     */
    public function getDimensions()
    {
        return $this->dimensions;
    }

    /**
     * @param string $dimensions
     */
    public function setDimensions($dimensions)
    {
        $this->dimensions = $dimensions;
    }

    /**
     * @return string
     */
    public function getSurface()
    {
        return $this->surface;
    }

    /**
     * @param string $surface
     */
    public function setSurface($surface)
    {
        $this->surface = $surface;
    }

    /**
     * @return int
     */
    public function getSpectatorCapacity()
    {
        return $this->spectatorCapacity;
    }

    /**
     * @param int $spectatorCapacity
     */
    public function setSpectatorCapacity($spectatorCapacity)
    {
        $this->spectatorCapacity = $spectatorCapacity;
    }

}