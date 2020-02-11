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
	 * @TYPO3\\CMS\\Extbase\\Annotation\\ORM\\Lazy
	 * @TYPO3\\CMS\\Extbase\\Annotation\\ORM\\Cascade("remove")
	 */
	protected $addresses = '';
	
	/**
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Clubms\Domain\Model\Phone>
	 * @TYPO3\\CMS\\Extbase\\Annotation\\ORM\\Lazy
	 * @TYPO3\\CMS\\Extbase\\Annotation\\ORM\\Cascade("remove")
	 */
	protected $phones = '';
	
	/**
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Clubms\Domain\Model\Mail>
	 * @TYPO3\\CMS\\Extbase\\Annotation\\ORM\\Lazy
	 * @TYPO3\\CMS\\Extbase\\Annotation\\ORM\\Cascade("remove")
	 */
	protected $mails = '';
	
	/**
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Clubms\Domain\Model\Url>
	 * @TYPO3\\CMS\\Extbase\\Annotation\\ORM\\Lazy
	 * @TYPO3\\CMS\\Extbase\\Annotation\\ORM\\Cascade("remove")
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

    /**
     * @return string
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param string $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

    /**
     * @return string
     */
    public function getSizeOfShoe()
    {
        return $this->sizeOfShoe;
    }

    /**
     * @param string $sizeOfShoe
     */
    public function setSizeOfShoe($sizeOfShoe)
    {
        $this->sizeOfShoe = $sizeOfShoe;
    }

    /**
     * @return int
     */
    public function getFooter()
    {
        return $this->footer;
    }

    /**
     * @param int $footer
     */
    public function setFooter($footer)
    {
        $this->footer = $footer;
    }

    /**
     * @return int
     */
    public function getHander()
    {
        return $this->hander;
    }

    /**
     * @param int $hander
     */
    public function setHander($hander)
    {
        $this->hander = $hander;
    }

    /**
     * @return string
     */
    public function getFamilyStatus()
    {
        return $this->familyStatus;
    }

    /**
     * @param string $familyStatus
     */
    public function setFamilyStatus($familyStatus)
    {
        $this->familyStatus = $familyStatus;
    }

    /**
     * @return string
     */
    public function getGraduation()
    {
        return $this->graduation;
    }

    /**
     * @param string $graduation
     */
    public function setGraduation($graduation)
    {
        $this->graduation = $graduation;
    }

    /**
     * @return string
     */
    public function getJob()
    {
        return $this->job;
    }

    /**
     * @param string $job
     */
    public function setJob($job)
    {
        $this->job = $job;
    }

    /**
     * @return string
     */
    public function getCharacteristics()
    {
        return $this->characteristics;
    }

    /**
     * @param string $characteristics
     */
    public function setCharacteristics($characteristics)
    {
        $this->characteristics = $characteristics;
    }

    /**
     * @return string
     */
    public function getHobbies()
    {
        return $this->hobbies;
    }

    /**
     * @param string $hobbies
     */
    public function setHobbies($hobbies)
    {
        $this->hobbies = $hobbies;
    }

    /**
     * @return string
     */
    public function getFavoriteDish()
    {
        return $this->favoriteDish;
    }

    /**
     * @param string $favoriteDish
     */
    public function setFavoriteDish($favoriteDish)
    {
        $this->favoriteDish = $favoriteDish;
    }

    /**
     * @return string
     */
    public function getFavoriteDrink()
    {
        return $this->favoriteDrink;
    }

    /**
     * @param string $favoriteDrink
     */
    public function setFavoriteDrink($favoriteDrink)
    {
        $this->favoriteDrink = $favoriteDrink;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getAddresses()
    {
        return $this->addresses;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $addresses
     */
    public function setAddresses($addresses)
    {
        $this->addresses = $addresses;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getPhones()
    {
        return $this->phones;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $phones
     */
    public function setPhones($phones)
    {
        $this->phones = $phones;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getMails()
    {
        return $this->mails;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $mails
     */
    public function setMails($mails)
    {
        $this->mails = $mails;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getUrls()
    {
        return $this->urls;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $urls
     */
    public function setUrls($urls)
    {
        $this->urls = $urls;
    }

    /**
     * @return bool
     */
    public function isHiddenBirthday()
    {
        return $this->hiddenBirthday;
    }

    /**
     * @param bool $hiddenBirthday
     */
    public function setHiddenBirthday($hiddenBirthday)
    {
        $this->hiddenBirthday = $hiddenBirthday;
    }

    /**
     * @return bool
     */
    public function isDetailLink()
    {
        return $this->detailLink;
    }

    /**
     * @param bool $detailLink
     */
    public function setDetailLink($detailLink)
    {
        $this->detailLink = $detailLink;
    }

    /**
     * @return bool
     */
    public function isProfilePlayer()
    {
        return $this->profilePlayer;
    }

    /**
     * @param bool $profilePlayer
     */
    public function setProfilePlayer($profilePlayer)
    {
        $this->profilePlayer = $profilePlayer;
    }

    /**
     * @return bool
     */
    public function isProfileOfficial()
    {
        return $this->profileOfficial;
    }

    /**
     * @param bool $profileOfficial
     */
    public function setProfileOfficial($profileOfficial)
    {
        $this->profileOfficial = $profileOfficial;
    }

    /**
     * @return bool
     */
    public function isProfileReferee()
    {
        return $this->profileReferee;
    }

    /**
     * @param bool $profileReferee
     */
    public function setProfileReferee($profileReferee)
    {
        $this->profileReferee = $profileReferee;
    }

}