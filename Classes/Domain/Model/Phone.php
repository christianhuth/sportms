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
 * Phone
 */
class Phone extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * @var string
	 */
	protected $areaCode;

    /**
     * @var string
     */
    protected $callingNumber;

    /**
	 * @var string
     */
    protected $internationalAreaCode;
	
	/**
	 * @var int
	 */
	protected $type;
	
	/**
	 * @var boolen
	 */
	protected $public;

    /**
     * @return string
     */
    public function getAreaCode()
    {
        return $this->areaCode;
    }

    /**
     * @param string $areaCode
     */
    public function setAreaCode($areaCode)
    {
        $this->areaCode = $areaCode;
    }

    /**
     * @return string
     */
    public function getCallingNumber()
    {
        return $this->callingNumber;
    }

    /**
     * @param string $callingNumber
     */
    public function setCallingNumber($callingNumber)
    {
        $this->callingNumber = $callingNumber;
    }

    /**
     * @return string
     */
    public function getInternationalAreaCode()
    {
        return $this->internationalAreaCode;
    }

    /**
     * @param string $internationalAreaCode
     */
    public function setInternationalAreaCode($internationalAreaCode)
    {
        $this->internationalAreaCode = $internationalAreaCode;
    }

    /**
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param int $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return boolen
     */
    public function getPublic()
    {
        return $this->public;
    }

    /**
     * @param boolen $public
     */
    public function setPublic($public)
    {
        $this->public = $public;
    }

}