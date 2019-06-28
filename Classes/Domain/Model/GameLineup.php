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
 * GameLineup
 */
class GameLineup extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

	/**
	 * @var \Balumedien\Clubms\Domain\Model\Game
	 * @lazy
	 */
	protected $game;

	/**
	 * @var String
	 */
	protected $jersey_number;

	/**
	 * @var \Balumedien\Clubms\Domain\Model\Person
	 */
	protected $person;

	/**
	 * @var \Balumedien\Clubms\Domain\Model\SectionPosition
	 */
	protected $section_position;

	/**
	 * @return Game
	 */
	public function getGame() {
		return $this->game;
	}

	/**
	 * @param Game $game
	 */
	public function setGame($game) {
		$this->game = $game;
	}

	/**
	 * @return String
	 */
	public function getJerseyNumber() {
		return $this->jersey_number;
	}

	/**
	 * @param String $jersey_number
	 */
	public function setJerseyNumber($jersey_number) {
		$this->jersey_number = $jersey_number;
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
	 * @return SectionPosition
	 */
	public function getSectionPosition() {
		return $this->section_position;
	}

	/**
	 * @param SectionPosition $section_position
	 */
	public function setSectionPosition($section_position) {
		$this->section_position = $section_position;
	}

}