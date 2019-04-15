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
	protected $name = '';
	
	/**
	 * @var string
	 */
	protected $short = '';
	
	/**
	 * @var \Balumedien\Clubms\Domain\Model\Section
	 */
	protected $section = NULL;
	
	/**
	 * @var \Balumedien\Clubms\Domain\Model\AgeLevel
	 */
	protected $ageLevel = NULL;
	
	/**
	 * @var string
	 */
	protected $competitionType = '';

	/**
	 * Returns the name of the competition
	 * @return string $name
	 */
	public function getName() {
		return $this->name;
	}
	
	/**
	 * Sets the name of the competition
	 * @param string $name
	 * @return void
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * Returns the short name of the competition
	 * @return string $short 
	 */
	public function getShort() {
		return $this->short;
	}
	
	/**
	 * Sets the short name of the competition
	 * @param string $short
	 * @return void
	 */
	public function setShort($short) {
		$this->short = $short;
	}

	/**
	 * Returns the section of the competition
	 * @return \Balumedien\Clubms\Domain\Model\Section 
	 */
	public function getSection() {
		return $this->section;
	}
	
	/**
	 * Sets the section of the competition
	 * @param \Balumedien\Clubms\Domain\Model\Section $section
	 * @return void
	 */
	public function setSection(\Balumedien\Clubms\Domain\Model\Section $section) {
		$this->section = $section;
	}

	/**
	 * Returns the ageLevel of the competition
	 * @return \Balumedien\Clubms\Domain\Model\AgeLevel
	 */
	public function getAgeLevel() {
		return $this->ageLevel;
	}
	
	/**
	 * Sets the ageLevel of the competition
	 * @param \Balumedien\Clubms\Domain\Model\AgeLevel $ageLevel
	 * @return void
	 */
	public function setAgeLevel(\Balumedien\Clubms\Domain\Model\AgeLevel $ageLevel) {
		$this->ageLevel = $ageLevel;
	}

	/**
	 * Returns the type of the competition
	 * @return string 
	 */
	public function getCompetitionType() {
		return $this->competitionType;
	}
	
	/**
	 * Sets the type of the competition
	 * @param string $competitionType
	 * @return void
	 */
	public function setCompetitionType($competitionType) {
		$this->competitionType = $competitionType;
	}

}