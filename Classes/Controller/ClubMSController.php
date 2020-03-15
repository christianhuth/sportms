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
	 * ClubMSController
	 */
	class ClubMSController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {
		
		/**
		 * @var \Balumedien\Clubms\Domain\Repository\ClubRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $clubRepository = null;
		
		/**
		 * @var \Balumedien\Clubms\Domain\Repository\CompetitionRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $competitionRepository = null;
		
		/**
		 * @var \Balumedien\Clubms\Domain\Repository\GameRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $gameRepository = null;
		
		/**
		 * @var \Balumedien\Clubms\Domain\Repository\PersonRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $personRepository = null;
		
		/**
		 * @var \Balumedien\Clubms\Domain\Repository\TeamRepository
		 * @TYPO3\CMS\Extbase\Annotation\Inject
		 */
		protected $teamRepository = null;
		
		/**
		 * @return void
		 */
		public function dbStatsAction() {
			
			/* Domain Model Club */
			$clubCount = $this->clubRepository->findAll();
			\TYPO3\CMS\Core\Utility\DebugUtility::debug($clubCount, 'Debug: ' . __FILE__ . ' in Line: ' . __LINE__);
			$this->view->assign('clubCount', $clubCount);
			
			/* Domain Model Competition */
			$competitionCount = $this->competitionRepository->findAll()->count();
			$this->view->assign('competitionCount', $competitionCount);
			
			/* Domain Model Game */
			$gameCount = $this->gameRepository->findAll()->count();
			$this->view->assign('gameCount', $gameCount);
			
			/* Domain Model Person */
			$personCount = $this->personRepository->findAll()->count();
			$this->view->assign('personCount', $personCount);
			
			/* Domain Model Team */
			$teamCount = $this->teamRepository->findAll()->count();
			$this->view->assign('teamCount', $teamCount);
			
		}
		
	}