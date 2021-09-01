<?php
    
    declare(strict_types=1);
    
    namespace ChristianKnell\Sportms\Domain\Model;
    
    use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

    /**
     * CompetitionSeasonGameday
     */
    class CompetitionSeasonGameday extends AbstractEntity
    {
        
        /**
         * @var \ChristianKnell\Sportms\Domain\Model\CompetitionSeason
         * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
         */
        protected $competitionSeason;
        
        /**
         * @var string
         */
        protected $label;
        
        /**
         * @var int
         */
        protected $startdate;
        
        /**
         * @var int
         */
        protected $enddate;
        
        /**
         * @return \ChristianKnell\Sportms\Domain\Model\CompetitionSeason
         */
        public function getCompetitionSeason()
        {
            return $this->competitionSeason;
        }
        
        /**
         * @param \ChristianKnell\Sportms\Domain\Model\CompetitionSeason $competitionSeason
         */
        public function setCompetitionSeason($competitionSeason)
        {
            $this->competitionSeason = $competitionSeason;
        }
        
        /**
         * @return string
         */
        public function getLabel()
        {
            return $this->label;
        }
        
        /**
         * @param string $label
         */
        public function setLabel($label)
        {
            $this->label = $label;
        }
        
        /**
         * @return int
         */
        public function getStartdate()
        {
            return $this->startdate;
        }
        
        /**
         * @param int $startdate
         */
        public function setStartdate($startdate)
        {
            $this->startdate = $startdate;
        }
        
        /**
         * @return int
         */
        public function getEnddate()
        {
            return $this->enddate;
        }
        
        /**
         * @param int $enddate
         */
        public function setEnddate($enddate)
        {
            $this->enddate = $enddate;
        }
        
    }