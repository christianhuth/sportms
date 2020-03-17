<?php
	
	namespace Balumedien\Clubms\Controller;
	
	class ClubMSBaseController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {
		
		protected function getClubsFilter() {
			return $this->settings['club']['clubs'];
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
		
		protected function mergeRequestWithSettings() {
			$listOfRequestArguments = array();
			$listOfRequestArguments[] = ['selectClub,club,selected'];
			$listOfRequestArguments[] = ['showView,club,showView'];
			foreach($listOfRequestArguments as $argument) {
				$explodedArgument = explode(',', $argument);
				\TYPO3\CMS\Core\Utility\DebugUtility::debug($explodedArgument[0], 'Debug: ' . __FILE__ . ' in Line: ' . __LINE__);
				\TYPO3\CMS\Core\Utility\DebugUtility::debug($explodedArgument[1], 'Debug: ' . __FILE__ . ' in Line: ' . __LINE__);
				\TYPO3\CMS\Core\Utility\DebugUtility::debug($explodedArgument[2], 'Debug: ' . __FILE__ . ' in Line: ' . __LINE__);
				if($this->request->hasArgument($explodedArgument[0])) {
					$this->settings[$explodedArgument[1]][$explodedArgument[2]] = $this->request->getArgument($explodedArgument[0]);
				}
			}
		}
		
	}