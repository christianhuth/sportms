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
 * SectionAgeLevel
 */
class SectionAgeLevel extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

    /**
     * @var \Balumedien\Clubms\Domain\Model\SectionAgeGroup
     */
    protected $sectionAgeGroup;

	/**
	 * @var string
	 */
	protected $label;

	/**
	 * @var string
	 */
	protected $short;

    /**
     * @return SectionAgeGroup
     */
    public function getSectionAgeGroup()
    {
        return $this->sectionAgeGroup;
    }

    /**
     * @param SectionAgeGroup $sectionAgeGroup
     */
    public function setSectionAgeGroup($sectionAgeGroup)
    {
        $this->sectionAgeGroup = $sectionAgeGroup;
    }

	/**
	 * Returns the label of the ageLevel
	 * @return string
	 */
	public function getLabel() {
		return $this->label;
	}
	
	/**
	 * Sets the label of the ageLevel
	 * @param string
	 */
	public function setLabel($label) {
		$this->label = $label;
	}

    /**
     * @return string
     */
    public function getShort()
    {
        return $this->short;
    }

    /**
     * @param string $short
     */
    public function setShort($short)
    {
        $this->short = $short;
    }

}