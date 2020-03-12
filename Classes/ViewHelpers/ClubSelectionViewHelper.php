<?php
	
	namespace Balumedien\Clubms\ViewHelpers;
	
	class ClubSelectionViewHelper extends \TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper {
		
		/**
		 * @return void
		 */
		public function initializeArguments() {
			parent::initializeArguments();
			$this->registerArgument('clubs', 'string', 'start date', false);
			$this->registerArgument('clubOfficials', 'string', 'start date', false);
		}
		
		/**
		 * @return \DatePeriod $dateRange
		 * @throws \Exception
		 */
		public function render() {
			
			$startdate = new \DateTime();
			$startdate->setTimestamp($this->arguments['startdate']);
			
			$enddate = new \DateTime();
			if($this->arguments['enddate']) {
				$enddate->setTimestamp($this->arguments['enddate']);
			} else {
				$enddate->setTimestamp(time());
			}
			$enddate->add(new \DateInterval('P1D'));
			
			$dateRange = $enddate->diff($startdate)->format($this->arguments['format']);
			return $dateRange;
			
		}
		
	}