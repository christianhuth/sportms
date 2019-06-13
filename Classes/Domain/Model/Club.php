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
 * Club
 */
class Club extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {
	
	/**
	 * @var string
	 */
	protected $name = '';
	
	/**
	 * @var string
	 */
	protected $colours = '';
	
	/**
	 * @var int
	 */
	protected $dateOfFounding = '';
	
	/**
	 * @var int
	 */
	protected $yearOfFounding = '';
	
	/**
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Clubms\Domain\Model\ClubMembers>
     * @lazy
	 * @cascade remove
	 */
	protected $clubMembers = NULL;
	
	/**
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     * @lazy
	 */
	protected $images = NULL;
	
	/**
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Clubms\Domain\Model\Address>
	 * @lazy
	 * @cascade remove
	 */
	protected $addresses = NULL;
	
	/**
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Clubms\Domain\Model\Phone>
	 * @lazy
	 * @cascade remove
	 */
	protected $phones = NULL;
	
	/**
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Clubms\Domain\Model\Mail>
	 * @lazy
	 * @cascade remove
	 */
	protected $mails = NULL;
	
	/**
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Clubms\Domain\Model\Url>
	 * @lazy
	 * @cascade remove
	 */
	protected $urls = NULL;
	
	/**
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Clubms\Domain\Model\ClubSection>
     * @lazy
	 * @cascade remove
	 */
	protected $clubSections = NULL;
	
	/**
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Clubms\Domain\Model\ClubOfficialJob>
	 * @lazy
	 * @cascade remove
	 */
	protected $club_official_job = '';

    /**
	 * @var int
     */
    protected $detailLink = '';
	
	/**
	 * __construct
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
	protected function initStorageObjects(){
		$this->clubSections = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * Returns the name
	 * @return string $name
	 */
	public function getName() {
		return $this->name;
	}
	
	/**
	 * Sets the name
	 * @param string $name
	 * @return void
	 */
	public function setName($name) {
		$this->name = $name;
	}
	
	/**
	 * Returns the colours of the club
	 * @return string
	 */
	public function getColours() {
		return $this->colours;
	}
	
	/**
	 * Sets the colours of the club
	 * @param string $colours
	 * @return void
	 */
	public function setColours($colours) {
		$this->colours = $colours;
	}
	
	/**
	 * Returns the dateOfFounding
	 * @return int $dateOfFounding
	 */
	public function getDateOfFounding() {
		return $this->dateOfFounding;
	}
	
	/**
	 * Sets the dateOfFounding
	 * @param int $dateOfFounding
	 * @return void
	 */
	public function setDateOfFounding($dateOfFounding) {
		$this->dateOfFounding = $dateOfFounding;
	}
	
	/**
	 * Returns the yearOfFounding
	 * @return int $yearOfFounding
	 */
	public function getYearOfFounding() {
		return $this->yearOfFounding;
	}
	
	/**
	 * Sets the yearOfFounding
	 * @param int $yearOfFounding
	 * @return void
	 */
	public function setYearOfFounding($yearOfFounding) {
		$this->yearOfFounding = $yearOfFounding;
	}
	
	/**
	 * Returns the members of the club
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Clubms\Domain\Model\ClubMembers>
	 */
	public function getClubMembers() {
		return $this->clubMembers;
	}
	
	/**
	 * Set the members of the club
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Clubms\Domain\Model\ClubMembers> $clubMembers
	 * @return void
	 */
	public function setClubMembers(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $clubMembers) {
		return $this->clubMembers = $clubMembers;
	}
	
	/**
	 * Returns the image
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $images
	 */
	public function getImages() {
			return $this->images;
	}

	/**
	 * Sets the image
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $images
	 * @return void
	 */
	public function setImages($images) {
			$this->images = $images;
	}
	
	/**
	 * Adds a ClubSection
	 *
	 * @param \Balumedien\Clubms\Domain\Model\ClubSection $clubSection
	 * @return void
	 */
	public function addClubSection(\Balumedien\Clubms\Domain\Model\ClubSection $clubSection) {
		$this->clubSections->attach($clubSection);
	}
	
	/**
	 * Removes a Image
	 *
	 * @param \Balumedien\Clubms\Domain\Model\ClubSection $clubSection The ClubSection to be removed
	 * @return void
	 */
	public function removeClubSection(\Balumedien\Clubms\Domain\Model\ClubSection $clubSection) {
		$this->clubSections->detach($clubSection);
	}
	
	/**
	 * Returns the sections of the club
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Clubms\Domain\Model\ClubSection> $clubSections
	 */
	public function getClubSections() {
		return $this->clubSections;
	}

	/**
	 * Sets the sections of the club
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Clubms\Domain\Model\ClubSection> $clubSections
	 * @return void
	 */
	public function setClubSections($clubSections) {
			$this->clubSections = $clubSections;
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

}