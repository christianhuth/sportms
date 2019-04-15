<?php
	
	namespace Balumedien\Clubms\Configuration\TCA\UserFunc;
	
	class UserFunc {
		
		public function addressLabel(&$parameters, $parentObject) {
			$record = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
			$newAddressLabel = $record['street'] . " " . $record['housenumber'] . " (" . $record['zipcode'] . " " . $record['location'] . ")";
			$parameters['title'] = $newAddressLabel;
		}
		
		public function phoneLabel(&$parameters, $parentObject) {
			$record = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
			$newPhoneLabel = $record['areaCode'] . " / " . $record['callingNumber'];
			$parameters['title'] = $newPhoneLabel;
		}
		
		public function sectionPositionLabel(&$parameters, $parentObject) {
			$record = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
			$newSectionPositionLabel = $record['label'] . " (" . $record['label_short'] . ")";
			$parameters['title'] = $newSectionPositionLabel;
		}
		
		public function teamSeasonPracticeLabel(&$parameters, $parentObject) {
			$record = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
			$newTeamSeasonPracticeLabel = $record['day'] . " (" . $record['time_start'] . " - " . $record['time_end'] . " Uhr)";
			$parameters['title'] = $newTeamSeasonPracticeLabel;
		}
		
		public function teamSeasonSquadMemberLabel(&$parameters, $parentObject) {
			$record = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
			$person = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_clubms_domain_model_person", $record['person']);
			$position = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_clubms_domain_model_section_position_group", $record['position']);
			$newTeamSeasonSquadMemberLabel = $person['lastname'] . ", " . $person['firstname'] . " (" . $position['label'] . ")";
			$parameters['title'] = $newTeamSeasonSquadMemberLabel;
		}
		
	}
	
?>