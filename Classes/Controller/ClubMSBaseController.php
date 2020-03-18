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
			$listOfMappings[] = ['selectClub', array('club' => array('selected' => ''))];
			$listOfMappings[] = ['showView', array('club' => array('showView' => array('current'=>'')))];
			foreach($listOfMappings as $mapping) {
				if($this->request->hasArgument($mapping[0])) {
					$this->mapRequestToSetting($this->request->getArgument($mapping[0]), $mapping[1], $this->settings);
				}
			}
		}
		
		protected function mapRequestToSetting(string $requestValue, array &$positionInSettings, array &$settings) {
			
			$currentPositionByKey = array_key_first($positionInSettings);
			if(is_array($positionInSettings[$currentPositionByKey])) {
				$this->mapRequestToSetting($requestValue, $positionInSettings[$currentPositionByKey], $settings);
			} else {
				$positionInSettings[$currentPositionByKey] = $requestValue;
			}
			
			
			
			\TYPO3\CMS\Core\Utility\DebugUtility::debug($positionInSettings, 'Debug: ' . __FILE__ . ' in Line: ' . __LINE__);
			
			
			
			
			
			/*
			if(is_array(array_pop(array_reverse($setting)))) {
			} else {
				if(array_key_exists($setting)) {
				
				}
				$key = array_key_first($setting);
				$setting[$key] = $this->request->getArgument($request);
				\TYPO3\CMS\Core\Utility\DebugUtility::debug($setting, 'Debug: ' . __FILE__ . ' in Line: ' . __LINE__);
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