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
 * Venue
 */
class Venue extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

    /**
     * @var \Balumedien\Clubms\Domain\Model\Club
     */
    protected $club;

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
     * @TYPO3\\CMS\\Extbase\\Annotation\\ORM\\Lazy
     */
    protected $images;

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
        $this->images = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

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