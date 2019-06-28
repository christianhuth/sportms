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
 * Competition
 */
class Competition extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {
	
	/**
	 * @var string
	 */
	protected $name;
	
	/**
	 * @var string
	 */
	protected $nameShort;
	
	/**
	 * @var \Balumedien\Clubms\Domain\Model\Section
	 */
	protected $section;

	/**
	 * @var \Balumedien\Clubms\Domain\Model\SectionAgeGroup
	 */
	protected $sectionAgeGroup;
	
	/**
	 * @var \Balumedien\Clubms\Domain\Model\SectionAgeLevel
	 */
	protected $sectionAgeLevel;
	
	/**
	 * @var string
	 */
	protected $competitionType;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\Clubms\Domain\Model\CompetitionSeason>
     */
	protected $competitionSeasons;

    /**
     * @var boolean
     */
    protected $detailLink;

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
		$this->competitionSeasons = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getNameShort()
    {
        return $this->nameShort;
    }

    /**
     * @param string $nameShort
     */
    public function setNameShort($nameShort)
    {
        $this->nameShort = $nameShort;
    }

    /**
     * @return Section
     */
    public function getSection()
    {
        return $this->section;
    }

    /**
     * @param Section $section
     */
    public function setSection($section)
    {
        $this->section = $section;
    }

	/**
	 * @return SectionAgeGroup
	 */
	public function getSectionAgeGroup() {
		return $this->sectionAgeGroup;
	}

	/**
	 * @param SectionAgeGroup $sectionAgeGroup
	 */
	public function setSectionAgeGroup($sectionAgeGroup) {
		$this->sectionAgeGroup = $sectionAgeGroup;
	}

    /**
     * @return SectionAgeLevel
     */
    public function getSectionAgeLevel()
    {
        return $this->sectionAgeLevel;
    }

    /**
     * @param SectionAgeLevel $sectionAgeLevel
     */
    public function setSectionAgeLevel($sectionAgeLevel)
    {
        $this->sectionAgeLevel = $sectionAgeLevel;
    }

    /**
     * @return string
     */
    public function getCompetitionType()
    {
        return $this->competitionType;
    }

    /**
     * @param string $competitionType
     */
    public function setCompetitionType($competitionType)
    {
        $this->competitionType = $competitionType;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getCompetitionSeasons()
    {
        return $this->competitionSeasons;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $competitionSeasons
     */
    public function setCompetitionSeasons($competitionSeasons)
    {
        $this->competitionSeasons = $competitionSeasons;
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

}