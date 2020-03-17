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
		
		protected function mergeRequestsWithSettings() {
			$listOfMappings = array();
			$listOfMappings[] = ['selectClub', ['club', 'selected']];
			$listOfMappings[] = ['showView', ['club', ['showView', 'current']]];
			foreach($listOfMappings as $mapping) {
				$explodedMapping = explode(',', $mapping);
				if(count($explodedMapping) === 2 && is_array($explodedMapping[1])) {
					$this->mergeRequestWithSetting($explodedMapping[0], $explodedMapping[1]);
				}
			}
		}
		
		protected function mergeRequestWithSetting(string $request, array $setting) {
			if(is_array($setting)) {
				return $this->mergeRequestWithSetting($request, $setting[0]);
			} else {
				return $this->settings[$setting] = $this->request->getArgument($request);
			}
		}
		
		protected function determineShowViews($model, $listOfPossibleShowViews): void {
			foreach(explode(',', $listOfPossibleShowViews) AS $showView) {
				$this->settings[$model]['showView'][$showView] = strpos($this->settings[$model]['showViews'], $showView) !== FALSE;
			}
		}
		
		protected function determineShowView($model): void {
			\TYPO3\CMS\Core\Utility\DebugUtility::debug($this->settings, 'Debug: ' . __FILE__ . ' in Line: ' . __LINE__);
			$this->settings[$model]['showView']['current'] = ($this->settings[$model]['showView']['current']) ? : ($this->settings[$model]['showViews']) ? explode(',', $this->settings[$model]['showViews'])[0] : 'index';
			\TYPO3\CMS\Core\Utility\DebugUtility::debug($this->settings, 'Debug: ' . __FILE__ . ' in Line: ' . __LINE__);
			\TYPO3\CMS\Core\Utility\DebugUtility::debug(explode(',', $this->settings[$model]['showViews'])[0], 'Debug: ' . __FILE__ . ' in Line: ' . __LINE__);
		}
		
	}