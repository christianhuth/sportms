<?php
	
	namespace Balumedien\Clubms\Configuration\TCA\UserFunc;
	
	class UserFunc {
		
		public function addressLabel(&$parameters, $parentObject) {
			$record = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
            $newLabel = $record['street'] . " " . $record['housenumber'] . " (" . $record['zipcode'] . " " . $record['location'] . ")";
			$parameters['title'] = $newLabel;
		}

        public function competitionLabel(&$parameters, $parentObject) {
            $record = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
            $newLabel = $record['name'] . " (" . $record['section'] . " " . $record['age_level'] . ")";
            $parameters['title'] = $newLabel;
        }
		
		public function phoneLabel(&$parameters, $parentObject) {
			$record = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
            $newLabel = $record['areaCode'] . " / " . $record['callingNumber'];
			$parameters['title'] = $newLabel;
		}
		
		public function sectionPositionLabel(&$parameters, $parentObject) {
			$record = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
            $newLabel = $record['label'] . " (" . $record['label_short'] . ")";
			$parameters['title'] = $newLabel;
		}
		
		public function teamSeasonPracticeLabel(&$parameters, $parentObject) {
			$record = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
            $newLabel = $record['day'] . " (" . $record['time_start'] . " - " . $record['time_end'] . " Uhr)";
			$parameters['title'] = $newLabel;
		}
		
		public function teamSeasonSquadMemberLabel(&$parameters, $parentObject) {
			$record = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
			$person = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_clubms_domain_model_person", $record['person']);
			$position = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord("tx_clubms_domain_model_section_position_group", $record['position']);
            $newLabel = $person['lastname'] . ", " . $person['firstname'] . " (" . $position['label'] . ")";
			$parameters['title'] = $newLabel;
		}
		
	}
	
?>