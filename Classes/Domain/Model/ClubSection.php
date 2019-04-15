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
	protected $club_section_official_job = '';

}