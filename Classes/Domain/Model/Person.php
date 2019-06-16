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
 * Person
 */
class Person extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * @var string
	 */
	protected $firstname = '';

	/**
	 * @var string
	 */
	protected $lastname = '';

	/**
	 * @var string
	 */
	protected $birthname = '';
	
    /**
     * @var string
     */
    protected $nickname = '';

    /**
	 * @var int
     */
    protected $dateOfBirth = '';

    /**
	 * @var int
     */
    protected $zodiacSign = '';
	
    /**
     * @var string
     */
    protected $placeOfBirth = '';
	
    /**
     * @var int
     */
    protected $nationality = '';
	
    /**
     * @var string
     */
    protected $gender = '';
	
    /**
     * @var string
     */
    protected $weight = '';
	
    /**
     * @var string
     */
    protected $height = '';
	
    /**
     * @var string
     */
    protected $sizeOfShoe = '';
	
    /**
     * @var int
     */
    protected $footer = '';
	
    /**
     * @var int
     */
    protected $hander = '';
	
    /**
     * @var string
     */
    protected $familyStatus = '';
	
    /**
     * @var string
     */
    protected $graduation = '';
	
    /**
     * @var string
     */
    protected $job = '';
	
    /**
     * @var string
     */
    protected $characteristics = '';
	
    /**
     * @var string
     */
    protected $hobbies = '';
	
    /**
     * @var string
     */
    protected $favoriteDish = '';
	
    /**
     * @var string
     */
    protected $favoriteDrink = '';
	
	/**
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Clubms\Domain\Model\Address>
	 * @lazy
	 * @cascade remove
	 */
	protected $addresses = '';
	
	/**
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Clubms\Domain\Model\Phone>
	 * @lazy
	 * @cascade remove
	 */
	protected $phones = '';
	
	/**
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Clubms\Domain\Model\Mail>
	 * @lazy
	 * @cascade remove
	 */
	protected $mails = '';
	
	/**
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Clubms\Domain\Model\Url>
	 * @lazy
	 * @cascade remove
	 */
	protected $urls = '';

    /**
	 * @var boolean
     */
    protected $hiddenBirthday = '';

    /**
	 * @var boolean
     */
    protected $detailLink = '';

    /**
	 * @var boolean
     */
    protected $profilePlayer = '';

    /**
	 * @var boolean
     */
    protected $profileOfficial = '';

    /**
	 * @var boolean
     */
    protected $profileReferee = '';

    /**
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @return string
     */
    public function getBirthname()
    {
        return $this->birthname;
    }

    /**
     * @param string $birthname
     */
    public function setBirthname($birthname)
    {
        $this->birthname = $birthname;
    }

    /**
     * @return string
     */
    public function getNickname()
    {
        return $this->nickname;
    }

    /**
     * @param string $nickname
     */
    public function setNickname($nickname)
    {
        $this->nickname = $nickname;
    }

    /**
     * @return int
     */
    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }

    /**
     * @param int $dateOfBirth
     */
    public function setDateOfBirth($dateOfBirth)
    {
        $this->dateOfBirth = $dateOfBirth;
    }

    /**
     * @return int
     */
    public function getZodiacSign()
    {
        return $this->zodiacSign;
    }

    /**
     * @param int $zodiacSign
     */
    public function setZodiacSign($zodiacSign)
    {
        $this->zodiacSign = $zodiacSign;
    }

    /**
     * @return string
     */
    public function getPlaceOfBirth()
    {
        return $this->placeOfBirth;
    }

    /**
     * @param string $placeOfBirth
     */
    public function setPlaceOfBirth($placeOfBirth)
    {
        $this->placeOfBirth = $placeOfBirth;
    }

    /**
     * @return int
     */
    public function getNationality()
    {
        return $this->nationality;
    }

    /**
     * @param int $nationality
     */
    public function setNationality($nationality)
    {
        $this->nationality = $nationality;
    }

    /**
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param string $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * @return string
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param string $weight
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

}