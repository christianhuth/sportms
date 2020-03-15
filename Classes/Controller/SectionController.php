<?php

namespace Balumedien\Clubms\Controller;

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
 * SectionController
 */
class SectionController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

    /**
     * @var \Balumedien\Clubms\Domain\Repository\SectionRepository
     * @TYPO3\CMS\Extbase\Annotation\Inject
     */
    protected $sectionRepository;
	
	/**
	 * @return void
	 */
	public function listAction() {
		$sections = $this->sectionRepository->findAll();
		$this->view->assign('sections', $sections);
	}

    /**
     * @param \Balumedien\Clubms\Domain\Model\Section $game
     */
	public function showAction(\Balumedien\Clubms\Domain\Model\Section $section = null) {
        $this->view->assign('section', $section);
	}

}