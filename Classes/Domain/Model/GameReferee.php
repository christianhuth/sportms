<?php


namespace Balumedien\Clubms\Domain\Model;

use TYPO3\CMS\Extbase\Annotation\ORM\Lazy;

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
 * GameReferee
 */
class GameReferee extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * @var \Balumedien\Clubms\Domain\Model\Game
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
     */
    protected $game;

    /**
     * @var \Balumedien\Clubms\Domain\Model\Person
     */
    protected $person;

    /**
     * @var \Balumedien\Clubms\Domain\Model\RefereeJob
     */
    protected $refereeJob;

    /**
     * @return Game
     */
    public function getGame()
    {
        return $this->game;
    }

    /**
     * @param Game $game
     */
    public function setGame($game)
    {
        $this->game = $game;
    }

    /**
     * @return Person
     */
    public function getPerson()
    {
        return $this->person;
    }

    /**
     * @param Person $person
     */
    public function setPerson($person)
    {
        $this->person = $person;
    }

    /**
     * @return RefereeJob
     */
    public function getRefereeJob()
    {
        return $this->refereeJob;
    }

    /**
     * @param RefereeJob $refereeJob
     */
    public function setRefereeJob($refereeJob)
    {
        $this->refereeJob = $refereeJob;
    }

}