<?php
	
	namespace Balumedien\Sportms\ViewHelpers;
	
	class DateRangeViewHelper extends \TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper {
		
		/**
		 * @return void
		 */
		public function initializeArguments() {
			parent::initializeArguments();
			$this->registerArgument('startdate', 'string', 'start date', TRUE);
			$this->registerArgument('enddate', 'string', 'end date', FALSE);
			$this->registerArgument('format', 'string', 'format of the date range', TRUE);
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