<?php
    
    declare(strict_types=1);
    
    namespace ChristianKnell\Sportms\ViewHelpers;
    
    class DateRangeViewHelper extends \TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper
    {
        
        /**
         * @return void
         */
        public function initializeArguments()
        {
            parent::initializeArguments();
            $this->registerArgument('startdate', 'string', 'start date', true);
            $this->registerArgument('enddate', 'string', 'end date', false);
            $this->registerArgument('format', 'string', 'format of the date range', true);
        }
        
        /**
         * @return \DatePeriod $dateRange
         * @throws \Exception
         */
        public function render()
        {
            $startdate = new \DateTime();
            $startdate->setTimestamp($this->arguments['startdate']);
            
            $enddate = new \DateTime();
            if ($this->arguments['enddate']) {
                $enddate->setTimestamp($this->arguments['enddate']);
            } else {
                $enddate->setTimestamp(time());
            }
            $enddate->add(new \DateInterval('P1D'));
            
            $dateRange = $enddate->diff($startdate)->format($this->arguments['format']);
            return $dateRange;
        }
        
    }