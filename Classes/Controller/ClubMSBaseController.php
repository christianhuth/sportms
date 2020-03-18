<?php
	
	namespace Balumedien\Clubms\Controller;
	
	class ClubMSBaseController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {
		
		protected function getClubsFilter($useSelected = TRUE) {
			return $this->getFilter('club', $useSelected);
		}
		
		protected function getSeasonsFilter() {
			return $this->settings['season']['seasons'];
		}
		
		protected function getSectionsFilter() {
			return $this->settings['section']['sections'];
		}
		
		protected function getSectionAgeGroupsFilter() {
			return $this->settings['section']['sectionAgeGroups'];
		}
		
		protected function getSectionAgeLevelsFilter() {
			return $this->settings['section']['sectionAgeLevels'];
		}
		
		protected function getTeamsFilter() {
			return $this->settings['team']['teams'];
		}
		
		protected function getFilter($model, $useSelected) {
			return ($useSelected) ? $this->settings[$model]['selected'] : $this->settings[$model][$model . 's'];
		}
		
		protected function mapRequestsToSettings(): void {
			/* selectClub */
			if($this->request->hasArgument('selectClub')) {
				$this->settings['club']['selected'] = $this->request->getArgument('selectClub');
			}
			/* ShowView */
			\TYPO3\CMS\Core\Utility\DebugUtility::debug($this->request, 'Debug: ' . __FILE__ . ' in Line: ' . __LINE__);
			if($this->request->hasArgument('controllerName')) {
				\TYPO3\CMS\Core\Utility\DebugUtility::debug($this->request, 'Debug: ' . __FILE__ . ' in Line: ' . __LINE__);
				$model = strtolower($this->request->getArgument('controllerName'));
				\TYPO3\CMS\Core\Utility\DebugUtility::debug($model, 'Debug: ' . __FILE__ . ' in Line: ' . __LINE__);
				if($this->request->hasArgument('showView')) {
					$this->settings[$model]['showView']['current'] = $this->request->getArgument('showView');
				}
			}
		}
		
		protected function determineShowViews($model, $listOfPossibleShowViews): void {
			foreach(explode(',', $listOfPossibleShowViews) AS $showView) {
				$this->settings[$model]['showView'][$showView] = ($this->settings[$model]['showViews']) ? strpos($this->settings[$model]['showViews'], $showView) !== FALSE : TRUE;
			}
		}
		
		protected function determineShowView($model): void {
			if(!$this->settings[$model]['showView']['current']) {
				$this->settings[$model]['showView']['current'] = ($this->settings[$model]['showViews']) ? explode(',', $this->settings[$model]['showViews'])[0] : 'index';
			}
		}
		
	}