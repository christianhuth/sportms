<?php
	
	namespace Balumedien\Clubms\Controller;
	
	class ClubMSBaseController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {
	
		protected function getClubsFilter() {
			return $this->settings['club']['clubs'];
		}
		
		protected function getSeasonsFilter() {
			return $this->settings['season']['seasons'];
		}
		
		protected function getTeamsFilter() {
			return $this->settings['team']['teams'];
		}
		
	}