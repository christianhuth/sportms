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
 * GamePeriod
 */
class GamePeriod extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

	/**
	 * @var \Balumedien\Clubms\Domain\Model\Game
	 * @TYPO3\\CMS\\Extbase\\Annotation\\ORM\\Lazy
	 */
	protected $game;

	/**
	 * @var String
	 */
	protected $label;

	/**
	 * @var int
	 */
	protected $duration;

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
	public function getLabel() {
		return $this->label;
	}

	/**
	 * @param String $label
	 */
	public function setLabel($label) {
		$this->label = $label;
	}

	/**
	 * @return int
	 */
	public function getDuration() {
		return $this->duration;
	}

	/**
	 * @param int $duration
	 */
	public function setDuration($duration) {
		$this->duration = $duration;
	}

}