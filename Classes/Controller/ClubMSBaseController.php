<?php
	
	namespace Balumedien\Clubms\Controller;
	
	class ClubMSBaseController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {
	
		protected function getTeamsFilter(): array {
			return $this->settings['team']['teams'];
		}
		
	}