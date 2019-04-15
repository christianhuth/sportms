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
	protected $address = '';
	
	/**
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Clubms\Domain\Model\Phone>
	 * @lazy
	 * @cascade remove
	 */
	protected $phone = '';
	
	/**
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Clubms\Domain\Model\Mail>
	 * @lazy
	 * @cascade remove
	 */
	protected $mail = '';
	
	/**
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Clubms\Domain\Model\Url>
	 * @lazy
	 * @cascade remove
	 */
	protected $url = '';

    /**
	 * @var int
     */
    protected $hiddenBirthday = '';

    /**
	 * @var int
     */
    protected $detailLink = '';

    /**
	 * @var int
     */
    protected $profilePlayer = '';

    /**
	 * @var int
     */
    protected $profileOfficial = '';

    /**
	 * @var int
     */
    protected $profileReferee = '';
	
	/**
	 * Returns the firstname
	 * @return string $firstname
	 */
	public function getFirstname() {
		return $this->firstname;
	}
	
	/**
	 * Sets the firstname
	 * @param string $firstname
	 * @return void
	 */
	public function setFirstname($firstname) {
		$this->firstname = $firstname;
	}
	
	/**
	 * Returns the lastname
	 * @return string $lastname
	 */
	public function getLastname() {
		return $this->lastname;
	}
	
	/**
	 * Sets the lastname
	 * @param string $lastname
	 * @return void
	 */
	public function setLastname($lastname) {
		$this->lastname = $lastname;
	}
	
	/**
	 * Returns the birthname
	 * @return string $birthname
	 */
	public function getBirthname() {
		return $this->birthname;
	}
	
	/**
	 * Sets the birthname
	 * @param string $birthname
	 * @return void
	 */
	public function setBirthname($birthname) {
		$this->birthname = $birthname;
	}

	/**
	 * Returns the nickname
	 * @return string $nickname
	 */
	public function getNickname() {
		return $this->nickname;
	}
	
	/**
	 * Sets the nickname
	 * @param string $nickname
	 * @return void
	 */
	public function setNickname($nickname) {
		$this->nickname = $nickname;
	}
	
	/**
	 * Returns the dateOfBirth
	 * @return int $dateOfBirth
	 */
	public function getDateOfBirth() {
		return $this->dateOfBirth;
	}
	
	/**
	 * Sets the dateOfBirth
	 * @param int $dateOfBirth
	 * @return void
	 */
	public function setDateOfBirth($dateOfBirth) {
		$this->dateOfBirth = $dateOfBirth;
	}
	
	/**
	 * Returns the zodiacSign
	 * @return int $zodiacSign
	 */
	public function getZodiacSign() {
		return $this->zodiacSign;
	}
	
	/**
	 * Sets the zodiacSign
	 * @param int $zodiacSign
	 * @return void
	 */
	public function setZodiacSign($zodiacSign) {
		$this->zodiacSign = $zodiacSign;
	}
	
	/**
	 * Returns the placeOfBirth
	 * @return string $placeOfBirth
	 */
	public function getPlaceOfBirth() {
		return $this->placeOfBirth;
	}
	
	/**
	 * Sets the placeOfBirth
	 * @param string $placeOfBirth
	 * @return void
	 */
	public function setPlaceOfBirth($placeOfBirth) {
		$this->placeOfBirth = $placeOfBirth;
	}
	
    /**
     * Returns the nationality
     * @return int $nationality
     */
    public function getNationality() {
        return $this->nationality;
    }

    /**
     * Sets the nationality
     * @param int $nationality
     * @return void
     */
    public function setNationality($nationality) {
        $this->nationality = $nationality;
    }
	
    /**
     * Returns the gender
     * @return string $gender
     */
    public function getGender() {
        return $this->gender;
    }
	
    /**
     * Sets the gender
     * @param string $gender
     * @return void
     */
    public function setGender($gender) {
        $this->gender = $gender;
    }
	
    /**
     * Returns the weight
     * @return string $weight
     */
    public function getWeight() {
        return $this->weight;
    }
	
    /**
     * Sets the weight
     * @param string $weight
     * @return void
     */
    public function setWeight($weight) {
        $this->weight = $weight;
    }
	
    /**
     * Returns the height
     * @return string $height
     */
    public function getHeight() {
        return $this->height;
    }
	
    /**
     * Sets the height
     * @param string $height
     * @return void
     */
    public function setHeight($height) {
        $this->height = $height;
    }
	
    /**
     * Returns the sizeOfShoe
     * @return string $sizeOfShoe
     */
    public function getSizeOfShoe() {
        return $this->sizeOfShoe;
    }
	
    /**
     * Sets the sizeOfShoe
     * @param string $sizeOfShoe
     * @return void
     */
    public function setSizeOfShoe($sizeOfShoe) {
        $this->sizeOfShoe = $sizeOfShoe;
    }
	
    /**
     * Returns the footer
     * @return int $footer
     */
    public function getFooter() {
        return $this->footer;
    }
	
    /**
     * Sets the footer
     * @param int $footer
     * @return void
     */
    public function setFooter($footer) {
        $this->footer = $footer;
    }
	
    /**
     * Returns the hander
     * @return int $hander
     */
    public function getHander() {
        return $this->hander;
    }
	
    /**
     * Sets the hander
     * @param int $hander
     * @return void
     */
    public function setHander($hander) {
        $this->hander = $hander;
    }
	
    /**
     * Returns the familyStatus
     * @return string $familyStatus
     */
    public function getFamilyStatus() {
        return $this->familyStatus;
    }
	
    /**
     * Sets the familyStatus
     * @param string $familyStatus
     * @return void
     */
    public function setFamilyStatus($familyStatus) {
        $this->familyStatus = $familyStatus;
    }
	
    /**
     * Returns the graduation
     * @return string $graduation
     */
    public function getGraduation() {
        return $this->graduation;
    }
	
    /**
     * Sets the graduation
     * @param string $graduation
     * @return void
     */
    public function setGraduation($graduation) {
        $this->graduation = $graduation;
    }
	
    /**
     * Returns the job
     * @return string $job
     */
    public function getJob() {
        return $this->job;
    }
	
    /**
     * Sets the job
     * @param string $job
     * @return void
     */
    public function setJob($job) {
        $this->job = $job;
    }
	
    /**
     * Returns the characteristics
     * @return string $characteristics
     */
    public function getCharacteristics() {
        return $this->characteristics;
    }
	
    /**
     * Sets the characteristics
     * @param string $characteristics
     * @return void
     */
    public function setCharacteristics($characteristics) {
        $this->characteristics = $characteristics;
    }
	
    /**
     * Returns the hobbies
     * @return string $hobbies
     */
    public function getHobbies() {
        return $this->hobbies;
    }
	
    /**
     * Sets the hobbies
     * @param string $hobbies
     * @return void
     */
    public function setHobbies($hobbies) {
        $this->hobbies = $hobbies;
    }
	
    /**
     * Returns the favoriteDish
     * @return string $favoriteDish
     */
    public function getFavoriteDish() {
        return $this->favoriteDish;
    }
	
    /**
     * Sets the favoriteDish
     * @param string $favoriteDish
     * @return void
     */
    public function setFavoriteDish($favoriteDish) {
        $this->favoriteDish = $favoriteDish;
    }
	
    /**
     * Returns the favoriteDrink
     * @return string $favoriteDrink
     */
    public function getFavoriteDrink() {
        return $this->favoriteDrink;
    }
	
    /**
     * Sets the favoriteDrink
     * @param string $favoriteDrink
     * @return void
     */
    public function setFavoriteDrink($favoriteDrink) {
        $this->favoriteDrink = $favoriteDrink;
    }
	
	/**
	 * Returns the hiddenBirthday
	 * @return int $hiddenBirthday
	 */
	public function getHiddenBirthday() {
		return $this->hiddenBirthday;
	}
	
	/**
	 * Sets the hiddenBirthday
	 * @param int $hiddenBirthday
	 * @return void
	 */
	public function setHiddenBirthday($hiddenBirthday) {
		$this->hiddenBirthday = $hiddenBirthday;
	}
	
	/**
	 * Returns the detailLink
	 * @return int $detailLink
	 */
	public function getDetailLink() {
		return $this->detailLink;
	}
	
	/**
	 * Sets the detailLink
	 * @param int $detailLink
	 * @return void
	 */
	public function setDetailLink($detailLink) {
		$this->detailLink = $detailLink;
	}
	
	/**
	 * Returns the profilePlayer
	 * @return int $profilePlayer
	 */
	public function getProfilePlayer() {
		return $this->profilePlayer;
	}
	
	/**
	 * Sets the profilePlayer
	 * @param int $profilePlayer
	 * @return void
	 */
	public function setProfilePlayer($profilePlayer) {
		$this->profilePlayer = $profilePlayer;
	}
	
	/**
	 * Returns the profileOfficial
	 * @return int $profileOfficial
	 */
	public function getProfileOfficial() {
		return $this->profileOfficial;
	}
	
	/**
	 * Sets the profileOfficial
	 * @param int $profileOfficial
	 * @return void
	 */
	public function setProfileOfficial($profileOfficial) {
		$this->profileOfficial = $profileOfficial;
	}
	
	/**
	 * Returns the profileReferee
	 * @return int $profileReferee
	 */
	public function getProfileReferee() {
		return $this->profileReferee;
	}
	
	/**
	 * Sets the profileReferee
	 * @param int $profileReferee
	 * @return void
	 */
	public function setProfileReferee($profileReferee) {
		$this->profileReferee = $profileReferee;
	}

}