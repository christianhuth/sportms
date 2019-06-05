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
 * Season
 */
class Season extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * season_name
	 *
	 * @var string
	 */
	protected $seasonName = '';

	/**
	 * season_name_short
	 *
	 * @var string
	 */
	protected $seasonNameShort = '';

    /**
     * season_name_very_short
     *
     * @var string
     */
    protected $seasonNameVeryShort = '';

    /**
     * startdate
     *
     * @var int
     */
    protected $startdate;

    /**
     * enddate
     *
     * @var int
     */
    protected $enddate;

    /**
     * @return string
     */
    public function getSeasonName()
    {
        return $this->seasonName;
    }

    /**
     * @param string $seasonName
     */
    public function setSeasonName($seasonName)
    {
        $this->seasonName = $seasonName;
    }

    /**
     * @return string
     */
    public function getSeasonNameShort()
    {
        return $this->seasonNameShort;
    }

    /**
     * @param string $seasonNameShort
     */
    public function setSeasonNameShort($seasonNameShort)
    {
        $this->seasonNameShort = $seasonNameShort;
    }

    /**
     * @return string
     */
    public function getSeasonNameVeryShort()
    {
        return $this->seasonNameVeryShort;
    }

    /**
     * @param string $seasonNameVeryShort
     */
    public function setSeasonNameVeryShort($seasonNameVeryShort)
    {
        $this->seasonNameVeryShort = $seasonNameVeryShort;
    }

    /**
     * @return int
     */
    public function getStartdate()
    {
        return $this->startdate;
    }

    /**
     * @param int $startdate
     */
    public function setStartdate($startdate)
    {
        $this->startdate = $startdate;
    }

    /**
     * @return int
     */
    public function getEnddate()
    {
        return $this->enddate;
    }

    /**
     * @param int $enddate
     */
    public function setEnddate($enddate)
    {
        $this->enddate = $enddate;
    }

}