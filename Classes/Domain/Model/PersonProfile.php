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
 * PersonProfile
 */
class PersonProfile extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {
	
	/**
	 * @var \Balumedien\Clubms\Domain\Model\Person
	 */
	protected $person;
	
	/**
	 * @var \Balumedien\Clubms\Domain\Model\Section
	 */
	protected $section;
	
	/**
	 * @var string
	 */
	protected $profileType;
	
	/**
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
	 * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
	 */
	protected $profileImages;
	
	/**
	 * TeamSeason constructor.
	 */
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
	protected function initStorageObjects() {
		$this->profileImages = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}
	
	/**
	 * @return Person
	 */
	public function getPerson() {
		return $this->person;
	}
	
	/**
	 * @param Person $person
	 */
	public function setPerson($person) {
		$this->person = $person;
	}
	
	/**
	 * @return Section
	 */
	public function getSection() {
		return $this->section;
	}
	
	/**
	 * @param Section $section
	 */
	public function setSection($section) {
		$this->section = $section;
	}
	
	/**
	 * @return string
	 */
	public function getProfileType() {
		return $this->profileType;
	}
	
	/**
	 * @param string $profileType
	 */
	public function setProfileType($profileType) {
		$this->profileType = $profileType;
	}
	
	/**
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
	 */
	public function getProfileImages() {
		return $this->profileImages;
	}
	
	/**
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $profileImages
	 */
	public function setProfileImages($profileImages) {
		$this->profileImages = $profileImages;
	}

}