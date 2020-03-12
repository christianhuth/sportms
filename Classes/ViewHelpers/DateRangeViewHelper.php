<?php
	
	namespace Balumedien\Clubms\ViewHelpers;
	
	class DateRangeViewHelper extends \TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper {
		
		/**
		 * @return void
		 */
		public function initializeArguments() {
			parent::initializeArguments();
			$this->registerArgument('startdate', 'string', 'start date', true);
			$this->registerArgument('enddate', 'string', 'end date', true);
		}
		
		/**
		 * @return \DatePeriod $dateRange
		 * @throws \Exception
		 */
		public function render() {
			$startdate = new \DateTime();
			$startdate->setTimestamp($this->arguments['startdate']);
			
			$enddate = new \DateTime();
			$enddate->setTimestamp($this->arguments['enddate']);
			
			$interval = new \DateInterval('P1D'); // 1 Day
			$dateRange = new \DatePeriod($startdate, $interval, $enddate);
			
			return $dateRange;
		}
		
	}