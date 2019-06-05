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
 * Section
 */
class Section extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * label
	 *
	 * @var string
	 */
	protected $label = '';

    /**
     * Images
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     */
    protected $images = NULL;

    /**
     * Images
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Clubms\Domain\Model\SectionPositionGroup>
     */
    protected $sectionPositionGroups = NULL;

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
        $this->sectionPositionGroups = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

	/**
	 * Returns the label of the section
	 * @return string
	 */
	public function getLabel() {
		return $this->label;
	}
	
	/**
	 * Sets the label of the section
	 * @param string
	 * @return void
	 */
	public function setLabel($label) {
		$this->label = $label;
	}

    /**
     * Adds a Image to the Section
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     */
    public function addImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $image) {
        $this->images->attach($image);
    }
	
	/**
	 * Returns the image
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $images
	 */
	public function getImages() {
			return $this->images;
	}

    /**
     * Removes a Image from the Section
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     */
    public function removeImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $image) {
        $this->images->detach($image);
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
     * Adds a SectionPositionGroup to the Section
     * @param \Balumedien\Clubms\Domain\Model\SectionPositionGroup $sectionPositionGroup
     */
    public function addSectionPositionGroup(\TYPO3\CMS\Extbase\Domain\Model\FileReference $sectionPositionGroup) {
        $this->sectionPositionGroups->attach($sectionPositionGroup);
    }

    /**
     * Returns the image
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Clubms\Domain\Model\SectionPositionGroup> $sectionPositionGroups
     */
    public function getSectionPositionGroups() {
        return $this->sectionPositionGroups;
    }

    /**
     * Removes a Image from the Section
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $sectionPositionGroup
     */
    public function removeSectionPositionGroup(\Balumedien\Clubms\Domain\Model\SectionPositionGroup $sectionPositionGroup) {
        $this->sectionPositionGroups->detach($sectionPositionGroup);
    }

    /**
     * Sets the sectionPositionGroups
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Clubms\Domain\Model\SectionPositionGroup> $sectionPositionGroups
     * @return void
     */
    public function setSectionPositionGroup($sectionPositionGroups) {
        $this->sectionPositionGroups = $sectionPositionGroups;
    }

}