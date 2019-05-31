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
 * ClubSection
 */
class ClubSection extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {
	
	/**
	 * @var \Balumedien\Clubms\Domain\Model\Club
	 * @lazy
	 */
	protected $club = '';
	
	/**
	 * @var \Balumedien\Clubms\Domain\Model\Section
	 * @lazy
	 */
	protected $section = '';
	
	/**
	 * Images
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
	 */
	protected $images = NULL;
	
	/**
	 * @var int
	 * @lazy
	 */
	protected $member = '';
	
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
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Clubms\Domain\Model\ClubSectionOfficialJob>
	 * @lazy
	 * @cascade remove
	 */
	protected $clubSectionOfficialJobs = '';
	
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
		$this->images = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->address = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->phone = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->mail = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->url = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->clubSectionOfficialJobs = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}
	
	/**
	 * Returns the section of the clubsection
	 * @return \Balumedien\Clubms\Domain\Model\Section
	 */
	public function getSection() {
		return $this->section;
	}
	
	/**
	 * Sets the section of the clubsection
	 * @param \Balumedien\Clubms\Domain\Model\Section $section
	 * @return void
	 */
	public function setSection($section) {
		$this->section = $section;
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
	 * Returns the addresses
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Clubms\Domain\Model\Address> $address
	 */
	public function getAddress() {
			return $this->address;
	}
	
	/**
	 * Sets the addresses
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Clubms\Domain\Model\Address> $address
	 */
	public function setAddress($address) {
			$this->address = $address;
	}
	
	/**
	 * Returns the phones
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Clubms\Domain\Model\Phone> $phone
	 */
	public function Phone() {
			return $this->phone;
	}
	
	/**
	 * Sets the phones
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Clubms\Domain\Model\Phone> $phone
	 */
	public function setPhone($phone) {
			$this->phone = $phone;
	}
	
	/**
	 * Returns the mails
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Clubms\Domain\Model\Mail> $mail
	 */
	public function getMail() {
			return $this->mail;
	}
	
	/**
	 * Sets the mails
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Clubms\Domain\Model\Mail> $mail
	 */
	public function setMail($mail) {
			$this->mail = $mail;
	}
	
	/**
	 * Returns the urls
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Clubms\Domain\Model\url> $url
	 */
	public function getUrl() {
			return $this->url;
	}
	
	/**
	 * Sets the urls
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Clubms\Domain\Model\Url> $url
	 */
	public function setUrl($url) {
			$this->url = $url;
	}
	
}