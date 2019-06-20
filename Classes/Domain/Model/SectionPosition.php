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
 * SectionPosition
 */
class SectionPosition extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * @var \Balumedien\Clubms\Domain\Model\SectionPositionGroup
     * @lazy
     */
    protected $sectionPositionGroup;

    /**
     * @var string
     */
    protected $label;

    /**
     * @var string
     */
    protected $labelShort;

    /**
     * @var int
     */
    protected $xPosition;

    /**
     * @var int
     */
    protected $yPosition;

    /**
     * @return SectionPositionGroup
     */
    public function getSectionPositionGroup()
    {
        return $this->sectionPositionGroup;
    }

    /**
     * @param SectionPositionGroup $sectionPositionGroup
     */
    public function setSectionPositionGroup($sectionPositionGroup)
    {
        $this->sectionPositionGroup = $sectionPositionGroup;
    }

    /**
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param string $label
     */
    public function setLabel($label)
    {
        $this->label = $label;
    }

    /**
     * @return string
     */
    public function getLabelShort()
    {
        return $this->labelShort;
    }

    /**
     * @param string $labelShort
     */
    public function setLabelShort($labelShort)
    {
        $this->labelShort = $labelShort;
    }

    /**
     * @return int
     */
    public function getXPosition()
    {
        return $this->xPosition;
    }

    /**
     * @param int $xPosition
     */
    public function setXPosition($xPosition)
    {
        $this->xPosition = $xPosition;
    }

    /**
     * @return int
     */
    public function getYPosition()
    {
        return $this->yPosition;
    }

    /**
     * @param int $yPosition
     */
    public function setYPosition($yPosition)
    {
        $this->yPosition = $yPosition;
    }

}