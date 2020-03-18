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
			$listOfMappings = array();
			$listOfMappings['selectClub'] = 'club.selected';
			$listOfMappings['showView'] = 'club.showView.current';
			foreach($listOfMappings as $requestArgument => $mappingPath) {
				if($this->request->hasArgument($requestArgument)) {
					$mappedRequest = $this->mapRequestValueToSettingPath($this->request->getArgument($requestArgument), $mappingPath);
					\TYPO3\CMS\Core\Utility\DebugUtility::debug($mappedRequest, 'Debug: ' . __FILE__ . ' in Line: ' . __LINE__);
					\TYPO3\CMS\Core\Utility\DebugUtility::debug(array_merge_recursive($this->settings, $mappedRequest), 'Debug: ' . __FILE__ . ' in Line: ' . __LINE__);
				}
			}
		}
		
		protected function mapRequestValueToSettingPath(string $requestValue, string $mappingPath): array {
			$positionOfPathSeperator = strpos($mappingPath, '.');
			if($positionOfPathSeperator !== FALSE) {
				$currentKey = substr($mappingPath, 0, $positionOfPathSeperator);
				$newMappingPath = substr($mappingPath, $positionOfPathSeperator + 1);
				return array($currentKey => $this->mapRequestValueToSettingPath($requestValue, $newMappingPath));
			} else {
				$currentKey = $mappingPath;
				return array($currentKey => $requestValue);
			}
		}
		
		protected function mapRequestToSetting(string $requestValue, array &$positionInSettings, array &$settings) {
			
			$currentPositionByKey = array_key_first($positionInSettings);
			if(is_array($positionInSettings[$currentPositionByKey])) {
				\TYPO3\CMS\Core\Utility\DebugUtility::debug($settings, 'Debug: ' . __FILE__ . ' in Line: ' . __LINE__);
				$this->mapRequestToSetting($requestValue, $positionInSettings[$currentPositionByKey], $settings[$currentPositionByKey]);
			} else {
				$settings[$currentPositionByKey] = $requestValue;
			}
			
			
			
			
			
			/*
			if(is_array(array_pop(array_reverse($setting)))) {
			} else {
				if(array_key_exists($setting)) {
				
				}
				$key = array_key_first($setting);
				$setting[$key] = $this->request->getArgument($request);
			}
			*/
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