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
 * Address
 */
class Address extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * @var string
	 */
	protected $street = '';

	/**
	 * @var string
	 */
	protected $housenumber = '';

    /**
     * @var string
     */
    protected $zipcode = '';

    /**
	 * @var string
     */
    protected $location = '';
	
	/**
	 * @var int
	 */
	protected $country = '';

    /**
	 * @var string
     */
    protected $region = '';
	
	/**
	 * @var boolean
	 */
	protected $public = '';
	
	/**
	 * @var int
	 */
	protected $club = '';

	/**
	 * @var int
	 */
	protected $club_section = '';
	
	/**
	 * @var int
	 */
	protected $person = '';

    /**
     * @var int
     */
    protected $ordering = '';

    /**
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @param string $street
     */
    public function setStreet($street)
    {
        $this->street = $street;
    }

    /**
     * @return string
     */
    public function getHousenumber()
    {
        return $this->housenumber;
    }

    /**
     * @param string $housenumber
     */
    public function setHousenumber($housenumber)
    {
        $this->housenumber = $housenumber;
    }

    /**
     * @return string
     */
    public function getZipcode()
    {
        return $this->zipcode;
    }

    /**
     * @param string $zipcode
     */
    public function setZipcode($zipcode)
    {
        $this->zipcode = $zipcode;
    }

    /**
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param string $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }

}