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
		
		protected function mergeRequestsWithSettings(): void {
			$listOfMappings = array();
			$listOfMappings[] = ['selectClub', ['club', 'selected']];
			$listOfMappings[] = ['showView', ['club', ['showView', 'current']]];
			foreach($listOfMappings as $mapping) {
				if(count($mapping) === 2) {
					$this->mergeRequestWithSetting($mapping[0], $mapping[1]);
				}
			}
		}
		
		protected function mergeRequestWithSetting(string $request, array $setting, array $position = array()) {
			$position = array_push($position, array($setting[0]));
			\TYPO3\CMS\Core\Utility\DebugUtility::debug($setting[0], 'Debug: ' . __FILE__ . ' in Line: ' . __LINE__);
			\TYPO3\CMS\Core\Utility\DebugUtility::debug($position, 'Debug: ' . __FILE__ . ' in Line: ' . __LINE__);
			if(is_array($setting[1])) {
				return $this->mergeRequestWithSetting($request, $setting[1], $position);
			} else if($this->request->hasArgument($request)) {
				$this->settings[$position][$setting[1]] = $this->request->getArgument($request);
			}
		}
		
		protected function determineShowViews($model, $listOfPossibleShowViews): void {
			foreach(explode(',', $listOfPossibleShowViews) AS $showView) {
				$this->settings[$model]['showView'][$showView] = ($this->settings[$model]['showViews']) ? strpos($this->settings[$model]['showViews'], $showView) !== FALSE : TRUE;
			}
		}
		
		protected function determineShowView($model): void {
			$this->settings[$model]['showView']['current'] = ($this->settings[$model]['showView']['current']) ? : ($this->settings[$model]['showViews']) ? explode(',', $this->settings[$model]['showViews'])[0] : 'index';
		}
		
	}